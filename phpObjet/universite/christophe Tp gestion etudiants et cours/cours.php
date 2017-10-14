<?php
class Cours{

	private $_titre;
	private $_duree;
	private $_etudiant;
	private $_enseignant;
	private $_salle;

	public function __construct($titre,$duree,$enseignant,$etudiant=null,$salle)
	{
		$this->_titre = $titre;
		$this->_duree = $duree;
		$this->_enseignant = $enseignant;
		$this->_etudiant = $etudiant;
		$this->_salle = $salle;	
	}

	public function Titre()
	{
	    return $this->_titre;
	}
	 
	 
	public function setTitre($titre)
	{
	    $this->_titre = $titre;
	}

	public function Duree()
	{
	    return $this->_duree;
	}
	 
	 
	public function setDuree($duree)
	{
	    $this->_duree = $duree;
	}

	public function saveCours()
	{
		$racine="fiches/cours/";
		$chaine = $this->_titre."\n".$this->_duree."\n".$this->_enseignant->Nom();

		foreach($this->_etudiant as $value)
			$chaine .="\n".$value->Nom();
		
		$chaine.="\n".$this->_salle->Nom();
		str_replace("\n", "", $chaine);
		file_put_contents($racine.$this->_titre.".txt", $chaine);
	}

	public function Etudiant()
	{
		echo $this->_etudiant[0]->Nom();
	}
		
}
?>