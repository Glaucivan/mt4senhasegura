<?php
require 'config.php';
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false ){
	header("Location: ../login.php");
}else{
header("Location: ../login.php");
}
?>