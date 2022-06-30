<?php
include("baglan.php");

$ad = $_POST['ad'];
$fakultekodu = $_POST['fakultekodu'];

if($_POST['isl'] == "yeni_kayit"){
  $query = $db->prepare("INSERT INTO t_fakulte set 
    Adi=:Adi,
    Fakulte_Kodu=:Fakulte_Kodu
    ");
  $ekleme_durumu = $query->execute(array(
    'Adi' =>$_POST['ad'],
    'Fakulte_Kodu' =>$_POST['fakultekodu']

  ));

  if ($ekleme_durumu){
    header("Location:../production/fakulte-ekle.php?islem_sonucu=2");
  }
  else
  {
    header("Location:../production/fakulte-ekle.php?islem_sonucu=3");
  }
}

if($_POST['isl'] == "guncelle"){
  $query = $db->prepare("UPDATE t_fakulte SET  Ad =?, Fakulte_Kodu =? WHERE ID=?"); 
  $update = $query->execute(array( $ad,$soyad,$fakultekodu)); 
  if ( $update ){ 
    header("Location:../production/fakulte-ekle.php");
  }
}


?>