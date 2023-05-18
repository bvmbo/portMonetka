<?php
session_start();
if (!isset($_SESSION['zalogowany'])) { 
    $_SESSION['count'] = False; 
}
require("./connect.php");

$email = $_POST['email_logowanie'];
$haslo = $_POST['haslo_logowanie'];

$sql_email="SELECT * FROM `users` WHERE EMAIL like '$email';";
$sql_haslo="SELECT PASSWORD FROM `users` WHERE PASSWORD like '$haslo';";

$result_email=$conn->query($sql_email);
$result_haslo=$conn->query($sql_haslo);


while ($row = $result_email->fetch_assoc()) {
    $wlasciwy_mail=$row['EMAIL'];
}
while ($www = $result_haslo->fetch_assoc()) {
    $wlasciwe_haslo=$www['PASSWORD'];
}

if(isset($wlasciwy_mail) && $wlasciwy_mail==$email && isset($wlasciwe_haslo) && $wlasciwe_haslo==$haslo){
    $_SESSION['zalogowany'] = TRUE;
}
else{
    $_SESSION['zalogowany']=FALSE ;   
}

$conn->close();
?>