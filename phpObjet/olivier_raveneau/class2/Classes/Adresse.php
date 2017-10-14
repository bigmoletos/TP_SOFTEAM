<?php
class Adresse
{
	private $_cp;
	private $_ville;
	private $_pays;

	public function __construct($cp = '00000', $ville = 'unknow', $pays = 'unknow') {
		$this->setCp($cp);
		$this->setVille($ville);
		$this->setPays($pays);
	}

	public function __destruct() {

	}

	public function __toString() {
		return '{cp='.$this->cp().', ville='. $this->ville().', pays='. $this->pays().'}';
	}

	public function cp() {
		return $this->_cp;
	}

	public function ville() {
		return $this->_ville;
	}

	public function pays() {
		return $this->_pays;
	}

	public function setCp($cp) {
		$this->_cp = $cp;
		return $this;
	}

	public function setVille($ville) {
		$this->_ville = $ville;
		return $this;
	}

	public function setPays($pays) {
		$this->_pays = $pays;
		return $this;
	}

	public function decrireAdresse() {
		echo 'cp='.$this->cp().', ville='. $this->ville().', pays='. $this->pays();
	}
}
