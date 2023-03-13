<?php
try {

    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");
} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}
$DoktorSorgusu  = $VeritabaniBaglantisi->prepare("SELECT * FROM doktorlar where id = ? LIMIT 1");
$DoktorSorgusu->execute([$_COOKIE["DoktorID"]]);
$DoktorSayisi   = $DoktorSorgusu->rowCount();
$Doktor         = $DoktorSorgusu->fetch(PDO::FETCH_ASSOC);
if ($DoktorSayisi > 0) {
    $DoktorID           = $Doktor["id"];
    $DoktorAdi          = $Doktor["adi"];
    $DoktorSoyadi       = $Doktor["soyadi"];
    $DoktorBransi       = $Doktor["bransi"];
    $DoktorKlinikNo     = $Doktor["klinkno"];
    $DoktorTlf          = $Doktor["tlf"];
    $DoktorEmail        = $Doktor["email"];
} else {
    header("Location:index.php");
    exit();
}
require_once("hastaSorgu.php");
?>



<!DOCTYPE html>
<html lang="tr">
<?php require_once("head.php"); ?>

<head>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->


    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <style>
        .hastasilbuton {
            margin-left: 1500px;
            margin-top: 100px;
        }
    </style>
</head>



<body class="text-black tracking-wider leading-normal  w-full h-20 bg-gradient-to-r from-red-500 to-white">


    <!--Container-->
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2 ">


        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 shadow  bg-slate-400 border-2 rounded-lg text-gray-800">


            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">hasta Adları</th>
                        <th data-priority="2">hasta SoyAdları</th>
                        <th data-priority="3">hasta tcnolari</th>
                        <th data-priority="4">hasta tlfnolari</th>
                        <th data-priority="5">hasta emailleri</th>
                        <th data-priority="6">hasta idleri</th>
                        <th data-priority="7"></th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($Hasta as $hasta) { ?>
                        <tr>
                            <td><?php echo $hasta["adi"] ?></td>
                            <td><?php echo $hasta["soyadi"] ?></td>
                            <td><?php echo $hasta["tcno"] ?></td>
                            <td><?php echo $hasta["tlfno"] ?></td>
                            <td><?php echo $hasta["email"] ?></td>
                            <td><?php echo $hasta["hastid"] ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>



            </table>

        </div>



    </div>



    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true,
                    select: {
            style:    'os',
            selector: 'td:first-child'
        },
                })
                .columns.adjust()
                .responsive.recalc();
        });
        
    </script>



    <div class="flex mx-80 bg-slate-500 border-2 rounded-full p-5 mt-5 ">

        <div class="flex-row bg-slate-500">
            <div class="flex-row my-2 rounded-full bg-red-200 text-center">hastalik ekle</div>
            <hr class=" my-2">
            <form action="hastaSecildi.php" method="post">
                <input type="text" name="secilenHasta" placeholder="id gir" class="rounded-full px-3">
                <input type="submit" value="gönder" class=" my-2 border-2 rounded-full hover:bg-white px-3 mx-3 border-solid border-gray-200">
            </form>

        </div>
        <div class="flex-row bg-slate-500 px-5">
            <div class="flex-row  my-2 rounded-full bg-red-200 text-center">hastalik görüntüle</div>
            <hr class=" my-2">
            <form action="hastalikGor.php" method="post">
                <input type="text" name="secilenHasta" placeholder="id gir" class="rounded-full px-3">
                <input type="submit" value="gönder" class=" my-2 border-2 rounded-full hover:bg-white px-3 mx-3 border-solid border-gray-200">
            </form>

        </div>
        <div class="flex-row bg-slate-500 px-5">
            <div class="flex-row my-2 rounded-full bg-red-200 text-center ">randevu görüntüle</div>
            <hr class=" my-2">
            <form action="randevuGor.php" method="post">
                <input type="submit" value="Gör" class=" my-2 border-2 rounded-full hover:bg-white px-3 mx-3 border-solid border-gray-200">
            </form>

        </div>
        <div class="flex-row bg-slate-500 px-5">
            <div class="flex-row my-2  rounded-full bg-red-200 text-center">doktor branş ekle</div>
            <hr class=" my-2">
            <form action="bransEkle.php" method="post">
                <input type="text" name="bransekle" placeholder="id gir" class="rounded-full px-3">
                <input type="submit" value="gönder" class=" my-2 border-2 rounded-full hover:bg-white px-3 mx-3 border-solid border-gray-200">
            </form>

        </div>

    </div>


    <div class="grid place-content-end">
        <form action="cikisYap.php" method="post">
            <input type="submit" value="Çıkış Yap" class="border-2 rounded-full hover:bg-red-900 hover:text-white px-3 mx-3 border-solid border-gray-200">
        </form>
    </div>

</body>

</html>