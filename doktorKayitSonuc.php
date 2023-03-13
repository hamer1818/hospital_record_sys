<?php

$adi = $_POST["adi"];
$soyadi = $_POST["soyadi"];
$brans = $_POST["brans"];
$klinik = $_POST["klinik"];
$telefon = $_POST["telefon"];
$email = $_POST["email"];

try {
    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
// echo $Hata->getMessage();    
die();
}

$DoktorEklemeSorgusu = $VeritabaniBaglantisi->prepare("insert into doktorlar (adi,soyadi,bransi,klinkno,tlf,email) values (?,?,?,?,?,?)");
$DoktorEklemeSorgusu->execute([$adi,$soyadi,$brans,$klinik,$telefon,$email]);

?>
<script>
    alert("Doktor Kaydı Başarılı");
    // 3sn sonra index.php ye yönlendir
    setTimeout(function(){
        window.location.href = "index.php";
    }, 3000);
</script>