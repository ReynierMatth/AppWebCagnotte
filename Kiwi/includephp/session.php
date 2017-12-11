<?php
session_start();
require("../includephp/auth.php");
if (Auth::isLogged()) {
    
} else {
    header('Location:../index.php');
}
?>