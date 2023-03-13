<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}


$DoktorSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM randevutarihleri r JOIN hastalar h on r.hastaid=h.hastid WHERE doktorid=?");
$DoktorSorgusu->execute([$_COOKIE["DoktorID"]]);

$Doktor         = $DoktorSorgusu->fetchAll(PDO::FETCH_ASSOC);

    foreach($Doktor as $doktor){
        echo "tarih: ".$doktor["tarihsaat"];
        echo "<br>";
        echo "hasta ismi: ".$doktor["adi"];
        echo "<br>";
        echo "hasta soyismi: ".$doktor["soyadi"];
        echo "<br>";
    }




?>

