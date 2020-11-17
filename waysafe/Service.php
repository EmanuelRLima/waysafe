<?php

  include "conexao.php";



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



  $sql = mysqli_query($conex, "INSERT INTO card (ID_CARD, NOME, MATRICULA, EMAIL, TELEFONE, DATAN, CPF, VEICULO, MARCA, COR, REGISTRO) VALUES ('$ID_CARD', '$NOME','$MATRICULA','$EMAIL','$TELEFONE','$DATAN','$CPF','$VEICULO','$MARCA','$COR','$REGISTRO')");


?>

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

  <a href="register.html"> Voltar  </a>
</div>
</div>

</body>

</html>
