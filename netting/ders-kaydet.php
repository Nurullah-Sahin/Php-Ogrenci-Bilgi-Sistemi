<?php
include("baglan.php");

$ders_adi = $_POST['ders-adi'];
$ders_kodu = $_POST['ders-kodu'];
$kredi = $_POST['kredi'];
$ects = $_POST['ects'];

if($_POST['isl'] == "yeni_kayit"){
	$query = $db->prepare("INSERT INTO t_dersler set 
		Ders_Adi=:Ders_Adi,
		Ders_Kodu=:Ders_Kodu,
		Kredi=:Kredi,
		Ects=:Ects,
		BolumID=:BolumID,
		SinifID=:SinifID,
		AkademisyenID=:AkademisyenID


		");
	$ekleme_durumu = $query->execute(array(
		'Ders_Adi' =>$_POST['ders-adi'],
		'Ders_Kodu' =>$_POST['ders-kodu'],
		'Kredi' =>$_POST['kredi'],
		'Ects' =>$_POST['ects'],
		'BolumID' =>$_POST['bolumid'],
		'SinifID' =>$_POST['sinifid'],
		'AkademisyenID' =>$_POST['akademid']
		

	));

	if ($ekleme_durumu){
		header("Location:../production/ders-ekle.php?islem_sonucu=2");
	}
	else
	{
		header("Location:../production/ders-ekle.php?islem_sonucu=3");
	}
}

if($_POST['isl'] == "guncelle"){
	$query = $db->prepare("UPDATE t_dersler SET  Ders_Adi=?, Ders_Kodu =?, Kredi =?, Ects=? WHERE ID=?"); 
	$update = $query->execute(array( $ders_adi,$ders_kodu,$kredi,$ects )); 
	if ( $update ){ 
		header("Location:../production/ders-ekle.php");
	}
}


?>