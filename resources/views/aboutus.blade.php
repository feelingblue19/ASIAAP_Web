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
                    <img id="img4" src="AboutUs.png" alt="About Us" class="img-fluid gambarMenu p-3">
                </a>
                <h6 class="text-center" style="color:white">About Us</h6>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div style="background-image:url('wpp2.png');background-size:100% auto">
    <br><br>
    {{-- Tentang Kami --}}
    <div class="container-fluid mb-5">
        <div class="row text-center font-italic">
            <div class="col-3"></div>
            <div class="col-6 text-white" style="background-color:rgb(0,0,0,0.8);border-radius: 20px">
                <h1>About Us</h1>
            </div>
            <div class="col-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-2 p-3" style="background-color:rgb(0,0,0,0.8);border-radius: 20px 0 0 0">
                <img class="w-100" src="philips.png" alt="Pak Philips">
            </div>
            <div class="col-4 p-2 pr-3 text-white text-justify" style="background-color:rgb(0,0,0,0.8);border-radius: 0 20px 0 0">
                <br>
                <h3 class="font-italic">Pak Philips,</h3>
                <p>
                    &emsp; merupakan pemilik sekaligus pendiri bengkel Atma Auto. Dengan mottonya
                    "Customer adalah Raja", tidak henti-hentinya ia mendapatkan kepercayaan
                    dari para customer sehingga bengkel Atma Auto dapat berdiri hingga saat ini.
                </p>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-2 p-3" style="background-color:rgb(0,0,0,0.8)">
                <img class="w-100" src="quality.png" alt="Quality over Quantity">
            </div>
            <div class="col-4 p-2 pr-3 text-white text-justify" style="background-color:rgb(0,0,0,0.8)">
                <h3 class="font-italic">Quality over quantity,</h3>
                <p>
                    &emsp; telah menjadi prioritas utama bengkel Atma Auto untuk mempertahankan kualitasnya. 
                    Meskipun kualitas merupakan yang pertama, bukan berarti barang yang ada di bengkel 
                    Atma Auto tidak lengkap. Terbukti dari histori penjualan sparepart bengkel Atma Auto,
                    99.5% customer menemukan sparepart yang dicarinya.
                </p>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-2 p-3" style="background-color:rgb(0,0,0,0.8);border-radius:0 0 0 20px">
                <img class="w-100" src="company.png" alt="Quality over Quantity">
            </div>
            <div class="col-4 p-2 pr-3 text-white text-justify" style="background-color:rgb(0,0,0,0.8);
            border-radius:0 0 20px 0">
                <br>
                <h3 class="font-italic">Anywhere, Anytime</h3>
                <p>
                    &emsp; Bengkel Atma Auto memiliki banyak cabang di Jogjakarta yang tentunya dengan
                    kualitas yang sama pada tiap cabang, sehingga customer tidak perlu jauh-jauh lagi
                    untuk mendapatkan kenyamanan yang maksimal.
                </p>
            </div>
            <div class="col-3"></div>
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