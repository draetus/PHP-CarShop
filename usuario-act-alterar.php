<?php 
$vmTitulo="Confirmação de cadastro de usuário";
include('_cabecalho.php');
include('usuario-funcoes.php');

if (usuario_alterar( $_POST['vfUsu_id'], $_POST )){
    
    ?>
    <p class='alert alert-success'>
        Usuário <?=$_POST['email']."/".$_POST['nome']?> alterado com sucesso!</p>
    
    <meta http-equiv='refresh' content="2;url=usuario-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao alterar o carro</p>
    <?php
}    

include('_rodape.php');
