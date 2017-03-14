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
	
	if (isset($_GET['device'])){
		
	}else{
		header("Location: search.php");
	}

	$deviceserial=mysqli_real_escape_string($con, $_GET['device']);
	$sql = "SELECT equipmentnumber, equipmentname, equipmentmodel, equipmentserial, equipmentlocation, equipmentowner, equipmentdatepurchase, concat('Php.', format(equipmentprice, 2)) as equipmentprice, equipmentbranch, maintenancesched, personincharge FROM equipmentlist WHERE equipmentserial='".$deviceserial."'";
	$result = $con->query($sql);
	echo "<body bgcolor='FFCOCO' style='Font-family:Arial'>";
	echo "<center><H1>Outbound Service Card</H1></center>";
	if ($result->num_rows > 0){
		echo "<center>";
		echo "<table border='2' class='customtable2'>";
		echo "<caption><b>Equipment Information<b></caption>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td><b>Equipment Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentnumber']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><b>Equipment Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentname']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><b>Equipment Brand and Model&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentmodel']."</td>";
			echo "</tr>";
			echo "<td><b>Serial Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentserial']."</td>";
			echo "</tr>";
			echo "<td><b>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentlocation']."</td>";
			echo "</tr>";
			echo "<td><b>Owner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentowner']."</td>";
			echo "</tr>";
			echo "<td><b>Acquisition Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentdatepurchase']."</td>";
			echo "</tr>";
			echo "<td><b>Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentprice']."</td>";
			echo "</tr>";
			echo "<td><b>Branch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['equipmentbranch']."</td>";
			echo "</tr>";
			echo "<td><b>Maintenance Schedule&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['maintenancesched']."</td>";
			echo "</tr>";
			echo "<td><b>Person-in-charge&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</b></td>";
			echo "<td align='center'>".$row['personincharge']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
	
?>
<html>
<head></head>

<body>
<style>
table.customtable{
border: 10px solid;
border-color: #396D5B;
	-webkit-border-radius: 10px;
	-webkit-transition: 200ms linear 0s;
    -moz-border-radius: 10px;
	border-radius: 50px;
	-webkit-box-shadow: 0px 0px 30px 0px;
	-moz-box-shadow:    0px 0px 30px 0px;
	box-shadow:         0px 0px 30px 0px;
}

table.customtable2{
border: 10px solid;
border-color: #396D5B;
}
</style>
<center>
<table style="width:45%" class="customtable">
<tr><!--service card-->
<td colspan="2"><p style="text-align:center; font-size:260%">Service Card</p></td>
</tr>

<tr><!--date-->
<td width="50%"style="text-align:right">Date</td>

<td width="50%" style="padding-top:2%"><form action="" method="post">
	<input type="date" name="servicedate"/>
</form></td>

</tr>

<tr><!--condemned-->
<td colspan="2" style="text-align:right; padding-right:5%"><form action="" method="GET">
	<input type="checkbox" id="CondemnBox" onclick="EnableTextbox('CondemnBox', 'CondemnedDate')">Condemned</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Condemn Date
<input type="text" id="CondemnedDate" disabled/>

	<script language="javascript">

	
	function EnableTextbox(ObjChkId,ObjTxtId)
	{

    if(document.getElementById(ObjChkId).checked)
        document.getElementById(ObjTxtId).disabled = false;
    else
        document.getElementById(ObjTxtId).disabled = true;
	}
    </script>

	
</tr>

<tr><!--remarks-->
<td style="text-align:right">Remarks</td>

<td style="padding-top:2%">
	<input type="text" name="remarks"/>
</td>
</tr>

<tr><!--service type-->
<td style="text-align:right">Service Type</td>

<td style="padding-top:2%">
	<input type="radio" name="servicetype"/>Inbound
	<input type="radio" name="servicetype"/>Outbound
</td>
</tr>

<tr><!--preventive maintenance-->
<td style="text-align:right">Preventive Maintenance</td>

<td style="padding-top:2%">
	<input type="radio" name="prevmaintenanceradio" value="Yes"/>Yes
	<input type="radio" name="prevmaintenanceradio" value="No"/>No
</td>
</tr>

<tr><!--cost of repair-->
<td style="text-align:right">Cost of Repair</td>

<td style="padding-top:2%">
	<input type="number" name="cost"/>
</td>
</tr>

<tr><!--serviced by-->
<td style="text-align:right" >Serviced by</td>


<td style="padding-top:2%">
	<input type="text" name="serve" />
</td>
</tr>
