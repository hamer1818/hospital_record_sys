<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background: #eee
    }

    #regForm {
      background-color: #ffffff;
      margin: 0px auto;
      font-family: Raleway;
      padding: 40px;
      border-radius: 10px
    }

    #register {

      color: #6A1B9A;
    }

    h1 {
      text-align: center
    }

    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
      border-radius: 10px;
      -webkit-appearance: none;
    }



    .tab input:focus {

      border: 1px solid #6a1b9a !important;
      outline: none;
    }

    input.invalid {

      border: 1px solid #e03a0666;
    }

    .tab {
      display: none
    }

    button {
      background-color: #6A1B9A;
      color: #ffffff;
      border: none;
      border-radius: 50%;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer
    }

    button:hover {
      opacity: 0.8
    }

    button:focus {

      outline: none !important;
    }

    #prevBtn {
      background-color: #bbbbbb
    }


    .all-steps {
      text-align: center;
      margin-top: 30px;
      margin-bottom: 30px;
      width: 100%;
      display: inline-flex;
      justify-content: center;
    }

    .step {
      height: 40px;
      width: 40px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 15px;
      color: #6a1b9a;
      opacity: 0.5;
    }

    .step.active {
      opacity: 1
    }


    .step.finish {
      color: #fff;
      background: #6a1b9a;
      opacity: 1;

    }



    .all-steps {
      text-align: center;
      margin-top: 30px;
      margin-bottom: 30px
    }

    .thanks-message {
      display: none
    }
  </style>
  <script>
    var currentTab = 0;
    document.addEventListener("DOMContentLoaded", function(event) {


      showTab(currentTab);

    });

    function showTab(n) {
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
      } else {
        document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
      }
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      var x = document.getElementsByClassName("tab");
      if (n == 1 && !validateForm()) return false;
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      if (currentTab >= x.length) {

        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("register").style.display = "none";
        document.getElementById("text-message").style.display = "block";




      }
      showTab(currentTab);
    }

    function validateForm() {
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
          y[i].className += " invalid";
          valid = false;
        }


      }
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid;
    }

    function fixStepIndicator(n) {
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      x[n].className += " active";
    }
  </script>
</head>

<body class="p-12">
  <!-- <form class="border border-primary m-3 p-3 text-center" method="post" action="doktorKayitSonuc.php">
  <div class="mb-3">
    <label for="adi" class="form-label">Adınızı Giriniz</label>
    <input type="text" class="form-control p-3 m-1" id="adi" name="adi">
  </div>
  <div class="mb-3">
    <label for="soyadi" class="form-label">Soyadınızı Giriniz</label>
    <input type="text" class="form-control" id="soyadi" name="soyadi">
  </div>
  <div class="mb-3">
    <label for="brans" class="form-label">Branş Giriniz</label>
    <input type="number" class="form-control" id="brans" name="brans">
  </div>
  <div class="mb-3">
    <label for="klinik" class="form-label">Klinik No Giriniz</label>
    <input type="number" class="form-control" id="klinik" name="klinik">
  </div>
  <div class="mb-3">
    <label for="telefon" class="form-label">Telefon Giriniz</label>
    <input type="text" class="form-control" id="telefon" name="telefon">
  </div>
  <div class="">
    <label for="email" class="form-label">email Giriniz</label>
    <input type="text" class="form-control " id="email" name="email">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->




  <div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-8">
        <form id="regForm" method="post" action="doktorKayitSonuc.php">
          <h1 id="register">Doktor Kayıt Formu</h1>
          <div class="all-steps" id="all-steps">
            <span class="step"><i class="fa fa-user"></i></span>
            <span class="step"><i class="fa fa-user"></i></span>
            <span class="step"><i class="fa fa-code-branch"></i></span>
            <span class="step"><i class="fa-solid fa-house-chimney-medical"></i></span>
            <span class="step"><i class="fa fa-mobile-phone"></i></span>
            <span class="step"><i class="fa-solid fa-envelope"></i></span>
          </div>

          <div class="tab">
            <h6>Senin Adın Ne?</h6>
            <p>
              <input placeholder="İsim..." oninput="this.className = ''" name="adi">
            </p>

          </div>
          <div class="tab">
            <h6>Senin Soyadın Ne?</h6>
            <p>
              <input placeholder="Soyisim..." oninput="this.className = ''" name="soyadi">
            </p>

          </div>
          <div class="tab">
            <h6>Senin Branşın Ne?</h6>
            <p><input placeholder="1-9" oninput="this.className = ''" name="brans"></p>

          </div>
          <div class="tab">
            <h6>Senin Kliniğin Ne?</h6>
            <p><input placeholder="1-9" oninput="this.className = ''" name="klinik"></p>

          </div>
          <div class="tab">
            <h6>Senin Telefon Numaran Ne?</h6>
            <p><input placeholder="5000000000" oninput="this.className = ''" name="telefon"></p>
          </div>

          <div class="tab">
            <h6>Senin E-Mail in Ne?</h6>
            <p><input placeholder="ornek@mail.com" oninput="this.className = ''" name="email"></p>
          </div>

          <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
            <h3>Kayıt Bilgilerini Göndermek için!</h3><button type="submit">Tıkla<i class="fa-regular fa-paper-plane"></i></button>
          </div>
          <div style="overflow:auto;" id="nextprevious">
            <div style="float:right;">
              <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>




</body>

</html>