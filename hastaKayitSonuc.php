<?php

$adi = $_POST["adi"];
$soyadi = $_POST["soyadi"];
$tc = $_POST["tc"];
$telefon = $_POST["telefon"];
$email = $_POST["email"];

try {
    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
// echo $Hata->getMessage();    
die();
}

$DoktorEklemeSorgusu = $VeritabaniBaglantisi->prepare("insert into hastalar (adi,soyadi,tcno,tlfno,email) values (?,?,?,?,?)");
$DoktorEklemeSorgusu->execute([$adi,$soyadi,$tc,$telefon,$email]);

?>

<script>
    alert("hasta Kaydı Başarılı");
    // 3sn sonra index.php ye yönlendir
    setTimeout(function(){
        window.location.href = "index.php";
    }, 3000);
</script>