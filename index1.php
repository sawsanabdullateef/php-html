<?php
require "conn.php";

if(isset($_POST['login'])){
	$user_name= $_POST['uname'];
	$password= $_POST['psw'];

	$sql= "select count(1) as num_rows from users where user_name= ? and user_password= ?";
	$result= $conn->prepare($sql);
	$result->bind_param("ss",$user_name,$password);
	$result->execute();
	$record= $result->get_result();
	$rows = $record->fetch_assoc();

	if ($rows['num_rows'] > 0){
		echo "<script> location.href='home.php';</script>";
	}
	else{
		echo "user name or password is wrong!!";
	}
}
?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet"  href="css/style1.css">

<body>
	
	<h2><center>Login Form</center></h2>
	<!--Step 1 : Adding HTML-->
	<center>
	<form action="" method="post">
		
		<div class="imgcontainer">
			<img src="image/loginn.png"	alt="Avatar" class="avatar">
		</div>

		<div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit" name ="login" id ="login">Login</button>
			<input type="checkbox" checked="checked"> Remember me
		</div>

		<div class="container" style="background-color:#f1f1f1">
			<button type="button" class="cancelbtn">Cancel</button>
			<span class="psw">Forgot <a href="#">password?</a></span>
		</div>
	</form>
</center>

</body>

</html>
