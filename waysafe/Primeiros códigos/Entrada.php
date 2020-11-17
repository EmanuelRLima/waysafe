<?php

include "conexao.php";



  $NOME = $_POST['NOME'];
  $sql = mysqli_query($conex, "SELECT NOME, MATRICULA, EMAIL, TELEFONE, DATAN, CPF, VEICULO, MARCA, COR, DATA_HORA_MOD FROM card WHERE NOME='$NOME'");
  $exibe = mysqli_fetch_assoc($sql);
  $resut = mysqli_num_rows($sql);


if($resut > 0){

?>
<p> Bem vindo: <?=$exibe['NOME']?> <br />
  Matricula: <?=$exibe['MATRICULA']?> <br />
  E-mail: <?=$exibe['EMAIL']?> <br />
  Telefone: <?=$exibe['TELEFONE']?> <br />
  Data de Nascimento: <?=$exibe['DATAN']?> <br />
  CPF: <?=$exibe['CPF']?> <br />
  Veiculo: <?=$exibe['VEICULO']?> <br />
  Marca: <?=$exibe['MARCA']?> <br />
  Cor: <?=$exibe['COR']?> <br />
  Hora de ultimo registro: <?=$exibe['DATA_HORA_MOD']?> <br />

 </p>

<?php
}else{

  echo "Não achamos nada por aqui";
}




?>
