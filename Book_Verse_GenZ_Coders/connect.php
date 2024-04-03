<?php

$firstName = $_POST["fname"];
$pass = $_POST["pass"];
$mobileNo = $_POST["mobNo"];
$email = $_POST["email"];



$servername = "localhost";
$username = "root";
$password = "";
$db = "studentrecords";

$conn;

//echo "<nav><ul><li><a href='home.html'>Home</a></li><li><a href='login.html'>Login</a></li></ul></nav>";

try{
    $conn = mysqli_connect($servername,$username,$password,$db);
   // echo "Connection Successful";
}

catch(Exception $e){
    if(!$conn){
        die("Failed to Connect:".mysqli_connect_error());
    }
}

//always better to copy the query format from the userInteface,
//just to be on the safe side, since queries vary a lot.
$sql = "INSERT INTO `studentrecords`.`studentlist` (`First Name`, `Password`, `Mobile`, `Email`) VALUES ('$firstName', '$pass', '$mobileNo', '$email')";

$result = mysqli_query($conn, $sql);

if($result){
     // echo "<br>"."<h2>The record has been inserted</h2>";
     echo ("<script>location.href='login.html'</script>");
}else{
    echo "Failed to insert record: ".mysqli_error($conn);
}
mysqli_close($conn);

?>