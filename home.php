<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<form method="POST">
<input type="submit" name="submit" value="logout">

</form>
<?php
if(isset($_POST['submit'])){
setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
header("location:login.php");
}
?>
</body>
</html>
