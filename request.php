<?php

include_once('vendor/httpful.phar');
if (isset($_POST['apikey']) and isset($_POST['celular']))
{
	$_apikey  = $_POST['apikey'];
	$_celular = $_POST['celular'];

	$url = 'http://127.0.0.1/smsapi/api/cancelaInscricao.json';
	$params = array(
		'apikey'  => $_apikey,
		'celular' => $_celular
	);

	$_postResult = 'a';
	$_postResult = \Httpful\Request::post($url)->body($params)->sendsType(\Httpful\Mime::FORM)->send();
	echo json_encode($_postResult->body);
}