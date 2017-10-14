<?php
class Personne
{
    private $_nom;
    private $_prenom;
    private $_age;

    public function __construct(string $nom = 'Unknow', string $prenom = 'Unknow', int $age = 0) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAge($age);
    }

    public function __destruct() {
    }

    public function __toString() {
        return '{nom='.$this->nom().', prenom='.$this->prenom().', age='. $this->age().'}';
    }

    public function nom():string {
        return $this->_nom;
    }

    public function prenom():string {
        return $this->_prenom;
    }

    public function age():int {
        return $this->_age;
    }

    public function setNom(string $nom) {
        $this->_nom = $nom;
        return $this;
    }

    public function setPrenom(string $prenom) {
        $this->_prenom = $prenom;
        return $this;
    }
    
    public function setAge(int $age) {
        $this->_age = $age;
        return $this;
    }

    public function saveInFile($path='data') {
        $hFile = fopen($path.'/'.$this->nom().'.personne', 'w');
        if ($hFile) {
            fputs($hFile, $this->nom()."\n");
            fputs($hFile, $this->prenom()."\n");
            fputs($hFile, $this->age()."\n");
            fclose($hFile);
            return true;
        } else {
            return false;
        }
    }
    
    public function loadFromFile($path='data')
    {
        $hFile = fopen($path.'/'.$this->nom().'.personne', 'r');
        if ($hFile) {
            $nom = rtrim(fgets($hFile));
            $prenom = rtrim(fgets($hFile));
            $age = rtrim(fgets($hFile));
            if ($nom !== false && $prenom !== false && $age !== false) {
                $this->setNom($nom);
                $this->setPrenom($prenom);
                $this->setAge($age); 
            }
            fclose($hFile);
            return true;
        }
        else {
            return false;
        }
    }
}
