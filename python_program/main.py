import subprocess
import serial
import time
import ctypes
import sys


# Mengecek admin akses
def is_admin():
    try:
        return ctypes.windll.shell32.IsUserAnAdmin()
    except:
        return False


# Menjalankan hak akses admin
if is_admin():
    pass
else:
    ctypes.windll.shell32.ShellExecuteW(
        None, "runas", sys.executable, " ".join(sys.argv), None, 1
    )


# Firewall Internet
# Disabled Interface Wifi
def dis_net():
    # os.system("netsh interface set interface 'Wi-Fi' Disabled")
    subprocess.run(["netsh", "interface", "set", "interface", "Wi-Fi", "Disabled"])


# Enabled Interface Wifi
def en_net():
    # os.system("netsh interface set interface 'Wi-Fi' Enabled")
    subprocess.run(["netsh", "interface", "set", "interface", "Wi-Fi", "Enabled"])


# Data komunikasi serial arduino
dataSer = serial.Serial("COM7", 115200)


# Fungsi Countdown
def ct(second):
    while second > 0:
        print(f"Waktu tersisa: \t {second//60} menit {second%60} detik")
        second -= 1
        time.sleep(1)


# Running Program
while True:
    dis_net()

    # Konversi data serial untuk dibaca python
    bytesToRead = dataSer.inWaiting()  # Menambahkan baris ini
    if bytesToRead > 0:  # Menambahkan baris ini
        data = dataSer.read(bytesToRead).decode("utf-8").strip()  # Mengubah baris ini

        # Mengecek Kondisi koin yang masuk, mengaktifkan internet
        timeData = int(data)
        # print(timeData, type(timeData))
        en_net()
        ct(timeData)  # Diubah sesuai durasi penggunaan
