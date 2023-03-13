<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}

$HastalarSorgusu       = $VeritabaniBaglantisi->prepare("SELECT * FROM hastalar");  //sadece ilk kaydı alır
$HastalarSorgusu->execute();  //sorguyu çalıştır
$HastaSayisi           = $HastalarSorgusu->rowCount();  //sorgudan kaç kayıt döndüğünü sayar
$Hasta                 = $HastalarSorgusu->fetchAll(PDO::FETCH_ASSOC);  //sorgudan gelen kayıtları diziye atar

?>