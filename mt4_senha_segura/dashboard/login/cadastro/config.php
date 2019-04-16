<?php
$dsn = "mysql:dbname=senha_segura;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
	
} catch (PDOException $e) {
	echo "Falhou a conexão: ".$e->getMessage();
}