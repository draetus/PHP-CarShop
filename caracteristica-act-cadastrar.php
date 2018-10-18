<?php 
$vmTitulo="Confirmação de cadastro";
include('_cabecalho.php');
include('caracteristica-funcoes.php');

if ($vmId = caracteristica_cadastrar($_POST)){
    ?>
    <p class='alert alert-success'>
        Característica <?=$_POST['nome']?> cadastrada com sucesso!</p>
    
    <a href="caracteristica-frm-cadastro.php" class='btn btn-primary'>
        Novo Carro</a>
    <meta http-equiv='refresh' content="3;url=caracteristica-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao cadastrar o carro</p>
    <?php
}    

include('_rodape.php');
