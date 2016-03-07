<?php

//index.php
require_once __DIR__ . '/vendor/autoload.php';

class Movie {

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string|null
	 */
	private $comment;

	/**
	 * @param string $title
	 * @param string|null $comment
	 */
	public function __construct($title, $comment = null) {
		$this->title = $title;
		$this->comment = $comment;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return string|null
	 */
	public function getComment() {
		return $this->comment;
	}

}

$loader = new Twig_Loader_Filesystem('Resources/views');
$twig = new Twig_Environment($loader);
$movies = [
	new Movie('Reservoir Dogs'),
	new Movie('Jackie Brown'),
	new Movie('Grindhouse'),
	new Movie('Pulp Fiction', 'Oscar for Best Writing'),
	new Movie('Kill Bill'),
];
echo $twig->render('index.html.twig', [
	'movies' => $movies,
]);
