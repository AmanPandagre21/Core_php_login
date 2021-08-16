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
			padding-bottom: 5px;
			font-size: 40px;
		}
		h5{
		padding-bottom: 15px;
			font-size: 15px;	
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
			margin-bottom: 10px;
		}
		a{
			color: white;
			text-decoration: none;
		} 
		.in1, .in2, .in3, .in4{
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
	
<div class="main-div">
	<h1>Create Account</h1>
	<h5>Get started with your free account</h5>
	<div class="mail-div">
		<h3><a href="">CONTINUE WITH GOOGLE</a></h3>
	</div>
	<div class="facebook-div">
		<h3><a href="">CONTINUE WITH FACEBOOK</a></h3><br>
	---------------------OR-----------------------
	</div><br>
	<div class="container-div">
		<form action=""  method="POST">
			<?php

				include 'connect.php';

				if (isset($_POST['submit'])) {
					
					$name = mysqli_real_escape_string($conn, $_POST['username']);
					$email = mysqli_real_escape_string($conn, $_POST['email']);
					$password = mysqli_real_escape_string($conn, $_POST['pass']);
					$cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

					$pass = password_hash($password, PASSWORD_BCRYPT);
					$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

					$email_query = "select * from entry where email='$email' ";
					$query = mysqli_query($conn,$email_query);

					$email_count = mysqli_num_rows($query);

					if($email_count>0){
						?>
							<script>
								alert("Email already exists")
							</script>
						<?php
					}else{
						if($password === $cpassword){

							$insert_query = "insert into entry(name, email, password, cpassword) values('$name', '$email', '$pass', '$cpass') ";

							$inquery = mysqli_query($conn,$insert_query);
							
							if($inquery){
								?>
								<script>
									alert("Account created ")
								</script>
								<?php
							}else{
								?>
								<script>
									alert("account not created")
								</script>
								<?php
							}	
						}else{
							?>
							<script>
									alert("Password not Matching")
							</script>
							<?php
						}	
					}
				}
				?>
			<input type="text" name="username" placeholder="ENTER YOUR GOOD NAME" value="" class="in1" required><br>
			<input type="text" name="email" placeholder="ENTER YOUR EMAIL" value="" class="in2" required><br>
			<input type="password" name="pass" placeholder="ENTER YOUR PASSWORD" value="" class="in3" required><br>
			<input type="password" name="cpass" placeholder="CONFIRM PASSWORD" value="" class="in4" required><br>
			<input type="submit" name="submit" value="Create Account" class="btn"><br>
			<h4>Have an account? <a href="login.php"> Login</a></h4>
		</form>
	</div>
</div>
</body>
</html>