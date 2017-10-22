<?php
// pas besoin de html ici car cette page ne contiendra que du PHP
//cette page sera insérée dans une autre page

class Visiteur{//en general les noms de classe commencent par une Majuscule
			
			
			private $prenom;
			// public $prenom;
			public $nom;
			//private reserve 
			//public pour tout le monde
			//protected
			public function set_prenom($nouveau_prenom){//methode set_prenom pour definir, c'est un "seter"
			
			$this->prenom=$nouveau_prenom;
			// $this est l'objet en cours
			}
	
			public function set_nom($nouveau_nom){//methode set_nom pour definir, c'est un "seter"
			
			$this->nom=$nouveau_nom;
			// $this est l'objet en cours
			}
	
	public function get_prenom(){//methode get_prenom pour recuperer le prenom de l'objet ciblé, c'est un "geter"
		return $this->prenom;
	}
	
	public function get_nom(){//methode get_nom pour recuperer le nom de l'objet ciblé, c'est un "geter"
		return $this->nom;
	}
}
	


// on va maintenant instancier cette classe dans le fichier visiteur.php




?>