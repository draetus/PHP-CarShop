<?php
include 'classes/Usuario.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Angelo Marin
 */
class Login {
    private $Usuario;
    private $erro;
    
    function __construct( $paParams=array() ){

        $u = new Usuario();
        
        $vtResultado = $u->selectAll( $paParams );
        
        if ( count($vtResultado)>0 ) {
            $this->Usuario=$vtResultado[0];
            
            $_SESSION['SS_USU_ID']   = $this->Usuario->get('usu_id');
            $_SESSION['SS_USU_NOME'] = $this->Usuario->get('usu_nome');
            
        } else {
            $this->erro = 'Usuário ou senha inválidos';
        }
    }
    
    function logado(){
        return (is_a( $this->Usuario, 'Usuario'));
    }
    
    function getErro(){
        return $this->erro;
    }
    static function permiteAcessoSemLogin($paArquivo){
        $permitidosSemLogin=array('index','login','carro-frm-lista');
        return in_array($paArquivo, $permitidosSemLogin);
    }
    static function estaLogado(){
        return array_key_exists('SS_USU_ID', $_SESSION);
    }
    
}
