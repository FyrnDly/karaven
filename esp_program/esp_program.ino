#include  <Arduino.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <EEPROM.h>
// SDA 21 SCL 22 
LiquidCrystal_I2C lcd(0x27,20,4);

int i = 0;
int impulsCoin = 0;
int total = 0;
int inButton = 4;
int trigerAc = 12;

void setup() {
  Serial.begin(115200);  
  attachInterrupt(digitalPinToInterrupt(5),incomingImpuls,FALLING);
  // Insialisasi LCD
  lcd.init();
  lcd.backlight();
  lcd.clear();
  salam();
  // Low Relay
  pinMode(trigerAc, OUTPUT);
  digitalWrite(trigerAc, LOW);
}

void incomingImpuls(){
  impulsCoin=impulsCoin+1;
  i=0; 
}

void loop() {
  // Untuk menghitung berapa lama waktu untuk membaca satu buah koin masuk
  i=i+1;
  // kalibrasiCoin();
  // Deteksi Koin
  if (mickeyCheck()){
    // Reset Impuls Coin
    impulsCoin = 0;
    // Tambah Timer
    total=total+5;
    lcd.clear();
    displayTimer(total);
  } 
  else if (crownCheck()){
    // Reset Impuls Coin
    impulsCoin = 0;
    // Tambah Timer
    total=total+10;
    lcd.clear();
    displayTimer(total);
  } else if(digitalRead(inButton)){
    digitalWrite(trigerAc, HIGH);
    Serial.print(total);
    countdown(total);
    total=0;
    impulsCoin = 0;
    digitalWrite(trigerAc, LOW);
    lcd.clear();
  } else if(total == 0){
    salam();
  }

}

// Fungsi Untuk Mengecek Kalibrasi Coin
void kalibrasiCoin(){
  Serial.print("i=");
  Serial.print(i);
  Serial.print("     Impulses=");
  Serial.print(impulsCoin);
  Serial.print("\n");
}


// Fungsi Cek Koin
bool mickeyCheck(){
  // return impulsCoin == 2;
  return i ==15 and impulsCoin == 1;
}
bool crownCheck(){
  return i == 15 and impulsCoin == 2;
}

// Fungsi Hitung Mundur LCD
void countdown(int detik){
  while (detik > 0){
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("Waktu tersisa: ");
    lcd.setCursor(0, 1);
    lcd.print(detik / 60);
    lcd.print(" menit ");
    lcd.print(detik % 60);
    lcd.print(" detik");
    delay(1000);
    detik --;
  }
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Waktu Habis!");
  delay(2000);
}

// Fungsi Kata Sambutan
void salam(){
  // Kata Sambutan
  lcd.setCursor(0, 0);
  lcd.print("Selamat Datang di");
  lcd.setCursor(0,1);
  lcd.print("Curug Cikoneng.");
  lcd.setCursor(0,2);
  lcd.print("Masukkan Koin Untuk");
  lcd.setCursor(0,3);
  lcd.print("Mulai Mesin Karaoke");
}

// Timer
void displayTimer(int timer){
  lcd.setCursor(0,0);
  lcd.print("Waktu Anda: ");
  lcd.setCursor(0, 1);
  lcd.print(timer / 60);
  lcd.print(" menit ");
  lcd.print(timer % 60);
  lcd.print(" detik");
  lcd.setCursor(0, 2);
  lcd.print("Tekan Tombol Untuk");
  lcd.setCursor(0, 3);
  lcd.print("Memulai Karaoke");
}