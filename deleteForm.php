<?php 

//connect server
	$username="nadeesha";
	$password="pdnc";
	$hostname="localhost";
	$con=mysqli_connect($hostname,$username,$password);
	
//connect database
	$database=mysqli_select_db($con,"students");
	
//select table 
	$sql="SELECT * FROM student";
	
//get result for all table data
	$result=mysqli_query($con,$sql);

//use row variable for access line by line in result/ database row by row 
echo "<table border=1 align=center>
		<tr bgcolor=#FFFF00>
		<th>St Id</th>
		<th>Name</th>
		<th>Age</th>
		<th>Address</th>
		</tr>";
		$c=0;
	while($row=mysqli_fetch_array($result)){
		if($c%2==0){
			$col="bgcolor=red";
		}
		else{
			$col="bgcolor=green";
		}
			echo "
		<tr $col>
		<td>$row[0]</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		</tr>
		";
		$c++;
		
	}
	echo "</table>";
	
//close server
	mysqli_close($con);
	
?>




<html>
<body>
<form method="post" action="#" name="form" style="text-align:center" >
<br/>
Enter SId: <input type="text" name="searchid" size="10px"   /> 


</form>

<form method="post" action="#" name="form" style="text-align:center" >
<br/>

<input type="submit" name="delete" value="Delete"/><input type="reset" name="reset" /></td>


</form>
</body>
</html>

<?php

if (isset($_REQUEST["delete"])){

	

	$con=mysqli_connect("localhost","nadeesha","pdnc");
	
	
	$database=mysqli_select_db($con,"students");
	
	
$sql="DELETE FROM student WHERE sid=$_POST[searchid]";
	
	
if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}		

	mysqli_close($con);
}
?>