<?php
class Cours
{
    const EXT_FICHIER = '.cours';

    private $_titre;
    private $_nbHeures;
    private $_enseignant;
    private $_etudiants;

    public function __construct($titre = 'Unknow', $nbHeures = 0, Enseignant $enseignant = null, $etudiants = array()) {
        $this->setTitre($titre);
        $this->setNbHeures($nbHeures);
        if ($enseignant) {
                $this->setEnseignant($enseignant);
        } else {
                $this->setEnseignant(new Enseignant());
        }
        $this->setEtudiants($etudiants);
    }

    public function __destruct() {
    }

    public function __toString() {
            $str = '{titre='.$this->titre().', nbHeures='. $this->nbHeures().', enseignant='. $this->enseignant();
            $str .= ', etudiants=[';
            foreach ($this->etudiants() as $key => $etudiant) {
                if ($key) {
                    $str .= ', ';
                }
                $str .= $etudiant;
            }
            return $str.']}';
    }

    public function titre() {
            return $this->_titre;
    }

    public function nbHeures() {
            return $this->_nbHeures;
    }

    public function enseignant() {
            return $this->_enseigant;
    }

    public function etudiants() {
            return $this->_etudiants;
    }

    public function setTitre($titre) {
            $this->_titre = $titre;
            return $this;
    }

    public function setNbHeures($nbHeures) {
            $this->_nbHeures = $nbHeures;
            return $this;
    }

    public function setEnseignant($enseignant) {
            $this->_enseignant = $enseignant;
            return $this;
    }

    public function setEtudiants($etudiants) {
            $this->_etudiants = $etudiants;
            return $this;
    }
    
    public function addEtudiant(Etudiant $etudiant = null) {
        if ($etudiant) {
               $this->_etudiants[] = $etudiant;
        } else {
               $this->_etudiants[] = new Etudiant();
        }
        return $this;
    }

    public static function saveInFile(Cours $cours, string $file):bool {
        $hFile = fopen($file, 'w');
        if ($hFile) {
            fputs($hFile, $cours->titre()."\n");
            fputs($hFile, $cours->nbHeures()."\n");
            fputs($hFile, $cours->enseigant()->nom()."\n");
            fputs($hFile, $cours->enseigant()->age()."\n");
            fputs($hFile, $cours->enseigant()->salaire()."\n");
            $etudiants = $cours->etudiants();
            fputs($hFile, count($etudiants)."\n");
            foreach($etudiants as $etudiant) {
                fputs($hFile, $etudiant->nom()."\n");
                fputs($hFile, $etudiant->age()."\n");
                fputs($hFile, $etudiant->diplome()."\n");
            }
            fclose($hFile);
            return true;
        } else {
            return false;
        }
    }
    
    public static function loadFromFile(string $file):Cours {
        $cours = null;/*
        $hFile = fopen($file, 'r');
        if ($hFile) {
            $nom = rtrim(fgets($hFile));
            $age = intval(fgets($hFile));
            $salaire = intval(fgets($hFile));
            if ($nom !== false && $age !== false && $salaire !== false) {
                $enseignant = new Enseignant($nom, $age, $salaire);
            }
            fclose($hFile);
        }*/
        return $cours;
    }
}
