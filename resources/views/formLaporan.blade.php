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
    <title>Atma Auto: Form Laporan</title>
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
                    title="Histori" onmouseover="fadein(8)" onmouseout="fadeout(8)"
                    style="opacity:0.5">
                </a>
                <h6 id="text8" class="text-center hide" style="color:white">Histori</h6>
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
                    title="Laporan">
                    </a>
                <h6 id="text10" class="text-center" style="color:white">Laporan</h6>
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
    <h1 class="text-center font-italic mt-5 mb-5 text-white">Laporan</h1>

    {{-- Inputan Form --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                <form>
                    <h5>Laporan</h5>
                    <select name="laporan" id="laporan" placeholder="Pilih Laporan" 
                    class="form-control input" onchange = "onChange(this)">
                        <option value="">--Pilih Laporan--</option>
                        <option value="terlaris">Laporan Sparepart Terlaris</option>
                        <option value="pengeluaran-bulanan">Laporan Pengeluaran Bulanan</option>
                        <option value="pendapatan-bulanan">Laporan Pendapatan Bulanan</option>
                        <option value="pendapatan-tahunan">Laporan Pendapatan Tahunan</option>
                        <option value="stok">Laporan Sisa Stok</option>
                        <option value="jasa">Laporan Penjualan Jasa</option>
                    </select>
                    <div id="terlaris" style="display: none;">
                        <br>
                        <h5>Tahun</h5>
                        <input type="number" id="tahun-terlaris" placeholder="Masukkan Tahun"
                        class="form-control input">
                    </div>
                    <div id="pendapatan-bulanan" style="display: none;">
                        <br>
                        <h5>Tahun</h5>
                        <input type="number" id="tahun-pendapatan" placeholder="Masukkan Tahun"
                        class="form-control input">
                    </div>
                    <div id="pengeluaran-bulanan" style="display: none;">
                        <br>
                        <h5>Tahun</h5>
                        <input type="number" id="tahun-pengeluaran" placeholder="Masukkan Tahun"
                        class="form-control input">
                    </div>
                    <div id="penjualan-jasa" style="display: none;">
                        <br>
                        <h5>Tahun</h5>
                        <input type="number" id="tahun-jasa" placeholder="Masukkan Tahun"
                        class="form-control input">
                        <br>
                        <h5>Bulan</h5>
                        <select name="bulan" id="bulan" placeholder="Pilih Bulan" 
                        class="form-control input">
                            <option value="">--Pilih Bulan--</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div id="sisa-stok" style="display: none;">
                        <br>
                        <h5>Tahun</h5>
                        <input type="number" id="tahun-stok" placeholder="Masukkan Tahun"
                        class="form-control input">
                        <br>
                        <h5>Tipe Sparepart</h5>
                        <select name="sparepart" id="sparepart" placeholder="Pilih Tipe" 
                        class="form-control input">
                            <option value="">--Pilih Tipe--</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-success float-left w-50" onclick="return tampil()">Tampil</button>
                    <button class="btn btn-info w-50 float-right" onclick=" return cetak()">Cetak</button>
                </form>
                
            </div>
            <div class="col-4"></div>
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
    let selected = null;
    let sparepart = document.querySelector('#sparepart');

     let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    axios.get('api/sparepart/gettipe')
    .then((result) => {
        for(let i = 0; i < result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].tipe_sparepart);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].tipe_sparepart);
            sparepart.insertBefore(option, sparepart.lastChild);
        }
    }).catch((err) => {
        
    });

    function onChange(obj) {
        selected = obj.options[obj.selectedIndex].value;
        console.log(selected);
        if(selected === 'terlaris') {
            document.querySelector('#terlaris').style.display = 'block';
            document.querySelector('#pendapatan-bulanan').style.display = 'none';
            document.querySelector('#pengeluaran-bulanan').style.display = 'none';
            document.querySelector('#penjualan-jasa').style.display = 'none';
            document.querySelector('#sisa-stok').style.display = 'none';
        } else if (selected === 'pendapatan-bulanan') {
            document.querySelector('#terlaris').style.display = 'none';
            document.querySelector('#pengeluaran-bulanan').style.display = 'none';
            document.querySelector('#pendapatan-bulanan').style.display = 'block';
            document.querySelector('#penjualan-jasa').style.display = 'none';
            document.querySelector('#sisa-stok').style.display = 'none';
        } else if (selected === 'pendapatan-tahunan') {
            document.querySelector('#terlaris').style.display = 'none';
            document.querySelector('#pendapatan-bulanan').style.display = 'none';
            document.querySelector('#pengeluaran-bulanan').style.display = 'none';
            document.querySelector('#penjualan-jasa').style.display = 'none';
            document.querySelector('#sisa-stok').style.display = 'none';
        } else if (selected === 'pengeluaran-bulanan') {
            document.querySelector('#terlaris').style.display = 'none';
            document.querySelector('#pendapatan-bulanan').style.display = 'none';
            document.querySelector('#pengeluaran-bulanan').style.display = 'block';
            document.querySelector('#penjualan-jasa').style.display = 'none';
            document.querySelector('#sisa-stok').style.display = 'none';
        } else if (selected === 'jasa') {
            document.querySelector('#terlaris').style.display = 'none';
            document.querySelector('#pendapatan-bulanan').style.display = 'none';
            document.querySelector('#pengeluaran-bulanan').style.display = 'none';
            document.querySelector('#penjualan-jasa').style.display = 'block';
            document.querySelector('#sisa-stok').style.display = 'none';
        } else if (selected == 'stok') {
            document.querySelector('#terlaris').style.display = 'none';
            document.querySelector('#pendapatan-bulanan').style.display = 'none';
            document.querySelector('#pengeluaran-bulanan').style.display = 'none';
            document.querySelector('#penjualan-jasa').style.display = 'none';
            document.querySelector('#sisa-stok').style.display = 'block';
        }
    }

    function tampil() {
        console.log(selected);
        if(selected === 'terlaris') {
            if(cek() == false) {
                alert('Inputan tahun salah!');
                return false;
            }
                
            let tahun = document.querySelector('#tahun-terlaris').value;
            let url = 'sparepart_terlaris?tahun=' + tahun + '&jenis=tampil';
            window.open(url);
        } else if (selected === 'pendapatan-bulanan') {
            if(cek() == false) {
                alert('Inputan tahun salah!');
                return false;
            }

            let tahun = document.querySelector('#tahun-pendapatan').value;
            let url = 'pendapatan_bulanan?tahun=' + tahun + '&jenis=tampil';
            window.open(url);
        } else if (selected === 'pendapatan-tahunan') {
            let url = 'pendapatan_tahunan?jenis=tampil';
            window.open(url);
        } else if (selected === 'pengeluaran-bulanan') {
            if(cek() == false) {
                alert('Inputan tahun salah!');
                return false;
            }

            let tahun = document.querySelector('#tahun-pengeluaran').value;
            let url = 'pengeluaran_bulanan?tahun=' + tahun + '&jenis=tampil';
            window.open(url);
        } else if (selected === 'jasa') {
            if(document.querySelector('#tahun-jasa').value =='') {
                alert('Inputan tahun salah!!');
                return false;
            } else if(document.querySelector('#bulan').value =='') {
                alert('Inputan bulan salah!!');
                return false;
            }

            let tahun = document.querySelector('#tahun-jasa').value;
            let bulan = document.querySelector('#bulan').value;
            let url = 'penjualan_jasa?tahun=' + tahun + '&bulan=' + bulan + '&jenis=tampil';
            window.open(url);
        } else if (selected === 'stok') {

            if(document.querySelector('#tahun-stok').value =='') {
                alert('Inputan tahun salah!!');
                return false;
            } else if(document.querySelector('#sparepart').value =='') {
                alert('Inputan sparepart salah!!');
                return false;
            }

            console.log('es');
            let tahun = document.querySelector('#tahun-stok').value;
            let sparepart = document.querySelector('#sparepart').value;
            let url = 'sisa_stok?tahun=' + tahun + '&sparepart=' + sparepart + '&jenis=tampil';
            window.open(url);
        }

        return false;
    }

    function cetak() {
        if(selected === 'terlaris') {
            if(cek() == false) {
                alert('Inputan tahun salah!');
                return false;
            }

            let tahun = document.querySelector('#tahun-terlaris').value;
            let url = 'sparepart_terlaris?tahun=' + tahun + '&jenis=cetak';
            window.open(url);
        } else if (selected === 'pendapatan-bulanan') {
            if(cek() == false) {
                alert('Inputan tahun salah!!');
                return false;
            }
            let tahun = document.querySelector('#tahun-pendapatan').value;
            let url = 'pendapatan_bulanan?tahun=' + tahun + '&jenis=cetak';
            window.open(url);
        } else if (selected === 'pendapatan-tahunan') {
            let url = 'pendapatan_tahunan?jenis=cetak';
            window.open(url);
        } else if (selected === 'pengeluaran-bulanan') {
            if(cek() == false) {
                alert('Inputan tahun salah!!');
                return false;
            }

            let tahun = document.querySelector('#tahun-pengeluaran').value;
            let url = 'pengeluaran_bulanan?tahun=' + tahun + '&jenis=cetak';
            window.open(url);
        } else if (selected === 'jasa') {
            if(document.querySelector('#tahun-jasa').value =='') {
                alert('Inputan tahun salah!!');
                return false;
            } else if(document.querySelector('#bulan').value =='') {
                alert('Inputan bulan salah!!');
                return false;
            }

            let tahun = document.querySelector('#tahun-jasa').value;
            let bulan = document.querySelector('#bulan').value;
            let url = 'penjualan_jasa?tahun=' + tahun + '&bulan=' + bulan + '&jenis=cetak';
            window.open(url);
        } else if (selected === 'stok') {
            if(document.querySelector('#tahun-stok').value =='') {
                alert('Inputan tahun salah!!');
                return false;
            } else if(document.querySelector('#sparepart').value =='') {
                alert('Inputan sparepart salah!!');
                return false;
            }
            
            console.log('es');
            let tahun = document.querySelector('#tahun-stok').value;
            let sparepart = document.querySelector('#sparepart').value;
            let url = 'sisa_stok?tahun=' + tahun + '&sparepart=' + sparepart + '&jenis=cetak';
            window.open(url);
        }

        return false;

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

    function cek() {
        if(selected === 'terlaris') {
            if(document.querySelector('#tahun-terlaris').value =='')
                return false;
        } else if (selected === 'pendapatan-bulanan') {
            if(document.querySelector('#tahun-pendapatan').value =='')
                return false;
        } else if (selected === 'pendapatan-tahunan') {
            
        } else if (selected === 'pengeluaran-bulanan') {
            console.log("fsdaf");
            if(document.querySelector('#tahun-pengeluaran').value =='')
                return false;
        } else if (selected === 'jasa') {
            let tahun = document.querySelector('#tahun-jasa').value;
            let bulan = document.querySelector('#bulan').value;
            let url = 'penjualan_jasa?tahun=' + tahun + '&bulan=' + bulan + '&jenis=cetak';
            window.open(url);
        } else if (selected === 'stok') {
            console.log('es');
            let tahun = document.querySelector('#tahun-stok').value;
            let sparepart = document.querySelector('#sparepart').value;
            let url = 'sisa_stok?tahun=' + tahun + '&sparepart=' + sparepart + '&jenis=cetak';
            window.open(url);
        }

        return true;

    }
   
    
</script>