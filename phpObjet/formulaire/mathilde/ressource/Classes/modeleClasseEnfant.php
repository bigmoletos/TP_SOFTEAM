<?php

class ChildName extends Name {
	//attribut
	private $_attribut1;
	private $_attribut2;
	private $_attribut3;

	//methode constructeur
	public function __construct($attribut1='sansAttribut1', $attribut2='sansAttribut2', $attribut3 = 'sansAttribut3'){
		parent::__construct($attribut1, $attribut2)
		$this->setAttribut3($attribut3);
	
	}
	//methode destructeur
	public function __destruct(){
		//self::$_nbrChildName--;
	}

	//methode setter
	public function setAttribut3($attribut3){
		$this->_attribut3 = $attribut3;
	}
	
	//methode getter
	public function attribut3(){
		return $this->_attribut3;
	}

	/*//metode static
	public static function nbrChildName(){
		return self::$_nbrChildName;
	}
	*/
	//methode
	public function decrireChildName(){
		$descrireChildName = $this->_attribut1 . "<br />" . $this->_attribut2 . "<br />". $this->_attribut3 . "<br />";
		return $descrireChildName;
	}

	public function change($attribut1, $attribut2, $attribut3){
		parent::change($nom, $prenom);
		$this->setAttribut3($attribut3);
	}

} //fin classe ChildName
?>