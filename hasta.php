<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}
if(isset($_POST["email"])){
	$GelenHastaEmail		=	$_POST["email"];
}else{
	$GelenHastaEmail		=	"";
}
if(isset($_POST["sifre"])){
    $GelenHastaSifre		=	$_POST["sifre"];
}else{
    $GelenHastaSifre		=	"";
}


$HastalarSorgusu       = $VeritabaniBaglantisi->prepare("SELECT * FROM hastalar where email = ? and tlfno = ?");  //sadece ilk kaydı alır
$HastalarSorgusu->execute([$GelenHastaEmail,$GelenHastaSifre]);  //sorguyu çalıştır
$HastaSayisi           = $HastalarSorgusu->rowCount();  //sorgudan kaç kayıt döndüğünü sayar
$Hasta                 = $HastalarSorgusu->fetch(PDO::FETCH_ASSOC);  //sorgudan gelen kayıtları diziye atar


if($HastaSayisi>0){
    setcookie("HastaID", $Hasta["hastid"], time()+60*60*3, "/");  //Hasta id'sini cookie olarak kaydet
    header("Location:HastaSistemi.php");   //HastaSistemi.php sayfasına yönlendir
    exit();
}else{
    header("Location:index.php");       //index.php sayfasına yönlendir
    exit();
}

?>