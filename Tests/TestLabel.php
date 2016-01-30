<?php

require_once __DIR__ . '/../public/private/Controllers/Label.php';
$value = 'LOGIN';

$expected = '<label>'.$value.'</label>';

$label = new Label();
$label->value = $value;

$acquired = $label->RenderHTML();

if($acquired == $expected){
	echo 'Test passed!';
} else {
	echo 'acquired:'.$acquired;
	echo 'expected:'.$expected;
}