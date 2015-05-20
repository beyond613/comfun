<?php
require './functions.php';
$a = [
	'a' => 1,
	'b' => [
		'b1' => 1,
		'b2' => 1,
	],
];
$b = [
	'a' => 1,
	'b' => [
		'b1' => 1,
		'b2' => 1,
	],
];


print_r(array_add($a,$b));
