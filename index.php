<?php

//index.php
require_once __DIR__ . '/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('Resources/views');
$twig = new Twig_Environment($loader);
echo $twig->render('index.html.twig', ['name' => 'world']);
// Hello world!