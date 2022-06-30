<?php
include("baglan.php");

$id = $_POST['id'];
$tc = $_POST['tc'];
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$unvan = $_POST['unvan'];
$akademisyenno = $_POST['akademisyenno'];
$sifre = $_POST['sifre'];

if($_POST['isl'] == "yeni_kayit"){
	$query = $db->prepare("INSERT INTO t_akademisyen set 
		Tc=:Tc,
		Ad=:Ad,
		Soyad=:Soyad,
		Unvan=:Unvan,
		AkademisyenNo=:AkademisyenNo,
		Sifre=:Sifre
		");
	$ekleme_durumu = $query->execute(array(
		'Tc' =>$_POST['tc'],
		'Ad' =>$_POST['ad'],
		'Soyad' =>$_POST['soyad'],
		'Unvan' =>$_POST['unvan'],
		'AkademisyenNo' =>$_POST['akademisyenno'],
		'Sifre' =>$_POST['sifre']

	));

	if ($ekleme_durumu){
		header("Location:../production/akademisyen-ekle.php?islem_sonucu=2");
	}
	else
	{
		header("Location:../production/akademisyen-ekle.php?islem_sonucu=3");
	}
}

if($_POST['isl'] == "guncelle"){
	$query = $db->prepare("UPDATE t_akademisyen SET  Tc=?, Ad =?, Soyad =?, Unvan=?, Sifre=? WHERE ID=?"); 
	$update = $query->execute(array( $tc,$ad,$soyad,$unvan,$akademisyenno,$sifre )); 
	if ( $update ){ 
		header("Location:../production/akademisyen-ekle.php");
	}
}


?>