<html>
<head></head>

<style>
body {
		background-size: cover;
		background-position: top center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		font-family:Arial;
	}
</style>

<body background="centro-escolar-university-manila.png">
<style>

p{
color: #ffffff;
    text-shadow: -4px 4px 10px #070948, 4px -4px 10px #464807;
}
table{
border: 10px solid;
border-color: #396D5B;

}

a{
	text-decoration:none;
	color:black;
}
a:visited{
	color:black;
}
script{
	-moz-border-radius: 15px;
	border-radius: 15px;
    border:solid 1px black;
    padding:5px;
}
</style>
<center>
<p style="text-align:center; font-size:260%">CEU TLTD Preventive Maintenance Web System</p>
<table style="width:100%; padding-top:20px" bgcolor="#ffffff">

<tr>

<td style="text-align:left; font-size:105%; width:50%; padding-left:20px">
<form action="" method="GET">
	Equipment Name: <input type="text" name="search"/>
<input type="submit" value="Go" onClick="myFunction()"/>
</form>
</td>

<td style="text-align:right; font-size:105%; width:50%; padding-right:20px">
<form action="logout.php" method="GET">
	<a href='logout.php'><input type='submit' value='Logout' style="float:right"/></a>
</form>
</td>
<tr>

</table>

</center>

</body>
</html>

<?php
	session_start();
	$host="localhost";
	$user="root";
	$pass="microcircle";
	$db="ceutltdprevmaintenance";
	$con=mysqli_connect($host, $user, $pass, $db);

	if (isset($_SESSION['state'])) {
		
	}else{
		header("Location: login.php");
	}
	
	if (isset($_GET['search'])){
		$search = mysqli_real_escape_string($con, $_GET['search']);
		$sql = "SELECT equipmentnumber, equipmentname, equipmentmodel, equipmentserial, equipmentlocation, equipmentowner, equipmentdatepurchase, concat('Php.', format(equipmentprice, 2)) as equipmentprice, equipmentbranch, maintenancesched, personincharge FROM equipmentlist where equipmentname like '%".$search."%'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			echo "<table border='1' style='background-color:white'>
			<tr>
			<th>Equipment Number</th>
			<th>Equipment Name</th>
			<th>Equipment Brand/Model</th>
			<th>Equipment Serial</th>
			<th>Equipment Location</th>
			<th>Equipment Owner</th>
			<th>Acquisition Date</th>
			<th>Price</th>
			<th>Branch</th>
			<th>Maintenance Schedule</th>
			<th>Person-in-charge</th>
			</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td align='center'>". $row["equipmentnumber"]. "</td>";
				echo "<td>". $row["equipmentname"]. "</td>";
				echo "<td>". $row["equipmentmodel"]. "</td>";
				echo "<td><a href='servicecard.php?device=".$row["equipmentserial"]."'>". $row["equipmentserial"]. "</td></a>";
				echo "<td>". $row["equipmentlocation"]. "</td>";
				echo "<td>". $row["equipmentowner"]. "</td>";
				echo "<td>". $row["equipmentdatepurchase"]. "</td>";
				echo "<td>". $row["equipmentprice"]. "</td>";
				echo "<td>". $row["equipmentbranch"]. "</td>";
				echo "<td>". $row["maintenancesched"]. "</td>";
				echo "<td>". $row["personincharge"]. "</td>";
				$counter+=1;
			}
			echo "</tr>";
			echo "</table>";
			echo "
			
				<script language='Javascript'>
			alert ('".$counter." Devices on View')
			</script>
			
			
			";
		}else{
			echo "0 results";
		}	
	}else{
		$sql = "SELECT equipmentnumber, equipmentname, equipmentmodel, equipmentserial, equipmentlocation, equipmentowner, equipmentdatepurchase, concat('Php.', format(equipmentprice, 2)) as equipmentprice, equipmentbranch, maintenancesched, personincharge FROM equipmentlist";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			echo "<table border='1' style='background-color:white'>
			<tr>
			<th>Equipment Number</th>
			<th>Equipment Name</th>
			<th>Equipment Brand/Model</th>
			<th>Equipment Serial</th>
			<th>Equipment Location</th>
			<th>Equipment Owner</th>
			<th>Acquisition Date</th>
			<th>Price</th>
			<th>Branch</th>
			<th>Maintenance Schedule</th>
			<th>Person-in-charge</th>
			</tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td align='center'>". $row["equipmentnumber"]. "</td>";
				echo "<td>". $row["equipmentname"]. "</td>";
				echo "<td>". $row["equipmentmodel"]. "</td>";
				echo "<td><a href='servicecard.php?device=".$row["equipmentserial"]."'>". $row["equipmentserial"]. "</td></a>";
				echo "<td>". $row["equipmentlocation"]. "</td>";
				echo "<td>". $row["equipmentowner"]. "</td>";
				echo "<td>". $row["equipmentdatepurchase"]. "</td>";
				echo "<td>". $row["equipmentprice"]. "</td>";
				echo "<td>". $row["equipmentbranch"]. "</td>";
				echo "<td>". $row["maintenancesched"]. "</td>";
				echo "<td>". $row["personincharge"]. "</td>";
				$counter+=1;
			}
			echo "</tr>";
			echo "</table>";
			echo "
			
				<script language='Javascript'>
			alert ('".$counter." Devices on View ".$_SESSION['user']."')
			</script>
			
			
			";
		}else{
			echo "No Records";
		}
		echo $_SESSION['user'];
	}

?>