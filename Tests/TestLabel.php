<?php

require_once __DIR__ . '/../public/private/Controllers/Label.php';

$expected = '<label>LOGIN</label>';

$label = new Label();
$label->value = 'LOGIN';

$acquired = $label->RenderHTML();

if($acquired == $expected){
	echo 'Test passed!';
} else {
	echo 'acquired:'.$acquired;
	echo 'expected:'.$expected;
}