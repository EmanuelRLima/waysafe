<?php
//Aqui os atributos da página register são recebidos para serem incluidos no banco de dados.

//Esse include vem da página "conexao" e serve para se conectar ao Banco de Dados.
  include "conexao.php";


//Aqui são os atributos que vem da página register que vem pelo meotodo POST e se encontram em (name="").
  $NOME = $_POST['NOME'];
  $MATRICULA = $_POST['MATRICULA'];
  $EMAIL = $_POST['EMAIL'];
  $TELEFONE = $_POST['TELEFONE'];
  $DATAN = $_POST['DATAN'];
  $CPF = $_POST['CPF'];
  $REGISTRO = $_POST['REGISTRO'];
  $VEICULO = $_POST['VEICULO'];
  $MARCA = $_POST['MARCA'];
  $COR = $_POST['COR'];
  $ID_CARD = $_POST['ID_CARD'];

//Aqui todos esses dados são inseridos no banco de dados pelo "insert into".

  $sql = mysqli_query($conex, "INSERT INTO card (ID_CARD, NOME, MATRICULA, EMAIL, TELEFONE, DATAN, CPF, VEICULO, MARCA, COR, REGISTRO) VALUES ('$ID_CARD', '$NOME','$MATRICULA','$EMAIL','$TELEFONE','$DATAN','$CPF','$VEICULO','$MARCA','$COR','$REGISTRO')");


?>

<!-- aparti de aqui começa o código da página -->
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <title>Cadastro Sucesso!</title>


</head>

<style>
.container{
  margin: auto;
  width: 50%;
  border: 1px solid;
  border-radius:12px;
  padding: 10px;
  text-align: center;
  background-color:#2172F7;

}
a{
  margin: auto;
  width: 5%;
  border: 1px solid;
  border-radius:2px;
  padding: 3px;
  text-align: center;
  background-color:gray;
  color: black;
}

</style>
<body>
<div class="container">
<div class="container1">
    <h1>Cadastro Realizado
  </h1>
<!-- Aqui existe a opção de retorna para a página de registro-->
  <a href="register.html"> Voltar  </a>
</div>
</div>

</body>

</html>
