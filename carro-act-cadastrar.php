<?php 
$vmTitulo="Confirmação de cadastro";
include('_cabecalho.php');
include('carro-funcoes.php');

if ($vmId = carro_cadastrar($_POST)){
    if ( $_FILES['foto']['size'] > 0 ){    
        carro_grava_foto( $vmId, $_FILES );
    }  
    
    ?>
    <p class='alert alert-success'>
        Carro <?=$_POST['marca']."/".$_POST['modelo']?> cadastrado com sucesso!</p>
    
    <a href="carro-frm-cadastro.php" class='btn btn-primary'>
        Novo Carro</a>
    <meta http-equiv='refresh' content="3;url=carro-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao cadastrar o carro</p>
    <?php
}    

include('_rodape.php');
