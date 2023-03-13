<?php
try {
    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");

} catch (PDOException $Hata) {
// echo $Hata->getMessage();    
die();
}
// echo $_COOKIE["hastaid"];
// $id = $_COOKIE["hastaid"];
// echo $_POST["sikayet"];
// echo $_POST["teshis"];
// echo $_POST["recete"];
if(isset($_COOKIE["hastaid"]) && isset($_POST["sikayet"]) && isset($_POST["teshis"]) && isset($_POST["recete"])){
    $HastalikSorgusu  = $VeritabaniBaglantisi->prepare("INSERT INTO hastaliklar (sikayet, teshis, recete,hastaid) VALUES (?, ?, ?, ?)");
    $HastalikSorgusu->execute([$_POST["sikayet"], $_POST["teshis"], $_POST["recete"],$_COOKIE["hastaid"]]);
    echo "hastalik eklendi";
    // cookie yi sonlandır
    setcookie("hastaid", "", time() - 3600);
    // 10 saniye sonra index.php ye yönlendir
    header("Refresh: 10; url=doktorSistemi.php");
}else{
    echo "hastalik eklenemedi";
    // cookie yi sonlandır
    setcookie("hastaid", "", time() - 3600);
    // 10 saniye sonra index.php ye yönlendir
    header("Refresh: 10; url=doktorSistemi.php");
}


?>