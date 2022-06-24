Chnage Paswword :
<?php 
if (isset($_POST['passwordsubmit']))
{
	$newpassword=$_POST['newpass'];
	$repassword=$_POST['repass'];
	
	if(!empty($newpassword) && !empty($repassword))
	{
		if($newpassword = $repassword)
		{
			$success="Login Successful";
		}
		else
		{
			$error="password problem";
		}
	}
	else
	{
		$error="please fill up password";
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
	Current Password:
	<div>
	<input type="text" name="pass">
	</div>
	<br>
	New Password:
	<div>
	<input type="newpassword" name="newpass">
	</div>
	
	Retype New Password:
	<div>
	<input type="repassword" name="repass">

	</div>
    <input type="submit" name="passwordsubmit" value="Submit">

</form>