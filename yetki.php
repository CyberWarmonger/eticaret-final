<?php 
session_start();
include("../baglan.php");

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit(0);
}
else {
    if ($_SESSION['role'] == "0") {
        echo  "Yetkiniz bulunmamaktadır!";
        header("Location: ../login.php");
        exit(0);
    }
}
                    
                

?>