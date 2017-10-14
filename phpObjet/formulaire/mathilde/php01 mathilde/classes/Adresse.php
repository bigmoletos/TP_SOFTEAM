<?php
	class Adresse{
		//attribut
		private $_cp;
		private $_ville;
		private $_pays;

		//construct
		public function __construct($cp='00000',$ville='sansNom',$pays='sansNom'){
			$this->setCp($cp);
			$this->setVille($ville);
			$this->setPays($pays);
		}

		//destruct
		public function __destruct(){

		}

		//get
		public function cp(){
			return $this->_cp;
		}
		public function ville(){
			return $this->_ville;
		}
		public function pays(){
			return $this->_pays;
		}
		//set
		public function setCp($cp){
			$this->_cp = $cp;
		}
		public function setVille($ville){
			$this->_ville = $ville;
		}
		public function setPays($pays){
			$this->_pays = $pays;
		}
		//méthode
		public function decrireAdresse(){
			$decrireAdresse = ' code postal : ' . $this->_cp . ' ville : ' . $this->_ville . ' pays : ' . $this->_pays .'.';
			return $decrireAdresse;
		}
	}

/* test de la classe
$adresse = new Adresse ('13','Mars','Fce');
$adresse->decrireAdresse();
*/

?>