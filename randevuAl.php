<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}
// $_POST["doktorSec"] i içinden sayısal değer alıyoruz
$id = $_POST["doktorSec"];
$id = preg_replace('/[^0-9]/', '', $id);







$DoktorSorgusu  = $VeritabaniBaglantisi->prepare("INSERT INTO randevutarihleri (tarihsaat,hastaid,doktorid) VALUES (?,?,?)");
$DoktorSorgusu->execute([$_POST["tarihSec"],$_COOKIE["HastaID"], $id]);

echo "randevu alındı";


?>

