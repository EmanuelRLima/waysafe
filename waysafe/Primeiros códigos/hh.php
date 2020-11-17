<?php

include "conexao.php";


$imagem = $_FILES['imagem']


$Ir = ($conex,"INSERT INTO tags (IMG) VALUES ('$imagem')");

 mysql_query($Ir) or die("Algo deu errado ao inserir
 o registro. Tente novamente.");
echo 'Registro inserido com sucesso!';
header('Location: index.php');
 if(mysql_affected_rows($conex) > 0)
     print "A imagem foi salva na base de dados.";
 else
     print "Não foi possível salvar a imagem na base de dados.";
 }
else
    print "Não foi possível carregar a imagem.";
?>
