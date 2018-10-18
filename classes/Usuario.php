<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Angelo Marin
 */
class Usuario extends _MODEL {
    //put your code here
    
    function addFiltrosPersonalizados( $paFiltros ){
        
        if (@$paFiltros['usu_email']<>''){
            $this->filtros[] = " usu_email = '{$paFiltros['usu_email']}' ";
        }

        if (@$paFiltros['usu_senha']<>''){
            $this->filtros[] = " usu_senha = '{$paFiltros['usu_senha']}' ";
        }
    }    
    
}
