<!-- 
        auteur : Joel Boudreau
        date :  2026
        but :
-->
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<title>Exercice 2 Array</title>
	<?php

	const RAND_MIN = 1;
	const RAND_MAX = 12;
	const NB_CELLULES = 20;
	?>
</head>

<body>
	<h1>Exercice 2 Array</h1>
	<?php
	$tab = [];
	echo "<h2>Tableau de 20 Cellules rempli au hasard</h2>";
	for ($i = 0; $i < NB_CELLULES; $i++) {
		$tab[] = mt_rand(RAND_MIN, RAND_MAX);

		echo "\$tab[$i] = $tab[$i]<br />\n";
	}

	echo '<h2>La somme des cellules est : ' . array_sum($tab) . '</h2>';

	echo '<h2>Trier en ordre ascendant</h2>';
	sort($tab);
	print_r($tab);

	echo '<h2>Trier en ordre descendant</h2>';
	rsort($tab);
	print_r($tab);


	echo '<h2>Enlever la duplication </h2>';
	$tab = array_unique($tab);
	print_r($tab);

	echo '<h2>Enlever les "trous" dans les index</h2>';
	$tab = array_values($tab);
	print_r($tab);

	echo '<h2>Autres exemples de fonctions</h2>';

	//autres fonctions intéressantes
	array_pop($tab); //enlève derniere cellule
	var_dump($tab);

	array_push($tab, 20); //ajouter 20 à la fin
	var_dump($tab);

	array_shift($tab); //enlève la 1e cellule
	var_dump($tab);

	$aNombres = range(1, 100); //retourne un tableau avec nombres de 1 à 100
	var_dump($aNombres);

	?>
</body>

</html>