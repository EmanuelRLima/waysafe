//Programa : RFID - Segurança, Controle e Monitoramento.
//Autor : Projeto Waysafe. 
 
#include <SPI.h>
#include <MFRC522.h>
#include <Ethernet.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
 
#define SS_PIN 4
#define RST_PIN 9
#define portaHTTP 80

MFRC522 mfrc522(SS_PIN, RST_PIN); 
byte servidor[] = { 10, 0, 0, 100 };
IPAddress ip(10, 0, 0, 102);
EthernetClient clienteArduino;

void setup() 
{
  Serial.begin(9600);  
  SPI.begin(); 
  mfrc522.PCD_Init(); 
  Ethernet.begin(ip);
  Serial.println("Connecting...");
  
  if (Ethernet.begin(ip)== 0) {
      Serial.println("Não conectou!");
      delay(1000);
      Ethernet.begin(ip);
}
  
  Serial.print("Conect a rede, no ip: "); 
  Serial.println(Ethernet.localIP());
  
}
void loop() {
    
  if(clienteArduino.available()){
     char dadosR = clienteArduino.read();
     Serial.print(dadosR);
}

  if(!clienteArduino.connected()){
      clienteArduino.stop();
}

  if ( ! mfrc522.PICC_IsNewCardPresent()){
 
    return;
 
}

  if ( ! mfrc522.PICC_ReadCardSerial()){
  
}

    Serial.println("");
    Serial.print("Sua Tag :"); 
    String ID_CARD= "";
  
  for (byte i = 0; i < mfrc522.uid.size; i++){
       
    ID_CARD.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? "" : ""));
    ID_CARD.concat(String(mfrc522.uid.uidByte[i], HEX));
    
}

   ID_CARD.toUpperCase();
   Serial.print(ID_CARD);
   Serial.println();
   Serial.println();  
   delay(3000);
  
  if(clienteArduino.connect(servidor, portaHTTP)){

  clienteArduino.print("GET /waysafe/ConectArd.php?");
  clienteArduino.print("ID_CARD=");
  clienteArduino.print(ID_CARD);
  clienteArduino.println(" HTTP/1.0");  
  clienteArduino.println("Host: 10.0.0.100");
  clienteArduino.println("Connection: close");
  clienteArduino.println();
}
  else{
    Serial.println("falha ao conectar ao servidor!");
}

    
}
    
    
  

  
   
