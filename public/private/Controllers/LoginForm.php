<?php

require_once __DIR__ . '/Label.php';
require_once __DIR__ . '/Input.php';

class LoginForm
{
	public function RenderHTML()
	{
		$labelLogin = new Label();
		$labelLogin->value = 'LOGIN';
		$labelPassword = new Label();
		$labelPassword->value = 'PASSWORD';
		
		$inputLogin = new Input();
		$inputLogin->id = 'login';
		$inputLogin->type = 'text';
		$inputLogin->name = 'login';
		$inputLogin->value = '';
		
		$inputPassword = new Input();
		$inputPassword->id = 'password';
		$inputPassword->type = 'password';
		$inputPassword->name = 'password';
		$inputPassword->value = '';
		
		$inputSubmit = new Input();
		$inputSubmit->id = '';
		$inputSubmit->type = 'submit';
		$inputSubmit->name = '';
		$inputSubmit->value = 'LogIn';
		return 
		'<form id="form_auth" method="post">'.
			$labelLogin->RenderHTML().
			'<br>'.
			$inputLogin->RenderHTML().
			'<br>'.
			$labelPassword->RenderHTML().
			'<br>'.
			$inputPassword->RenderHTML().
			'<br>'.
			$inputSubmit->RenderHTML().
		'</form>';
	} 
}