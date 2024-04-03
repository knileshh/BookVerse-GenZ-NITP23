<?php
//connecting to the database

$servername = "localhost";
$username = "root";
$password = "";
$db = "studentrecords";

$conn;

try{
    $conn = mysqli_connect($servername, $username, $password, $db);
    echo "DB Connection Successful <br>";
}

catch(Exception $e){
    if(! $conn){
        die("Failed to Login".mysqli_connect_error());
    }
}

//Now the query to search and display the data of user.

$firstName = $_POST["firstName"];
$pass = $_POST["pass"];


$sql = "SELECT * FROM `studentlist` WHERE `First Name` LIKE '$firstName' AND `Password` LIKE '$pass' " ;

$info = mysqli_query($conn, $sql);

if(mysqli_num_rows($info) > 0){
    while($row = mysqli_fetch_assoc($info)){ {
               echo ("<script>location.href='folder1/index.html'</script>");
          }
          exit;
     //echo "<br>"."<b>Name:</b> ". $row["First Name"]."<br>"."<b>Mobile:</b> " . $row["Mobile"]."<br>" ."<b>E-Mail:</b> ". $row["Email"]."<br>" ;
    }
} else{
   // echo "<br>0 Results Found for <b>$firstName</b> and <b>$mob</b>";
    echo "<h3>Please Check details or <a href='index.html'>Register</a>.</h3>";

    echo "<a href='login.html'>Go Back</a>";
}
