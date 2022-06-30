<?php
include("baglan.php");

$id = $_POST['id'];
$tc = $_POST['tc'];
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$osympuan = $_POST['osympuan'];
$osympuanturu = $_POST['osympuanturu'];
$sifre = $_POST['sifre'];
$bolumid = $_POST['bolumid'];

if($_POST['isl'] == "yeni_kayit"){

	/*echo $bolumid ;*/
	$query = $db->prepare("INSERT INTO t_ogrenciler set 
		Tc=:Tc,
		Ad=:Ad,
		Soyad=:Soyad,
		Osym_Puan=:Osym_Puan,
		Osym_Puan_Turu=:Osym_Puan_Turu,
		OgrenciNo=:OgrenciNo,
		Sifre=:Sifre,
		BolumID=:BolumID
		");
	$ekleme_durumu = $query->execute(array(
		'Tc' =>$_POST['tc'],
		'Ad' =>$_POST['ad'],
		'Soyad' =>$_POST['soyad'],
		'Osym_Puan' =>$_POST['osympuan'],
		'Osym_Puan_Turu' =>$_POST['osympuanturu'],
		'OgrenciNo'=>$_POST['ogrencino'],
		'Sifre' =>$_POST['sifre'],
		'BolumID' =>$_POST['bolumid']

	));

	if ($ekleme_durumu){
		
		header("Location:../production/ogrenci-ekle.php?islem_sonucu=2");
	}
	else{
		header("Location:../production/ogrenci-ekle.php?islem_sonucu=3");

	}
}

if($_POST['isl'] == "guncelle"){
	$query = $db->prepare("UPDATE t_ogrenciler SET  Tc=?, Ad =?, Soyad =?, Osym_Puan=?, Osym_Puan_Turu=?, Bolumadi=?, Sifre=? WHERE ID=?"); 
	$update = $query->execute(array( $tc,$ad,$soyad,$osympuan,$osympuanturu,$bolumadi,$sifre )); 
	if ( $update ){ 
		header("Location:../production/ogrenci-ekle.php");
	}
}


?>