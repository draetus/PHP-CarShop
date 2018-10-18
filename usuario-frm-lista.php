<?php
$vmTitulo="Lista de usuários";
include('_cabecalho.php');
include('usuario-funcoes.php');

?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">E-mail</th>
      <th scope="col">Nome</th>
      
    </tr>
  </thead>
  <tbody>
      
    <?php
    //MUDAR para uma função de consulta que receba o filtro ou não

    //print_r($_REQUEST );
    $vtUsuarios = usuario_listar( $_REQUEST );
    
    foreach ($vtUsuarios as $vtUsuario) {
        ?>
        <tr>
          <th scope="row"><?=$vtUsuario['usu_id']?></th>
          <td><?=$vtUsuario['usu_email']?></td>
          <td><?=$vtUsuario['usu_nome']?></td>
          
        </tr>
        <?php
    }
    
    
    ?>
  </tbody>
</table>



<?php
include('_rodape.php');
?>



