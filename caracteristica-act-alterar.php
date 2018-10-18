<?php 
$vmTitulo="Confirmação de cadastro";
include('_cabecalho.php');
include('caracteristica-funcoes.php');

if (caracteristica_alterar( $_POST['id'], $_POST['nome'] )){
    ?>
    <p class='alert alert-success'>
        Caracteristica <?=$_POST['nome']?> alterada com sucesso!</p>
    
    <meta http-equiv='refresh' content="2;url=caracteristica-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao alterar a caracteristica</p>
    <?php
}    

include('_rodape.php');
