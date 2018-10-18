<?php 
$vmTitulo="Cadastro de Usuário";
include('_cabecalho.php') ;
include_once ('classes/Usuario.php') ;

$u = new Usuario($_REQUEST);

if(array_key_exists('vfAcao', $_REQUEST)){
    switch ($_REQUEST['vfAcao']){
        case 'editar' :
            $u = $u->selectPorID($_REQUEST['usu_id']);
            break;
        case 'gravar' :
            $u->grava();
            break;
        case 'excluir':
            $u->deletePorID($_REQUEST['usu_id']);
            break;
    }
}

?>
        
<form action="usuario-frm-cadastro.php" method="post" >
    <input type='hidden' value='gravar' name='vfAcao'>
        
    <table class='table table-light'>
        <tr>
            <td>E-mail:</td>
            <td><input type="text" 
                       name="usu_email" 
                       value='<?=@$u->get('usu_email')?>'
                       required
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher o email do usuário')"></td>
        </tr>
        <tr>
            <td>Nome: </td>
            <td><input type="text" 
                       name="usu_nome" 
                       value='<?=@$u->get('usu_nome')?>'
                       required 
                       oninput="setCustomValidity('')"
                       oninvalid="this.setCustomValidity('Favor preencher o nome do usuário')"> </td>
        </tr> 
        <tr>
            
       
      </div>
            <td>Senha: </td>
            <td> <input type="password" 
               name='<?=@$u->get('usu_senha')?>'
               class="form-control" 
               id="exampleInputPassword1" placeholder="Password">
            </td>
        </tr> 
        <tr>
            <td colspan="2" align="center">
                <input class='btn btn-primary' type="submit" value="Gravar">
            </td>
        </tr>

    </table>

</form>

<?php include('_rodape.php'); ?>
