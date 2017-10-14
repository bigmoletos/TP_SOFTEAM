<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Magicien
 *
 * @author administrateur
 */
class Magicien extends Personnage {
    protected $_type = "magicien";
    public function frapper(Personnage $perso) {  
        if($perso->recevoirDegats($this->_pouvoir)===1){
            return $this::BLESSE;
        } else{
            return $this::TUE;;
        }
    }
}
