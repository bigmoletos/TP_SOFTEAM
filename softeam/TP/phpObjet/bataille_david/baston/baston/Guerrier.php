<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Guerrier
 *
 * @author administrateur
 */
class Guerrier extends Personnage {
    protected $_type = "guerrier";

    public function recevoirDegats($degats_bonus = 0) {
        $this->_pv -= ((5+$degats_bonus)-$this->_pouvoir);
        // On modifie le pouvoir en conséquence
        $this->__setPouvoir();
        // On vérifie si le personnage meurt de sa blessure
        if ($this->_pv < 1) {
            return $this::TUE;
        } else {
            return $this::BLESSE;
        }
    }
    public function frapper(Personnage $perso) {  
        if($perso->recevoirDegats()===1){
            return $this::BLESSE;
        } else{
            return $this::TUE;;
        }
    }
}
