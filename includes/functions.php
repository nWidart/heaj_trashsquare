<?php
function strip($nom,$prenom) {
	
	$stripdonnees = array("nom" => "", 
						  "prenom" => ""
						  );

	$stripdonnees['nom'] = strip_tags(ucfirst(strtolower($nom)));
	$stripdonnees['prenom'] = strip_tags(ucfirst(strtolower($prenom)));

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
			$grade = "Exploreur";
			break;
		case 5:
			$grade = "Mr Propre";
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

		
		default:
			$grade = "gradeParDefaut :(";
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