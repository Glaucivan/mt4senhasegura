<?php
require '../login/cadastro/config.php';

if(isset($_GET['id']) && empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);

	$sql = "DELETE FROM dispositivos WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: registros.php");

} else {
	header("Location: registros.php");
}
?>