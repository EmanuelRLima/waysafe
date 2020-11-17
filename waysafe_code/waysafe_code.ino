//Programa : RFID - Segurança, Controle e Monitoramento.
//Autor : Projeto Waysafe. 

// Aqui são os includes das librares que usamos no projeto.
#include <SPI.h>
#include <MFRC522.h>
#include <Ethernet.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
// Aqui nós definimos os pinos que são conectados ao RFID e a Porta de conexão com a internet.
#define SS_PIN 4
#define RST_PIN 9
#define portaHTTP 80
//Definimos aqui quais são os pinos de leitura do RFID, o servidor do banco de dados, o IP do computador e o ClientEthernet que basicamente é um mecanismo de boot.
MFRC522 mfrc522(SS_PIN, RST_PIN); 
byte servidor[] = { 10, 0, 0, 103 };
IPAddress ip(10, 0, 0, 100);
EthernetClient clienteArduino;
//Aqui iniciamos o sistema, banco de dados e conexões afins.
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
//Aqui começamos o loop de códigos, sempre rodando mantendo o sistema ativo.
void loop() {
//aqui ele inicia o clientArduino para acessar a página
  if(clienteArduino.available()){
     char dadosR = clienteArduino.read();
     Serial.print(dadosR);
}
//aqui ele conecta o Client ao sistema.
  if(!clienteArduino.connected()){
      clienteArduino.stop();
}
//aqui ele faz a procura de tags próximas ao RFID  
  if ( ! mfrc522.PICC_IsNewCardPresent()){
 
    return;
 // esse return é para que o loop fique existente até selecionar o cartão.
}
//Aqui ele seleciona uma TAG
  if ( ! mfrc522.PICC_ReadCardSerial()){
  
}
//Aqui ele mostra na tala a ID do  seu cartão.
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
 //Aqui ele manda o valor selecionado do cartão para a pagina web e aguarda um retorno, caso ele encontre a TAG no sistema, ele mostrara a página web na tela, caso não, else.
  if(clienteArduino.connect(servidor, portaHTTP)){

  clienteArduino.print("GET /waysafe/ConectArd.php?");
  clienteArduino.print("ID_CARD=");
  clienteArduino.print(ID_CARD);
  clienteArduino.println(" HTTP/1.0");  
  clienteArduino.println("Host: 10.0.0.103");
  clienteArduino.println("Connection: close");
  clienteArduino.println();
}
//Aqui caso não encotre nada, não conecta ao servidor.
  else{
    Serial.println("falha ao conectar ao servidor!");
}

    
}
    
    
  

  
   
