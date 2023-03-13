<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<?php
if (isset($_COOKIE["DoktorID"]) && isset($_POST["secilenHasta"])) {
    $hastaid = $_POST["secilenHasta"];
    setcookie("hastaid", $hastaid, time() + 3600);
?>
    <!-- <form action="hastaSecildiSonuc.php" method="post" class="p-5 m-5">
        <input type="text" name="sikayet" class="p-5 m-5" placeholder="sikayet yazin">
        <input type="text" name="teshis" class="p-5 m-5" placeholder="teshis yazin">
        <input type="text" name="recete" class="p-5 m-5" placeholder="recete yazin">
        <input type="submit" value="gonder" class="btn btn-primary">
    </form> -->
    <head>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    </head>
    <form action="hastaSecildiSonuc.php" method="post" class="max-w-lg mx-auto border-2 border-blue-300 mt-12 rounded p-4">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="complaint">
                Şikayet
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-blue-300" id="complaint" type="text" placeholder="Şikayetinizi buraya yazın" name="sikayet">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="diagnosis">
                Teşhis
            </label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-blue-300" id="diagnosis" type="text" placeholder="Teşhisinizi buraya yazın" name="teshis">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="prescription">
                Reçete
            </label>
            <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:bg-blue-300" id="prescription" rows="5" placeholder="Reçetenizi buraya yazın"  name="recete"></textarea>
        </div>
        <div class="flex items-center justify-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Gönder
            </button>
        </div>
    </form>

<?php
} else {
    header("Location:index.php");
    exit();
}





?>