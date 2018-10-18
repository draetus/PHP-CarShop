<?php 
$vmTitulo="Cadastro de caracteristica";
include('_cabecalho.php') ;
include('caracteristica-funcoes.php') ;


if (isset($_GET['vfCtr_id'])){
    $vmUrl = 'caracteristica-act-alterar.php';
    
    // buscar o caracteristica no banco
    $vfCtr_id = $_GET['vfCtr_id'];
        
    $vtCarro = caracteristica_listar( $vfCtr_id ); 
    
    $vfCtr_nome    = $vtCarro[0]['ctr_nome'];
} else {
    $vmUrl = 'caracteristica-act-cadastrar.php';
    
    $vfCtr_nome    = '';
}

?>
        
<form action="<?=$vmUrl?>" method="post">
    <input type='hidden' value='<?=$vfCtr_id?>' name='id'>
        
    <table class='table table-light'>
        <tr>
            <td>Nome:</td>
            <td><input type="text" 
                       name="nome" 
                       value='<?=$vfCtr_nome?>'
                       required
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher a característica')"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input class='btn btn-primary' type="submit" value="Gravar">
            </td>
        </tr>

    </table>

</form>

<?php include('_rodape.php'); ?>