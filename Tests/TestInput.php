<?php

require_once __DIR__ . '/../public/private/Controllers/Input.php';

$expected = '<input id="login" type="text" name="login" value="">';

$input = new Input();
$input->id = 'login';
$input->type = 'text';
$input->name = 'login';
$input->value = '';

$acquired = $input->RenderHTML();

if($acquired == $expected){
	echo 'Test passed!';
} else {
	echo 'acquired:'.$acquired;
	echo 'expected:'.$expected;
}