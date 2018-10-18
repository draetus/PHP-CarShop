<?php 
$vmTitulo="Cadastro de carro";
include('_cabecalho.php') ;
include('carro-funcoes.php') ;
include('caracteristica-funcoes.php') ;


if (isset($_GET['vfCar_id'])){
    $vmUrl = 'carro-act-alterar.php';
    
    $vfCar_id = $_GET['vfCar_id'];
    
    $vtCarro = carro_listar( $_GET );
    
    $vfCar_marca    = $vtCarro[0]['car_marca'];
    $vfCar_modelo   = $vtCarro[0]['car_modelo'];
    $vfCar_ano      = $vtCarro[0]['car_ano'];
    $vfCar_valor    = $vtCarro[0]['car_valor'];
    $vfCar_foto     = $vtCarro[0]['car_foto'];
    
    $vfCar_caracteristicas = busca_caracteristicas_carro($vfCar_id);
    
} else {
    $vmUrl = 'carro-act-cadastrar.php';
    
    $vfCar_marca    = '';
    $vfCar_modelo   = '';
    $vfCar_ano      = '';
    $vfCar_valor    = '';
    $vfCar_foto     = '';
    
    $vfCar_caracteristicas = array();
}

?>
        
<form action="<?=$vmUrl?>" method="post" enctype="multipart/form-data">
    <input type='hidden' value='<?=$vfCar_id?>' name='vfCar_id'>
        
    <table class='table table-light'>
        <tr>
            <td>Marca:</td>
            <td><input type="text" 
                       name="marca" 
                       value='<?=$vfCar_marca?>'
                       required
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher a marca do carro')"></td>
        </tr>
        <tr>
            <td>Modelo: </td>
            <td><input type="text" 
                       name="modelo" 
                       value='<?=$vfCar_modelo?>'
                       required 
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher o modelo do carro')"> </td>
        </tr>           
        <tr>
            <td>Ano:</td>
            <td><input type="number" 
                       name="ano" 
                       value='<?=$vfCar_ano?>'
                       required 
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher o ano do carro')"></td>
        </tr>
        <tr>
            <td>Valor: </td>
            <td><input type="number" 
                       name="valor" 
                       value='<?=$vfCar_valor?>'
                       required
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher o valor do carro')"> </td>
        </tr>  
        <tr>
            <td>Características: </td>
            <td>
                <?php
                $vtCaracteristicas = caracteristica_listar();
                            
                foreach ($vtCaracteristicas as $x=>$vtCaracteristica){
                    ?>
                    <input type="checkbox" 
                           name="vfCaracteristicas[<?=$x?>]" 
                           value="<?=$vtCaracteristica['ctr_id']?>"
                           <?php echo (in_array($vtCaracteristica['ctr_id'], $vfCar_caracteristicas)?'checked':'')?> > 
                            <?=$vtCaracteristica['ctr_nome']?>
                            <br>
                    <?php
                }
                ?>
            </td>
        </tr>           
        
        <tr>
            <td>Foto: </td>
            <td>
                <?php
                if ($vfCar_foto<>''){
                   ?>
                      <img src="<?=CC_PASTA_FOTOS.$vfCar_foto?>" 
                       style="width:30vw; height: 30vh">
                  <?php
                }
                ?>                
                <input type="file" 
                       name="foto" 
                       class="form form-control-file"
                       > </td>
        </tr>           
        <tr>
            <td colspan="2" align="center">
                <input class='btn btn-primary' type="submit" value="Gravar">
            </td>
        </tr>

    </table>

</form>

<?php include('_rodape.php'); ?>