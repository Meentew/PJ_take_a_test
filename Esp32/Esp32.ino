#include <ArduinoJson.h>
#include <Arduino.h>
#include <WiFi.h>
#include <WiFiMulti.h>
#include <HTTPClient.h>
#include <WiFiClient.h>
const char* ssid     = "OPPO A31";      // SSID เปลี่ยนชื่อWIFI
const char* password = "tew123456";
WiFiMulti WiFiMulti;
String payload;
int S1 = 23;
int S2 = 22;
int p;
void setup() {
 pinMode(19, OUTPUT);
 pinMode(S1, OUTPUT);
 pinMode(S2, OUTPUT);
  Serial.begin(115200);
  // Serial.setDebugOutput(true);

  Serial.println();
  Serial.println();
  Serial.println();

  for (uint8_t t = 4; t > 0; t--) {
    Serial.printf("[SETUP] WAIT %d...\n", t);
    Serial.flush();
    delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP(ssid, password);
}

void loop() {
  // wait for WiFi connection
  if ((WiFiMulti.run() == WL_CONNECTED)) {

    WiFiClient client;

    HTTPClient http;

    Serial.print("[HTTP] begin...\n");
    if (http.begin(client, "http://192.168.43.173/ye.php?id=1")) {  // HTTP เปลี่ยนip192.168.43.173 กับทีอยู่ฟาย ye.phpให้ตรงกับที่อยู่ของฟายมึง idไม่ต้องเปลียน


      Serial.print("[HTTP] GET...\n");
      // start connection and send HTTP header
      int httpCode = http.GET();

      // httpCode will be negative on error
      if (httpCode > 0) {
        // HTTP header has been send and Server response header has been handled
        Serial.printf("[HTTP] GET... code: %d\n", httpCode);

        // file found at server
        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
           payload = http.getString();
          //Serial.println(payload);
        }
      } else {
        Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
      }

      http.end();
    } else {
      Serial.println("[HTTP] Unable to connect");
    }
  }
  
  DynamicJsonDocument doc(1024);
  deserializeJson(doc, payload);
  String num = doc["num"];
  int temperature = doc["temperature"];
  if(temperature!= p){
  String num = doc["num"];
  temperature = doc["temperature"];
  Serial.println(num);
  Serial.println(temperature);
  if(temperature==1){
digitalWrite(S1, 0);
digitalWrite(S2, 1);
digitalWrite(19, 1);
delay(500); 
digitalWrite(19, 1); 
  }
  if(temperature==0){
digitalWrite(S1, 1);
digitalWrite(S2, 0); 
delay(500);
digitalWrite(19, 0); 
  }
  }
 else{
digitalWrite(S1,0);
digitalWrite(S2,0); 
 }
  p=temperature;
}
