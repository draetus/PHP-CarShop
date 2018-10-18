<?php
include_once '_cabecalho.php';


if (array_key_exists('usu_email', $_POST)){

    $login = new Login( $_POST );
    
    if ($login->logado()) {
        header('Location:index.php');
    } else {
        $vmErro = $login->getErro();
    }  
}
?>

<div class='container container-fluid bg-light mr-6 mt-3 col-6 d-group-flex' style='padding: 6px'>
    <form action='login.php' method='post'>
      <?php
      if (isset($vmErro)){
          ?>
            <span class="alert-danger"><?=$vmErro?></span>
          <?php
      }
      ?>
      <div class="form-group">
        <label for="exampleInputEmail1">E-mail</label>
        <input type="email" 
               class="form-control" 
               name='usu_email'
               id="exampleInputEmail1" 
               aria-describedby="emailHelp" 
               placeholder="Digite seu e-mail cadastrado">
                <small id="emailHelp" class="form-text text-muted">Manteremos seu email no mais completo sigilo!  </small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" 
               name='usu_senha'
               class="form-control" 
               id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php
include_once '_rodape.php';
?>

