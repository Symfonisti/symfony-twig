<?php

//sandbox-example.php
require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('Resources/views');
$twig = new Twig_Environment($loader);

$tags = ['if'];
$filters = ['upper', 'escape'];
$methods = [
	'Article' => ['getTitle', 'getBody']
];
$properties = [
	'Article' => ['title', 'body']
];
$functions = ['range'];

$policy = new Twig_Sandbox_SecurityPolicy($tags, $filters, $methods, $properties, $functions);

$sandbox = new Twig_Extension_Sandbox($policy);
$twig->addExtension($sandbox);

echo $twig->render('sandbox-example.html.twig');
