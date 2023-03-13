<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}
if(isset($_POST["email"])){
	$GelenDoktorEmail		=	$_POST["email"];
}else{
	$GelenDoktorEmail		=	"";
}
if(isset($_POST["sifre"])){
    $GelenDoktorSifre		=	$_POST["sifre"];
}else{
    $GelenDoktorSifre		=	"";
}


$DoktorlarSorgusu       = $VeritabaniBaglantisi->prepare("SELECT * FROM doktorlar where email = ? and tlf = ?");  //sadece ilk kaydı alır
$DoktorlarSorgusu->execute([$GelenDoktorEmail,$GelenDoktorSifre]);  //sorguyu çalıştır
$DoktorSayisi           = $DoktorlarSorgusu->rowCount();  //sorgudan kaç kayıt döndüğünü sayar
$Doktor                 = $DoktorlarSorgusu->fetch(PDO::FETCH_ASSOC);  //sorgudan gelen kayıtları diziye atar


if($DoktorSayisi>0){
    setcookie("DoktorID", $Doktor["id"], time()+60*60*3, "/");  //doktor id'sini cookie olarak kaydet
    header("Location:doktorSistemi.php");   //doktorSistemi.php sayfasına yönlendir
    exit();
}else{
    header("Location:index.php");       //index.php sayfasına yönlendir
    exit();
}

?>