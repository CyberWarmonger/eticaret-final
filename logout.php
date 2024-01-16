<?php 
require "baglan.php";
session_start();
if (isset($_POST["logout"])) {
    unset($_SESSION["login"]);
    unset($_SESSION["role"]);
    unset($_SESSION["username"]);
    unset($_SESSION["id"]);


    header("Location: index.php");
    exit(0);
}
?>