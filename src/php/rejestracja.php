<?php
echo "dsada";
session_start();

require("./connect.php");

$login = $_POST['login_rejestracja'];
$haslo = $_POST['haslo_rejestracja'];
$email = $_POST['email_rejestracja'];

$sql="INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `EMAIL`) VALUES (NULL, '$login', '$haslo', '$email');";

$result= $conn->query($sql);



$conn->close();
require("../po_rejestracji.html");
?>