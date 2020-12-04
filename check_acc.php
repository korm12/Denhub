
<?php
    session_start();
    $msg = "";
    $mysqli = new mysqli("localhost", "root", "", "dentalclinic");
    if(!$mysqli){
       die("Database connection failed: " . mysql_error());
    }

    $database = mysqli_select_db($mysqli,"dentalclinic");
    if(!$database){
       die("Database connection failed: " . mysql_error());
    }
    
    if(isset($_POST['login'])){
        echo "got here <br/>"; 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT Username, Password FROM employees Limit 1";
        $result = $mysqli->query($query);
        $result = $result->fetch_assoc();
        $uname = $result['Username'];
        $pass = $result['Password'];
        
        if($username == $uname and $pass == $password ){
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;
            header("location:dashboard_og.php");
        }
        else{
            echo"invalid";
            header("location:login.php?Invalid=Incorrect Usernamer or Password");
        }
    }

?>