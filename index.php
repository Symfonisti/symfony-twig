<?php

//index.php
require_once __DIR__ . '/vendor/autoload.php';

class Movie {

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @param string $title
	 */
	public function __construct($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

}

$loader = new Twig_Loader_Filesystem('Resources/views');
$twig = new Twig_Environment($loader);
$movieAsObject = new Movie('Kill Bill');
$movieAsArray = ['title' => 'Matrix'];
echo $twig->render('index.html.twig', [
	'movie1' => $movieAsObject,
	'movie2' => $movieAsArray,
]);
// My favourite movie: Kill Bill
// My friend`s favourite movie: Matrix