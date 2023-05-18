<?php
    session_start();

    if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==True){
        echo json_encode(1);
    }
    else{
        echo json_encode(0);
    }
?>