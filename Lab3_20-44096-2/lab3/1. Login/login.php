LOGIN
<?php 
if (isset($_POST['login']))
{
	$name=$_POST['uname'];
	$password=$_POST['pass'];
	
	if(!empty($name) && !empty($password))
	{
		if($name>=2 && $password>=8)
		{
			$success="Login Successful";
		}
		else
		{
			$error="password or username problem";
		}
	}
	else
	{
		$error="please fill up name and password";
	}
}
//this is for practice purpose
/*	session_start();

	$username = "admin";
	$password = "admin";

	if (isset($_POST['uname'])) {
		if ($_POST['uname']==$username && $_POST['pass']==$password) {
			$_SESSION['uname'] = $username;
			header("location:welcome.php");
		}
		else{
			$msg = "username or password invalid";
		}
	} */
 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<span><?php
		if (isset($success)) {
			echo $success;
		}

	 ?>	 	
	 </span>
	 	<span><?php
		if (isset($error)) {
			echo $error;
		}

	 ?>	 	
	 </span>
	 <br>
	Username:
	<div>
	<input type="text" name="uname">
	</div>
	<br>
	Password:
	<div>
	<input type="password" name="pass">
	</div>
	<div class="field-group">
		<div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
		<label for="remember-me">Remember me</label>
	</div>
	<br>
	<input type="submit" name="login" value="Login">

</form>