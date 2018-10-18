<?php
include_once('_banco.php');




function usuario_cadastrar( $paDados=array() ){
    
    $vfNome    = $paDados['nome'];
    $vfEmail   = $paDados['email'];
    $vfSenha   = $paDados['senha'];
    
    $vmSql = "insert into usuario 
                (usu_nome, usu_email, usu_senha) 
                values 
                ('{$vfNome}'
                 ,'{$vfEmail}'
                 , {$vfSenha})";

    $vmConexao = conectar();             
    if (mysqli_query( $vmConexao, $vmSql)) {
        $vmId = mysqli_insert_id($vmConexao);
        
        return $vmId;
    } else {
        return false;
    } 
}

function usuario_alterar( $paId=null, $paDados=array() ){
    
    $vfId       = $paId;
    
    $vfNome    = $paDados['nome'];
    $vfEmail   = $paDados['email'];
    $vfSenha   = $paDados['senha'];
    
    
    $vmSql = "update usuario "
            . "set usu_nome    = '{$vfNome}' "
            . ", usu_email     = '{$vfEmail}' "
            . ", usu_senha        = {$vfSenha} "
            . "where usu_id     = {$vfId} " ;
            //echo $vmSql; 
            //die();
    
    return mysqli_query( conectar(), $vmSql );    
}

function usuario_listar(){
        
    $vmSql = "SELECT usu_id "
            . ", usu_email "
            . ", usu_nome "
            . "FROM carro WHERE 1 "
            . "order by usu_id desc ";    
    
    $vmResultado = mysqli_query( conectar(), $vmSql );     
    
    $vtResultado = array();
    while ($vtUsuario = mysqli_fetch_assoc($vmResultado)){
        $vtResultado[] = $vtUsuario;
    }
    
    return $vtResultado;
}

function usuario_excluir( $paId='' ){
    if ($paId==''){
        return false;
    }
    
    return mysqli_query( conectar(), 
        "delete from usuario "
        . "where usu_id = {$paId} " );    
    
}




