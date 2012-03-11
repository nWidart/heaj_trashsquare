<?php
function strip($nom,$prenom) {
	
	$stripdonnees = array("nom" => "", 
						  "prenom" => ""
						  );

	$stripdonnees['nom'] = strip_tags(ucfirst(strtolower($nom)));
	$stripdonnees['prenom'] = strip_tags(ucfirst(strtolower($prenom)));

	return $stripdonnees;
}