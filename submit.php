<?php
if (isset($_GET['dd'])){
$datafromdropdown=$_GET['dd'];
echo $datafromdropdown;
}else{
	echo "
	<form method='get' action='submit.php'>
		<select name='dd'>
			<option value='Fresh Milk'>Fresh Milk</option>
			<option value='Old Cheese'>Old Cheese</option>
			<option value='Hot Bread'>Hot Bread</option>
			</select>
		<input type='submit' value='submit' />
	</form>";
	
}
?>