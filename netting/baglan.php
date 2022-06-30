<?php
try {
	$db = new PDO("mysql:host=localhost;dbname=obs", "root", "");
}catch ( PDOException $e ){
	print $e->getMessage();
}
?>