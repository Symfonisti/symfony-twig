<?php

//extension-example.php
require_once __DIR__ . '/vendor/autoload.php';

class MyTwigExtension extends Twig_Extension {

	public function getName() {
		return 'myTwigExtension';
	}

	public function getFilters() {
		return [
			new Twig_SimpleFilter('md5', [$this, 'myMd5Filter']),
		];
	}

	public function getFunctions() {
		return [
			new Twig_SimpleFunction('levenshtein', [$this, 'myLevenshteinFunction']),
		];
	}

	public function myMd5Filter($string) {
		return md5($string);
	}

	public function myLevenshteinFunction($string1, $string2) {
		return levenshtein($string1, $string2);
	}

}

$loader = new Twig_Loader_Filesystem('Resources/views');
$twig = new Twig_Environment($loader);
$twig->addExtension(new MyTwigExtension());

echo $twig->render('extension-example.html.twig', [
	'exampleString' => 'exampleString',
	'exampleString2' => 'exampleString2',
]);
