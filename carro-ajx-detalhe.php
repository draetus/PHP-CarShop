<?php
include_once '_cabecalho.php';
include_once 'carro-funcoes.php';

$vtCarro = carro_listar($_GET['paId']);
$vtCarro = $vtCarro[0];
        
$vmFoto = ( $vtCarro['car_foto'] )?$vtCarro['car_foto']:'_semfoto.jpg';
$vmFoto = CC_PASTA_FOTOS.$vmFoto;

?>

<div id="cardCarro" class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?=$vmFoto?>" alt="Seu novo carro!">
  <div class="card-body">
    <h5 class="card-title"><?=$vtCarro['car_marca']."/".$vtCarro['car_modelo']?></h5>
    <p class="card-text">Ano <?=$vtCarro['car_ano']?></p>
    <p class="alert alert-info">R$ <?=$vtCarro['car_valor']?></p>
    
    <a id='btFecharCard' href="#" class="btn btn-primary">Fechar</a>
  </div>
</div>

<script>
    
    $("#btFecharCard").click(function () {
            $("#cardCarro").hide();
        });
        
</script>