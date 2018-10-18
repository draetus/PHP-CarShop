<?php
include_once('_banco.php');

function caracteristica_cadastrar( $paDados=array() ){
    
    $vfNome    = $paDados['nome'];
    
    $vmSql = "insert into caracteristica 
                (ctr_nome ) 
                values 
                ('{$vfNome}')";

    $vmConexao = conectar();             
    if (mysqli_query( $vmConexao, $vmSql)) {
        $vmId = mysqli_insert_id($vmConexao);
        return $vmId;
    } else {
        return false;
    } 
}

/**
 * Alterar as informações de um caracteristica no banco de dados
 * 
 * @param int $paId = Id do caracteristica que será alterado
 * 
 * @param string $paNome
 */
function caracteristica_alterar( $paId=null, $paNome='' ){
    return mysqli_query( conectar(), 
            "update caracteristica "
            . "set ctr_nome    = '{$paNome}' "
            . "where ctr_id     = {$paId} " );    
}

function caracteristica_listar( $paId = null){
    
    $vmSql = "SELECT ctr_id "
            . ", ctr_nome "
            . "FROM caracteristica ";
    if ($paId<>null){
        $vmSql .= " WHERE ctr_id = {$paId} ";
    }    
    $vmSql .= "order by ctr_id desc ";    
    
    $vmResultado = mysqli_query( conectar(), $vmSql );     
    
    $vtResultado = array();
    while ($vtCaracteristica = mysqli_fetch_assoc($vmResultado)){
        $vtResultado[] = $vtCaracteristica;
    }
    
    return $vtResultado;
}

function caracteristica_excluir( $paId='' ){
    if ($paId==''){
        return false;
    }
    
    return mysqli_query( conectar(), 
        "delete from caracteristica "
        . "where ctr_id = {$paId} " );    
    
}

