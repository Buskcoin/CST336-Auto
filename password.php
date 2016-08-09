<?php
	session_start();
	if(!isset($_SESSION['username'])){
	header("Location: logout_password.php");
	}
	if (isset($_POST['password1']) && $_POST['password2'] == $_POST['password1']){
		require './db_connection.php';
		require './db_connection.php';
		$sql = "UPDATE auto_admin
		SET password = :password
		WHERE username = :username";
	
		$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":username" => $_SESSION['username'], ":password" => hash("sha1", $_POST['password2'])));
		echo "password";
	} else {
		echo "Passords do not match!!";
	}
?>	
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assignment &amp; 5</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="signin.css">
     
        <script>

function confirmPassword(event) {
var logout = confirm("Do you really want to change your password?");
if (!logout) {
event.preventDefault();
}
}
</script>
  </head>
<div class="container">
<h2>Change Password</h2>
<p class="text-center">Use the form below to change your password. </p>
<form class="form-signin" method="post" id="passwordForm" onsubmit="confirmPassword()">
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
<br>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
<br>
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
</form>
</div>
</html>