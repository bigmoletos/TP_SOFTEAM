<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonnageManager
 *
 * @author administrateur
 */
class PersonnageManager {

    private $_path;

    function __construct() {
        $this->_path = "./personnages/";
    }

    function add(Personnage $perso) {
        file_put_contents($this->_path . $perso->__getNom(), "100" . "\r\n" . $perso->__getType() . "\r\n" . $perso->__getPouvoir());
    }

    function update(Personnage $perso) {
        file_put_contents($this->_path . $perso->__getNom(), $perso->__getPv() . "\r\n" . $perso->__getType() . "\r\n" . $perso->__getPouvoir());
    }

    function delete(Personnage $perso) {
        unlink($this->_path . $perso->__getNom());
    }

    function get($nom) {
        $content = file($this->_path . $nom);
        $pv = rtrim($content[0]);
        $type = rtrim($content[1]);
        $pouvoir = rtrim($content[2]);
        return new $type($nom, $pv);
    }

    function count() {
        return count(glob($this->_path . "*"));
    }

    function exists($nom) {
        return file_exists($this->_path . $nom);
    }

    function listing($nom) {
        $adversaires = array();
        $personnages = glob($this->_path . "*");

        foreach ($personnages as $p) {
            $p = basename($p);
            if ($p != $nom) {
                $adversaires[] = $this->get($p);
            }
        }
        return $adversaires;
    }

}
