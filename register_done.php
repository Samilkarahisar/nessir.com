<?php
$ad = $_POST['ad'];
$kullaniciadi = $_POST['kullaniciadi'];
$sifre = $_POST['sifre'];
$posta = $_POST['posta'];
if(empty($ad)){
echo("<center><b>Ad&#305;n&#305;z&#305; Yazmad&#305;n&#305;z. L�tfen Geri D�n�p Doldurunuz.</b></center>");
}elseif(empty($kullaniciadi)){
echo("<center><b>Kullan&#305;c&#305; ad&#305; vermedinizi; Yazmad&#305;n&#305;z. L�tfen Geri D�n�p Doldurunuz.</b></center>");
}elseif(empty($sifre)){
echo("<center><b>Sifreniz eksik. L�tfen Geri D�n�p Doldurunuz.</b></center>");
}elseif(empty($posta)){
echo("<center><b>Eposta vermediniz. L�tfen Geri D�n�p Doldurunuz.</b></center>");
}
else{
include("db_settings.php");

$sql = $conn->query("insert into uye (ad, kullaniciadi, sifre, email, hakkimda)
values ('$ad', '$kullaniciadi', '".md5($sifre)."', '$posta', '$hakkimda')");

}
if (isset ($sql)){
echo "�ye kayd&#305;n&#305;z tamamlanm&#305;&#351;t&#305;r.";

header("Location: http://nessir.com/login.php");
exit;
}
else {
echo "Kay&#305;t ba&#351;ar&#305;s&#305;z, samilkarahisar@gmail.com adresine bir email yollay&#305;n&#305;z.";
}
?>