<?php

//***********************************************************//

$tabsalle=array();
$i=0;

foreach(glob("fiches/salle/*.txt") as $filename)
	{
		$file=file_get_contents($filename);
		$tab=explode(" ",$file);
		$filename=new amphi($tab[0],$tab[1],$tab[2]);
		$tabsalle[$i]=$filename;
		$i++;		
	}

$_SESSION['tabsalle']=$tabsalle;

var_dump($tabsalle);

//***********************************************************//

$tabetudiant=array();
$i=0;


foreach(glob("fiches/etudiant/*.txt") as $filename)
	{
		$file=file_get_contents($filename);
		$tab=explode("\n",$file);
		$perso=new etudiant($tab[0],$tab[1],$tab[2]);
		$tabetudiant[$i]=$perso;
		$i++;		
	}

$_SESSION['tabclasse1']=$tabetudiant;

var_dump($tabetudiant);

//***********************************************************//

$tabenseignant=array();
$i=0;

foreach(glob("fiches/enseignant/*.txt") as $filename)
	{
		$file=file_get_contents($filename);
		$tab=explode("\n",$file);
		$perso=new enseignant($tab[0],$tab[1],$tab[2]);
		$tabenseignant[$i]=$perso;
		$i++;		
	}

$_SESSION['tabclasse2']=$tabenseignant;

var_dump($tabenseignant);

//***********************************************************//

$tabcours=array();
$i=0;

foreach(glob("fiches/cours/*.txt") as $filename)
	{
		
		$file=file_get_contents($filename);
		$tab=explode("\n",$file);
		foreach($tabenseignant as $objet)
		{
			if($objet->Nom()==$tab[2])
			{
				$enseign=$objet;
				break;
			}
		}

		$tmp=array();
		$z=0;
		for($j=3;$j<count($tab)-1;$j++)
		{
			foreach($tabetudiant as $objet)
			{
				if($objet->Nom()==$tab[$j])
				{
					$tmp[$z]=$objet;
					break;
				}
			}
		$z++;
		}

		foreach($tabsalle as $objet)
		{
			if($objet->Nom()==$tab[count($tab)-1])
			{
				$objetsalle=$objet;
				break;
			}
		}
		$cours=new Cours($tab[0],$tab[1],$enseign,$tmp,$objetsalle);
		
		$tabcours[$i]=$cours;
		$i++;		
	}

$_SESSION['tabcours']=$tabcours;

var_dump($tabcours);

//***********************************************************//

?>