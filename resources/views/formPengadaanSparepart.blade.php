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
    <title>Atma Auto: Form Pengadaan Sparepart</title>
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
                    title="Transaksi Pengadaan">
                    </a>
                <h6 id="text9" class="text-center" style="color:white">Pengadaan</h6>
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
    <h1 class="text-center font-italic mt-5 mb-5 text-white">Pengadaan Sparepart</h1>

    {{-- Inputan Form Tanggal --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                <form>
                    <h5>Supplier</h5>
                    <select name="kodeSupplier" id="kodeSupplier" placeholder="Pilih Supplier" 
                    class="form-control input">
                        <option value="">--Pilih Supplier--</option>
                    </select>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    {{-- Tampil Tabel --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <form action="" class="text-center font-italic">
            <input id="myInput" type="text" name="search" placeholder="Cari Pengadaan Sparepart"
            class="rounded w-100 text-white pl-2"
            onkeyup="cari()" style="background-color:rgb(0,0,0,0.8);border:none">
                <br><br>
            </form>
            <br>
            <table class="table table-dark" id="tabelPengadaan">
            <thead>
                <tr>
                    <th scope="col">No. Pengadaan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Total</th>
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

    {{-- Inputan Form Detail --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-1 pt-5 pb-5 pl-5 pr-5 isi">
                <form onsubmit="return postDetail()">
                    <h5>Sparepart</h5>
                    <select name="kodeBarang" id="kodeBarang" placeholder="Pilih Sparepart" 
                    class="form-control input" onchange = "onChange(this)">
                        <option value="">--Pilih Sparepart--</option>
                    </select>
                    <br>
                    <h5>Satuan</h5>
                    <input type="text" name="satuan" id="satuan" placeholder="Masukkan Satuan"
                    class="form-control input" onkeyup = "cekNama()">
                    <br>
                    <h5>Jumlah</h5>
                    <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah"
                    class="form-control input">
                    <br>
                    <h5>Harga</h5>
                    <input type="number" name="harga" id="harga" placeholder="Masukkan Harga"
                    class="form-control input" disabled>
                    <br>
                    <br>
                    <input type="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <div class="m-3 row">
        <div class="col-sm-4 text-center offset-sm-4">
            <button onclick = "postPengadaan()" class="btn btn-success float-left w-50">Input</button>
            <button onclick = "batal()" class="btn btn-danger float-right w-50">Batal</button>    
        </div>  
    </div>
    {{-- Tampil Tabel --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <table class="table table-dark" id="tableDetail">
            <thead>
                <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
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
    let pengadaan;
    let detailPengadaan = [];
    let detail = [];
    let tablePengadaan = document.querySelector('#tabelPengadaan tbody');
    let tableDetail = document.querySelector('#tableDetail tbody')
    let col = ['id_pengadaan', 'tanggal_pengadaan', 'id_supplier', 'total_pengadaan'];
    let col2 = ['kode_sparepart', 'satuan', 'jumlah', 'harga_beli'];
    let editedPengadaan = false, editedPK, editedID;
    let sparepart = [];

    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    tampilPengadaan();

    let select = document.querySelector('#kodeBarang');
    let select2 = document.querySelector('#kodeSupplier');

    axios.get('api/supplier/tampil', config)
    .then((result) => {
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_supplier);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].id_supplier);
            select2.insertBefore(option, select2.lastChild);
        }
    }).catch((err) => {
        console.log(err);
    });

    axios.get('api/sparepart/tampil', config)
    .then((result) => {
        sparepart = result.data;
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_sparepart);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].kode_sparepart);
            select.insertBefore(option, select.lastChild);
        }
    }).catch((err) => {
        console.log(err);
    });

    function tampilPengadaan() {
        tablePengadaan.innerHTML = '';
        axios.get('api/pengadaan/tampil', config)
        .then((result) => {
            console.log(result.data);
            pengadaan = result.data;
            for(let i = 0; i < pengadaan.length; i++) {
                let tr = tablePengadaan.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= col.length; j++){
                    td = tr.insertCell();  
                    if(j == col.length) {
                        let buttonEdit = document.createElement('input');
                        buttonEdit.setAttribute('type', 'button');
                        buttonEdit.setAttribute('value', 'Ubah');
                        buttonEdit.setAttribute('class', 'btn btn-primary');
                        buttonEdit.setAttribute('onclick', 'ubahPengadaan(this)');
                        
                        if(result.data[i].status == 'Dicetak')
                            buttonEdit.setAttribute('disabled', true);
                        
                        td.appendChild(buttonEdit);
                        td.appendChild(document.createTextNode(' '));
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        buttonHapus.setAttribute('onclick', 'hapusPengadaan(this)');

                        if(result.data[i].status == 'Dicetak')
                            buttonHapus.setAttribute('disabled', true);

                        td.appendChild(buttonHapus);
                        td.appendChild(document.createTextNode(' '));
                        let buttonCetak = document.createElement('input');
                        buttonCetak.setAttribute('type', 'button');
                        buttonCetak.setAttribute('value', 'Cetak');
                        buttonCetak.setAttribute('class', 'btn');
                        buttonCetak.setAttribute('class', 'btn btn-success');
                        buttonCetak.setAttribute('onclick', 'cetak(this)');
                        if(result.data[i].status == 'Dicetak')
                            buttonCetak.setAttribute('disabled', true);
                        td.appendChild(buttonCetak);                
                    }else {
                        td.innerHTML = pengadaan[i][col[j]];
                    }
                }  
            }
        }).catch((err) => {
            console.log(err);
        });
    }

    function tampilDetail()
    {
        // detailPengadaan = [];
        document.querySelector('#tableDetail tbody').innerHTML = '';
        axios.get('api/detailpengadaan/cari/' + editedPK, config)
        .then((result) => {
            console.log(result.data);
            detailPengadaan = result.data;
            console.log(detailPengadaan);
            for(let i = 0; i < detailPengadaan.length; i++) {
                let tr = tableDetail.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= col2.length; j++){
                    td = tr.insertCell();  
                    if(j == col2.length) {
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        let id;
                        id = detailPengadaan[i].id_detail_pengadaan;
                        console.log(id);
                        buttonHapus.setAttribute('onclick', 'hapusDetail(this)');
                        td.appendChild(buttonHapus);              
                    }else {
                        td.innerHTML = detailPengadaan[i][col2[j]];
                        }
                }  
            }
        }).catch((err) => {
                console.log(err);
        });
    }

    function ubahPengadaan(obj) {
        document.querySelector('#kodeSupplier').value = obj.parentNode.parentNode.cells[2].innerHTML;
        editedPK = obj.parentNode.parentNode.cells[0].innerHTML;
        tampilDetail();
        editedPengadaan = true;
        editedID = obj.parentNode.parentNode.rowIndex;
    }

    function postDetail() {
        if(cekDetail() == false)
            return false;

        let det = {};
        det.kode_sparepart = document.querySelector('#kodeBarang').value;
        det.satuan = document.querySelector('#satuan').value;
        det.jumlah = document.querySelector('#jumlah').value;
        det.harga_beli = document.querySelector('#harga').value;
        
        let cek = detailPengadaan.some(dt => dt.kode_sparepart === det.kode_sparepart);
        if(cek === true) {
            alert('Sparepart Telah Terdaftar!');
            return false;
        }

        detailPengadaan.push(det);

        let tr = tableDetail.insertRow(-1);
        let td = document.createElement('td'); 
        for(j = 0; j <= Object.keys(det).length; j++){
            td = tr.insertCell();  
            if(j == Object.keys(det).length) {
                let buttonHapus = document.createElement('input');
                buttonHapus.setAttribute('type', 'button');
                buttonHapus.setAttribute('value', 'Hapus');
                buttonHapus.setAttribute('class', 'btn');
                buttonHapus.setAttribute('class', 'btn btn-danger');
                buttonHapus.setAttribute('onclick', 'hapusDetail(this)');
                td.appendChild(buttonHapus);
            }else {
                td.innerHTML = det[col2[j]];
            }
        } 

        console.log(detailPengadaan);
        
        return false;
    }

    function hapusDetail(obj) {
        detailPengadaan.splice(obj.parentNode.parentNode.rowIndex-1, 1);
        tableDetail.deleteRow(obj.parentNode.parentNode.rowIndex-1);
    }

    function postPengadaan() {
        if(cekPengadaan() == false)
            return false;
        
        let total_pengadaan = 0;
        let id_supplier = document.querySelector('#kodeSupplier').value;

        let tampung = detailPengadaan;
        
        for(let i = 0; i < tampung.length; i++) {
            total_pengadaan += tampung[i].harga_beli*tampung[i].jumlah;
        }
        
        let formData = new FormData();
        formData.append('id_supplier', id_supplier);
        formData.append('total_pengadaan', total_pengadaan);
        formData.append('status', 'Belum Dicetak');              
        if(editedPengadaan == false) {
            axios.post('api/pengadaan/tambah', formData, config)
            .then((result) => {
                console.log(result);
                for(let i = 0; i < tampung.length; i++)
                    tampung[i].id_pengadaan = result.data.pengadaan.id_pengadaan;
                    console.log(tampung);
                tambahDetail(tampung);
                alert('Input Berhasil!');
                tampilPengadaan();
            }).catch((err) => {
                alert('Input Gagal!');
                console.log(err);
            }); 
            cls();
        } else {
            let tampung = detailPengadaan;
            formData.append('_method', 'PUT');
            axios.post('api/pengadaan/ubah/'+editedPK, formData, config)
            .then((result) => {
                console.log(tampung);
                for(let i = 0; i < tampung.length; i++) {
                    tampung[i].id_pengadaan = editedPK;
                }
                tambahDetail(tampung);
                alert('Edit Berhasil!');
                tampilPengadaan();
            }).catch((err) => {
                console.log(err.response);
                alert('Edit Gagal');
            });
            cls();
        }
        editedPengadaan = false;
    }

    function tambahDetail(detail) {
        console.log(detail);
        let formDataDetail = new FormData(); 
        console.log(JSON.stringify(detail));
        formDataDetail.append('data', JSON.stringify(detail));
        axios.post('api/detailpengadaan/tambah', formDataDetail, config)
        .then((result) => {
            console.log(result);
        }).catch((err) => {
            console.log(err.response);
        });
    }

    function hapusPengadaan (obj) {
        if(confirm('Apakah Anda Yakin?')) {
            axios.delete('api/pengadaan/hapus/'+ obj.parentNode.parentNode.cells[0].innerHTML ,config)
            .then((result) => {
                pengadaan.splice(obj.parentNode.parentNode.rowIndex-1, 1);
                tabelPengadaan.deleteRow(obj.parentNode.parentNode.rowIndex);
                alert('Delete Berhasil!');
            }).catch((err) => {
                alert('Delete Gagal');
                console.log(err.response);
            });
            document.querySelector('#tableDetail tbody').innerHTML = '';
            batal();
        }
    }

    function cls() {
        document.querySelector('#kodeSupplier').value = '';
        document.querySelector('#kodeBarang').value = '';
        document.querySelector('#satuan').value = '';
        document.querySelector('#jumlah').value = '';  
        document.querySelector('#harga').value = '';
        document.querySelector('#tableDetail tbody').innerHTML = '';
        detailPengadaan = [];
        editedPengadaan = false;
    }

    function cekPengadaan() {
        if(document.querySelector('#kodeSupplier').value == '') {
            alert('Data Pengadaan Tidak Boleh Kosong');
            return false;
        }
        else if(detailPengadaan.length == 0) {
            alert('Detail Pengadaan Tidak Boleh Kosong!');
            return false;
        }  
        else
            return true;
    }
    
    function cekDetail() {
        if(document.querySelector('#kodeBarang').value == '' 
        || document.querySelector('#satuan').value == '' 
        || document.querySelector('#jumlah').value == '' 
        || document.querySelector('#harga').value == '') {
            alert('Data Detail Pengadaan Tidak Boleh Kosong!');
            return false;
        }
        else if(document.querySelector('#jumlah').value <= 0) {
            alert('Jumlah Tidak Boleh Kurang Dari 1!');
            return false;
        }
        else if(document.querySelector('#harga').value < 0) {
            alert('Harga Tidak Boleh Kurang Dari 0!');
            return false;
        }
        else
            return true;
    }

    function batal() {
        cls();
        editedPengadaan = false;
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

        function cari() {
            var input, sfilter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabelPengadaan");
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

        function onChange(obj) {
            let selectSparepart = obj;
            let selected = selectSparepart.options[selectSparepart.selectedIndex].value;
            let spr = sparepart.filter(spr => spr.kode_sparepart === selected)
            document.querySelector('#harga').value = spr[0].harga_beli_sparepart;

        }

        function cetak(obj) {
            let id = obj.parentNode.parentNode.cells[0].innerHTML;
            let formData = new FormData();
            formData.append('_method', 'PUT');
            axios.post('api/pengadaan/selesai/' + id, formData, config)
            .then((result) => {
                obj.setAttribute('disabled', true);
                obj.parentNode.childNodes[0].setAttribute('disabled', true);
                obj.parentNode.childNodes[2].setAttribute('disabled', true);
                let url = 'nota_pengadaan/?id=' + id;
                window.open(url);
            }).catch((err) => {
                
                
            });
            

            
        }

        function cekNama()
        {
            let nama = document.getElementById("satuan").value;
            if(nama.match(/[0-9]/) || nama.match(/[$-/:-@{-~!"^_`\[\]]/))
            {
                alert("Inputan hanya alfabet");
                document.getElementById("satuan").value = "";
                return false;
            }
        }
</script>