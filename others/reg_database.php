<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$message = $_POST['message'];
$conn = new mysqli('localhost', 'root', '', 'registration_form');
if ($conn->connect_error) {
   echo "$conn->connect_error";
   die("Connection Failed : " . $conn->connect_error);
} else {
   $stmt = $conn->prepare("insert into registration(name, email, phone, city, message) values(?, ?, ?, ?, ?)");
   $stmt->bind_param("ssiss", $name, $email, $phone, $city, $message);
   $execval = $stmt->execute();
   echo $execval;
   echo "Registration successfully...";
   $stmt->close();
   $conn->close();
}
?>