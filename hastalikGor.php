<?php
try {
    $VeritabaniBaglantisi   = new PDO("mysql:host=localhost;dbname=randevular;charset=utf8", "root", "");
} catch (PDOException $Hata) {
    // echo $Hata->getMessage();    
    die();
}
?>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
if (isset($_POST["secilenHasta"])) {
    $HastalikSorgusu  = $VeritabaniBaglantisi->prepare("select * from hastaliklar where hastaid = ?");
    $HastalikSorgusu->execute([$_POST["secilenHasta"]]);
    $Hastaliksayisi = $HastalikSorgusu->rowCount();
    $Hasta = $HastalikSorgusu->fetchAll(PDO::FETCH_ASSOC);


?>

    <table class="min-w-full divide-y divide-gray-900 ">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Şikayet
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Teşhis
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Reçete
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-900 ">
            <?php
            if ($Hastaliksayisi > 0) {
                foreach ($Hasta as $hasta) {

            ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $hasta["sikayet"]?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $hasta["teshis"]?></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $hasta["recete"]?></div>
                        </td>
                    </tr>
                <?php

                }
                ?>

        </tbody>
    </table>



<?php
            } else {

                echo "hastalik yok";
            }
        } else {
        }
?>