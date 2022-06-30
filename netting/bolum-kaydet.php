<?php
include("baglan.php");

$bolum_adi = $_POST['bolum_adi'];
$bolum_kodu = $_POST['bolum_kodu'];
$FakulteID = $_POST['kredi'];
$Yıl_suresi = $_POST['yıl_suresi'];

if($_POST['isl'] == "yeni_kayit"){
	$query = $db->prepare("INSERT INTO t_bolumler set 
		Adi=:Adi,
		Bolum_Kodu=:Bolum_Kodu,
		FakulteID=:FakulteID,
		Yil_suresi=:Yil_suresi
		");
	$ekleme_durumu = $query->execute(array(
		'Adi' =>$_POST['bolum_adi'],
		'Bolum_Kodu' =>$_POST['bolum_kodu'],
		'FakulteID' =>$_POST['bolum_kodu'],
		'Yil_suresi' =>$_POST['yil_suresi']
		
	));

	if ($ekleme_durumu){
		header("Location:../production/bolum-ekle.php?islem_sonucu=2");
	}
	else
	{
		header("Location:../production/bolum-ekle.php?islem_sonucu=3");
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