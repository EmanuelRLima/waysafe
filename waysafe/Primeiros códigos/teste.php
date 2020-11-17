<?php

  echo "teste";
?>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Foda</title>
  </head>
  <body>

    <h1> WAYSAFE!, PRIMEIRA PÁGINA DE VERIFICAÇÃO DE BANCO DE DADOS </h1>
      <form action="test.php" method="post">

        ID_CARD<input type="text" name="ID_CARD"><br>
        NOME<input type="text" name="NOME"><br>
        MATRICULA<input type="text" name="MATRICULA"><br>
        <input type="submit" value="envair">

</form>

<h1> WAYSAFE!, PRIMEIRA PÁGINA DE CADASTRO </h1>

<form action="test.php" method="post">

  ID_CARD<input type="text" name="ID_CARD"><br>
  NOME<input type="text" name="NOME"><br>
  MATRICULA<input type="text" name="MATRICULA"><br>
  <input type="submit" value="envair">
  <label for="imagem">Imagem:</label>
  <input type="file" name="imagem"/>
  <br/>
  <input type="submit" value="Enviar"/>

</form>


  </body>

  </html>
  <?php
?>
