//motor---------------------
#include <Servo.h>
Servo motorServo; 

void setup() {
motorServo.attach(0);
}



void loop() {
  pintu_bergerak();
}

int a=0;
void pintu_bergerak(){
    servoOpen(100,0);
    delay(10000);
    servoClose(0,10);
    delay(1000);
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
