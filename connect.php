<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "signup";

$conn = mysqli_connect($server,$username,$password,$database);
if ($conn) {
		?>
	<script>
		alert("CONNECTION SUCESSFUL");
	</script>
		<?php
}else{
	?>
	<script>
		alert("CONNECTION NOT SUCESSFUL");
	</script>
		<?php
}
?>