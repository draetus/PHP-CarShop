<?php
$vmTitulo="Lista de carro";
include('_cabecalho.php');
include('carro-funcoes.php');


include('carro-frm-busca-avancada.php');
?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Ano</th>
      <th scope="col">Valor</th>
      
      <?php
      if (Login::estaLogado()){
          ?>
      <th scope="col">Ações</th>
      <?php
      }
      ?>
      
    </tr>
  </thead>
  <tbody>
      
    <?php
    //MUDAR para uma função de consulta que receba o filtro ou não

    //print_r($_REQUEST );
    $vtCarros = carro_listar( $_REQUEST );
    
    foreach ($vtCarros as $vtCarro) {
        ?>
        <tr>
          <th scope="row"><?=$vtCarro['car_id']?></th>
          <td>
              <?php
              if ($vtCarro['car_foto']<>''){
                  ?>
                  <img src="<?=CC_PASTA_FOTOS.$vtCarro['car_foto']?>" 
                       style="width: 10vw; height: 10vh">
                  <?php
              }
              ?>
          </td>
          <td><?=$vtCarro['car_marca']?></td>
          <td><?=$vtCarro['car_modelo']?></td>
          <td><?=$vtCarro['car_ano']?></td>
          <td><?=$vtCarro['car_valor']?></td>
          <?php
      if (Login::estaLogado()){
          ?>
          <td>
              <a href='carro-frm-cadastro.php?vfCar_id=<?=$vtCarro['car_id']?>'>
                  <i class="far fa-edit"></i>
              </a>
              <a href='carro-act-excluir.php?vfCar_id=<?=$vtCarro['car_id']?>' style="color:red">
                  <i class="far fa-trash-alt"></i>
              </a>
          </td>
      <?php
      }
      ?>
          
        </tr>
        <?php
    }
    
    
    ?>
  </tbody>
</table>



<?php
include('_rodape.php');
?>


