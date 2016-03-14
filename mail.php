<?php

//mail.php
require_once __DIR__ . '/vendor/autoload.php';

class FakeMail {

	public $subject;
	public $body;

	public function __construct($subject, $body) {
		$this->subject = $subject;
		$this->body = $body;
	}

}
$loader = new Twig_Loader_Filesystem('Resources/views');
$twig = new Twig_Environment($loader);

$twigMailTemplate = $twig->loadTemplate('mail.twig');
/* @var $twigMailTemplate Twig_Template */

$mailSubject = $twigMailTemplate->renderBlock('subject', [
	'fullName' => 'Quentin Tarantino',
]);
$mailBody = $twigMailTemplate->renderBlock('body', [
	'firstName' => 'Quentin',
	'mailBody' => 'I really like your movies :)',
]);

$fakeMail = new FakeMail($mailSubject, $mailBody);

echo $fakeMail->subject;
echo $fakeMail->body;

