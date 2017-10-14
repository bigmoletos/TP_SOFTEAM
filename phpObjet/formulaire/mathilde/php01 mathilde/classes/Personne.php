<?php
require_once 'Adresse.php';
// creation de la classe Personne
	class Personne{
		//attributs
		private $_prenom;
		private $_age;
		private $_adresse;
		//constructeur
		public function __construct($prenom='sansNom', $age='sansAge', Adresse $adresse=null){
			$this->_prenom=$prenom;
			$this->_age=$age;
			if ($adresse){
				$this->setAdresse($adresse);
			}
		}
		//destructeur
		public function __destruct(){
		//unset($this);
		}
		//setter
		public function setPrenom($prenom){
			$this->_prenom = $prenom;
		}
		public function setAge($age){
			$this->_age = $age;
		}
		public function setAdresse($adresse){
			$this->_adresse = $adresse;
		}

		//getter
		public function prenom(){
			return $this->_prenom;
		}
		public function age(){
			return $this->_age;
		}

		public function adresse(){
			 return $this->adresse;
		}
		//méthodes

		public function decrirePersonne(){
			echo 'nom : ' . $this->_prenom . ' age : ' . $this->_age . ' adresse :'.$this->_adresse->decrireAdresse() .'<br />' ;
		}
	}

