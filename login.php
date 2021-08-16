<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
	<style>
		*{ margin: 0px; padding: 0px; box-sizing: border-box; }
		.main-div{
			text-align:  center;
		}
		h1{
			padding-top: 60px;
			padding-bottom: 15px;
			font-size: 40px;
		}
		.mail-div{
			width: 350px;
			height: 7vh;
			background-color: red;
			border : 2px solid red;
			margin-left: 510px;
			padding-top: 10px;
			margin-bottom: 10px;
		}
		.facebook-div{
			width: 350px;
			height: 7vh;
			background-color: blue;
			border : 2px solid blue;
			margin-left: 510px;
			padding-top: 10px;
			margin-bottom: 45px;
		}
		a{
			color: white;
			text-decoration: none;
		} 
		.in1, .in2{
			width: 280px;
			height: 6vh;
			margin-top: 15px;
			border: 2px solid gray;
		}
		.btn{
			margin-top: 20px;
			width: 280px;
			height: 5vh;
			border: 2px solid black;

		}
		.btn1{
			margin-top: 10px;
			padding-right: 140px;
			font-size: 20px;

		}
		.box{
						
		}
		h4{
			margin-top: 10px;
			font-size: 20px;
		}
		.container-div a{
			color: blue;

		}
		.container-div a:hover{
			color: red;
			
		}
	</style>
</head>
<body>
	<?php
		include ('connect.php');

		if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = $_POST['pass'];

		$email_query = "select * from entry where email='$email' ";
		$query = mysqli_query($conn, $email_query);

		$email_count = mysqli_num_rows($query);

		if($email_count){
			$email_pass = mysqli_fetch_assoc($query);

			$database_pass = $email_pass['password'];

			$decode_pass = password_verify($password,$database_pass);

			if($decode_pass){
					if (isset($_POST['rememberme'])) {

						setcookie('emailcookie',$email,time()+86400);
						setcookie('passwordcookie',$password,time()+86400);

						header("location:home.php");
					} else {
						header("location:home.php");
					}
					
					?>
					<script>
						alert("Login sucessful")
						location.replace("home.php")
					</script>
					<?php
					}else{
					?>
					<script>
						alert("Password Incorrect")
						
					</script>
					<?php
						} 
					}else{
					?>
					<script>
						alert("Invalid Email")
						
					</script>
					<?php
		}
	}
	?>
<div class="main-div">
	<h1>LOG IN</h1>
	<div class="mail-div">
		<h3><a href="">CONTINUE WITH GOOGLE</a></h3>
	</div>	
	<div class="facebook-div">
		<h3><a href="">CONTINUE WITH FACEBOOK</a></h3><br><br>
	---------------------OR-----------------------
	</div>
	<div class="container-div">
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<input type="text" name="email" placeholder="ENTER YOUR EMAIL" value="<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } ?>" class="in1" required=""><br>
			<input type="password" name="pass" placeholder="ENTER YOUR PASSWORD" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>" class="in2" required=""><br>
			<div class="btn1">
			<input type="checkbox" name="rememberme" class="box"> Remember me <br>
			</div>
			<input type="submit" name="submit" value="LOG IN" class="btn"><br>

			<h4>Create an account ? <a href="signin.php"> Signin</a></h4>
		</form>
	</div>
</div>
</body>
</html>