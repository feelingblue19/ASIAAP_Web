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
                    <img id="img2" src="Katalog.png" alt="Katalog" class="img-fluid gambarMenu p-3">
                </a>
                <h6 class="text-center" style="color:white">Katalog</h6>
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

    {{-- Tampil Katalog --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col">
            <br>
            <table class="table table-dark text-center" id="tableSparepart">
                <thead>
                    <tr>
                        <th scope="col" >Nama</th>
                        <th scope="col">Merk</th>
                        <th scope="col" onclick="sortTable(2)">Harga</th>
                        <th scope="col" onclick="sortTable(3)">Stok</th>
                        <th scope="col">Gambar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>  
            </div>
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

th {
  cursor: pointer;
}

#tableSParepart {
    background-color: rgb(0,0,0,0.8);
    opacity: 1;
}
</style>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let col = ['nama_sparepart', 'merk_sparepart', 'harga_jual_sparepart', 'stok_sparepart', 'gambar_sparepart'];   

    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    
    let tableSparepart = document.querySelector('#tableSparepart tbody');
    function fadeout(i){
        document.getElementById("img" + i).style.opacity="0.5";
        document.getElementById("text" + i).style.display = "none";
    }

    function fadein(i){
        document.getElementById("img" + i).style.opacity="1";
        document.getElementById("text" + i).style.display = "block";
    }

        axios.get('api/sparepart/tampil', config)
        .then((result) => {
            console.log(result.data);
            let sparepart = result.data;
            console.log(sparepart.length);
            for(let i = 0; i < sparepart.length; i++) {
                let tr = tableSparepart.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= col.length-1; j++){
                    td = tr.insertCell();  
                    if(j == col.length-1) {
                        let gambar = document.createElement('img');
                        gambar.src = sparepart[i].gambar_sparepart; 
                        gambar.width = 250;  
                        gambar.height = 250; 
                        td.appendChild(gambar);
                        console.log(sparepart[i].gambar_sparepart);
                    }else {
                        td.innerHTML = sparepart[i][col[j]];
                    }
                }  
            }
        }).catch((err) => {
            console.log(err.response);
        });

    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("tableSparepart");
        switching = true;
        
        dir = "asc"; 

        while (switching) {
            switching = false;
            rows = table.rows;
            
            for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (dir == "asc") {
                if (Number(x.innerHTML) > Number(y.innerHTML)) {
                shouldSwitch= true;
                break;
                }
            } else if (dir == "desc") {
                if (Number(x.innerHTML) < Number(y.innerHTML)) {
                shouldSwitch = true;
                break;
                }
            }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;      
            } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
</script>