//RFID_Declarate..........................................
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
#include <MFRC522.h>
#define SS_PIN 53
#define RST_PIN 5
MFRC522 rfid(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;
byte nuidPICC[4];
//end declareteRID....................................

//motor_declarate.......................................
//motor---------------------
#include <Servo.h>
Servo motorServo; 
int selenoid=20;
 String kodeSeri="";
int merah=19;
int hijau=17;
int kuning=18;
int buzzer=16;
//end motor ..............................................

void setup() {
  Serial.begin(9600);
  Serial.print("Mendeteksi Kode Seril Kartu: . . .");
  RFID_Setup();
  //motor declrt..................
      motorServo.attach(21);
      
//  end declarate\\
//    indikator
    pinMode(selenoid, OUTPUT);
    pinMode(merah, OUTPUT);
    pinMode(hijau, OUTPUT);
    pinMode(buzzer,OUTPUT);
//end    indikator
}

void loop(){
  digitalWrite(hijau, LOW);
  RFID_loop();
   motorServo.write(23);


  }

//RFID_Mantap............................................................................
void RFID_loop() {
      // cek kartu RFID baru
      if ( ! rfid.PICC_IsNewCardPresent())
        return;
      // kalo sudah pernah terbaca …
      if ( ! rfid.PICC_ReadCardSerial())
        return;
     
      Serial.print(F("Tipe PICC : "));
      MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);
      Serial.println(rfid.PICC_GetTypeName(piccType));
     read_CradNumber();
      // Halt PICC
      rfid.PICC_HaltA();
      // Stop encryption on PCD
      rfid.PCD_StopCrypto1();
    //  esekusi hasil input RFID
      ESEKUSI_ID();
      
}

//notifi_TRUE
void not_true(){
          digitalWrite(merah, LOW);
       digitalWrite(hijau, HIGH);
       while(true){
             digitalWrite(buzzer,HIGH);
             delay(100);digitalWrite(buzzer,LOW);
             digitalWrite(hijau, HIGH);
             delay(100);
             digitalWrite(buzzer,HIGH);
             delay(100);digitalWrite(buzzer,LOW);
             digitalWrite(hijau, LOW);
                          delay(100);
             digitalWrite(buzzer,HIGH);
             delay(100);digitalWrite(buzzer,LOW);
             digitalWrite(hijau, HIGH);
             break;
       }
  }
  void not_false(){
          digitalWrite(merah, HIGH);
       digitalWrite(hijau,LOW);
       while(true){
             digitalWrite(buzzer,HIGH);
             delay(1000);digitalWrite(buzzer,LOW);
             digitalWrite(merah, HIGH);
             delay(100);
             digitalWrite(buzzer,HIGH);
             delay(100);digitalWrite(buzzer,LOW);
             digitalWrite(merah, LOW);
                          delay(100);
             digitalWrite(buzzer,HIGH);
             delay(100);digitalWrite(buzzer,LOW);
             digitalWrite(merah, HIGH);
             break;
       }
  }
//end notife
//eseksuis perintah.......................................
void ESEKUSI_ID(){

   if(!kodeSeri=="39f4ae83"){
            kondisikey(false);
            not_false();
             cetak("Tutup agak lama","");
             delay(2000);

    }else{
        cetak("Buka aman","");
        not_true();
       kondisikey(true);
       delay(2000);       
      }
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


  //end eseksuis perintah.......................................
  //perintah cetak
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
//  end perintah
//RFID_Declarate..........................................
 void RFID_Setup(){
      SPI.begin(); // Init SPI bus
        rfid.PCD_Init(); // Init MFRC522
        for (byte i = 0; i < 6; i++) {
          key.keyByte[i] = 0xFF;
        }
       
        Serial.println(F("Kode NUID RFID"));
        printHex(key.keyByte, MFRC522::MF_KEY_SIZE);
  }
 void read_CradNumber(){
             for (byte i = 0; i < 4; i++) {
              nuidPICC[i] = rfid.uid.uidByte[i];
            }
         
            Serial.println(F("The NUID tag is:"));
            Serial.print(F("In hex: "));
            printHex(rfid.uid.uidByte, rfid.uid.size);
            Serial.println();

  }
// print kode RFID dalam bentu heksa
void printHex(byte *buffer, byte bufferSize) {
  for (byte i = 0; i < bufferSize; i++) {
    kodeSeri+=String(buffer[i], HEX);
  }
  kodeSeri.trim();
  Serial.print(kodeSeri);
}
//endRFID_Declarate..........................................
