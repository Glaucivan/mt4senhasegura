<?php
require 'cadastro/config.php';

if(isset($_GET['id']) && empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);

	$sql = "DELETE FROM usuario WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: usuarios.php");

} else {
	header("Location: usuarios.php");
}
?>