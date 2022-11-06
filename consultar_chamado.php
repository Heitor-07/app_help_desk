<?php include_once("validador_acesso.php") ?>

<?php

    // Criando um array para colocar os chamados recuperados
    $chamados = array();

    // Abrir arquivo
    $arquivo = fopen('../../app_help_desk/chamados.txt', 'r');

    // enquanto houver registros (linhas) a serem recuperados
    while(feof($arquivo) != true) { // testa pelo fim de um arquivo
      //linhas
      $registro = fgets($arquivo);
      
      // filtro por usuário
      /* $usuario_id = substr($registro, 0, 1); */
      $registro_detalhes = explode('#', $registro);
      if($_SESSION['perfil_id'] == 2){
        // só vamos exibir chamados do usuário que criou o chamado
        if($_SESSION['id'] != $registro_detalhes[0]){
          continue;
        }
      }
      $chamados[] = $registro;
      
      
    }
    
    // fechando o arquivo
    fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <!-- inicio da lógica -->
            <?php foreach($chamados as $chamado)   { ?>
              
              
              <?php 
              
                $indiceChamado = explode('#', $chamado);

                // elimina array vazio
                if(count($indiceChamado) < 3){
                  continue;
                }
              
              ?>
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $indiceChamado[1]; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $indiceChamado[2]; ?></h6>
                  <p class="card-text"><?= $indiceChamado[3]; ?></p>

                </div>
              </div>
              <!-- fim da lógica -->
            <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>