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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $transaction =validate($_POST["order"]);
       $lname = validate($_POST["lastname"]);
       $fname = validate($_POST["firstname"]);  
       $address = validate($_POST["address"]);   
       $contact = validate($_POST["contact"]);
       $date= validate($_POST["Date"]); 
       $time= validate($_POST["Time"]); 

       $status = "On going";
       if($_POST["sex"] == "male")
          $sex = "m";
       else
          $sex = "f";

    $query = "INSERT INTO customer_information (LastName, FirstName, Sex, address, contact,transaction,status,Date,Time) "; 
    $query = $query . "VALUES ('{$lname}', '{$fname}', '{$sex}', '{$address}', '{$contact}', '{$transaction }','{$status}','{$date}','{$time}')";
    if ($mysqli->query($query) === TRUE) {
                  echo "<script type='text/javascript'>alert('Saved');</script>";

    } 
    else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }




    }
    echo "$msg <br>";

?>

