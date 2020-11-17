<?php

    include "conexao.php";

          $NOME = $_POST['NOME'];
          $sql = mysqli_query($conex, "SELECT NOME, MATRICULA, EMAIL, TELEFONE, DATAN, CPF, VEICULO, MARCA, COR, DATA_HORA_MOD FROM card WHERE NOME='$NOME'");
          $exibe = mysqli_fetch_assoc($sql);
          $resut = mysqli_num_rows($sql);

      if($resut > 0){

      }else{ echo "Não achamos nada por aqui";}

?>


<html lang="pt-br">

  <head>

    <meta charset="utf-8" />
    <title>Usuario</title>
    <link href="css/styles.css" rel="stylesheet" />

  </head>
<style>
#aa{
    margin: auto;
    width: 5%;
    border: 1px solid;
    border-radius:2px;
    padding: 3px;
    text-align: center;
    background-color:gray;
    color: black;
  }
#p{
  font-size: 20px;
  font-family: calibri;
}
</style>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

      <div class="navbar-brand js-scroll-trigger">
          </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><div class="nav-link js-scroll-trigger"><?=$exibe['NOME']?></div></li>
        </ul>
      </div>

      </nav>

      <div class="container-fluid p-0">

        <section class="resume-section" id="about">
          <div class="resume-section-content">
            <p id="p">
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
              <a id="aa" href="Consulta.html"><b> Voltar para a tela de consulta</b> </a>
            </div>
          </section>

    </body>

</html>
