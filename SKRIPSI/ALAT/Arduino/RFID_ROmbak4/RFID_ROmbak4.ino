//motor------------------------------------------------------
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
  motorServo.attach(21);
   pinMode(selenoid, OUTPUT);
   //    indikator--------------------
    pinMode(merah, OUTPUT);
    pinMode(hijau, OUTPUT);
    pinMode(kuning, OUTPUT);
    pinMode(buzzer,OUTPUT);
    //   end indikator=-------------------



}

void loop() {
 //Buka Pintu
  servo(180,10);
//TUTUP Pintu
  servo(0,10);
}

void servo(int var, int spd){ 
    double a=-1;
    
    digitalWrite(selenoid, LOW); //cetak("Buka","");
    delay(500);
    while(a<var){
    a+=1;
    motorServo.write(a);
    delay(spd);
    }
    delay(500);
}
