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
		case '1':
			$grade = "grade";
			break;
		
		default:
			$grade = "gradeParDefaut";
			break;
	}

	return $grade;
}