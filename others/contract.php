<?php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$City = $_POST['City'];
$Message = $_POST['Message'];
$conn = new mysqli('localhost','root','','contract_form');
if ($conn->connect_error) {
   echo "$conn->connect_error";
   die("Connection Failed : " . $conn->connect_error);
} else {
   $stmt = $conn->prepare("insert into contract(Name, Email, Phone, City, Message) values(?, ?, ?, ?, ?)");
   $stmt->bind_param("ssiss", $Name, $Email, $Phone, $City, $Message);
   $execval = $stmt->execute();
   echo $execval;
   echo "Contracted successfully...";
   $stmt->close();
   $conn->close();
}
