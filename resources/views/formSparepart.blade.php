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
    <title>Atma Auto: Form Sparepart</title>
</head>
<body>
    {{-- Header --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#2c3e50">
                <a href="admin"><img src="Logo.png" class="img-fluid mx-auto d-block"
                style="width:20% ;filter:invert(1);" alt="Logo AA"></a>
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
                    title="Kelola Data Merk" onmouseover="fadein(2)" onmouseout="fadeout(2)"
                    style="opacity:0.5">
                </a>
                <h6 id="text2" class="text-center hide"style="color:white">Merk</h6>
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
                    title="Kelola Data Pegawai" onmouseover="fadein(4)" onmouseout="fadeout(4)" style="opacity:0.5">
                </a>
                <h6 id="text4" class="text-center hide" style="color:white">Pegawai</h6>
            </div>
            <div class="col-1">
                <a href="sparepart">
                    <img id="img5" src="OWSparepart.png" alt="Menu Sparepart" class="img-fluid gambarMenu p-3"
                    title="Kelola Data Sparepart">
                </a>
                <h6 class="text-center" style="color:white">Sparepart</h6>
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
    <h1 class="text-center font-italic mb-3 text-white">Kelola Data Sparepart</h1>

    {{-- Inputan Form --}}
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4 text-center mb-5 p-4 isi" style="border-radius:20px 0px 0px 20px">
                <form onsubmit = "return post()" name="formSparepart">
                    <h5>Letak</h5>
                    <select name="letak" placeholder="Pilih Letak"  id="letak"
                    class="form-control input">
                        <option value="">--Pilih Letak--</option>
                        <option value="DPN">Depan</option>
                        <option value="TGH">Tengah</option>
                        <option value="BLK">Belakang</option>
                    </select>
                    <br>
                    <h5>Ruang</h5>
                    <select name="ruang" placeholder="Pilih Ruang" id="ruang"
                    class="form-control input">
                        <option value="">--Pilih Ruang--</option>
                        <option value="KACA">Kaca</option>
                        <option value="DUS">Dus</option>
                        <option value="BAN">Ban</option>
                        <option value="KAYU">Kayu</option>
                    </select>
                    <br>
                    <h5>Nama</h5>
                    <input type="text" name="nama" placeholder="Masukkan Nama" id="nama"
                    class="form-control input" onkeyup="cekNama('nama')" maxlength="50">
                    <br>
                    <h5>Merk</h5>
                    <input type="text" name="merk" placeholder="Masukkan Merk" id="merk"
                    class="form-control input" onkeyup="cekNama('merk')" maxlength="50">
                    <br>
                    <h5>Tipe</h5>
                    <input type="text" name="tipe" placeholder="Masukkan Tipe" id="tipe"
                    class="form-control input" onkeyup="cekNama('tipe')" maxlength="50">
                    <br>
                    <h5>Kecocokan</h5>
                    <select name="kecocokan" placeholder="Pilih Kecocokan" id="kodeTipe"
                    class="form-control input" onchange="pilihCocok()">
                        <option value="">--Pilih Kecocokan--</option>
                    </select>
                    <br>
                    <button id="btnKecocokan" onclick = "return tambahKecocokan()" class="btn btn-primary" disabled>
                    Tambah Kecocokan</button>
            </div>
            <div class="col-4 text-center mb-5 p-4 isi" style="border-radius:0px 20px 20px 0px">
                    <h5>Harga Beli</h5>
                    <input type="number" name="hargaBeli" placeholder="Masukkan Harga Beli" id="harga_beli"
                    class="form-control input" min="0" max="9999999999">
                    <br>
                    <h5>Harga Jual</h5>
                    <input type="number" name="hargaJual" placeholder="Masukkan Harga Jual" id="harga_jual"
                    class="form-control input" onkeyup="cekBandingHarga()" min="0" max="9999999999">
                    <br>
                    <h5>Stok</h5>
                    <input type="number" name="stok" placeholder="Masukkan Stok" id="stok"
                    class="form-control input" min="0" max="9999">
                    <br>
                    <h5>Minimal Stok</h5>
                    <input type="number" name="min_sparepart" placeholder="Masukkan Minimal Stok" id="min_stok"
                    class="form-control input" min="0" max="9999">
                    <br>
                    <h5>Gambar</h5>
                    <input type="file" name="gambar" id="gambar" class="form-control input" onchange="show(event)">
                    <div class="showGambar" style="display: none;">
                        <br>
                        <img id="gambarSpr" src="" width="350px" heigh="350px"/>
                    </div>
                    <br>
                    <br>
                    <table id= "tableKecocokan" class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Tipe Motor</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <input id="submit" type="submit" value="Input" class="btn btn-success w-50 float-left">
                </form>
                <button class="btn btn-danger w-50 float-right" onclick="cls()">Batal</button>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    {{-- Tampil Tabel --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <h1 class="text-center font-italic text-white">Cari Data Sparepart</h1>
            <form action="" class="text-center font-italic ">
                <input id="myInput" type="text" name="search" placeholder="Cari Sparepart" 
                class="rounded w-100 text-white pl-2" onkeyup="cari()"
                style="background-color:rgb(0,0,0,0.8);border:none">
            </form>
            <br>
            <br>
            <h1 class="text-center font-italic text-white">Table Sparepart</h1>
            <table class="table table-dark text-center" id="tableSparepart">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Penempatan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Min. Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    {{-- Footer Logo --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#34495e">
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
    /* border-radius:20px */
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
    let sparepart;
    let id_tipe = [];
    let tableSparepart = document.querySelector('#tableSparepart tbody');
    let col = ['kode_sparepart', 'penempatan_sparepart', 'nama_sparepart', 'merk_sparepart', 'tipe_sparepart', 
                'harga_beli_sparepart', 'harga_jual_sparepart', 
                'stok_sparepart', 'min_stok', 'gambar_sparepart'];
    let edited = false;
    let editedID = '';
    let editedPK = '';

    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    function cls(){
        document.getElementById("letak").selectedIndex = "0";
        document.getElementById("ruang").selectedIndex = "0";
        document.getElementById("nama").value="";
        document.getElementById("merk").value="";
        document.getElementById("tipe").value="";
        document.getElementById("harga_beli").value="";
        document.getElementById("harga_jual").value="";
        document.getElementById("stok").value="";
        document.getElementById("min_stok").value="";
        document.getElementById("gambar").value="";
        document.getElementById("kodeTipe").selectedIndex = "0";
        document.querySelector('.showGambar').style.display = "none";
        tableKecocokan.innerHTML = "";
        document.querySelector("#gambarSpr").setAttribute('src', '');
        id_tipe = [];
        pilihCocok();
        edited = false;
    }

    function cekEmpty(){
        if(document.getElementById("letak").selectedIndex == "0"||
        document.getElementById("ruang").selectedIndex == "0"||
        document.getElementById("nama").value == ""||
        document.getElementById("merk").value == ""||
        document.getElementById("harga_beli").value == ""||
        document.getElementById("harga_jual").value == ""||
        document.getElementById("stok").value == ""||
        document.getElementById("min_stok").value == ""||
        document.getElementById("gambarSpr").getAttribute('src') == ""||
        id_tipe.length == 0)
        {
            return true;
        }
        else
            return false;
    }

    let select = document.querySelector('#kodeTipe');

    axios.get('api/tipekendaraan/tampil', config)
    .then((result) => {
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_tipe);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].id_tipe);
            select.insertBefore(option, select.lastChild);
        }
    }).catch((err) => {
        console.log(err.response);
    });

    function tampil() {
        tableSparepart.innerHTML = '';
        axios.get('api/sparepart/tampil', config)
        .then((result) => {
            console.log(result.data);
            sparepart = result.data;
            console.log(sparepart.length);
            for(let i = 0; i < sparepart.length; i++) {
                let tr = tableSparepart.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= col.length-1; j++){
                    td = tr.insertCell();  
                    if(j == col.length-1) {
                        let buttonEdit = document.createElement('input');
                        buttonEdit.setAttribute('type', 'button');
                        buttonEdit.setAttribute('value', 'Ubah');
                        buttonEdit.setAttribute('id', 'ubah');
                        buttonEdit.setAttribute('class', 'btn btn-primary');
                        buttonEdit.setAttribute('onclick', 'ubah(this)');
                        td.appendChild(buttonEdit);
                        td.appendChild(document.createTextNode(' '));
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('id', 'hapus');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        buttonHapus.setAttribute('onclick', 'hapus(this)');
                        td.appendChild(buttonHapus);
                    }else {
                        td.innerHTML = sparepart[i][col[j]];
                        }
                    }  
            }
        }).catch((err) => {
            console.log(err.response);
        });
    }

    tampil(); 

    let tableKecocokan = document.querySelector('#tableKecocokan tbody');

    function tambahKecocokan () {
        let tipe = document.querySelector('#kodeTipe').value;

        let cek = id_tipe.indexOf(tipe) === -1;

        console.log(cek);

        if(cek === false) {
            alert('Data telah terdaftar');
            return false;
        }

        id_tipe.push(tipe);

            let tr = tableKecocokan.insertRow(-1);
            let td = document.createElement('td'); 
            for(j = 0; j <= 1; j++){
                td = tr.insertCell();  
                if(j == 1) {
                    let buttonEdit = document.createElement('input');
                    buttonEdit.setAttribute('type', 'button');
                    buttonEdit.setAttribute('value', 'Hapus');
                    buttonEdit.setAttribute('id', 'hapuskecocokan');
                    buttonEdit.setAttribute('class', 'btn btn-danger');
                    buttonEdit.setAttribute('onclick', 'hapusKecocokan(this)');
                    td.appendChild(buttonEdit);
                }else {
                    td.innerHTML = tipe;
                }
            } 

        return false;
    }

    function hapusKecocokan (obj) {
        id_tipe.splice(obj.parentNode.parentNode.rowIndex-1, 1);
        console.log(id_tipe);
        tableKecocokan.deleteRow(obj.parentNode.parentNode.rowIndex-1);
    }

    function post() {
        let hjual = document.getElementById("harga_jual").value;
        let hbeli = document.getElementById("harga_beli").value;
        let temp = document.getElementById("harga_jual").value - document.getElementById("harga_beli").value;
        if(cekEmpty())
        {
            alert("Data Tidak Boleh Kosong!");
            return false;
        }
        else if(temp < 0)
        {
            alert("Harga Jual harus = atau > harga beli!");
            return false;
        }
        else{
            let letak = document.querySelector('#letak').value;
            let ruang = document.querySelector('#ruang').value;
            let penempatan_sparepart = letak+'-'+ruang+'-';
            let tipe_sparepart = document.querySelector('#tipe').value;
            let nama_sparepart = document.querySelector('#nama').value;
            let harga_jual_sparepart = document.querySelector('#harga_jual').value;
            let harga_beli_sparepart = document.querySelector('#harga_beli').value;
            let merk_sparepart = document.querySelector('#merk').value;
            let stok_sparepart = document.querySelector('#stok').value;
            let min_stok = document.querySelector('#min_stok').value;
            let gambar_sparepart = document.forms['formSparepart']['gambar'].files[0];
            let formData = new FormData();
            formData.append('penempatan_sparepart', penempatan_sparepart);
            formData.append('tipe_sparepart', tipe_sparepart);
            formData.append('nama_sparepart', nama_sparepart);
            formData.append('harga_beli_sparepart', harga_beli_sparepart);
            formData.append('harga_jual_sparepart', harga_jual_sparepart);
            formData.append('merk_sparepart', merk_sparepart);
            formData.append('stok_sparepart', stok_sparepart);
            formData.append('min_stok', min_stok);
            formData.append('gambar_sparepart', gambar_sparepart);
            formData.append('id_tipe', JSON.stringify(id_tipe));
            if(edited == false) {
                axios.post('api/sparepart/tambah', formData, config)
                .then((result) => {
                    console.log(result);
                    let spr = {};
                    spr.kode_sparepart = result.data.kode_sparepart;
                    spr.nama_sparepart = nama_sparepart;
                    spr.tipe_sparepart = tipe_sparepart;
                    spr.merk_sparepart = merk_sparepart;
                    spr.harga_jual_sparepart = harga_jual_sparepart;
                    spr.harga_beli_sparepart = harga_beli_sparepart;
                    spr.stok_sparepart = stok_sparepart;
                    spr.min_stok = min_stok;
                    spr.penempatan_sparepart = result.data.penempatan_sparepart;
                    sparepart.push(spr);

                    let tr = tableSparepart.insertRow(-1);
                    let td = document.createElement('td'); 
                    for(j = 0; j <= Object.keys(spr).length; j++){
                        td = tr.insertCell();  
                        if(j == Object.keys(spr).length) {
                            let buttonEdit = document.createElement('input');
                            buttonEdit.setAttribute('type', 'button');
                            buttonEdit.setAttribute('value', 'Ubah');
                            buttonEdit.setAttribute('class', 'btn btn-primary');
                            buttonEdit.setAttribute('id', 'ubah');
                            buttonEdit.setAttribute('onclick', 'ubah(this)');
                            td.appendChild(buttonEdit);
                            td.appendChild(document.createTextNode(' '));
                            let buttonHapus = document.createElement('input');
                            buttonHapus.setAttribute('type', 'button');
                            buttonHapus.setAttribute('value', 'Hapus');
                            buttonHapus.setAttribute('class', 'btn');
                            buttonHapus.setAttribute('id', 'hapus');
                            buttonHapus.setAttribute('class', 'btn btn-danger');
                            buttonHapus.setAttribute('onclick', 'hapus(this)');
                            td.appendChild(buttonHapus);
                        }else {
                            td.innerHTML = spr[col[j]];
                        }
                    }
                    alert("Input Berhasil!");
                }).catch((err) => {
                    console.log(err.response);
                    alert("Input Gagal!");
                });
            } else {
                axios.post('api/sparepart/ubah/' + editedPK, formData, config)
                .then((result) => {
                    tampil();
                    edited = false;
                    alert("Edit Berhasil!");
                }).catch((err) => {
                    console.log(err.response);
                    alert("Edit Gagal!");
                });
                
            }
            cls();
            edited = false;
            return false;
        }
    }

    function hapus(obj) {
        if(confirm("Apakah anda yakin?"))
        {
            axios.delete('api/sparepart/hapus/'+ obj.parentNode.parentNode.cells[0].innerHTML ,config)
            .then((result) => {
                sparepart.splice(obj.parentNode.parentNode.rowIndex-1, 1);
                tableSparepart.deleteRow(obj.parentNode.parentNode.rowIndex-1);
                alert("Delete Berhasil!");
            }).catch((err) => {
                console.log(err.response);
                alert("Delete Gagal!");
            });
        }
    }

    function ubah(obj) {
        document.querySelector('#tableKecocokan tbody').innerHTML = '';
        let penempatan = obj.parentNode.parentNode.cells[1].innerHTML;
        let letak = penempatan.substring(0, 3);
        let ruang;
        id_tipe = [];
        if(penempatan.length == 11) { 
            ruang = penempatan.substring(4, 8);
            console.log(ruang);
        }
        else
        {
            ruang = penempatan.substring(4, 7);
        }
        
        document.querySelector('#letak').value = letak;
        document.querySelector('#ruang').value = ruang;
        document.querySelector('#nama').value = obj.parentNode.parentNode.cells[2].innerHTML;
        document.querySelector('#merk').value = obj.parentNode.parentNode.cells[3].innerHTML;
        document.querySelector('#tipe').value = obj.parentNode.parentNode.cells[4].innerHTML;
        document.querySelector('#harga_jual').value = obj.parentNode.parentNode.cells[6].innerHTML;
        document.querySelector('#harga_beli').value = obj.parentNode.parentNode.cells[5].innerHTML;
        document.querySelector('#stok').value = obj.parentNode.parentNode.cells[7].innerHTML;
        document.querySelector('#min_stok').value = obj.parentNode.parentNode.cells[8].innerHTML;
        // document.querySelector('#gambar').value = obj.parentNode.parentNode.cells[2].innerHTML;
        // document.querySelector('#kodeMerk').value = obj.parentNode.parentNode.cells[1].innerHTML;
        // document.querySelector('#nama_tipe').value = obj.parentNode.parentNode.cells[2].innerHTML;
        editedID = obj.parentNode.parentNode.rowIndex;
        editedPK = obj.parentNode.parentNode.cells[0].innerHTML;
        let tipe;
        axios.get('api/sparepart/cari/'+editedPK, config)
        .then((result) => {
            console.log(result.data);

            tipe = result.data.tipe_kendaraan;
            document.querySelector('#gambarSpr').src = result.data.gambar_sparepart;
            document.querySelector('.showGambar').style.display = 'block';
            for(let i = 0; i < tipe.length; i++) {
                let tr = tableKecocokan.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= 1; j++){
                    td = tr.insertCell();  
                    if(j == 1) {
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('id', 'hapuskecocokan');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        buttonHapus.setAttribute('onclick', 'hapusKecocokan(this)');
                        td.appendChild(buttonHapus);
                    }else {
                        td.innerHTML = tipe[i].id_tipe;
                        id_tipe.push(tipe[i].id_tipe);
                    }
                }  
            }
            console.log(id_tipe);
        }).catch((err) => { 
        });
        edited = true;
    }

    function pilihCocok(){
        if(document.getElementById("kodeTipe").selectedIndex == "0")
        {
            document.getElementById("btnKecocokan").disabled = true;
        }
        else
        document.getElementById("btnKecocokan").disabled = false;
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

    function cari() {
        var input, sfilter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSparepart");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }

    function fadeout(i){
        document.getElementById("img" + i).style.opacity="0.5";
        document.getElementById("text" + i).style.display = "none";
    }

    function fadein(i){
        document.getElementById("img" + i).style.opacity="1";
        document.getElementById("text" + i).style.display = "block";
    }

    function cekNama(id)
    {
        let nama = document.getElementById(id).value;
        if(nama.match(/[0-9]/) || nama.match(/[$-/:-@{-~!"^_`\[\]]/))
        {
            alert("Inputan hanya alfabet");
            document.getElementById(id).value = "";
            return false;
        }
    }

    function cekBandingHarga()
    {
        let hBeli = document.getElementById("harga_beli").value;
        let hJual = document.getElementById("harga_jual").value;

        if(hBeli == "")
        {
            alert("Masukkan Harga Beli Terlebih Dahulu!");
            document.getElementById("harga_jual").value = "";
            return false;
        }
    }

    function show(event) {
        console.log(event.target.files[0]);
        document.querySelector('#gambarSpr').src = URL.createObjectURL(event.target.files[0]);
        document.querySelector('.showGambar').style.display = 'block';
    }
</script>