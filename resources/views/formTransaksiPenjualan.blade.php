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
        let jabatan = 'Customer Service';
        if (localStorage.getItem('token') === null)
            window.location.href = '/8900/public';
        else if (localStorage.getItem('jabatan') !== jabatan)
        window.history.back();
    </script>
    <title>Atma Auto: Penjualan</title>
</head>
<body>
    {{-- Header --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#2c3e50;">
                <img src="Logo.png" class="img-fluid mx-auto d-block"
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
            <div class="col-5"></div>
            <div class="col-1">
                <a href="tampilpenjualan">
                    <img id="img9" src="OWPenjualan.png" alt="Menu Pengadaan" class="img-fluid gambarMenu p-3"
                    title="Transaksi Pengadaan">
                    </a>
                <h6 id="text9" class="text-center" style="color:white">Penjualan</h6>
            </div>
            <div class="col-1">
                <img id="img10" src="OWLogout.png" alt="Logout Button" class="img-fluid gambarMenu p-3"
                title="Logout" onclick="logout()" onmouseover="fadein(10)" onmouseout="fadeout(10)"
                style="opacity:0.5">
                <h6 id="text10" class="text-center hide" style="color:white">Logout</h6>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <div style="background-image:url('wpp2.png');background-size:100% auto">
    <br> 

    <h1 class="text-center font-italic mt-5 mb-5 text-white">Transaksi Penjualan</h1>

    {{-- Inputan Data Customer --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                <h4>Data Customer</h4>
                <br>
                <h5>Customer</h5>
                <input type="text" name="customer" placeholder="Masukkan Nama Customer" id="nama"
                class="form-control input" onkeyup="cekNama('nama')" maxlength="50">
                <br>
                <h5>No. Telp</h5>
                <input type="text" name="noTelp" placeholder="Masukkan No. Telp" id="noTelp" maxlength="12"
                class="form-control input" onkeyup="cekTelp('noTelp')">
                <br>
                <h5>Jenis Transaksi</h5>
                <select name="jenisTransaksi" placeholder="Pilih Jenis Transaksi" id="transaksi"
                class="form-control input" onchange="change(this)">
                    <option value="">--Pilih Transaksi--</option>
                    <option value="SP">SP</option>
                    <option value="SV">SV</option>
                    <option value="SS">SS</option>
                </select>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div id="service" style="display: none">
        {{-- Inputan Data Kendaraan Customer --}}
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                    <h4>Data Kendaraan Customer</h4>
                    <br>
                    <form onsubmit = "return tambahKendaraan()">
                        <h5>Tipe Motor</h5>
                        <select name="tipeMotor" placeholder="Pilih Tipe Motor" id="tipe" 
                        class="form-control input">
                            <option value="">--Pilih Tipe Motor--</option>
                        </select>
                        <br>
                        <h5>No. Polisi</h5>
                        <input type="text" name="noPolisi" placeholder="Masukkan Nomor Polisi" id="nopol"
                        class="form-control input" onkeyup="cekNopol('nopol')">
                        <br>
                        <h5>Montir</h5>
                        <select name="montir" placeholder="Pilih Montir" id="pegawai" 
                        class="form-control input">
                            <option value="">--Pilih Montir--</option>
                        </select>
                        <br>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

        {{-- Tampil Data Kendaraan Customer --}}
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 mb-5">
                <table class="table table-dark" id="tableKendaraan">
                    <thead>
                        <tr>
                            <th scope="col">Motor</th>
                            <th scope="col">No. Polisi</th>
                            <th scope="col">Montir</th>
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

        {{-- Inputan Data Jasa Service --}}
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                    <h4>Data Jasa Service</h4>
                    <br>
                    <form onsubmit = "return tambahDetailService()">
                        <h5>Motor</h5>
                        <select name="motor" placeholder="Pilih Motor" 
                        class="form-control input" id="motor">
                            <option value="">--Pilih Motor--</option>
                        </select>
                        <br>
                        <h5>Jasa Service</h5>
                        <select name="jasaService" placeholder="Pilih Jasa Service" id="jasaService"
                        class="form-control input">
                            <option value="">--Pilih Jasa Service--</option>
                        </select>
                        <br>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

        {{-- Tampil Data Jasa Service --}}
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 mb-5">
                <table class="table table-dark" id="tableService">
                    <thead>
                        <tr>
                            <th scope="col">Motor</th>
                            <th scope="col">Jasa Service</th>
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
    
    <div id="sparepart" style="display: none">
        {{-- Inputan Data Sparepart --}}
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                    <h4>Data Sparepart</h4>
                    <br>
                    <form onsubmit = "return tambahDetailSparepart()">
                        <h5>Sparepart</h5>
                        <select name="kodeSparepart" placeholder="Pilih Sparepart" id="kodeSparepart"
                        class="form-control input">
                            <option value="">--Pilih Sparepart--</option>
                        </select>
                        <br>
                        <h5>Jumlah</h5>
                        <input type="number" name="jumlah" placeholder="Masukkan Jumlah" id="jumlah"
                        class="form-control input">
                        <br>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

        {{-- Tampil Data Sparepart --}}
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 mb-5">
                <table class="table table-dark" id="tableSparepart">
                    <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Jumlah</th>
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

    <!-------------------------------------------------- Sparepart SS ---------------------------------------------------------->

    <div id="sparepartSS" style="display: none">
        {{-- Inputan Data Sparepart --}}
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                    <h4>Data Sparepart</h4>
                    <br>
                    <form onsubmit = "return tambahDetailSparepartSS()">
                        <h5>Motor</h5>
                        <select name="motor" placeholder="Pilih Motor" 
                        class="form-control input" id="motorSS">
                            <option value="">--Pilih Motor--</option>
                        </select>
                        <br>
                        <h5>Sparepart</h5>
                        <select name="kodeSparepart" placeholder="Pilih Sparepart" id="kodeSparepartSS"
                        class="form-control input">
                            <option value="">--Pilih Sparepart--</option>
                        </select>
                        <br>
                        <h5>Jumlah</h5>
                        <input type="number" name="jumlah" placeholder="Masukkan Jumlah" id="jumlahSS"
                        class="form-control input">
                        <br>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

        {{-- Tampil Data Sparepart SS --}}
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 mb-5">
                <table class="table table-dark" id="tableSparepartSS">
                    <thead>
                        <tr>
                            <th scope="col">Motor</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Jumlah</th>
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
    
    {{-- Submit --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-5 pt-5 pb-5 pl-5 pr-5 isi">
                    <button class="btn btn-success" onclick = "return postPenjualan()">Input</button>
                    <button class="btn btn-danger" onclick="batal()">Batal</button>
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

#img10 {
    cursor: pointer;
}
</style>


</html>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let penjualan;
    let detailService = [], detailSparepart = [], detailSparepartSS = [];
    let motor = [];
    let sparepart = [];
    let edited = false;
    let idKendaraan = [];
    let tableKendaraan = document.querySelector('#tableKendaraan tbody');
    let tableService = document.querySelector('#tableService tbody');
    let tableSparepart = document.querySelector('#tableSparepart tbody');
    let tableSparepartSS = document.querySelector('#tableSparepartSS tbody');
    let col = ['no_transaksi', 'tanggal_transaksi', 'nama_customer',
            'no_telp_customer', 'status_transaksi', 'keterangan_transaksi'];
    let colService = ['no_polisi', 'id_jasa_service'];
    let colSparepart = ['kode_sparepart', 'jumlah_penjualan_sparepart'];
    let colSparepartSS = ['no_polisi', 'kode_sparepart', 'jumlah_penjualan_sparepart'];
    let col2 = ['id_tipe', 'no_polisi', 'id_pegawai'];
    let editedDetailService = false, editedIDDetailService;
    let editedDetailSparepart = false, editedIDDetailSparepart;
    let editedDetailSparepartSS = false, editedIDDetailSparepartSS;

    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    /**************************************************************************
                                        If Edited
    ***************************************************************************/

    const urlParams = new URLSearchParams(window.location.search);    
    let myURL;
    let jenis_transaksi;
    if(urlParams.get('id') !== null) {
        myURL = urlParams.get('id');
        jenis_transaksi = myURL.substring(0, 2);
        edited = true;
        console.log(myURL);
    }

    if(edited) {
        tampilPenjualan();
        tampilService();
        // tampilKendaraanCustomer();
        console.log(jenis_transaksi);
        if(jenis_transaksi == 'SS') {
            tampilSparepartSS();
            document.querySelector('#sparepartSS').style.display = 'block';
        }
        
        document.querySelector('#service').style.display = 'block';
    }

    function tampilSparepart() {
        axios.get('api/penjualansparepart/cari/' + myURL, config)
        .then((result) => {
            detailSparepart = result.data;
            for(let i = 0; i < result.data.length; i++) {
            let tr = tableSparepart.insertRow(-1);
            let td = document.createElement('td');      
            for(j = 0; j <= colSparepart.length; j++){
                td = tr.insertCell();  
                if(j == colSparepart.length) {
                    let buttonEdit = document.createElement('input');
                    buttonEdit.setAttribute('type', 'button');
                    buttonEdit.setAttribute('value', 'Ubah');
                    buttonEdit.setAttribute('class', 'btn btn-primary');
                    buttonEdit.setAttribute('onclick', 'ubahDetailSparepart(this)');
                    td.appendChild(buttonEdit);
                    td.appendChild(document.createTextNode(' '));
                    let buttonHapus = document.createElement('input');
                    buttonHapus.setAttribute('type', 'button');
                    buttonHapus.setAttribute('value', 'Hapus');
                    buttonHapus.setAttribute('class', 'btn');
                    buttonHapus.setAttribute('class', 'btn btn-danger');
                    buttonHapus.setAttribute('onclick', 'hapusDetailSparepart(this)');
                    td.appendChild(buttonHapus);
                }else {
                    td.innerHTML = result.data[i][colSparepart[j]];
                    }
                }  
        }
        }).catch((err) => {
            
        });
    }

    function tampilService ()
    {
        axios.get('api/penjualanjasa/cari/' + myURL, config)
        .then((result) => {
            detailService = result.data;
            console.log(detailService);
            for(let i = 0; i < result.data.length; i++) {

            detailService[i].id_kendaraan = result.data[i].kendaraan.id_kendaraan;
            
            let cek = idKendaraan.indexOf(result.data[i].kendaraan.id_kendaraan) === -1;
            if(cek === true)
                idKendaraan.push(result.data[i].kendaraan.id_kendaraan);

            let tr = tableService.insertRow(-1);
            let td = document.createElement('td');      
            for(j = 0; j <= colService.length; j++){
                td = tr.insertCell();  
                    if(j == colService.length) {
                        let buttonEdit = document.createElement('input');
                        buttonEdit.setAttribute('type', 'button');
                        buttonEdit.setAttribute('value', 'Ubah');
                        buttonEdit.setAttribute('class', 'btn btn-primary');
                        buttonEdit.setAttribute('onclick', 'ubahDetailService(this)');
                        td.appendChild(buttonEdit);
                        td.appendChild(document.createTextNode(' '));
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        buttonHapus.setAttribute('onclick', 'hapusDetailService(this)');
                        td.appendChild(buttonHapus);
                    } else if (j == 0) {
                        td.innerHTML = result.data[i].kendaraan.no_polisi;
                    } else {
                        td.innerHTML = result.data[i][colService[j]];
                        }
                    }  
            }
            tampilKendaraanCustomer();
        }).catch((err) => {
            
        });
    }

    function tampilSparepartSS() {
        axios.get('api/penjualansparepart/cari/' + myURL, config)
        .then((result) => {
            detailSparepartSS = result.data;
            for(let i = 0; i < result.data.length; i++) {

                detailSparepartSS[i].id_kendaraan = result.data[i].kendaraan.id_kendaraan;

                let tr = tableSparepartSS.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= colSparepartSS.length; j++){
                    td = tr.insertCell();  
                    if(j == colSparepartSS.length) {
                        let buttonEdit = document.createElement('input');
                        buttonEdit.setAttribute('type', 'button');
                        buttonEdit.setAttribute('value', 'Ubah');
                        buttonEdit.setAttribute('class', 'btn btn-primary');
                        buttonEdit.setAttribute('onclick', 'ubahDetailSparepartSS(this)');
                        td.appendChild(buttonEdit);
                        td.appendChild(document.createTextNode(' '));
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        buttonHapus.setAttribute('onclick', 'hapusDetailSparepartSS(this)');
                        td.appendChild(buttonHapus);
                    } else if (j == 0) {
                        td.innerHTML = result.data[i].kendaraan.no_polisi;
                    } else {
                        td.innerHTML = result.data[i][colSparepartSS[j]];
                    }
                }  
            }
        }).catch((err) => {
            
        });
    }

    function tampilPenjualan () {
        axios.get('api/penjualan/cari/' + myURL, config)
        .then((result) => {
            console.log(result);
            document.querySelector('#nama').value = result.data.nama_customer;
            document.querySelector('#noTelp').value = result.data.no_telp_customer;
            
            document.querySelector('#transaksi').value = jenis_transaksi;
            document.querySelector('#transaksi').disabled = true;
        }).catch((err) => {
            alert('Data Penjualan Tidak Ditemukan');
            window.location.href = "tampilpenjualan";
            console.log(err.response);
        });
    }

    function tampilKendaraanCustomer() {
        axios.get('api/kendaraancustomer/tampil', config)
        .then((result) => {
            console.log(idKendaraan);
            for(let i = 0; i < result.data.length; i++) {
                for(let j = 0; j < idKendaraan.length; j++) {
                    if(result.data[i].id_kendaraan == idKendaraan[j]){
                        motor.push(result.data[i]);
                    }
                }
            }

            console.log(motor);

            for(let i = 0; i < motor.length; i++) {
                let tr = tableKendaraan.insertRow(-1);
                let td = document.createElement('td'); 
                for(j = 0; j <= 3; j++){
                    td = tr.insertCell();  
                    if(j == 3) {
                        let buttonHapus = document.createElement('input');
                        buttonHapus.setAttribute('type', 'button');
                        buttonHapus.setAttribute('value', 'Hapus');
                        buttonHapus.setAttribute('class', 'btn');
                        buttonHapus.setAttribute('class', 'btn btn-danger');
                        buttonHapus.setAttribute('onclick', 'hapusKendaraan(this)');
                        td.appendChild(buttonHapus);
                    }else {
                        td.innerHTML = motor[i][col2[j]];
                    }
                } 

                let option = document.createElement('option');
                let txt = document.createTextNode(motor[i].no_polisi);
                option.appendChild(txt);
                option.setAttribute('value', motor[i].no_polisi);
                selectKendaraan.insertBefore(option, selectKendaraan.lastChild);

                let option2 = document.createElement('option');
                let txt2 = document.createTextNode(motor[i].no_polisi);
                option2.appendChild(txt2);
                option2.setAttribute('value', motor[i].no_polisi);
                selectKendaraan2.insertBefore(option2, selectKendaraan2.lastChild);
            }
            
            

        }).catch((err) => {
            console.log(err.response);
        });
    }

    /**************************************************************************
    ***************************************************************************/

    let selectTipe = document.querySelector('#tipe');
    let selectPegawai = document.querySelector('#pegawai');
    let selectKendaraan = document.querySelector('#motor');
    let selectKendaraan2 = document.querySelector('#motorSS');
    let selectService = document.querySelector('#jasaService');
    let selectSparepart = document.querySelector('#kodeSparepart');
    let selectSparepartSS = document.querySelector('#kodeSparepartSS');

    axios.get('api/sparepart/tampil', config)
    .then((result) => {
        console.log(result);
        sparepart = result.data;
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_sparepart);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].kode_sparepart);
            selectSparepart.insertBefore(option, selectSparepart.lastChild);

            let option2 = document.createElement('option');
            let txt2 = document.createTextNode(result.data[i].nama_sparepart);
            option2.appendChild(txt2);
            option2.setAttribute('value', result.data[i].kode_sparepart);
            selectSparepartSS.insertBefore(option2, selectSparepartSS.lastChild);
        }
    }).catch((err) => {
        console.log(err.response);
    });

    axios.get('api/jasaservice/tampil', config)
    .then((result) => {
        console.log(result);
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_jasa_service);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].id_jasa_service);
            selectService.insertBefore(option, selectService.lastChild);
        }
    }).catch((err) => {
        console.log(err.response);
    });

    axios.get('api/tipekendaraan/tampil', config)
    .then((result) => {
        console.log(result);
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_tipe);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].id_tipe);
            selectTipe.insertBefore(option, selectTipe.lastChild);
        }
    }).catch((err) => {
        console.log(err.response); 
    });

    axios.get('api/pegawai/tampil_montir', config)
    .then((result) => {
        console.log(result);
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_pegawai);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].id_pegawai);
            selectPegawai.insertBefore(option, selectPegawai.lastChild);
        }
    }).catch((err) => {
        console.log(err.response);
    });

    function postKendaraan(no_transaksi) {
        let formData = new FormData();
        formData.append('data', JSON.stringify(motor));
        axios.post('api/kendaraancustomer/tambah', formData, config)
        .then((result) => {
            if(no_transaksi.substring(0, 2) == 'SS')
                postDetailSparepartSS(no_transaksi, result.data.kendaraan_customer, detailSparepartSS, detailService);
            else
                postDetailService(no_transaksi, result.data.kendaraan_customer, detailService);
        }).catch((err) => {
            console.log(err.response);
        });
    }

    function postDetailSparepartSS(no_transaksi, kendaraan_customer, detailsparepart, detailService) {
        console.log(detailsparepart);
        detailsparepart.map(dts => dts.no_transaksi = no_transaksi);
        for(let i = 0; i < detailsparepart.length; i++) {
            for(let j = 0; j < kendaraan_customer.length; j++) {
                if(!("kendaraan" in detailsparepart[i]) && detailsparepart[i].no_polisi == kendaraan_customer[j].no_polisi )
                    detailsparepart[i].id_kendaraan = kendaraan_customer[j].id_kendaraan;
                else if (("kendaraan" in detailsparepart[i]) && detailsparepart[i].kendaraan.no_polisi == kendaraan_customer[j].no_polisi)
                    detailsparepart[i].id_kendaraan = kendaraan_customer[j].id_kendaraan;
            }
        }

        console.log(detailsparepart);

        let formData = new FormData();
        formData.append('data', JSON.stringify(detailsparepart));
        axios.post('api/penjualansparepart/tambah', formData, config)
        .then((result) => {
            console.log(result.data);
            // if(edited == false) {
            //     // alert('Input Berhasil');
            //     // for(let i = 0; i < kendaraan_customer.length; i++) {
            //     //     let url = '/nota_spk?notrans=' + no_transaksi + '&kendaraan=' + kendaraan_customer[i].id_kendaraan;
            //     //     window.open(url);
            //     // }
            // }
            // else
                // alert('Edit Berhasil');
            // window.location.href = '/tampilpenjualan';
            postDetailService(no_transaksi, kendaraan_customer, detailService);
        }).catch((err) => {
            if(edited == false)
                alert('Input Gagal');
            else
                alert('Edit Gagal');
            batal();
            console.log(err.response);
        });

    }

    function postDetailService(no_transaksi, kendaraan_customer, detailservice) {
        console.log(detailservice);
        detailservice.map(dts => dts.no_transaksi = no_transaksi);
        for(let i = 0; i < detailservice.length; i++) {
            for(let j = 0; j < kendaraan_customer.length; j++) {
                if(!("kendaraan" in detailservice[i]) && detailservice[i].no_polisi == kendaraan_customer[j].no_polisi )
                    detailservice[i].id_kendaraan = kendaraan_customer[j].id_kendaraan;
                else if (("kendaraan" in detailservice[i]) && detailservice[i].kendaraan.no_polisi == kendaraan_customer[j].no_polisi)
                    detailservice[i].id_kendaraan = kendaraan_customer[j].id_kendaraan;
            }
        }

        console.log("test");

        console.log(kendaraan_customer);

        let formData = new FormData();
        formData.append('data', JSON.stringify(detailservice));
        axios.post('api/penjualanjasa/tambah', formData, config)
        .then((result) => {
            console.log(result.data);
            if(edited == false) {
                alert('Input Berhasil');
                if(no_transaksi.substring(0, 2) === 'SV' || no_transaksi.substring(0, 2) === 'SS') {
                    for(let i = 0; i < kendaraan_customer.length; i++) {
                        let url = 'nota_spk?notrans=' + no_transaksi + '&kendaraan=' + kendaraan_customer[i].id_kendaraan;
                        window.open(url);
                    }
                }    
            }
            else
                alert('Edit Berhasil');
            window.location.href = 'tampilpenjualan';
        }).catch((err) => {
            if(edited == false)
                alert('Input Gagal');
            else
                alert('Edit Gagal');
            batal();
            console.log(err.response);
        });

    }

    function postDetailSparepart(no_transaksi, tanggal_transaksi) {
        detailSparepart.map(dts => dts.no_transaksi = no_transaksi);
        let formData = new FormData();
        formData.append('data', JSON.stringify(detailSparepart));
        axios.post('api/penjualansparepart/tambah', formData, config)
        .then((result) => {
            console.log(result.data);
            if(edited == false)
                alert('Input Berhasil');
            else
                alert('Edit Berhasil');
            window.location.href = 'tampilpenjualan';
        }).catch((err) => {
            if(edited == false)
                alert('Input Gagal');
            else
                alert('Edit Gagal');
            batal();
            console.log(err.response);
        });

    }

    function postPenjualan() {
        if(cekPenjualan() == false)
            return false;

        let nama = document.querySelector('#nama').value;
        let noTelp = document.querySelector('#noTelp').value;
        let transaksi = document.querySelector('#transaksi').value;
        let formData = new FormData();
        formData.append('nama_customer', nama);
        formData.append('no_telp_customer', noTelp);
        formData.append('jenis_transaksi', transaksi);
        formData.append('keterangan_transaksi', 'Belum Lunas');
        if(transaksi == 'SP')
            formData.append('status_transaksi', 'Selesai');
        else
            formData.append('status_transaksi', 'Proses');

        if(edited == false) {
            axios.post('api/penjualan/tambah', formData, config)
            .then((result) => {
                if(transaksi == 'SP')
                    postDetailSparepart(result.data.penjualan.no_transaksi, result.data.penjualan.tanggal_transaksi);
                else
                    postKendaraan(result.data.penjualan.no_transaksi);
            }).catch((err) => {
                console.log(err.response);
            });
        }
        else {
            formData.append('_method', 'PUT');
            axios.post('api/penjualan/ubah/' + myURL, formData, config)
            .then((result) => {
                if(transaksi == 'SP')
                    postDetailSparepart(result.data.penjualan.no_transaksi, result.data.penjualan.tanggal_transaksi);
                else
                    postKendaraan(result.data.penjualan.no_transaksi);
            }).catch((err) => {
                console.log(err.response);
            });
        }     
        return false;
    }
    
    /*******************************************************************
            Tambah dan Hapus Kendaraan Customer    
    *******************************************************************/ 

    function tambahKendaraan() {
        if(cekKendaraan() == false)
            return false;
            
        let ken = {};
        ken.id_tipe = document.querySelector('#tipe').value;
        ken.no_polisi = document.querySelector('#nopol').value;
        ken.id_pegawai = document.querySelector('#pegawai').value;
        
        let cek = motor.some(dt =>  dt.no_polisi === ken.no_polisi);
        if(cek) {
            alert('Kendaraan Dengan Nomor Polisi Tersebut Telah Terdaftar');
            return false;
        }
            
        motor.push(ken);

        let option = document.createElement('option');
        let txt = document.createTextNode(ken.no_polisi);
        option.appendChild(txt);
        option.setAttribute('value', ken.no_polisi);
        selectKendaraan.insertBefore(option, selectKendaraan.lastChild);

        let option2 = document.createElement('option');
        let txt2 = document.createTextNode(ken.no_polisi);
        option2.appendChild(txt2);
        option2.setAttribute('value', ken.no_polisi);
        selectKendaraan2.insertBefore(option2, selectKendaraan2.lastChild);
            
        let tr = tableKendaraan.insertRow(-1);
        let td = document.createElement('td'); 
        for(j = 0; j <= 3; j++){
            td = tr.insertCell();  
            if(j == 3) {
                let buttonHapus = document.createElement('input');
                buttonHapus.setAttribute('type', 'button');
                buttonHapus.setAttribute('value', 'Hapus');
                buttonHapus.setAttribute('class', 'btn');
                buttonHapus.setAttribute('class', 'btn btn-danger');
                buttonHapus.setAttribute('onclick', 'hapusKendaraan(this)');
                td.appendChild(buttonHapus);
            }else {
                td.innerHTML = ken[col2[j]];
            }
        } 
        return false;
    }


    function hapusKendaraan (obj){
        let count = 0;
        let count2 = 0;
        motor.splice(obj.parentNode.parentNode.rowIndex-1, 1);
        tableKendaraan.deleteRow(obj.parentNode.parentNode.rowIndex-1);
        for(let i = 0; i < selectKendaraan.length; i++) {
            if(selectKendaraan[i].value === obj.parentNode.parentNode.cells[1].innerHTML)
                selectKendaraan.remove(i);
        }

        for(let i = 0; i < selectKendaraan2.length; i++) {
            if(selectKendaraan2[i].value === obj.parentNode.parentNode.cells[1].innerHTML)
                selectKendaraan2.remove(i);
        }

        if(tableService.rows.length != 0) {
            for(let j = 0; j <= tableService.rows.length; j++) {
                if(tableService.rows[j-count].cells[0].innerHTML == obj.parentNode.parentNode.cells[1].innerHTML) {
                    detailService.splice(tableService.rows[(j-count)].rowIndex-1, 1);
                    tableService.deleteRow(tableService.rows[(j-count)].rowIndex-1);
                    count++;   
                }
            }
        }

        if(tableSparepartSS.rows.length != 0) {
            for(let j = 0; j <= tableSparepartSS.rows.length; j++) {
                if(tableSparepartSS.rows[j-count2].cells[0].innerHTML == obj.parentNode.parentNode.cells[1].innerHTML) {
                    detailSparepartSS.splice(tableSparepartSS.rows[(j-count2)].rowIndex-1, 1);
                    tableSparepartSS.deleteRow(tableSparepartSS.rows[(j-count2)].rowIndex-1);
                    count2++;   
                }
            }
        }

        
        console.log(detailService);
        console.log(detailSparepartSS);
        
        console.log(motor);
    }
    
     /*******************************************************************
            Tambah Edit dan Hapus Detail Service   
    *******************************************************************/ 

    function tambahDetailService (){
        if(cekDetailService() == false)
            return false;

        if(editedDetailService == false) {
            let srv = {};
            srv.id_jasa_service = document.querySelector('#jasaService').value;
            srv.no_polisi = document.querySelector('#motor').value;
            srv.jumlah_penjualan_jasa = 1;
            console.log(detailService);

            let cek = detailService.some(dt => dt.id_jasa_service === srv.id_jasa_service && 
                                            ( (!("kendaraan" in dt) && dt.no_polisi) === srv.no_polisi 
                                            || (("kendaraan" in dt) && dt.kendaraan.no_polisi) === srv.no_polisi));
                                            
            if(cek) {
                alert('Data Service Telah Terdaftar');
                return false;
            }
            
            detailService.push(srv);
            let tr = tableService.insertRow(-1);
            let td = document.createElement('td'); 
            for(j = 0; j <= 2; j++){
                td = tr.insertCell();  
                if(j == 2) {
                    let buttonEdit = document.createElement('input');
                    buttonEdit.setAttribute('type', 'button');
                    buttonEdit.setAttribute('value', 'Ubah');
                    buttonEdit.setAttribute('class', 'btn btn-primary');
                    buttonEdit.setAttribute('onclick', 'ubahDetailService(this)');
                    td.appendChild(buttonEdit);
                    td.appendChild(document.createTextNode(' '));
                    let buttonHapus = document.createElement('input');
                    buttonHapus.setAttribute('type', 'button');
                    buttonHapus.setAttribute('value', 'Hapus');
                    buttonHapus.setAttribute('class', 'btn');
                    buttonHapus.setAttribute('class', 'btn btn-danger');
                    buttonHapus.setAttribute('onclick', 'hapusDetailService(this)');
                    td.appendChild(buttonHapus);
                }else {
                    td.innerHTML = srv[colService[j]];
                }
            } 
        }
        else {
            let jasa_service = document.querySelector('#jasaService').value;
            let motor = document.querySelector('#motor').value;

            let foundIn = [];
            foundIn.push(editedIDDetailService);
            
            console.log(detailService);     

            let cek = detailService.filter((dt, index) => { 
                return foundIn.indexOf(index) == -1 
            }).some(cek => cek.id_jasa_service === jasa_service && 
                         ( (!("kendaraan" in cek) && cek.no_polisi) === motor 
                        || (("kendaraan" in cek) && cek.kendaraan.no_polisi) === motor));
            
            if(cek === true) {
                editedDetailService = false;
                alert('Data Service Telah Terdaftar!');
                return false;
            }
                

            tableService.rows[editedIDDetailService].cells[1].innerHTML = jasa_service;
            tableService.rows[editedIDDetailService].cells[0].innerHTML = motor;
            detailService[editedIDDetailService].id_jasa_service = jasa_service;
            if(!("kendaraan" in detailService[editedIDDetailService]))
                detailService[editedIDDetailService].no_polisi = motor;
            else if(("kendaraan" in detailService[editedIDDetailService]))
                detailService[editedIDDetailService].kendaraan.no_polisi = motor;
            
        }
        console.log(detailService)
        editedDetailService = false;
        return false;
    }

    function hapusDetailService (obj) {
        detailService.splice(obj.parentNode.parentNode.rowIndex-1, 1);
        tableService.deleteRow(obj.parentNode.parentNode.rowIndex-1);
        console.log(detailService);
    }

    function ubahDetailService(obj) {
        document.querySelector('#motor').value = obj.parentNode.parentNode.cells[0].innerHTML;
        document.querySelector('#jasaService').value = obj.parentNode.parentNode.cells[1].innerHTML;        
        editedIDDetailService = obj.parentNode.parentNode.rowIndex-1;
        editedDetailService = true;
    }

    /*******************************************************************
            Tambah Edit dan Hapus Detail Sparepart    
    *******************************************************************/ 
    
    function tambahDetailSparepart (){
        if(cekDetailSparepart() == false) {
            editedDetailSparepart = false;
            return false;
        } else if(cekJumlah() == false) {
            editedDetailSparepart = false;
            return false;
        }
             
        if(editedDetailSparepart == false) {
            let spr = {};
            spr.kode_sparepart = document.querySelector('#kodeSparepart').value;
            spr.jumlah_penjualan_sparepart = document.querySelector('#jumlah').value;
            let cek = detailSparepart.some(dt => dt.kode_sparepart === spr.kode_sparepart);
            if(cek){
                alert('Data Sparepart Telah Terdaftar');
                return false;
            }
            
            detailSparepart.push(spr);
            let tr = tableSparepart.insertRow(-1);
            let td = document.createElement('td'); 
            for(j = 0; j <= 2; j++){
                td = tr.insertCell();  
                if(j == 2) {
                    let buttonEdit = document.createElement('input');
                    buttonEdit.setAttribute('type', 'button');
                    buttonEdit.setAttribute('value', 'Ubah');
                    buttonEdit.setAttribute('class', 'btn btn-primary');
                    buttonEdit.setAttribute('onclick', 'ubahDetailSparepart(this)');
                    td.appendChild(buttonEdit);
                    td.appendChild(document.createTextNode(' '));
                    let buttonHapus = document.createElement('input');
                    buttonHapus.setAttribute('type', 'button');
                    buttonHapus.setAttribute('value', 'Hapus');
                    buttonHapus.setAttribute('class', 'btn');
                    buttonHapus.setAttribute('class', 'btn btn-danger');
                    buttonHapus.setAttribute('onclick', 'hapusDetailSparepart(this)');
                    td.appendChild(buttonHapus);
                }else {
                    td.innerHTML = spr[colSparepart[j]];
                }
            } 
        }
        else {
            let kode_sparepart = document.querySelector('#kodeSparepart').value;
            let jumlah = document.querySelector('#jumlah').value;

            let foundIn = [];
            foundIn.push(editedIDDetailSparepart);

            let cek = detailSparepart.filter((dt, index) => { 
                return foundIn.indexOf(index) == -1 
            }).some(cek => cek.kode_sparepart === kode_sparepart);
            
            if(cek === true) {
                editedDetailSparepart = false;
                alert('Data Sparepart Telah Terdaftar');
                return false;
            }
                
            tableSparepart.rows[editedIDDetailSparepart].cells[0].innerHTML = kode_sparepart;
            tableSparepart.rows[editedIDDetailSparepart].cells[1].innerHTML = jumlah;
            detailSparepart[editedIDDetailSparepart].kode_sparepart = kode_sparepart;
            detailSparepart[editedIDDetailSparepart].jumlah_penjualan_sparepart = jumlah;

            console.log(detailSparepart);
        }
        // console.log(detailSparepart)
        editedDetailSparepart = false;
        return false;
    }

    function hapusDetailSparepart (obj) {
        detailSparepart.splice(obj.parentNode.parentNode.rowIndex-1, 1);
        tableSparepart.deleteRow(obj.parentNode.parentNode.rowIndex-1);
        console.log(detailSparepart);
    }

    function ubahDetailSparepart(obj) {
        document.querySelector('#kodeSparepart').value = obj.parentNode.parentNode.cells[0].innerHTML;
        document.querySelector('#jumlah').value = obj.parentNode.parentNode.cells[1].innerHTML;        
        editedIDDetailSparepart = obj.parentNode.parentNode.rowIndex-1;
        editedDetailSparepart = true;
    }

    /*=======================================================================================*/

    // ===================== Tambah Edit dan Hapus Detail Sparepart SS ================================ //
    
    function tambahDetailSparepartSS (){
        if(cekDetailSparepartSS() == false)
            return false;
        else if(cekJumlahSS() == false)
            return false; 
    
        if(editedDetailSparepartSS == false) {
            let spr = {};
            spr.no_polisi = document.querySelector('#motorSS').value;
            spr.kode_sparepart = document.querySelector('#kodeSparepartSS').value;
            spr.jumlah_penjualan_sparepart = document.querySelector('#jumlahSS').value;

            let cek = detailSparepartSS.some(dt => dt.kode_sparepart === spr.kode_sparepart && 
                                            ( (!("kendaraan" in dt) && dt.no_polisi) === spr.no_polisi 
                                            || (("kendaraan" in dt) && dt.kendaraan.no_polisi) === spr.no_polisi));

            if(cek){
                alert('Data Sparepart Telah Terdaftar');
                return false;
            }
            
            detailSparepartSS.push(spr);
            let tr = tableSparepartSS.insertRow(-1);
            let td = document.createElement('td'); 
            for(j = 0; j <= 3; j++){
                td = tr.insertCell();  
                if(j == 3) {
                    let buttonEdit = document.createElement('input');
                    buttonEdit.setAttribute('type', 'button');
                    buttonEdit.setAttribute('value', 'Ubah');
                    buttonEdit.setAttribute('class', 'btn btn-primary');
                    buttonEdit.setAttribute('onclick', 'ubahDetailSparepartSS(this)');
                    td.appendChild(buttonEdit);
                    td.appendChild(document.createTextNode(' '));
                    let buttonHapus = document.createElement('input');
                    buttonHapus.setAttribute('type', 'button');
                    buttonHapus.setAttribute('value', 'Hapus');
                    buttonHapus.setAttribute('class', 'btn');
                    buttonHapus.setAttribute('class', 'btn btn-danger');
                    buttonHapus.setAttribute('onclick', 'hapusDetailSparepartSS(this)');
                    td.appendChild(buttonHapus);
                }else {
                    td.innerHTML = spr[colSparepartSS[j]];
                }
            } 
        }
        else {
            let kode_sparepart = document.querySelector('#kodeSparepartSS').value;
            let jumlah = document.querySelector('#jumlahSS').value;
            let motor = document.querySelector('#motorSS').value;

            let foundIn = [];
            foundIn.push(editedIDDetailSparepartSS);

           let cek = detailSparepartSS.filter((dt, index) => { 
                return foundIn.indexOf(index) == -1 
            }).some(cek => cek.kode_sparepart === kode_sparepart && 
                         ( (!("kendaraan" in cek) && cek.no_polisi) === motor 
                        || (("kendaraan" in cek) && cek.kendaraan.no_polisi) === motor));
            
            if(cek === true) {
                editedDetailSparepartSS = false;
                alert('Data Sparepart Telah Terdaftar');
                return false;
            }

            tableSparepartSS.rows[editedIDDetailSparepartSS].cells[0].innerHTML = motor;    
            tableSparepartSS.rows[editedIDDetailSparepartSS].cells[1].innerHTML = kode_sparepart;
            tableSparepartSS.rows[editedIDDetailSparepartSS].cells[2].innerHTML = jumlah;
            if(!("kendaraan" in detailSparepartSS[editedIDDetailSparepartSS]))
                detailSparepartSS[editedIDDetailSparepartSS].no_polisi = motor;
            else if(("kendaraan" in detailSparepartSS[editedIDDetailSparepartSS]))
                detailSparepartSS[editedIDDetailSparepartSS].kendaraan.no_polisi = motor;
            detailSparepartSS[editedIDDetailSparepartSS].kode_sparepart = kode_sparepart;
            detailSparepartSS[editedIDDetailSparepartSS].jumlah_penjualan_sparepart = jumlah;

            console.log(detailSparepartSS);
        }
        // console.log(detailSparepart)
        editedDetailSparepartSS = false;
        return false;
    }

    function hapusDetailSparepartSS(obj) {
        detailSparepartSS.splice(obj.parentNode.parentNode.rowIndex-1, 1);
        tableSparepartSS.deleteRow(obj.parentNode.parentNode.rowIndex-1);
        console.log(detailSparepartSS);
    }

    function ubahDetailSparepartSS(obj) {
        document.querySelector('#motorSS').value = obj.parentNode.parentNode.cells[0].innerHTML;
        document.querySelector('#kodeSparepartSS').value = obj.parentNode.parentNode.cells[1].innerHTML;
        document.querySelector('#jumlahSS').value = obj.parentNode.parentNode.cells[2].innerHTML;        
        editedIDDetailSparepartSS = obj.parentNode.parentNode.rowIndex-1;
        editedDetailSparepartSS = true;
    }

    // ============================================================================================================== //

    function change(obj) {
        let selectTransaksi = obj;
        let selected = selectTransaksi.options[selectTransaksi.selectedIndex].value;
        let service = document.querySelector('#service');
        let sparepart = document.querySelector('#sparepart');
        let sparepartSS = document.querySelector('#sparepartSS');

        clsKendaraan();
        clsService();
        clsSparepart();

        if(selected === 'SV') {
            service.style.display = 'block';
            sparepart.style.display = 'none';
            sparepartSS.style.display = 'none';
        }
        else if(selected === 'SP') {
            service.style.display = 'none';
            sparepart.style.display = 'block';
            sparepartSS.style.display = 'none';
        }
        else if(selected === 'SS'){
            service.style.display = 'block';
            sparepart.style.display = 'none';
            sparepartSS.style.display = 'block';
        }
        else {
            service.style.display = 'none';
            sparepart.style.display = 'none';
            sparepartSS.style.display = 'none';
        }
    }

    /************************************************************************************ */

    function cekPenjualan() {

        let nopol = [];
        motor.forEach(function(mtr){
            nopol.push(mtr.no_polisi);
        });


        let detail = [];
        detailService.forEach(function(dts){
            if(!("kendaraan" in dts))
                detail.push(dts.no_polisi);
            else
                detail.push(dts.kendaraan.no_polisi);
         });

        let cek = nopol.filter(np => !detail.includes(np));   
        console.log(cek);    

        let detail2 = [];
        detailSparepartSS.forEach(function(dts){
            if(!("kendaraan" in dts))
                detail2.push(dts.no_polisi);
            else
                detail2.push(dts.kendaraan.no_polisi);
         });

        let cek2 = nopol.filter(np => !detail2.includes(np));   
        console.log(cek2);    

        if(document.querySelector('#nama').value == '' ||
        document.querySelector('#noTelp').value == '' ||
        document.querySelector('#transaksi').value == '') {
            alert('Data Penjualan Tidak Boleh Kosong!');
            return false;
        } else if(document.querySelector('#transaksi').value == 'SV' && detailService.length == 0) {
            alert('Detail Service Tidak Boleh Kosong!');
            return false;
        } else if(document.querySelector('#transaksi').value == 'SP' && detailSparepart.length == 0) {
            alert('Detail Sparepart Tidak Boleh Kosong!');
            return false;
        } else if(document.querySelector('#transaksi').value == 'SS' && 
            (detailSparepartSS.length == 0 || detailService.length == 0)) {
                alert('Detail Sparepart atau Detail Service Tidak Boleh Kosong!');
                return false;
        } else if((cek.length > 0 || cek2.length > 0) && document.querySelector('#transaksi').value == 'SS') {
            alert("Terdapat Motor yang Tidak Memiliki Detail Service atau Sparepart!");
            return false;
        } else if(cek.length > 0 && document.querySelector('#transaksi').value == 'SV') {
            alert("Terdapat Motor yang Belum Diservice");
            return false;
        } 
    }

    function cekDetailSparepart() {
        if(document.querySelector('#kodeSparepart').value == '' ||
        document.querySelector('#jumlah').value == '') {
            alert('Data Detail Sparepart Tidak Boleh Kosong!');
            return false;
        } else if (document.querySelector('#jumlah').value <= 0) {
            alert('Jumlah Sparepart Tidak Boleh Kurang Dari 1!');
            return false;
        } 
    }

    function cekDetailSparepartSS() {
        if(document.querySelector('#kodeSparepartSS').value == '' ||
            document.querySelector('#jumlahSS').value == '' ||
            document.querySelector('#motorSS').value == '') {
            alert('Data Detail Sparepart Tidak Boleh Kosong!');
            return false;
        } else if (document.querySelector('#jumlahSS').value <= 0) {
            alert('Jumlah Sparepart Tidak Boleh Kurang Dari 1!');
            return false;
        } 
    }

    function cekDetailService () {
        if(document.querySelector('#jasaService').value == '' ||
        document.querySelector('#motor').value == '') {
            alert('Data Detail Service Tidak Boleh Kosong!');
            return false;
        }
    }

    function cekKendaraan () {
        if(document.querySelector('#tipe').value == '' ||
        document.querySelector('#nopol').value == '' ||
        document.querySelector('#pegawai').value == '') {
            alert('Data Kendaraan Tidak Boleh Kosong!');
            return false;
        }
    }

    function clsPenjualan() {
        document.querySelector('#nama').value = '';
        document.querySelector('#noTelp').value = ''; 
        document.querySelector('#transaksi').value = '';
    }

    function clsService() {
        tableService.innerHTML = '';
        document.querySelector('#jasaService').value = '';
        document.querySelector('#motor').value = '';
        detailService = [];
    }

    function clsSparepart() {
        tableSparepart.innerHTML = '';
        document.querySelector('#kodeSparepart').value = '';
        document.querySelector('#jumlah').value = '';
        detailSparepart = [];
    }

    function clsKendaraan() {
        tableKendaraan.innerHTML = '';
        document.querySelector('#tipe').value = '';
        document.querySelector('#nopol').value = '';
        document.querySelector('#pegawai').value = '';
        motor = [];
    }

    function hide() {
        document.querySelector('#service').style.display = 'none';
        document.querySelector('#sparepart').style.display = 'none';
        document.querySelector('#sparepartSS').style.display = 'none';
    }

    function batal() {
        if(edited == false) {
            clsPenjualan();
            clsKendaraan();
            clsService();
            clsSparepart();
            hide();
        } else 
            window.location.href = "tampilpenjualan";

        
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
        axios.post('api/auth/logout', null, config).
        then(function(response)
        {
            console.log('Logout success');
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

    function cekJumlah() {
        let kode = document.querySelector('#kodeSparepart').value;
        let spr = sparepart.filter(spr => spr.kode_sparepart === kode)
        if(document.querySelector('#jumlah').value > spr[0].stok_sparepart) {
            alert('Stok Tidak Mencukupi');
            return false;
        }
    }

    function cekJumlahSS() {
        let kode = document.querySelector('#kodeSparepartSS').value;
        let spr = sparepart.filter(spr => spr.kode_sparepart === kode)
        if(document.querySelector('#jumlahSS').value > spr[0].stok_sparepart) {
            alert('Stok Tidak Mencukupi');
            return false;
        }
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

    function cekTelp(id)
    {
        let telp = document.getElementById(id).value;
        if(telp.match(/[a-z]/i) || telp.match(/[ -/:-@{-~!"^_`\[\]]/))
        {
            alert("Inputan hanya numerik");
            document.getElementById(id).value = "";
            return false;
        }
    }

    function cekNopol(id) {
        let nopol = document.getElementById(id).value;
        if(nopol.match(/[$-/:-@{-~!"^_`\[\]]/))
        {
            alert("Karakter Khusus Tidak Diperbolehkan");
            document.getElementById(id).value = "";
            return false;
        }
    }
</script>