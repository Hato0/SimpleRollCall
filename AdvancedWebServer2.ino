#include <Adafruit_Sensor.h>
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.

*/
#include "SSD1306.h" 
 
SSD1306  display(0x3c, 21, 22);

#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif
#include "qrcode.h"
#define fact 1
#define SIZE 7
#define SECURE 3
#define LEDPIN1 2 // rouge
#define LEDPIN2 4 //vert

#include <Wire.h>


// Replace with your network credentials
const char* ssid     = "Your Connection Name";
const char* password = "Your Connection Password";

// REPLACE with your Domain name and URL path or IP address with path
const char* serverName = "http://RASPBERRY_IP_ADDRESS/public_html/linkcontrol.php";

// Keep this API Key value to be compatible with the PHP code provided in the project page. 
// If you change the apiKeyValue value, the PHP file /post-esp-data.php also needs to have the same key 
String apiKeyValue = "tPmAT5Ab3j7F9";

/*#include <SPI.h>
#define BME_SCK 18
#define BME_MISO 19
#define BME_MOSI 23
#define BME_CS 5*/

#define SEALEVELPRESSURE_HPA (1013.25)

//Adafruit_BME280 bme(BME_CS);  // hardware SPI
//Adafruit_BME280 bme(BME_CS, BME_MOSI, BME_MISO, BME_SCK);  // software SPI

void taskConnection( void * parameter );
WiFiServer server(80);


SSD1306 createQrCode(SSD1306 display, std::string URL){
  
  QRCode qrcode;
  uint8_t qrcodeData[qrcode_getBufferSize(SIZE)];
  Serial.print("L'url à coder est");
  Serial.println(URL.c_str());
  qrcode_initText(&qrcode, qrcodeData,SIZE,SECURE, URL.c_str());
 
  for (uint8_t y = 0; y < qrcode.size; y++) {
        for (uint8_t x = 0; x < qrcode.size; x++) {
            if (qrcode_getModule(&qrcode, x, y)){
              int j;
              j = 0;
              for (j=0; j<fact; j++){
                display.drawLine(fact*x,fact*y+j,fact*x+fact-1,fact*y+j);
              }
            }

        }
    }
    Serial.println("OK DISPLAY");
    display.display();
    return display;
}
void setup() {
   pinMode(2, OUTPUT);
   digitalWrite(2, HIGH);
  display.init();

  
  Serial.begin(115200);
  
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }

  
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
  // (you can also pass in a Wire library object like &Wire2)
//  bool status = bme.begin(0x76);
//  if (!status) {
//    Serial.println("Could not find a valid BME280 sensor, check wiring or change I2C address!");
//    while (1);
//  }
server.begin();
Serial.println("Server Started");
Serial.print("http://");
Serial.print(WiFi.localIP());
Serial.println("/");

      QRCode qrcode;
      uint8_t qrcodeData[qrcode_getBufferSize(SIZE)];
qrcode_initText(&qrcode, qrcodeData,SIZE,SECURE, "RASPBERRY_IP_ADDRESS/public_html/Home_prof.html");
     
      for (uint8_t y = 0; y < qrcode.size; y++) {
            for (uint8_t x = 0; x < qrcode.size; x++) {
                if (qrcode_getModule(&qrcode, x, y)){
                  int j;
                  j = 0;
                  for (j=0; j<fact; j++){
                    display.drawLine(fact*x,fact*y+j,fact*x+fact-1,fact*y+j);
                  }
                }
    
            }
        }
        display.display();
/*server.on("/redirect/external", HTTP_GET){
    request->redirect("https://192.168.1.94/public_html");
});*/
}


void loop() {

  WiFiClient client = server.available();
  if(client){

    digitalWrite(2, LOW);
  //Check WiFi connection status
  std::string acceptes="abcdefghijklmnopqrstuvwyz";
  acceptes+="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  acceptes+="0123456789";
  std::string filename="";
  srand(time(0));
  size_t taille = (rand()%10)+5;
for(size_t i=0;i<taille;i++)
{
    size_t pos = rand()%63;//j'ai 26*2 caractères dans acceptes
    filename+=acceptes[pos];
}
  Serial.print(filename.c_str());
  std::string adress ="RASPBERRY_IP_ADDRESS/r?url=";
  adress += filename;
  
  if(WiFi.status()== WL_CONNECTED){
    HTTPClient http;
    
    // Your Domain name with URL path or IP address with path
    http.begin(serverName);
    
    // Specify content-type header
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData = "api_key=" + apiKeyValue + "&link=" + adress.c_str()
                          + "&utilisation=" + 0;
   Serial.print("httpRequestData: ");
   Serial.println(httpRequestData);
    
    // You can comment the httpRequestData variable above
    // then, use the httpRequestData variable below (for testing purposes without the BME280 sensor)
    //String httpRequestData = "api_key=tPmAT5Ab3j7F9&sensor=BME280&location=Office&value1=24.75&value2=49.54&value3=1005.14";

    // Send HTTP POST request
   int httpResponseCode = http.POST(httpRequestData);
     
    // If you need an HTTP request with a content type: text/plain
    //http.addHeader("Content-Type", "text/plain");
    //int httpResponseCode = http.POST("Hello, World!");
    
    // If you need an HTTP request with a content type: application/json, use the following:
    //http.addHeader("Content-Type", "application/json");
    //int httpResponseCode = http.POST("{\"value1\":\"19\",\"value2\":\"67\",\"value3\":\"78\"}");
        
    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      client.stop();
      delay(500);  
      
      /* Creation du QrCode avec comme url filename */
      display.resetDisplay();
      QRCode qrcode;
      uint8_t qrcodeData[qrcode_getBufferSize(SIZE)];
      Serial.print("L'url à coder est");
      Serial.println(adress.c_str());
      qrcode_initText(&qrcode, qrcodeData,SIZE,SECURE, adress.c_str());
     
      for (uint8_t y = 0; y < qrcode.size; y++) {
            for (uint8_t x = 0; x < qrcode.size; x++) {
                if (qrcode_getModule(&qrcode, x, y)){
                  int j;
                  j = 0;
                  for (j=0; j<fact; j++){
                    display.drawLine(fact*x,fact*y+j,fact*x+fact-1,fact*y+j);
                  }
                }
    
            }
        }
        display.display();
      
      

      
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  
  }
  
}
