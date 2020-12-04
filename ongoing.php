<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="dental4search5.css">
<style>

</style>
</head>
<body>



<img src="bannerv1.PNG" alt="Arduino"  width ="102%"id="top">
<div class="navbar">

	<a href="search.php">Return</a>
	
</div>

<h1 style="color:#008CBA; text-align:center;" > All Transaction </h1>


<div class="container">
<?php
$msg = "";
$mysqli = new mysqli("localhost", "root", "", "dentalclinic");
if(!$mysqli){
   die("Database connection failed: " . mysql_error());
}

$database = mysqli_select_db($mysqli,"dentalclinic");
if(!$database){
   die("Database connection failed: " . mysql_error());
}

function validate($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
} 



   $query = "SELECT * FROM customer_information WHERE status = 'On going' order by id DESC";
   $result = $mysqli->query($query);     
    
   echo "<table cellpadding=3 >";
   echo "<tr >";
   echo "<td> <b> Customer ID </b> </td>";
   echo "<td> <b> Last Name </b></td>";
   echo "<td> <b> First Name </b></td>";
   echo "<td> <b> Sex </b></td>";
   echo "<td> <b> Email </b></td>";
   echo "<td> <b> Contact Number </b></td>";
   echo "<td> <b> Transaction </b></td>";
   echo "<td> <b> Status </b></td>";
   echo "<td> <b> Date </b></td>";
   echo "<td> <b> Time </b></td>";
   echo "<td> <b> Edit </b></td>";
   echo "</tr>"; 
   while($customer_information=$result->fetch_assoc()) {      
      echo "<tr>";
      echo "<td> {$customer_information['id']} </td>";
      echo "<td> {$customer_information['LastName']} </td>";
      echo "<td> {$customer_information['FirstName']} </td>";
      echo "<td> {$customer_information['Sex']} </td>";
      echo "<td> {$customer_information['address']} </td>";
      echo "<td> {$customer_information['contact']} </td>";
	  echo "<td>  {$customer_information['transaction']} </td>";

      echo "<td> {$customer_information['status']} </td>";
	  echo "<td> {$customer_information['Date']} </td>";
      echo "<td> {$customer_information['Time']} </td>";
      echo "<td> <a href='update.php?id={$customer_information['id']}'> cancel</a><td>";
      echo "</tr>";      
   }
   echo "</table>"; 
   
   
   





if(isset($connection)) {
      mysql_close($connection);
}
?>
</div>



<div id="ggdiv" style="Background-color:black; color:white;"> 
<h5> This is a sample page for project </h5> 


</div>




</body>
</html>
