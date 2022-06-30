<?php
include("baglan.php");

$sinif_adi = $_POST['sinif-adi'];
$kontenjan = $_POST['kontenjan'];

if($_POST['isl'] == "yeni_kayit"){
	$query = $db->prepare("INSERT INTO t_siniflar set 
		Sinif_Adi=:Sinif_Adi,
		Kontenjan=:Kontenjan,
		FakulteID=:FakulteID,
		BolumID=:BolumID
		");
	$ekleme_durumu = $query->execute(array(
		'Sinif_Adi' =>$_POST['sinif-adi'],
		'Kontenjan' =>$_POST['kontenjan'],
		'FakulteID' =>$_POST['fakulteid'],
		'BolumID' =>$_POST['bolumid']
		

	));

	if ($ekleme_durumu){
		header("Location:../production/sinif-ekle.php?islem_sonucu=2");
	}
	else
	{
		header("Location:../production/sinif-ekle.php?islem_sonucu=3");
	}
}

if($_POST['isl'] == "guncelle"){
	$query = $db->prepare("UPDATE t_siniflar SET  Sinif_Adi=?, Kontenjan =? WHERE ID=?"); 
	$update = $query->execute(array( $sinif_adi,$kontenjan )); 
	if ( $update ){ 
		header("Location:../production/sinif-ekle.php");
	}
}


?>