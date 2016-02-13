<html>
<head>
    <title>New user</title>

</head>
<body>
<form name="new_form" method="POST">
    <label>Fill all fields to add new user:</label><br /><br/>

    <label for="new_login">New user login</label><br>
    <input id="new_login" type="text" name="new_login"><br>

    <label for="new_password1">New user password</label><br>
    <input id="new_password1" type="password" name="new_password1"><br>

    <label for="new_password2">Re-enter new user password</label><br>
    <input id="new_password2" type="password" name="new_password2"><br>
    <br />
    <input type="submit" value="Add user">
    <input type="reset" value="Reset form" />

</form>
<?php



require_once '../../DAL/AppConstants.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_user = $_POST["new_login"];
    $new_pass1 = $_POST["new_password1"];
    $new_pass2 = $_POST["new_password2"];

    if ( !empty($_POST["new_login"]) and !empty($_POST["new_password1"]) and !empty($_POST["new_password2"]) and strcmp($_POST["new_password1"],$_POST["new_password2"]) ==0 ){
        echo "New user: ".$new_user." ".$new_pass2;

        $new_user_arr = array(
            AppConstants::LOGIN => $new_user,
            AppConstants::PASSWORD => $new_pass2,
            AppConstants::IP => '',
            AppConstants::TOKEN => '',
        );

        $path = '../../data/userList.json';
        $current_set = json_decode(file_get_contents($path), true);
        $new_arr[time()]=$new_user_arr;
        $current_set[] = $new_arr;
        file_put_contents($path, json_encode($new_user_arr), FILE_APPEND );

    } else {
        echo "Something wrong with your credentials!";
    }
}
?>
<br />
<form action="../../public/private/index.html">
    <input type="submit" value="Back to start page">
</form>



</body>
</html>