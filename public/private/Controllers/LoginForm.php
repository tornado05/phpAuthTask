<?php

require_once __DIR__ . '/Label.php';

class LoginForm
{
	public function RenderHTML()
	{
		$labelLogin = new Label();
		$labelLogin->value = 'LOGIN';
		$labelPassword = new Label();
		$labelPassword->value = 'PASSWORD';
		
		return 
		'<form id="form_auth" method="post">'.
			$labelLogin->RenderHTML().
			'<br>
			<input id="login" type="text" name="login">'.
			'<br>'.
			$labelPassword->RenderHTML().
			'<br>
			<input id="password" type="password" name="password"><br>
			<input type="submit" value="LogIn">
		</form>';
	} 
}