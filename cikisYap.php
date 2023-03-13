<?php

if(isset($_COOKIE["HastaID"])){
    setcookie("HastaID", "", time() - 10800);
    echo "çıkış yapıldı";
    header("Refresh: 3; url=index.php");
}
elseif(isset($_COOKIE["DoktorID"])){
    require_once("doktor.php");
    setcookie("DoktorID", $Doktor["id"], time() - 10800);
    echo "çıkış yapıldı";
    header("Refresh: 3; url=index.php");
}
else{
    echo "çıkış yapılmadı";
    header("Refresh: 3; url=index.php");
}


?>