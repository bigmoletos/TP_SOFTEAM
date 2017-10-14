<?php
//code de philippe sur  l'université

	include_once "Autoload.php";
	class Enseignant extends Personne{
		private $_salaire;
		private static $_nb_Enseignant=0;
        const DOSSIER=parent::DOSSIER."/enseignant/";

	/**
	 * Class Constructor
	 * @param    $_salaire   
	 * @param    $_nb_Enseignant   
	 */
	public function __construct($nom,$age,$_salaire, $_nb_Enseignant=null)
	{
		parent::__construct($nom,$age);
		$this->setSalaire($_salaire);
		if($_nb_Enseignant!=null)
			self::setNb_Enseignant($_nb_Enseignant);
		self::$_nb_Enseignant++;
	}

	
    /**
     * @return mixed
     */
    public function Salaire()
    {
        return $this->_salaire;
    }

    /**
     * @param mixed $_salaire
     *
     * @return self
     */
    public function setSalaire($_salaire)
    {
        $this->_salaire = $_salaire;

        return $this;
    }

    /**
     * @return mixed
     */
    public static function NbEnseignant()
    {
        return self::$_nb_Enseignant;
    }

    /**
     * @param mixed $_nb_Enseignant
     *
     * @return self
     */
    public static function setNbEnseignant($_nb_Enseignant)
    {
        self::$_nb_Enseignant = $_nb_Enseignant;

        return $this;
    }

    public static function createByFile($nom){
        $f=fopen(self::DOSSIER."/".$nom.".txt","r");
        fgets($f);
        $age=fgets($f);
        $salaire=fgets($f);

        return new Enseignant($nom,$age,$salaire);

    }

    public function printEnseignant(){
        return $this->printPersonne()."\n".$this->Salaire();
    }


    public function enregistrer(){
        $file=self::DOSSIER.$this->Nom().".txt";
        file_put_contents($file, $this->printEnseignant());
    }
} 
?>

