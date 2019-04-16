<?php
require '../login/cadastro/config.php';
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false ){
	header("Location: ../index.php");
}else{
header("Location: login.php");
}
?>