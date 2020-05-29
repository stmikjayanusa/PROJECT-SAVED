//motor---------------------
#include <Servo.h>
Servo motorServo; 

void setup() {
motorServo.attach(0);
  pinMode(1, OUTPUT);

}



void loop() {
  pintu_bergerak();
}

int a=0;
void pintu_bergerak(){
    digitalWrite(1, HIGH);
    delay(1000);
    servoOpen(170,8);
    delay(1000);
    servoClose(0,3);
    delay(1000);
    digitalWrite(1, LOW);
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
