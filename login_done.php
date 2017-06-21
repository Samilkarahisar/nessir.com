<?php
  
$kullaniciadi = $_POST['kullaniciadi'];
$sifre = $_POST['sifre'];
  
if ((!$kullaniciadi =="") and (!$sifre =="")) {
include("db_settings.php");

$sql = $conn->query("select * from uye where kullaniciadi='$kullaniciadi' and sifre='".md5($sifre)."'");
$kayitsayisi = mysqli_num_rows($sql);

if ($kayitsayisi == "0") {
header ("Location: login.php?hata=yes");

}

 else {

$kontrol_ok = $sql -> fetch_assoc();
$k=$kontrol_ok["kullaniciadi"];

setcookie(username, $k);

header ("Location: homepage.php");
}
}
else {
header ("Location: login.php?hata=yes");
}
?>