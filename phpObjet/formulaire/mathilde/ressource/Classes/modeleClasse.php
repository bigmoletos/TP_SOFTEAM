<?php

class Name {
	//attribut
	private $_attribut1;
	private $_attribut2;

	//methode constructeur
	public function __construct($attribut1='sansAttribut1', $attribut2='sansAttribut2'){

		$this->setAttribut1($attribut1);
		$this->setAttribut2($attribut2);
		//self::$_nbrName++;
	}
	//methode destructeur
	public function __destruct(){
		//self::$_nbrName--;
	}

	//methode setter
	public function setAttribut1($attribut1){
		$this->_attribut1 = $attribut1;
	}
	public function setAttribut2($attribut2){
		$this->_attribut2 = $attribut2;
	}

	//methode getter
	public function attribut1(){
		return $this->_attribut1;
	}
	public function attribut2(){
		return $this->_attribut2;
	}

	/*//metode static
	public static function nbrName(){
		return self::$_nbrName;
	}
	*/
	//methode
	public function decrireName(){
		$descrireName = $this->_attribut1 . "<br />" . $this->_attribut2 . "<br />";
		return $descrireName;
	}

	public function change($attribut1, $attribut2){
		$this->setAttribut1($attribut1);
		$this->setAttribut2($attribut2);
	}

} //fin classe Name
?>