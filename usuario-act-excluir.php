<?php 
include('_cabecalho.php');
include('usuario-funcoes.php');

$vfId       = $_GET['vfUsu_id'];
        
if (usuario_excluir($vfId)){
    
    
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

