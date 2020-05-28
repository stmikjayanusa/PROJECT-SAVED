//MRC522
#include <SPI.h>
#include <MFRC522.h>
#define RST_PIN 5
#define SS_PIN 53
MFRC522 mfrc522(SS_PIN, RST_PIN);

////RFID
// * 
// * Typical pin layout used:
// * -------------------------
// *             MFRC522      Arduino       COLOR 
// *             Reader/PCD   Mega          That Pin
// * Signal      Pin          Pin           used
// * ------------------------------------
// * RST/Reset   RST            5            RED/MERAH
// * SPI SS      SDA(SS)        53           GREY/ABU-ABU
// * SPI MOSI    MOSI           51           BLUE/BIRU
// * SPI MISO    MISO           50           HIJAU
// * SPI SCK     SCK            52           UNGU

//motor---------------------
#include <Servo.h>
Servo motorServo; 
String idcard="";
void setup() {
    Serial.begin(9600);   // Initialize serial communications with the PC
    SPI.begin();
    Serial.print("Mendeteksi Kode Seril Kartu: . . .");    
    motorServo.attach(21);
    pinMode(20, OUTPUT);
    

}



void loop() {
//  PANGGIL_ESEKUSI_RFID_();
  pintu_bergerak();
}

int a=0;
void pintu_bergerak(){
    digitalWrite(20, HIGH);
    delay(1000);
    servoOpen(180,8);
    delay(1000);
    servoClose(23,3);
    delay(1000);
    digitalWrite(20, LOW);
    delay(3000);
  }
void servoOpen(int var, int spd){ 
  while(a<var){
  a+=1;
  motorServo.write(a);
  delay(spd);
  }
}
void servoClose(int var, int spd){
  while(a>var){
  a-=1;
  motorServo.write(a);  
  delay(spd);
  }
 }

 void PANGGIL_ESEKUSI_RFID_(){
        if ( ! mfrc522.PICC_IsNewCardPresent()) 
        {
          return;
        }
        if ( ! mfrc522.PICC_ReadCardSerial()) 
        {
          return;
        }
       
            byte letter;
            String content= "";
        for (byte i = 0; i < mfrc522.uid.size; i++) 
        {
          
      //     Mencetak Nilai Id number Card
           cetak(String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : ""),String(mfrc522.uid.uidByte[i], HEX));
           delay(100);
      //     ---------------end
            content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : ""));
            content.concat(String(mfrc522.uid.uidByte[i], HEX));
        }
        
        Serial.println();
        Serial.print("** JARINGAN : ");
        content.toUpperCase();
        idcard=content;
        Serial.print(idcard);
//        ESEKUSI_ID();
        
}
void cetak(String l1,String l2){
//   lcd.clear();
//   lcd.setCursor(0,0);
//   lcd.print(l1);
//   lcd.setCursor(0,1);
//   lcd.print(l2);
//   
    Serial.print("\n");
    Serial.print(l1);
    Serial.print("\n");
    Serial.print(l2);
  }
