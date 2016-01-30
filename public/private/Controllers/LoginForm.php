<?php

class LoginForm
{
	public function RenderHTML()
	{
		return 
		'<form id="form_auth" method="post">
			<label>LOGIN</label><br>
			<input id="login" type="text" name="login"><br>
			<label>PASSWORD</label><br>
			<input id="password" type="password" name="password"><br>
			<input type="submit" value="LogIn">
		</form>';
	} 
}