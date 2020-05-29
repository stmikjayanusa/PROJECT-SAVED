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
int hijau=17;
int kuning=18;
int buzzer=16;
void setup() {
    Serial.begin(9600);   // Initialize serial communications with the PC
    SPI.begin();
    Serial.print("Mendeteksi Kode Seril Kartu: . . .");    
    motorServo.attach(21);
    pinMode(selenoid, OUTPUT);
    pinMode(merah, OUTPUT);
    pinMode(hijau, OUTPUT);
    pinMode(kuning, OUTPUT);
    pinMode(buzzer, OUTPUT);
    

}


//buka tutup aman

 
void loop(){
  read_id();
  
  }


//RFID
  void read_id(){
               if ( ! mfrc522.PICC_IsNewCardPresent()) { //If a new PICC placed to RFID reader continue
    return 0;
  }
  if ( ! mfrc522.PICC_ReadCardSerial()) {   //Since a PICC placed get Serial and continue
    return 0;
  }
  // There are Mifare PICCs which have 4 byte or 7 byte UID care if you use 7 byte PICC
  // I think we should assume every PICC as they have 4 byte UID
  // Until we support 7 byte PICCs
  Serial.println(F("Scanned PICC's UID:"));
  byte readCard[8];
  for (int i = 0; i < 4; i++) {  //
    readCard[i] = mfrc522.uid.uidByte[i];
    Serial.print(readCard[i], HEX);
  }
  Serial.println("");
  mfrc522.PICC_HaltA(); // Stop reading
  return 1;
    }

    
void ESEKUSI_ID(){
   if(idcard=="39F4AE83"){
        
        cetak("Buka aman","");
        digitalWrite(merah, LOW);
       digitalWrite(hijau, HIGH);
       while(true){digitalWrite(buzzer,HIGH);delay(100);break;digitalWrite(buzzer,HIGH);}
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
int a=0;
void servoOpen(int var, int spd){ 
  digitalWrite(selenoid, LOW); cetak("Buka","");
  delay(500);
  while(a<var){
  a+=1;
  motorServo.write(a);
  delay(spd);
  }
  delay(500);
}
void servoClose(int var, int spd){
  while(a>var){
  a-=1;
  motorServo.write(a);  
  delay(spd);
  }
  delay(2000);
  digitalWrite(selenoid, HIGH); cetak("Tutup","");
  delay(500);
 }
//end buka tutup aman


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
