<?php
    
    try {

        $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");
    
    } catch (PDOException $Hata) {
        // echo $Hata->getMessage();    
        die();
    }
    $HastaSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM hastalar where hastid = ? LIMIT 1");
    $HastaSorgusu->execute([$_COOKIE["HastaID"]]);
    $HastaSayisi   = $HastaSorgusu->rowCount();
    $Hasta         = $HastaSorgusu->fetch(PDO::FETCH_ASSOC);
    if($HastaSayisi>0){
        $HastaID            = $Hasta["hastid"];
        $HastaAdi           = $Hasta["adi"];
        $HastaSoyadi        = $Hasta["soyadi"];
        $HastaTC            = $Hasta["tcno"];
        $HastaTlf           = $Hasta["tlfno"];
        $HastaEmail         = $Hasta["email"];
    }else{
        header("Location:index.php");
        exit();
    }
    ?>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <!-- ekranın sağ tarafına sabit bir şekilde çıkış yap butonu koy -->
        <div style="position:fixed;right:0;top:0;">
            <a href="cikisYap.php">çıkış yap</a>
        </div>
        

    <h1>Hasta Bilgileri</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">adı</th>
      <th scope="col">Soyadı</th>
      <th scope="col">TC</th>
      <th scope="col">Telefon</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $HastaID?></th>
      <td><?php echo $HastaAdi?></td>
      <td><?php echo $HastaSoyadi?></td>
      <td><?php echo $HastaTC?></td>
      <td><?php echo $HastaTlf?></td>
      <td><?php echo $HastaEmail?></td>
    </tr>
  </tbody>
</table>

<h1>Hastalıklar</h1>
<?php




    $HastalikSorgusu  = $VeritabaniBaglantisi->prepare("select * from hastaliklar where hastaid = ?");
    $HastalikSorgusu->execute([$_COOKIE["HastaID"]]);
    $Hastaliksayisi = $HastalikSorgusu->rowCount();
    $Hasta = $HastalikSorgusu->fetchAll(PDO::FETCH_ASSOC);

    if($Hastaliksayisi>0){
        foreach($Hasta as $hasta){
            
            echo "Şikayet ". $hasta["sikayet"];
            echo "<br>";
            echo "teshis ".$hasta["teshis"];
            echo "<br>";
            echo "recete ".$hasta["recete"];
            echo "<hr>";
        }
    }else{

        echo "hastalik yok";
    }
    
    
    $DoktorSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM doktorlar");
    $DoktorSorgusu->execute();
    $DoktorSayisi   = $DoktorSorgusu->rowCount();
    $Doktor         = $DoktorSorgusu->fetchAll(PDO::FETCH_ASSOC);


?>
<h1>randevu al</h1>
<form action="randevuAl.php" method="post">
    <select name="doktorSec">
        <?php 
            foreach($Doktor as $doktor){
                $id = $doktor["id"];
                echo "<option value='".$doktor["id"]."'>".$doktor["adi"] . $doktor["id"]."</option>";
            }
        ?>
    </select>
    <!-- tarih seçtir -->
    <input type="date" name="tarihSec">
    <input type="submit" value="randevu al">
</form>

</body>