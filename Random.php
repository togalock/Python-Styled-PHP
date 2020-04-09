<?php

/**

Python libraries for PHP
> Random

Made by H-AL-NKM Alphor at L-AL-ISM.
Some rights reserved.

**/

function random__seed($a = null) {
	if ($a === null) {
		srand();
	}
	else {
		srand((int)$a);
	}
}

function random__randrange($start, $stop, $step = 1) {
	return array_rand(range($start, $stop, $step));
}

function random__randint($a, $b) {
	return rand($a, $b);
}

function random__choice($seq) {
	return array_rand($seq);
}

function random__choices($population, $weights = null, $cum_weights = null, $k = 1) {
	$random_weights = array();
	$results = array();
	
	if (is_null($weights)) {
		if (is_null($cum_weights)) {
			return array_rand($population, $k);
		}
		else {
			$random_weights = $cum_weights;
		}
	}
	else {
		$sum = 0;
		foreach ($weights as $weight) {
			$sum += $weight;
			$random_weights[] = $sum;
		}
		$sum += end($weights);
	}
	
	for ($i = 0; $i < $k; $i++) {
		$number = rand(1, $sum);
		foreach ($random_weights as $index => $weight) {
			if ($number >= $weight) {
				$results[] = $population[$index];
				break;
			}
		}
	}
	
	return $results;
}

function random__shuffle(&$a) {
	return shuffle($a);
}

function random__sample($population, $k) {
	$result = $population;
	shuffle($result);
	return array_slice($result, 0, $k);
}

function random__random() {
	return abs(sin(rand()));
}

function random__uniform($a, $b) {
	return $a + ($b - $a) * abs(sin(rand()));
}

?>
