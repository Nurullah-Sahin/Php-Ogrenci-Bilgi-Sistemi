<?php
include("baglan.php");
$id = $_GET['id'];
$ad = $_GET['ad'];

$query = $db->prepare("DELETE FROM t_siniflar WHERE id = ?"); 
$delete = $query->execute(array( $_GET['id']));

if ( $delete ){ 
	header("Location:../production/sinif-ekle.php?islem_sonucu=2");
}

?>