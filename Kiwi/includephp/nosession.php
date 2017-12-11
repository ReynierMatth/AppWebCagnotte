<?php
session_start();
require("./includephp/auth.php");
if(Auth::isLogged()){
    header('Location:./php/liste.php');
}
?>