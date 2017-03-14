<?php
	session_start();
	$host="127.0.0.1";
	$user="root";
	$pass="microcircle";
	$db="ceutltdprevmaintenance";
	$con=mysqli_connect($host, $user, $pass, $db);

	if (isset($_SESSION['state'])){
	header("Location: search.php");	
	}else{
		if (isset($_POST['username'])){
		$username=mysqli_real_escape_string($con, $_POST['username']);
		$password=mysqli_real_escape_string($con, $_POST['password']);
		$sql="SELECT * FROM userlist where username='".$username."' AND password=sha2('".$password."', 512)";
		if ($result=mysqli_query($con,$sql)){
			$rowcount=mysqli_num_rows($result);
			$row = $result->fetch_assoc();
			if ($rowcount>=1){
				echo 'Success';
				echo $rowcount;
				$_SESSION["state"]="yes";
				$_SESSION["user"]=$row['fname']." ".$row['lname'];
				mysqli_close($con);
				header("Location: search.php");
				
				die();
			}else{
				echo "<center><H1>Log-in Error!!</H1></center>";
				echo $rowcount;
			}
		}else{
	  echo mysqli_error($con);
		}
	}
	}
	
?>
<html>
	<head>
		<style>
			input{
				-moz-border-radius: 15px;
				border-radius: 15px;
				border:solid 1px black;
				padding:5px;
			}
		</style>
	</head>
	<body bgcolor="FFCOCO" style="Font-family:Arial">
	<center>
	<table>
	<form method="post" action="login.php">
		<tr>
			<td>Username</td>
			<td><Input type="text" name="username"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><Input type="password" name="password"/><br></td>
			</tr>
			<tr>
				<td colspan="2"><center><input type="submit" value="Log-in" /></center></td> 
</form>
</table>
</center>
</body>
</html>