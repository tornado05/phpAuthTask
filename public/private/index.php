<?php

require_once __DIR__ . '/Controllers/LoginForm.php';

echo '<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>private html</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div id="error_message">
    <label>login or password incorrect</label>
</div>
<div id="success_login_pass">
    <label>login password success</label>
</div>';
$code = new LoginForm();
echo $code->RenderHTML();
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>';