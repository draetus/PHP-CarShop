<?php 
include('_cabecalho.php');
include('caracteristica-funcoes.php');

$vfId       = $_GET['vfCtr_id'];
        
if (caracteristica_excluir($vfId)){
    ?>
    <p class='alert alert-success'>
        Característica excluída com sucesso!
    </p>
    
    <meta http-equiv='refresh' content="1;url=caracteristica-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao excluir a caracteristica!</p>
    <?php
}    

include('_rodape.php');
