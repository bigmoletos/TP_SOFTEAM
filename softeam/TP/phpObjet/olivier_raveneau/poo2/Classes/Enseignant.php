<?php
class Enseignant extends Personne {
    const EXT_FICHIER = '.enseignant';
    
    private $_salaire;

    public function __construct(string $nom = 'Unknow', int $age = 0, int $salaire = 0) {
            parent::__construct($nom, $age);
            $this->setSalaire($salaire);
    }

    public function __destruct() {
    }

    public function __toString() {
            return '{nom='.$this->nom().', age='.$this->age().', salaire='.$this->salaire().'}';
    }

    public function salaire():int {
            return $this->_salaire;
    }

    public function setSalaire(int $salaire) {
            $this->_salaire = $salaire;
            return $this;
    }

    public static function saveInFile(Enseignant $enseignant, string $file):bool {
        $hFile = fopen($file, 'w');
        if ($hFile) {
            fputs($hFile, $enseignant->nom()."\n");
            fputs($hFile, $enseignant->age()."\n");
            fputs($hFile, $enseignant->salaire()."\n");
            fclose($hFile);
            return true;
        } else {
            return false;
        }
    }
    
    public static function loadFromFile(string $file):Enseignant {
        $enseignant = null;
        $hFile = fopen($file, 'r');
        if ($hFile) {
            $nom = rtrim(fgets($hFile));
            $age = intval(fgets($hFile));
            $salaire = intval(fgets($hFile));
            if ($nom !== false && $age !== false && $salaire !== false) {
                $enseignant = new Enseignant($nom, $age, $salaire);
            }
            fclose($hFile);
        }
        return $enseignant;
    }
}
