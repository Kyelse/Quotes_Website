<?php
//Page for login out
//Author: Quan Nguyen
session_start(); 
unset($_SESSION['user']); 
header("Location: view.php" );
?>