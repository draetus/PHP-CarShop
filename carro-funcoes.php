<?php
include_once('_banco.php');


function carro_grava_foto( $paId=null, $paFoto=array()) {
    
    $vtArquivo = $paFoto['foto'];
    
    $vtType = explode('/', $vtArquivo['type']);
    $vmExtensao = $vtType[1];
    
    $vmNomeArquivo = str_pad( $paId, 10, '0', STR_PAD_LEFT) . '.' . $vmExtensao;
    
    if (move_uploaded_file( $vtArquivo['tmp_name']
                            , CC_PASTA_FOTOS.$vmNomeArquivo)){
       $vmSql = "update carro set car_foto = '{$vmNomeArquivo}' "
                            . "where car_id = {$paId} ";
       mysqli_query( conectar(), $vmSql );
    } 
}


function carro_cadastrar( $paDados=array() ){
    
    $vfMarca    = $paDados['marca'];
    $vfModelo   = $paDados['modelo'];
    $vfAno      = $paDados['ano'];
    $vfValor    = $paDados['valor'];
    $vtCaracteristicas = $paDados['vfCaracteristicas'];
    
    echo '<pre>';
    print_r($vtCaracteristicas);
    die();
    
    $vmSql = "insert into carro 
                (car_marca, car_modelo, car_ano, car_valor) 
                values 
                ('{$vfMarca}'
                 ,'{$vfModelo}'
                 , {$vfAno}
                 , {$vfValor})";

    $vmConexao = conectar();             
    if (mysqli_query( $vmConexao, $vmSql)) {
        $vmId = mysqli_insert_id($vmConexao);
        
        grava_caracteristicas($vmId, $vtCaracteristicas);
        
        return $vmId;
    } else {
        return false;
    } 
}

function grava_caracteristicas($paId, $paCaracteristicas){

    $vmSql = "delete from carro_caracteristica where car_id = {$paId} ";
    mysqli_query( conectar(), $vmSql);
    
    if (is_array($paCaracteristicas)) {
        foreach ($paCaracteristicas as $vmCtr ) {
            $vmSql = "insert into carro_caracteristica values ( {$paId}, {$vmCtr} )";
            mysqli_query( conectar(), $vmSql);
        }
    }
    
}


/**
 * Alterar as informações de um carro no banco de dados
 * 
 * @param int $paId = Id do carro que será alterado
 * 
 * @param type $paDados 
 *      [marca]
 *      [modelo]
 *      [ano]
 *      [valor]
 */
function carro_alterar( $paId=null, $paDados=array() ){
    
    $vfId       = $paId;
    
    $vfMarca    = $paDados['marca'];
    $vfModelo   = $paDados['modelo'];
    $vfAno      = $paDados['ano'];
    $vfValor    = $paDados['valor'];    
    
    $vmSql = "update carro "
            . "set car_marca    = '{$vfMarca}' "
            . ", car_modelo     = '{$vfModelo}' "
            . ", car_ano        = {$vfAno} "
            . ", car_valor      = {$vfValor} "
            . "where car_id     = {$vfId} " ;
            //echo $vmSql; 
            //die();
    
    return mysqli_query( conectar(), $vmSql );    
}

/**
 * Retorna os carros de acordo com os parametros
 * 
 * @param array [vfCar_id] o id do carro
 *              [vfTextoBusca] que pesquisa na marca e modelo
 * @return array Carros
 */
function carro_listar( $paFiltros = null){
        
    $vmSql = "SELECT car_id "
            . ", car_marca "
            . ", car_modelo "
            . ", car_ano "
            . ", car_valor "
            . ", car_foto "
            . "FROM carro WHERE 1 ";
    
    if (@$paFiltros['vfTextoBusca']<>''){
        $vmSql .= " and "
                . " ( car_marca like '%{$paFiltros['vfTextoBusca']}%' "
                . " or car_modelo like '%{$paFiltros['vfTextoBusca']}%' ) ";
    }
    
    if (@$paFiltros['vfCar_marca']<>''){
        $vmSql .= " and car_marca like '%{$paFiltros['vfCar_marca']}%' ";
    }
    
    if (@$paFiltros['vfCar_modelo']<>''){
        $vmSql .= " and car_modelo like '%{$paFiltros['vfCar_modelo']}%' ";
    }
    
    if (@$paFiltros['vfCar_ano_de']<>''){
        $vmSql .= " and car_ano >= {$paFiltros['vfCar_ano_de']} ";
    }
    
    if (@$paFiltros['vfCar_ano_ate']<>''){
        $vmSql .= " and car_ano <= {$paFiltros['vfCar_ano_ate']} ";
    }
    
    if (@$paFiltros['vfCar_valor_de']<>''){
        $vmSql .= " and car_valor >= {$paFiltros['vfCar_valor_de']} ";
    }
    
    if (@$paFiltros['vfCar_valor_ate']<>''){
        $vmSql .= " and car_valor <= {$paFiltros['vfCar_valor_ate']} ";
    }
    
    if (@$paFiltros['vfCar_id']<>''){
        $vmSql .= " and car_id = {$paFiltros['vfCar_id']} ";
    }
    
    if (array_key_exists('vfCaracteristicas', $paFiltros)) {
        
        $vmQtdCtr = count($paFiltros['vfCaracteristicas']);
        $vmIds = implode( ', ', $paFiltros['vfCaracteristicas']);
        
        $vmSql .= " and car_id in "
                . " (select 	car_id
                    from	carro_caracteristica
                    where   ctr_id in ({$vmIds})
                    group by car_id 
                    having count(car_id) = {$vmQtdCtr}) ";
    }
    
    $vmSql .= "order by car_id desc ";    
    
    $vmResultado = mysqli_query( conectar(), $vmSql );     
    
    $vtResultado = array();
    while ($vtCarro = mysqli_fetch_assoc($vmResultado)){
        $vtResultado[] = $vtCarro;
    }
    
    return $vtResultado;
}

function carro_excluir( $paId='' ){
    if ($paId==''){
        return false;
    }
    
    return mysqli_query( conectar(), 
        "delete from carro "
        . "where car_id = {$paId} " );    
    
}

function busca_caracteristicas_carro( $paId ) {
    
    $vmSql = "select ctr_id from carro_caracteristica
		where car_id = {$paId} ";
                
    $vmResultado = mysqli_query( conectar(), $vmSql );     
    
    $vtResultado = array();
    while ($vtCarro_caracteristica = mysqli_fetch_assoc($vmResultado)){
        $vtResultado[] = $vtCarro_caracteristica['ctr_id'];
    }
    
    return $vtResultado;
    
}

