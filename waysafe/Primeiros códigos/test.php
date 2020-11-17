<?php

  include "conexao.php";



  $ID_CARD = $_POST['ID_CARD'];
  $NOME = $_POST['NOME'];
  $MATRICULA = $_POST['MATRICULA'];
  $imagem = $_FILES['imagem']

  mysqli_query($conex,"INSERT INTO tags (IMG) VALUES ('$imagem')");
  $sql = mysqli_query($conex, "SELECT ID_CARD FROM tags WHERE ID_CARD='$ID_CARD'");
  $sql2 = mysqli_query($conex, "SELECT NOME FROM tags WHERE NOME='$NOME'");
  $sql3 = mysqli_query($conex, "SELECT MATRICULA FROM tags WHERE MATRICULA='$MATRICULA'");

  $resut = mysqli_num_rows($sql);
  $resut2 = mysqli_num_rows($sql2);
  $resut3 = mysqli_num_rows($sql3);
  $resut4 = mysqli_num_rows($Fot);


        if($resut > 0){
          echo "achamos o total de: $resut resultados";
        }else{

          echo "Não achamos nada por aqui";
        }

        ?><br /><br /><?php

        if($resut2 > 0){
          echo "achamos o total de: $resut resultados";
        }else{

          echo " Não achamos nada por aqui";
        }

        ?><br /><br /><?php

        if($resut4 > 0){
          echo "achamos o total de: $resut resultados";
        }else{

          echo "Não achamos nada por aqui";
        }





?>
