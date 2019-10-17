<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Atma Auto: Form Histori</title>
</head>
<body>
    {{-- Header --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#2c3e50;">
                <a href="admin"><img src="Logo.png" class="img-fluid mx-auto d-block"
                style="width:20% ;filter:invert(100%)" alt="Logo AA"></a>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>

    {{-- Navbar --}}
    <div class="container-fluid" style="background-color:#34495e">
        <div class="row">
            <h6 style="color:#34495e">
                oke
            </h6>
        </div>
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col-1" style="margin-left: 50px;">
                <a href="cabang">
                    <img id="img1" src="OWCabang.png" alt="Menu Cabang" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Cabang" onmouseover="fadein(1)" onmouseout="fadeout(1)" style="opacity:0.5">
                </a>
                <!-- <h6 class="text-center">&diams;</h6> -->
                <h6 id="text1" class="text-center hide" style="color:white">Cabang</h6>
            </div>
            <div class="col-1">
                <a href="merk">
                    <img id="img2" src="OWMerk.png" alt="Menu Merk" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Merk"  onmouseover="fadein(2)" onmouseout="fadeout(2)"
                    style="opacity:0.5">
                </a>
                <h6 id="text2" class="text-center hide" style="color:white">Merk</h6>
            </div>
            <div class="col-1">
                <a href="service">
                    <img id="img3" src="OWJasa.png" alt="Menu Jasa" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Jasa Service" onmouseover="fadein(3)" onmouseout="fadeout(3)"
                    style="opacity:0.5">
                </a>
                <h6 id="text3" class="text-center hide" style="color:white">Jasa</h6>
            </div>
            <div class="col-1">
                <a href="pegawai">
                    <img id="img4" src="OWPegawai.png" alt="Menu Pegawai" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Pegawai"onmouseover="fadein(4)" onmouseout="fadeout(4)" style="opacity:0.5">
                </a>
                <h6 id="text4" class="text-center hide" style="color:white">Pegawai</h6>
            </div>
            <div class="col-1">
                <a href="sparepart">
                    <img id="img5" src="OWSparepart.png" alt="Menu Sparepart" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Sparepart" onmouseover="fadein(5)" onmouseout="fadeout(5)" style="opacity:0.5">
                </a>
                <h6 id="text5" class="text-center hide" style="color:white">Sparepart</h6>
            </div>
            <div class="col-1">
                <a href="supplier">
                    <img id="img6" src="OWSupplier.png" alt="Menu Supplier" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Supplier" onmouseover="fadein(6)" onmouseout="fadeout(6)" style="opacity:0.5">
                </a>
                <h6 id="text6" class="text-center hide" style="color:white">Supplier</h6>
            </div>
            <div class="col-1">
                <a href="tipe">
                    <img id="img7" src="OWTipe.png" alt="Menu Tipe Motor" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Tipe Motor" onmouseover="fadein(7)" onmouseout="fadeout(7)"
                    style="opacity:0.5">
                </a>
                <h6 id="text7" class="text-center hide" style="color:white">Tipe</h6>
            </div>
            <div class="col-1">
                <a href="histori">
                    <img id="img8" src="OWHistori.png" alt="Menu Histori" class="img-fluid gambarMenu p-3"
                    title="Histori">
                </a>
                <h6 class="text-center" style="color:white">Histori</h6>
            </div>
            <div class="col-1">
                <a href="pengadaan">
                    <img id="img9" src="OWPengadaan.png" alt="Menu Pengadaan" class="img-fluid gambarMenu p-3"
                    title="Transaksi Pengadaan"  onmouseover="fadein(9)" onmouseout="fadeout(9)"
                    style="opacity:0.5">
                    </a>
                <h6 id="text9" class="text-center hide" style="color:white">Pengadaan</h6>
            </div>
            <div class="col-1">
                <a href="laporan">
                    <img id="img10" src="OWReport.png" alt="Menu Laporan" class="img-fluid gambarMenu p-3"
                    title="Laporan" onmouseover="fadein(10)" onmouseout="fadeout(10)"
                    style="opacity:0.5">
                    </a>
                <h6 id="text10" class="text-center hide" style="color:white">Laporan</h6>
            </div>
            <div class="col-1">
                <img id="img11" src="OWLogout.png" alt="Logout Button" class="img-fluid gambarMenu p-3"
                title="Logout" onclick="logout()" onmouseover="fadein(11)" onmouseout="fadeout(11)"
                style="opacity:0.5">
                <h6 id="text11" class="text-center hide" style="color:white">Logout</h6>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <div style="background-image:url('wpp2.png');background-size:100% auto">
    <br><br>    
    <h1 class="text-center font-italic mt-5 mb-5 text-white">Histori Spareparts</h1>

    {{-- Inputan Form --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                <form onsubmit = "return post()">
                    <h5>Sparepart</h5>
                    <select name="kode" id="kode" placeholder="Pilih Sparepart" 
                    class="form-control input">
                        <option value="">--Pilih Sparepart--</option>
                    </select>
                    <br>
                    <h5>Jumlah</h5>
                    <input type="number" id="jumlah" name="Jumlah" placeholder="Masukkan Jumlah"
                    class="form-control input">
                    <br>
                    <br>
                    <input type="submit" value="Input" class="btn btn-success float-left w-50">
                </form>
                <button class="btn btn-danger w-50 float-right" onclick="cls()">Batal</button>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    {{-- Tampil Tabel --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <br>
            <table class="table table-dark" id="tableHistori">
            <thead>
                <tr>
                    <th scope="col">ID Histori</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode Sparepart</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody></tbody>
            </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    {{-- Footer Logo --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#2c3e50;">
                <!-- <img src="/Logo.png" class="img-fluid mx-auto d-block" style="width:10%" alt="Logo AA"> -->
                <h6 class="text-center font-weight-bold font-italic pt-3 pb-2 text-white">&copy;Atma Auto 2019</h6>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>
</body>

<style>
.isi{
    font-style:italic;
    background-color:rgb(0,0,0,0.8);
    color: white;
    border-radius:20px
}

.input{
    text-align:center
}

.gambarMenu{
    border:3px solid white;
    border-radius:20px;
}

.hide{
    display: none;
    text-decoration:none;
}

#img11 {
    cursor: pointer;
}
</style>

</html>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let tableHistori = document.querySelector('#tableHistori tbody');
    let col = ['id_histori', 'tanggal_histori', 'kode_sparepart', 'jumlah_histori', 
        'keterangan_histori'];

    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    tampil();

    let select = document.querySelector('#kode');

    axios.get('api/sparepart/tampil')
    .then((result) => {
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_sparepart);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].kode_sparepart);
            select.insertBefore(option, select.lastChild);
        }
    }).catch((err) => {
        
    });

    function tampil() {
        document.querySelector('#tableHistori tbody').innerHTML = '';
        axios.get('api/histori/tampil', config)
        .then((result) => {
            for(let i = 0; i < result.data.length; i++) {
                let tr = tableHistori.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j < col.length; j++){
                    td = tr.insertCell();  
                    td.innerHTML = result.data[i][col[j]];
                }  
            }
        }).catch((err) => {
            console.log(err);
        });
    }
    

    function post() {
        if(document.querySelector('#kode').value == '' || document.querySelector('#jumlah').value == '') {
            // cls();
            alert('Data tidak boleh kosong');
            return false;
        }
        else if(document.querySelector('#jumlah').value <= 0) {
            document.querySelector('#jumlah').value = '';
            alert('Jumlah Tidak Boleh Kurang Dari 1');
            return false;
        }

        let data = [];
        let obj = {};
        obj.kode_sparepart = document.querySelector('#kode').value;
        obj.jumlah_histori = document.querySelector('#jumlah').value;
        obj.keterangan_histori = 'Masuk';
        data.push(obj);
       
        let formData = new FormData();
        formData.append('data', JSON.stringify(data));
        axios.post('api/histori/tambah', formData, config)
        .then((result) => {
            alert('Input Berhasil!');
            cls();
            tampil();   
        }).catch((err) => {
            alert('Input Gagal!');
            cls();
            console.log(err);
        });
       
        return false;
    }   

    function cls() {
        document.querySelector('#kode').value = '';
        document.querySelector('#jumlah').value = '';
    }    

    function fadeout(i){
        document.getElementById("img" + i).style.opacity="0.5";
        document.getElementById("text" + i).style.display = "none";
    }

    function fadein(i){
        document.getElementById("img" + i).style.opacity="1";
        document.getElementById("text" + i).style.display = "block";
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