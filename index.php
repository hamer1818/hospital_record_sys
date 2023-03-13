<!DOCTYPE html>
<html lang="tr">
<?php
    require("head.php");
?>

<body class="text-gray-200 bg-slate-700">
    <div class="text-5xl text-center pt-10 text-red-500 pb-20">Hastane Giriş Sistemi</div>
    <hr>
    <div class="flex">
        <div class="bg-slate-400 flex-auto rounded-lg mx-32 mt-10 border-2 border-solid hover:border-dotted border-indigo-500/75">
            <div class="text-5xl text-center p-3 text-blue-300 hover:text-red-600">Doktor Giriş</div>
            <hr class="mx-5">



            <div class="p-5">
                <form action="doktor.php" method="post">
                    <div class="flex flex-col">
                        <label for="email">Doktor Email</label>
                        <input type="email" name="email" class="border-2 border-solid border-gray-200 rounded-lg text-lg text-black py-5 px-10">
                    </div>
                    <div class="flex flex-col mt-5">
                        <label for="sifre">Doktor Şifre</label>
                        <input placeholder="telefon no giriniz" type="password" name="sifre" class="border-2 border-solid border-gray-200 rounded-lg text-2xl text-black py-5 px-10">
                    </div>
                    <div class="flex flex-col mt-5">
                        <input type="submit" class="border-2 border-solid border-gray-200 rounded-lg text-white bg-slate-700 py-5 text-2xl hover:text-red-600" value="Giriş Yap">
                    </div>
                </form>
                <div class="flex flex-col mt-5">
                    <button type="submit" class="border-2 border-solid border-gray-200 rounded-lg text-white bg-slate-700 py-5 text-2xl hover:text-red-600">
                        <a href="doktorKayit.php">
                            Kayıt ol
                        </a>
                    </button>
                </div>
            </div>
        </div>
    
        
        <div class="bg-slate-400 flex-auto rounded-lg mx-32 mt-10 border-2 border-solid hover:border-dotted border-indigo-500/75">
            <div class="text-5xl text-center p-3 text-green-300  hover:text-red-600">Hasta Giriş</div>
            <hr class="mx-5">
            <div class="p-5">
                <form action="hasta.php" method="post">
                    <div class="flex flex-col">
                        <label for="email">Hasta Email</label>
                        <input type="text" name="email" class="border-2 border-solid border-gray-200 rounded-lg text-2xl text-black py-5 px-10">
                    </div>
                    <div class="flex flex-col mt-5">
                        <label>Hasta Şifre</label>
                        <input placeholder="telefon no giriniz" type="password" name="sifre" class="border-2 border-solid border-gray-200 rounded-lg text-2xl text-black py-5 px-10">
                    </div>
                    <div class="flex flex-col mt-5">
                        <input type="submit" class="border-2 border-solid border-gray-200 rounded-lg text-white bg-slate-700 py-5 text-2xl hover:text-red-600" value="Giriş Yap">
                    </div>
                </form>
                <div class="flex flex-col mt-5">
                    <button type="submit" class="border-2 border-solid border-gray-200 rounded-lg text-white bg-slate-700 py-5 text-2xl hover:text-red-600">
                        <a href="hastaKayit.php" >
                            Kayıt ol
                        </a>
                    </button>
                        
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>