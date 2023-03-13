<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}

$brans  = $_POST["bransekle"];

$bransSorgu = $VeritabaniBaglantisi->prepare("INSERT INTO branslar (bransadi) VALUES (?)");
$bransSorgu->execute([$brans]);






?>