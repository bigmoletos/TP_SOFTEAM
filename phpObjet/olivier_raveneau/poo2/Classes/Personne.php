<?php
class Personne {
    const EXT_FICHIER = '.personne';

    private $_nom;
    private $_age;

    public function __construct(string $nom = 'Unknow', int $age = 0) {
            $this->setNom($nom);
            $this->setAge($age);
    }

    public function __destruct() {
    }

    public function __toString() {
            return '{nom='.$this->nom().', age='.$this->age().'}';
    }

    public function nom():string {
            return $this->_nom;
    }

    public function age():int {
            return $this->_age;
    }

    public function setNom(string $nom) {
            $this->_nom = $nom;
            return $this;
    }

    public function setAge(int $age) {
            $this->_age = $age;
            return $this;
    }

    public static function saveInFile(Personne $personne, string $path='data'):bool {
        $hFile = fopen($path.'/'.$personne->nom().Personne::EXT_FICHIER, 'w');
        if ($hFile) {
            fputs($hFile, $personne->nom()."\n");
            fputs($hFile, $personne->age()."\n");
            fclose($hFile);
            return true;
        } else {
            return false;
        }
    }
    
    public static function loadFromFile(string $file):Personne {
        $personne = null;
        $hFile = fopen($file, 'r');
        if ($hFile) {
            $nom = rtrim(fgets($hFile));
            $age = intval(fgets($hFile));
            if ($nom !== false && $age !== false) {
                $personne = new Personne($nom, $age);
            }
            fclose($hFile);
        }
        return $personne;
    }
}
