<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Voleur
 *
 * @author administrateur
 */
class Voleur extends Personnage {

    protected $_type = "voleur";
    const CRITIQUE = 2;
    const CRITIQUE_TUE = 3;
    public function coupCritique() {
        $rand = rand(0, 100);
        if ($rand <= ($this->_pouvoir * 10)) {
            return true;
        }
        
    }

    public function frapper(Personnage $perso) {
        if ($this->coupCritique()) {
            if ($perso->recevoirDegats(5) === 1) {
                return $this::CRITIQUE;
            } else {
                return $this::CRITIQUE_TUE;
            }
        } else {
            if ($perso->recevoirDegats() === 1) {
                return $this::BLESSE;
            } else {
                return $this::TUE;
            }
        }
            

    }

}
