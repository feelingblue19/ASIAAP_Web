<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atma Auto: Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="Logo.ico" type="image/x-icon"/>
</head>
<body>

    {{-- Header --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#3498db">
                <a href="/8900/public"><img src="Logo.png" class="img-fluid mx-auto d-block" 
                style="width:20%;" alt="Logo AA"></a>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>

    {{-- Navbar --}}
    <div class="container-fluid" style="background-color:#2980b9">
        <div class="row">
            <h6 style="color:#2980b9">
                oke
            </h6>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-1">
                <a href="/8900/public">
                    <img id="img1" src="Home.png" alt="Home" class="img-fluid gambarMenu p-3">
                </a>
                <h6 class="text-center" style="color:white">Home</h6>
            </div>
            <div class="col-1">
                <a href="katalog">
                    <img id="img2" src="Katalog.png" alt="Katalog" class="img-fluid gambarMenu p-3"
                    onmouseover="fadein(2)" onmouseout="fadeout(2)" style="opacity:0.5">
                </a>
                <h6 id="text2" class="text-center hide" style="color:white">Katalog</h6>
            </div>
            <div class="col-1">
                <a href="contact">
                    <img id="img3" src="ContactUs.png" alt="Contact Us" class="img-fluid gambarMenu p-3"
                    onmouseover="fadein(3)" onmouseout="fadeout(3)" 
                    style="opacity:0.5">
                </a>
                <h6 id="text3" class="text-center hide" style="color:white">Contact</h6>
            </div>
            <div class="col-1">
                <a href="aboutus">
                    <img id="img4" src="AboutUs.png" alt="About Us" class="img-fluid gambarMenu p-3"
                    onmouseover="fadein(4)" onmouseout="fadeout(4)" style="opacity:0.5">
                </a>
                <h6 id="text4" class="text-center hide" style="color:white">About Us</h6>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    
    <div style="background-image:url('wpp2.png');background-size:100% auto">
    {{-- Slide Show --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col mt-5">
                <!-- Slideshow container -->
                <div class="slideshow-container w-100">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <img src="Welcome.jpg" style="width:100%">
                        <div class="content">
                            <h1 class="text-center">Selamat Datang Di Bengkel Atma Auto</h1>
                        </div>
                    </div>

                    <div class="mySlides fade">
                        <img src="Mesin.jpg" style="width:100%">
                        <div class="content">
                            <h1 class="text-center">Motor Anda Bertingkah Aneh?</h1>
                            <p class="text-center">
                                Anda tidak perlu khawatir, bengkel Atma Auto memiliki
                                mekanik profesional dan berpengalaman yang selalu siap
                                untuk memperbaiki motor anda. Dijamin, setelah service,
                                motor anda seperti baru kembali!
                            </p>
                        </div>
                    </div>

                    <div class="mySlides fade">
                        <img src="CS.jpg" style="width:100%">
                        <div class="content">
                            <h1 class="text-center">Anda Memiliki Pertanyaan?</h1>
                            <p class="text-center">
                                Silahkan hubungi customer service kami di 0812-3456-7890,
                                dengan 24/7 jam pelayanan
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>

    {{-- Cari Riwayat Transaksi --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-5 mb-5 pt-3 pb-3" 
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h3 class="text-center text-white">Cek Transaksi Anda</h3>
                <button id="srchsub" type="submit" value="Search"  class="btn btn-primary w-20 offset-md-5" onclick='javascript:location.href="caritransaksi"' >Klik Disini</button>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    {{-- Tipe Sparepart dan Link Ke Katalog --}}
    <div clas="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center mb-5 p-3 isi">
                <h1>Tipe Sparepart</h1>
                <br>
                <img class="w-25 mr-5 border sppt" src="banEd.png" alt="Gambar Ban">
                <img class="w-25 border sppt" src="lampuEd.png" alt="Gambar Lampu">
                <img class="w-25 ml-5 border sppt" src="knalpotEd.png" alt="Gambar Knalpot">
                <br>
                <br>
                <a href="katalog">Sparepart Lainnya >>></a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <!-- {{-- Footer --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center pt-3 pb-2" style="background-color:#333;color:white">
                <h4 class="font-italic font-weight-bold">Hubungi Kami</h4>
                <br>
                <h6>Customer Service:</h6>
                <h6>0812-3456-7890</h6>
                <br>
                <h6>Pre-Order Sparepart:</h6>
                <h6>0808-0808-0808</h6>
                <br>
                <h6>Lowongan Kerja:</h6>
                <h6>1234-5689-0123</h6>
            </div>
            <div class="col text-center pt-3 pb-2" style="background-color:#333;color:white">
                <h4 class="font-italic font-weight-bold">Tentang Kami</h4>
                <h6>Atma Auto merupakan bengkel</h6>
            </div>
        </div>
    </div> -->
    </div>

    {{-- Footer Logo --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col-12" style="background-color:#3498db">
                <!-- <img src="/Logo.png" class="img-fluid mx-auto d-block" style="width:10%" alt="Logo AA"> -->
                <h6 class="text-center font-weight-bold font-italic pt-3 pb-2 text-white">&copy;Atma Auto 2019</h6>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>
</body>
</html>

<style>
.isi{
    font-style:italic;
    background-color:rgb(0,0,0,0.8);
    color: white;
    border-radius:20px
}
 
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1s;
  animation-name: fade;
  animation-duration: 10s;
}

@-webkit-keyframes fade {
  from {opacity: 1}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 1}
  to {opacity: 1}
}

.content {
  position: absolute; /* Position the background text */
  bottom: 0; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.8); /* Black background with 0.5 opacity */
  color: #f1f1f1; /* Grey text */
  width: 100%; /* Full width */
  padding: 20px; /* Some padding */
}

.sppt:hover{
    opacity: 0.8;
}

.gambarMenu{
    border:3px solid white;
    border-radius:20px;
}

.hide{
    display: none;
    text-decoration:none;
}
</style>


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function responsive() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    // var slideIndex = 1;
    // showSlides(slideIndex);

    // // Next/previous controls
    // function plusSlides(n) {
    // showSlides(slideIndex += n);
    // }

    // // Thumbnail image controls
    // function currentSlide(n) {
    // showSlides(slideIndex = n);
    // }

    // function showSlides(n) {
    // var i;
    // var slides = document.getElementsByClassName("mySlides");
    // var dots = document.getElementsByClassName("dot");
    // if (n > slides.length) {slideIndex = 1}
    // if (n < 1) {slideIndex = slides.length}
    // for (i = 0; i < slides.length; i++) {
    //     slides[i].style.display = "none";
    // }
    // for (i = 0; i < dots.length; i++) {
    //     dots[i].className = dots[i].className.replace(" aktif", "");
    // }
    // slides[slideIndex-1].style.display = "block";
    // dots[slideIndex-1].className += " aktif";
    // } 
    
    var slideIndex = 0;
    showSlides();

    function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
    } 

    function fadeout(i){
        document.getElementById("img" + i).style.opacity="0.5";
        document.getElementById("text" + i).style.display = "none";
    }

    function fadein(i){
        document.getElementById("img" + i).style.opacity="1";
        document.getElementById("text" + i).style.display = "block";
    }

    function ensub()
    {
        let srch = document.getElementById("srchin").value;

        if(srch != "")
        {
            document.getElementById("srchsub").disabled = false;
        }
        else
            document.getElementById("srchsub").disabled = true;
    }

    function cariRiwayat(){
        let id = document.querySelector('#srchin').value;
        axios.get('penjualan/tampilriwayat/'+ id)
        .then((result) => {
            console.log(result.data);
        }).catch((err) => {
            console.log(err.response);
        });

        return false;
    }
</script>