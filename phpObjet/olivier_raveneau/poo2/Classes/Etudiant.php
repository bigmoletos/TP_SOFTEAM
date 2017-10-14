<?php
class Etudiant extends Personne {
    const EXT_FICHIER = '.etudiant';
    
    private $_diplome;

    public function __construct(string $nom = 'Unknow', int $age = 0, string $diplome = 'Unknow') {
            parent::__construct($nom, $age);
            $this->setDiplome($diplome);
    }

    public function __destruct() {
    }

    public function __toString() {
            return '{nom='.$this->nom().', age='.$this->age().', diplome='.$this->diplome().'}';
    }

    public function diplome():string {
            return $this->_diplome;
    }

    public function setDiplome(string $diplome) {
            $this->_diplome = $diplome;
            return $this;
    }

    public static function saveInFile(Etudiant $etudiant, string $file):bool {
        $hFile = fopen($file, 'w');
        if ($hFile) {
            fputs($hFile, $etudiant->nom()."\n");
            fputs($hFile, $etudiant->age()."\n");
            fputs($hFile, $etudiant->diplome()."\n");
            fclose($hFile);
            return true;
        } else {
            return false;
        }
    }
    
    public static function loadFromFile(string $file):Etudiant {
        $etudiant = null;
        $hFile = fopen($file, 'r');
        if ($hFile) {
            $nom = rtrim(fgets($hFile));
            $age = intval(fgets($hFile));
            $diplome = rtrim(fgets($hFile));
            if ($nom !== false && $age !== false && $diplome !== false) {
                $etudiant = new Etudiant($nom, $age, $diplome);
            }
            fclose($hFile);
        }
        return $etudiant;
    }
}
