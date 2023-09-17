Embed System Program
===
Membuat untuk hardware dan juga sistem intergrasi ke komputer untuk menjalankan Vending Machine Karaoke atau <b>KaraVen</b>. Terdapat dua program utama disini, yaitu:
## Program ESP
<b>Program ESP</b> digunakan untuk menjalankan hardware atau vending machine, diantaranya
- Menerima inputan koin dari <i>Acceptor Coin</i> menggunakan sistem interupt. 
- Melakukan proses perhitungan <i>timer</i> untuk karaoke
- Menampilkan waktu dan cara menggunakan vending machine pada LCD
- Menghubungkan dan memutuskan aliran listrik untuk alat karaoke

Untuk menjalankan semua itu, terdapat beberapa library yang digunakan:
| Library | Version |
| ---     | ---   |
| LiquidCrystal_I2C | 1.1.2 |
| EEPROM | 1.0.0 |
| Wire | 1.0.1 |
| Arduino | 1.8.19 |
## Program Python
<b>Program ESP</b> digunakan untuk <b><i>menghidupkan dan mematikan adapter wifi</i></b> pada komputer agar lagu tidak dapat diputar. Hal ini, dikarenakan untuk lagu yang ada menggunakan <i>sistem embed dari youtube</i> yang memerlukan akses internet. Serta program tersebut telah diexport menjadi <b>Program Instlaller</b> berformat <b>.exe</b> untuk mempermudah penggunaan. Selain itu, terdapat beberapa library python yang digunakan agar program python dapat berjalan dengan baik :
| Library | Version |
| ---     | ---   |
| pyinstaller | 5.13.2 |
| pyserial | 3.5 |
| ctypes | 1.1.0 |
| sys | 3.10.8 |
| virtualenv | 20.16.6 |
| time | 1.8.19 |
| subprocess | 0.1.4 |