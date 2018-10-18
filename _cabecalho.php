<?php
include_once('_init.php');

?>
<html>
    <head>
        <link rel='stylesheet' href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
        <script src="js/jquery-3.3.1.min.js"></script>    
        <script src="js/bootstrap.min.js"></script>
            
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Curso PHP</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="carro-frm-lista.php">Lista</a>
              </li>
              
              <?php
              if (array_key_exists('SS_USU_ID', $_SESSION )){
                      ?>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" 
                     href="#" id="navbarDropdown" 
                     role="button" 
                     data-toggle="dropdown" 
                     aria-haspopup="true" 
                     aria-expanded="false">
                      Cadastros
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="nav-link" href="carro-frm-cadastro.php">Novo</a>
                      <div class="dropdown-divider"></div>
                      <a class="nav-link" href="caracteristica-frm-lista.php">Cadasteristicas</a>
                      <a class="nav-link" href="caracteristica-frm-cadastro.php">Nova Cadasteristica</a>
                  </div>   
              </li>
              
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" 
                     href="#" id="navbarDropdown" 
                     role="button" 
                     data-toggle="dropdown" 
                     aria-haspopup="true" 
                     aria-expanded="false">
                      <?=$_SESSION['SS_USU_NOME']?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="nav-link" href="usuario-frm-cadastro.php">Editar</a>
                      <div class="dropdown-divider"></div>
                      <a class="nav-link" href="logout.php">Sair</a>
                  </div>
                  
                  
              </li>

              <?php
              }else{
                  ?>
                  <li class="nav-item active">
                    <a class="nav-link" href="login.php">Entrar</a>
                  </li>
                  
              <?php
              }
              ?>
                          </ul>
            <form class="form-inline my-2 my-lg-0" 
                  action="carro-frm-lista.php"
                   method="POST">
              <input class="form-control mr-sm-2" 
                     type="search" 
                     name="vfTextoBusca" 
                     value="<?=@$_GET['vfTextoBusca']?>"
                     placeholder="Digite um carro" 
                     aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0"
                      type="submit">Buscar</button>
<!--               <button class="btn btn-outline-success my-2 my-sm-0"
                      id='btBuscaAvancada' 
                      onClick="document.getElementById('divBusca_avancada').hidden^=1;"
                      type="button">+ Opções</button>-->
              <button class="btn btn-outline-success my-2 my-sm-0"
                      id='btBuscaAvancada' 
                      data-toggle="collapse" href="#divBusca_avancada" 
                      type="button">+ Opções</button>
            </form>
          </div>
        </nav>        
        
    <center>
        <?php
        //MUDAR para o if ()?:;
        if (isset($vmTitulo)){
            ?>
            <h1><?=$vmTitulo?></h1>
            <?php
        }
        ?>
        
            