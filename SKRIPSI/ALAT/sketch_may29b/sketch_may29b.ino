//end motor ..............................................
 ///Notif
int merah=19;
int hijau=17;
int kuning=18;
int buzzer=16;
//emd notfi.................................................
//Sensor gempa..............................................
int EP =15;
//end sensor...............................................
void setup(){
    Serial.begin(9600); //init serial 9600
 // Serial.println("----------------------Vibration demo------------------------");

    pinMode(merah, OUTPUT);
    pinMode(kuning, OUTPUT);
    pinMode(hijau, OUTPUT);
    pinMode(buzzer,OUTPUT);
    //set EP input for measurment
     pinMode(EP, INPUT); 
     //end

}
void loop(){
  long measurement =TP_init();
 // Cetak dan proses Kalibrasi gempa ;
  Serial.println(measurement);
  if (measurement > 1000){
    delay(3000); 
      long measurement =TP_init();
      Serial.println(measurement);
      if (measurement > 1000){
       
        while(true){
               digitalWrite(buzzer, HIGH); 
               digitalWrite(merah, HIGH); 
               digitalWrite(kuning, LOW);
               delay(50);
               digitalWrite(buzzer, HIGH); 
               digitalWrite(merah, LOW); 
               digitalWrite(kuning, HIGH);
               }
      }
      
      else{ return;//digitalWrite(merah, LOW); //gak ada gempa
      }

  }

}

long TP_init(){
  delay(10);
  long measurement=pulseIn (EP, HIGH);  //wait for the pin to get HIGH and returns measurement
  return measurement;
}
void setup() {
  // put your setup code here, to run once:

}

void loop() {
  // put your main code here, to run repeatedly:

}
