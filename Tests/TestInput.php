<?php

require_once __DIR__ . '/../public/private/Controllers/Input.php';

$id = 'login';
$type = 'text';
$name = 'login';
$value = '';

$expected = '<input id="'.$id.'" type="'.$type.'" name="'.$name.'" value="'.$value.'">';

$input = new Input();
$input->id = $id;
$input->type = $type;
$input->name = $name;
$input->value = $value;

$acquired = $input->RenderHTML();

if($acquired == $expected){
	echo 'Test passed!';
} else {
	echo 'acquired:'.$acquired;
	echo 'expected:'.$expected;
}