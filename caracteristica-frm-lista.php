<?php
$vmTitulo="Lista de Caracteristica";
include('_cabecalho.php');
include('caracteristica-funcoes.php');
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      
    <?php
    //MUDAR para uma função de consulta que receba o filtro ou não

    $vtCaracteristicas = caracteristica_listar();
    
    foreach ($vtCaracteristicas as $vtCaracteristica) {
        ?>
        <tr>
          <th scope="row"><?=$vtCaracteristica['ctr_id']?></th>
          <td><?=$vtCaracteristica['ctr_nome']?></td>
          <td>
              <a href='caracteristica-frm-cadastro.php?vfCtr_id=<?=$vtCaracteristica['ctr_id']?>'>
                  <i class="far fa-edit"></i>
              </a>
              <a href='caracteristica-act-excluir.php?vfCtr_id=<?=$vtCaracteristica['ctr_id']?>' style="color:red">
                  <i class="far fa-trash-alt"></i>
              </a>
          </td>
        </tr>
        <?php
    }
    
    
    ?>
  </tbody>
</table>



<?php
include('_rodape.php');
?>


