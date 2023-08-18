<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

//Detabase connection
$coon = new mysqli('localhost','root','','test');
if($conn->connect_error){
 echo "$conn->connect_error";
 die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number)(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->class();
    $stmt->close();
}
?>