<?php
function strip($nom,$prenom,$classe) {
	
	$stripdonnees = array("nom" => "", 
						  "prenom" => "",
						  "classe" => ""
						  );

	$stripdonnees['nom'] = strip_tags(ucfirst(strtolower($nom)));
	$stripdonnees['prenom'] = strip_tags(ucfirst(strtolower($prenom)));
	$stripdonnees['classe'] = strip_tags(strtoupper($classe));

	return $stripdonnees;
}

function get_the_titre($score) {
	
	switch ($score) {
		case 1:
			$grade = "Débutant";
			break;
		case 2:
			$grade = "Initié";
			break;
		case 3:
			$grade = "Aventurier";
			break;
		case 4:
			$grade = "Explorateur";
			break;
		case 5:
			$grade = "Mr. Propre";
			break;
		case 6:
			$grade = "Écologiste";
			break;
		case 7:
			$grade = "Sénateur";
			break;
		case 8:
			$grade = "Député";
			break;
		case 9:
			$grade = "Échevin";
			break;
		case 10:
			$grade = "Bourgmestre";
			break;
		case 11:
			$grade = "Ministre";
			break;
		case 12:
			$grade = "Premier ministre";
			break;
		case 13:
			$grade = "Roi";
			break;
		case 14:
			$grade = "Roi";
			break;
		case 15:
			$grade = "Roi";
			break;
		case 16:
			$grade = "Roi";
			break;
		case 17:
			$grade = "Roi";
			break;
		case 18:
			$grade = "Roi";
			break;
		case 19:
			$grade = "Roi";
			break;
		case 20:
			$grade = "Roi";
			break;
		case 21:
			$grade = "Roi";
			break;
		default:
			$grade = "Débutant";
			break;
	}
	return $grade;
}

function get_the_equivalent_bar_width($score) {
	switch ($score) {
		case 12:
			$bw = "50";
			break;

		default:
			$bw = 0;
			break;
	}

	return $bw;
}

function __autoload($class_nome) {
	$class_nome = strtolower($class_nome);
	$path = LIB_PATH.DS."{class_nome}.php";
	if ( file_exists($path) ) {
		require_once($path);
	} else {
		die ("The file {$class_nome}.php could not be found.");
	}
}