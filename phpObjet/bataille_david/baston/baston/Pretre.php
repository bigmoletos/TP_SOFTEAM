<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pretre
 *
 * @author administrateur
 */
class Pretre extends Personnage {
    protected $_type = "pretre";
    public function frapper(Personnage $perso) {
        $this->soigner();
        
        if($perso->recevoirDegats()===1){
            return $this::BLESSE;
        } else{
            return $this::TUE;;
        }
    }
    public function soigner(){
        $this->_pv = $this->_pv + $this->_pouvoir;
        if($this->_pv>100)
            $this->_pv = 100;
        $this->__setPouvoir();
    }
    
}
