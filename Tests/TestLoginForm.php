<?php

require_once __DIR__ . '/../public/private/Controllers/LoginForm.php';

$expected = '<form id="form_auth" method="post">'.
    '<label>LOGIN</label><br>'.
    '<input id="login" type="text" name="login" value=""><br>'.
    '<label>PASSWORD</label><br>'.
    '<input id="password" type="password" name="password" value=""><br>'.
    '<input id="" type="submit" name="" value="LogIn">'.
	'</form>';

$loginForm = new LoginForm();
$acquired = $loginForm->RenderHTML();

if($acquired == $expected){
	echo 'Test passed!';
} else {
	echo 'acquired:'.$acquired;
	echo 'expected:'.$expected;
}
 