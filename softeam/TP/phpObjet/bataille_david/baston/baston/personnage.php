<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personnage
 *
 * @author administrateur
 */
abstract class Personnage {

    protected $_nom;
    protected $_pv;
    protected $_pouvoir;
    protected $_type;

    const BLESSE = 1;
    const TUE = 0;
    
    //On récupère les valeurs de départ
    public function __construct($nom, $pv = 100){
        $this->__setNom(str_replace(' ','_',trim($nom)));
        $this->__setPv($pv);
        $this->__setPouvoir();
    }
    
    // Méthode qui sert à blesser un personnage
    abstract public function frapper(Personnage $perso);
    
 
    // Méthode qui sert à décrémenter les pv
    public function recevoirDegats($degats_bonus = 0) {
        $this->_pv -= (5+$degats_bonus);
        // On modifie le pouvoir en conséquence
        $this->__setPouvoir();
        // On vérifie si le personnage meurt de sa blessure
        if ($this->_pv < 1) {
            return $this::TUE;
        } else {
            return $this::BLESSE;
        }
    }
    
    // Accesseurs
    public function __getPv() {
        return $this->_pv;
    }
    public function __getNom() {
        return $this->_nom;
    }
    public function __getType(){
        return $this->_type;
    }
    public function __getPouvoir(){        
        return $this->_pouvoir;
    }

    public function __setPv($pv) {
        $pv = (int) $pv;
        if ($pv >= 0 && $pv <= 100) {
            $this->_pv = $pv;
        }
    }
    public function __setNom($nom) {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }
    public function __setType($type) {
        if (is_string($type)) {
            $this->_type = $type;
        }
    }
    public function __setPouvoir(){
        if($this->_pv <= 25 && $this->_pv > 0) $this->_pouvoir = 4;
        elseif($this->_pv <= 50 && $this->_pv > 25) $this->_pouvoir = 3;
        elseif($this->_pv <= 75 && $this->_pv > 50) $this->_pouvoir = 2;
        else $this->_pouvoir = 1;
    }

    public function nomValide(){
        if(empty($this->_nom) || !is_string($this->_nom))
            return false;
         return true;
    }

}
