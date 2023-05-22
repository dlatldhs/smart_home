#include <WiFi.h> // 인터넷 접속 라이브러리 , HTTP

// 온습도
#include "DHT.h"
#define DHTPIN 16
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

// 공기질
#include <MQUnifiedsensor.h>
#define placa "Arduino UNO"
#define Voltage_Resolution 3.3
#define pin A0 //Analog input 0 of your arduino
#define type "MQ-6" //MQ6
#define ADC_Bit_Resolution 12 // For arduino UNO/MEGA/NANO
#define RatioMQ6CleanAir 10   //RS / R0 = 10 ppm 
MQUnifiedsensor MQ6(placa, Voltage_Resolution, ADC_Bit_Resolution, pin, type);

// 보내기!!!!!!!!!!!!!!!!!
#ifndef STASSID
#define STASSID "bssm_free" //와이파이 검색했을때 뜨는 이름
#define STAPSK  "bssm_free" //패스워드
#endif
#define host "10.150.149.90"
#define httpsPort 80
WiFiClient client; // 생성자

void setup() {
  Serial.begin(115200);

  // 보내기...
  WiFi.mode(WIFI_STA);
  WiFi.begin(STASSID, STAPSK);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
   }
  // 온습도
  dht.begin();

  // 공기질
  MQ6.setRegressionMethod(1); //_PPM =  a*ratio^b
  MQ6.setA(2127.2); MQ6.setB(-2.526); // Configure the equation to to calculate CH4 concentration
  /*
    Exponential regression:
  GAS     | a      | b
  H2      | 88158  | -3.597
  LPG     | 1009.2 | -2.35
  CH4     | 2127.2 | -2.526
  CO      | 1000000000000000 | -13.5
  Alcohol | 50000000 | -6.017
  */
  MQ6.init();   
  Serial.print("Calibrating please wait.");
  float calcR0 = 0;
  for(int i = 1; i<=10; i ++)
  {
    MQ6.update(); // Update data, the arduino will read the voltage from the analog pin
    calcR0 += MQ6.calibrate(RatioMQ6CleanAir);
    Serial.print(".");
  }
  MQ6.setR0(calcR0/10);
  Serial.println("  done!."); 
  if(isinf(calcR0)) {Serial.println("Warning: Conection issue, R0 is infinite (Open circuit detected) please check your wiring and supply"); while(1);}
  if(calcR0 == 0){Serial.println("Warning: Conection issue found, R0 is zero (Analog pin shorts to ground) please check your wiring and supply"); while(1);}
}

void loop() {

  // 보내기..ㅠ
  // 1. 클라이언트 서버 접속
  if (!client.connect(host,httpsPort)) {
    Serial.println("connection failed");
    return ;
  }
  Serial.println("서버와 연결됨");
  
  // 온습도
  float humidity = dht.readHumidity();
  float temperature = dht.readTemperature();
    
  int humidityInt = static_cast<int>(humidity);
  int temperatureInt = static_cast<int>(temperature);
  Serial.println(humidityInt);
  Serial.println(temperatureInt);
  
  MQ6.update();
  float data = MQ6.readSensor();
  Serial.println(data);
  delay(5000);
  int room_id = 1;
  String url = "/3410/upload.php?humidity="+String(humidity)+"&air="+String(data)+"&room_number="+String(room_id);
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
               
  unsigned long ti = millis(); //생존시간
  
  while(1){
    if(client.available()) break;
    if(millis() - ti > 10000) break;
  }

  while(client.available()) {
    Serial.write(client.read());
  }

  Serial.println("연결 해제!!!!!!!!!!!!!");
}
