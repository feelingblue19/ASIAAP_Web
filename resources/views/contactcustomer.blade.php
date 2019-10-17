<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atma Auto: Katalog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
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
                    <img id="img1" src="Home.png" alt="Home" class="img-fluid gambarMenu p-3"
                    onmouseover="fadein(1)" onmouseout="fadeout(1)" style="opacity:0.5">
                </a>
                <h6 id="text1" class="text-center hide" style="color:white">Home</h6>
            </div>
            <div class="col-1">
                <a href="katalog">
                    <img id="img2" src="Katalog.png" alt="Katalog" class="img-fluid gambarMenu p-3"
                    onmouseover="fadein(2)" onmouseout="fadeout(2)" 
                    style="opacity:0.5">
                </a>
                <h6 id="text2" class="text-center hide" style="color:white">Katalog</h6>
            </div>
            <div class="col-1">
                <a href="contact">
                    <img id="img3" src="ContactUs.png" alt="Contact Us" class="img-fluid gambarMenu p-3">
                </a>
                <h6 class="text-center" style="color:white">Contact</h6>
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
    <br><br>
    {{-- Info Contact Us --}}
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center text-white pt-3" style="background-color:rgb(0,0,0,0.8);
            border-radius:20px 20px 0px 0px">
                <h1 class="font-italic">Contact Us</h1>
                <div>
                    <h5 class="font-italic">
                    Memiliki keluhan ataupun pertanyaan seputar motor anda? Hubungi kami!</h5>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4 text-center text-white pb-3" style="background-color:rgb(0,0,0,0.8);
            border-radius:0px 0px 0px 20px">
            <br>
                <h4>Customer Service</h4>
                <h6>+62-859-5555-xxxx</h6>
                <br>
                <h4>Lowongan Kerja</h4>
                <h6>+62-878-5555-xxxx</h6>
            </div>
            <div class="col-4 text-center text-white pb-3" style="background-color:rgb(0,0,0,0.8);
            border-radius:0px 0px 20px 0px">
            <br>
                <h4>Pre-Order Sparepart</h4>
                <h6>+62-838-5555-xxxx</h6>
                <br>
                <h4>On-The-Way Service</h4>
                <h6>+62-859-5555-xxxx</h6>
            </div>
            <div class="col-2"></div>
        </div>
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

.gambarMenu{
    border:3px solid white;
    border-radius:20px;
}

.hide{
    display: none;
    text-decoration:none;
}
</style>

<script>
    function fadeout(i){
        document.getElementById("img" + i).style.opacity="0.5";
        document.getElementById("text" + i).style.display = "none";
    }

    function fadein(i){
        document.getElementById("img" + i).style.opacity="1";
        document.getElementById("text" + i).style.display = "block";
    }
</script>