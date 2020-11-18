<?php
//Coneção com o banco de dados, esse include vem do arquivo "conexao"
include "conexao.php";



  $ID_CARD = $_GET['ID_CARD']; //Aqui por atributo GET, ou sejá, pela URL, é adicionado a ID do cartão enviada pelo ARDUINO.
  $sql = mysqli_query($conex, "SELECT NOME, MATRICULA, EMAIL, TELEFONE, DATAN, CPF, VEICULO, MARCA, COR, DATA_HORA_MOD FROM card WHERE ID_CARD='$ID_CARD'"); //Quando o ID do cartão chega na URL, nessa parte o scrip faz uma checagem se existe alguma coisa com esse ID.
  $UP = mysqli_query($conex,"UPDATE card SET REGISTRO = REGISTRO +1 WHERE ID_CARD='$ID_CARD'"); //Aqui, caso o ID exista, é adicionado +1 ao registro para atualizar o momento que foi passado o cartão no RFID.
  $exibe = mysqli_fetch_assoc($sql); //Aqui são querys de associação.
  $resut = mysqli_num_rows($sql); //Aqui são querys de associação.

  $mensagem= "Alerta!, sua TAG acaba de ser utilizada, dirija-se a portaria caso haja algo errado."; //Menssagem passada para o E-mail do usuário.
  $subject = "WaySafe!"; //Assunto do E-mail.
  $headers = 'From: waysafe.brasil@gmail.com' . "\r\n" . //referentes do E-mail.
              'Reply-To: waysafe.brasil@gmail.com' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();
  mail($exibe['EMAIL'], $subject, $mensagem, $headers); //query que envia o E-mail.

if($resut > 0){ //se o resultado existir, o conteudo é exibido.

?>
<!--  Tudo a baixo é para exibir o que existe no banco de dados caso exista -->
<p> Bem vindo: <?=$exibe['NOME']?> <br />
  Matricula: <?=$exibe['MATRICULA']?> <br />
  E-mail: <?=$exibe ['EMAIL']?> <br />
  Telefone: <?=$exibe['TELEFONE']?> <br />
  Data de Nascimento: <?=$exibe['DATAN']?> <br />
  CPF: <?=$exibe['CPF']?> <br />
  Veiculo: <?=$exibe['VEICULO']?> <br />
  Marca: <?=$exibe['MARCA']?> <br />
  Cor: <?=$exibe['COR']?> <br />
  Hora de ultimo registro: <?=$exibe['DATA_HORA_MOD']?> <br />

 </p>



<?php


//caso não exista é finalizado no else.
}else{

  echo "Não achamos nada por aqui";
}




?>
