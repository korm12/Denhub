
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
   $id = $_GET["id"];
   $status = $_GET["s"];
   $query = "UPDATE customer_information SET status = '{$status}' 
             WHERE id = {$id}";
   

if($mysqli->query($query))$msg = "Record has been updated.";
else $msg = "Failed to update the record.";

echo '<script type="text/JavaScript">  
     alert("data is saved");
     window.location.href = "/denhub/dashboard_og.php";
     </script>'
?>
