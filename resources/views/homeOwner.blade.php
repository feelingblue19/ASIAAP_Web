<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atma Auto: Home Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="shortcut icon" href="Logo.ico" type="image/x-icon"/>
    <script>
        let jabatan = 'Admin';
        if (localStorage.getItem('token') === null)
            window.location.href = '/8900/public';
        else if (localStorage.getItem('jabatan') !== jabatan)
        window.history.back();
    </script>
</head>
<body>
    
    {{-- Header --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#262626">
                <a href="admin"><img src="Logo.png" class="img-fluid mx-auto d-block" 
                style="width:20%;filter:invert(100%)" alt="Logo AA"></a>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>

    <div style="background-image:url('wpp2.png');background-size:100% auto">    
    {{-- Greetings --}}
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center mt-5 mb-5 font-italic text-white" 
            style="background-color:rgb(0,0,0,0.8);border-radius:20px">
                <h1>Selamat Datang, Owner</h1>
            </div>
            <div class="col-2">
                <img id="img11" src="OWLogout.png" onmouseover="fadeout(11)" onmouseout="fadein(11)" alt="Logout Button" class="img-fluid gambarMenu p-3" onclick="logout()">
            </div>
        </div>
    </div>

    {{-- Menu --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                <a href="cabang">
                    <img id="img1" src="OWCabang.png" alt="Menu Cabang" class="img-fluid gambarMenu p-3" 
                    onmouseover="fadeout(1)" onmouseout="fadein(1)">
                </a>
                <h6 id="text1" class="text-center hide">Cabang</h6>
            </div>
            <div class="col-2">
                <a href="merk">
                    <img id="img2" src="OWMerk.png" alt="Menu Merk" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(2)" onmouseout="fadein(2)">
                </a>
                <h6 id="text2" class="text-center hide">Merk</h6>
            </div>
            <div class="col-2">
                <a href="service">
                    <img id="img3" src="OWJasa.png" alt="Menu Jasa" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(3)" onmouseout="fadein(3)">
                </a>
                <h6 id="text3" class="text-center hide">Service</h6>
            </div>
            <div class="col-2">
                <a href="pegawai">
                    <img id="img4" src="OWPegawai.png" alt="Menu Pegawai" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(4)" onmouseout="fadein(4)">
                </a>
                <h6 id="text4" class="text-center hide">Pegawai</h6>
            </div>
            <div class="col-2" >
                <a href="sparepart" id="sparepart">
                    <img id="img5" src="OWSparepart.png" alt="Menu Sparepart" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(5)" onmouseout="fadein(5)">
                </a>
                <h6 id="text5" class="text-center hide">Sparepart</h6>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row mt-4 mb-5">
            <div class="col-1"></div>
            <div class="col-2">
                <a href="supplier">
                    <img id="img6" src="OWSupplier.png" alt="Menu Supplier" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(6)" onmouseout="fadein(6)">
                </a>
                <h6 id="text6" class="text-center hide">Supplier</h6>
            </div>
            <div class="col-2">
                <a href="tipe">
                    <img id="img7" src="OWTipe.png" alt="Menu Tipe Motor" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(7)" onmouseout="fadein(7)">
                </a>
                <h6 id="text7" class="text-center hide">Tipe Motor</h6>
            </div>
            <div class="col-2">
                <a href="histori">
                    <img id="img8" src="OWHistori.png" alt="Menu Histori" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(8)" onmouseout="fadein(8)">
                    <h6 id="text8" class="text-center hide">Histori</h6>
                </a>
            </div>
            <div class="col-2">
                <a href="pengadaan">
                    <img id="img9" src="OWPengadaan.png" alt="Menu Pengadaan" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(9)" onmouseout="fadein(9)">
                    <h6 id="text9" class="text-center hide">Pengadaan</h6>
                </a>
            </div>
            <div class="col-2">
                <a href="laporan">
                    <img id="img10" src="OWReport.png" alt="Laporan" class="img-fluid gambarMenu p-3"
                    onmouseover="fadeout(10)" onmouseout="fadein(10)">
                    <h6 id="text10" class="text-center hide">Laporan</h6>
                </a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <br><br>

    {{-- Footer Logo --}}
    <div class="container-fluid" style="position:fixed;left:0;bottom:0">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#333">
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

#img11{
    margin-top: 44px;
    width: 60px;
    height: 60px;
    cursor: pointer;
}

.input{
    text-align:center
}
 /* Add a black background color to the top navigation */
 .topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 15px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add an active class to highlight the current page */
.active {
  background-color: lightblue;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}

 /* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
 @media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

.gambarMenu{
    /* border:5px solid white; */
    border-radius:20px;
    background-color:rgb(0,0,0,0.8);
}

.hide{
    text-decoration:none;
    color:rgb(0,0,0,0);
}
</style>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    
    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    function fadeout(i){
        // document.getElementById("img" + i).style.opacity="1";
        document.getElementById("img" + i).style.background="white";
        document.getElementById("text" + i).style.color = "white";
    }

    function fadein(i){
        // document.getElementById("img" + i).style.opacity="0.5";
        document.getElementById("img" + i).style.background="rgb(0,0,0,0.8)";
        document.getElementById("text" + i).style.color = "rgb(0,0,0,0)";
    }

    function logout(){
        axios.post('api/auth/logout', null, config).then(function(response)
        {
            console.log('Logout success');
            // localStorage.setItem('token', response.data.token);
            localStorage.clear();
            alert("Logout Berhasil");
            window.location.href = "/8900/public";
        })
        .catch(function(error)
        {
            console.log('Logout gagal');
            console.log(error.response);
            alert("Logout Gagal!");
        });
        return false;
    }
</script>