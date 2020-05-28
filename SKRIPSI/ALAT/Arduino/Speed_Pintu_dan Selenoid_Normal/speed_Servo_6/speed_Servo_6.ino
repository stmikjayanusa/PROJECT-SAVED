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
// * RST/Reset   RST            5            abu-abu
// * SPI SS      SDA(SS)        53           Kuning
// * SPI MOSI    MOSI           51           BLUE/BIRU
// * SPI MISO    MISO           50           ungu
// * SPI SCK     SCK            52           Hijau

//motor---------------------
#include <Servo.h>
Servo motorServo; 
int selenoid=20;
String idcard="";
int merah=19;
int hijau=18;
void setup() {
    Serial.begin(9600);   // Initialize serial communications with the PC
    SPI.begin();
    Serial.print("Mendeteksi Kode Seril Kartu: . . .");    
    motorServo.attach(21);
    pinMode(selenoid, OUTPUT);
    pinMode(merah, OUTPUT);
    pinMode(hijau, OUTPUT);
    

}


//buka tutup aman

 
void loop(){
  PANGGIL_ESEKUSI_RFID_();
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
void ESEKUSI_ID(){
   if(idcard=="39F4AE83"){
        
        cetak("Buka aman","");
        digitalWrite(merah, LOW);
       digitalWrite(hijau, HIGH);
       kondisikey(true);
       delay(2000);
    }else{
            kondisikey(false);
            
             digitalWrite(merah, HIGH);
             digitalWrite(hijau, LOW);
             cetak("Tutup agak lama","");
             delay(2000);
      }
  }
  
void buka_tutup_aman() {
//  PANGGIL_ESEKUSI_RFID_();
    kondisikey(true);
    cetak("Buka aman","");
    delay(10000);
    kondisikey(false);
    cetak("Tutup agak lama","");
    delay(20000);
}

void kondisikey(boolean state){
      if(state==true){
            servoOpen(180,8);
            delay(5000);
            servoClose(23,3);
      }else{
        servoClose(23,3);
      }
 }
\

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
