<?php 
$vmTitulo="Confirmação de cadastro de usuário";
include('_cabecalho.php');
include('usuario-funcoes.php');

if ($vmId = usuario_cadastrar($_POST)){
    ?>
    <p class='alert alert-success'>
        Usuario <?=$_POST['nome']?> cadastrado com sucesso!</p>
    
    <a href="usuario-frm-cadastro.php" class='btn btn-primary'>
        Novo Usuário</a>
    <meta http-equiv='refresh' content="3;url=usuario-frm-lista.php">
    <?php
} else {
    ?>
    <p class='alert alert-danger'>Erro ao cadastrar o usuário</p>
    <?php
}    

include('_rodape.php');
