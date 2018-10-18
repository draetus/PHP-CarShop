<?php 
include('_cabecalho.php');
include('carro-funcoes.php');

$vfId       = $_GET['vfCar_id'];
        
if (carro_excluir($vfId)){
    
    grava_caracteristicas( $vfId, array() );
    
    ?>
    <p class='alert alert-success'>
        Carro excluído com sucesso!
    </p>
    
    <meta http-equiv='refresh' content="1;url=carro-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao excluir o carro!</p>
    <?php
}    

include('_rodape.php');
