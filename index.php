<?php
	session_start();
	echo "
	<html>
		<head><title>CEU TLTD Preventive Maintenance System</title>
		<style>
			.city {
			position:fixed;
			top:50%;
			left:50%;
			margin-top:-50px;
			margin-left:-300px;
			}
		</style>
		<link rel='shortcut icon' href='CEULogo.png'>
		</head>
		<body background='centro-escolar-university-manila.png' style='Font-family:Arial;background-repeat:no-repeat;background-size:cover'>
			<center>
				<H1>CEU TLTD Outbound Equipment Service Card</H1>";
				if (isset($_SESSION['state'])){
					echo "<a href='login.php'>Continue as ".$_SESSION['user']."</a><br>";
					echo "<a href='logout.php'>Use another Account</a><br>";
				}else{
					echo "<a href='login.php'>Log-In</a><br>";
				}
				
			echo "</center>
		</body>
	</html>";

?>

