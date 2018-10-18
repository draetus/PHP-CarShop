<?php 
$vmTitulo="Confirmação de cadastro";
include('_cabecalho.php');
include('carro-funcoes.php');

if (carro_alterar( $_POST['vfCar_id'], $_POST )){
    
    grava_caracteristicas($_POST['vfCar_id'], @$_POST['vfCaracteristicas']);
    
    if ( $_FILES['foto']['size'] > 0 ){    
        carro_grava_foto( $_POST['vfCar_id'], $_FILES );
    }      
    
    ?>
    <p class='alert alert-success'>
        Carro <?=$_POST['marca']."/".$_POST['modelo']?> alterado com sucesso!</p>
    
    <meta http-equiv='refresh' content="2;url=carro-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao alterar o carro</p>
    <?php
}    

include('_rodape.php');
