<?php
    session_start();
    if(isset($_SESSION['user'])) {
    }else{
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="sidebar.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
</head>
<body>

<div id="mySidebar" class="sidebar">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="dashboard_og.php">Ongoing Appointments</a>
    <a href="dashboard_d.php">Done Appointments</a>
    <a href="dashboard_c.php">Cancelled Appointments</a>
    <a href="logout.php?logout">Logout</a>
</div>

<div id="main">
  <button onclick="openNav()" class="openbtn btn btn-md btn-outline-info">☰</button>  
    <div class="container shad">
        <h1 class="text-center title">Cancelled Appointments</h1>
        <table class="table mt-4">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Last name</th>
                <th>First name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Appointment</th>
                <th>Date</th>
                <th>Time</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
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

               $query = "SELECT * FROM customer_information WHERE status = 'cancelled' order by id DESC";
               $result = $mysqli->query($query);     
               while($customer_information=$result->fetch_assoc()) {      
                  echo "<tr>";
                  echo "<td> {$customer_information['id']} </td>";
                  echo "<td> {$customer_information['LastName']} </td>";
                  echo "<td> {$customer_information['FirstName']} </td>";
                  echo "<td> {$customer_information['Sex']} </td>";
                  echo "<td> {$customer_information['address']} </td>";
                  echo "<td> {$customer_information['contact']} </td>";
                  echo "<td>  {$customer_information['transaction']} </td>";
                  echo "<td> {$customer_information['Date']} </td>";
                  echo "<td> {$customer_information['Time']} </td>";
                  echo "<td> 
                  <a class='btn btn-sm btn-outline-primary mt-1' href='update.php?id={$customer_information['id']}&s=On going'>Return</a>";
                  echo "</tr>";      
               }
                if(isset($connection)) {
                      mysql_close($connection);
                }
                ?>
            </tbody>
      </table>
    </div>
</div>


</body>
</html> 
