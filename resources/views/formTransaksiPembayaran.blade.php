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
        let jabatan = 'Kasir';
        if (localStorage.getItem('token') === null)
            window.location.href = '/8900/public';
        else if (localStorage.getItem('jabatan') !== jabatan)
        window.history.back();
    </script>
    <title>Atma Auto: Transaksi Pembayaran</title>
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
                <a href="pembayaran">
                    <img id="img9" src="OWPenjualan.png" alt="Menu Pengadaan" class="img-fluid gambarMenu p-3"
                    title="Transaksi Pembayaran">
                    </a>
                <h6 id="text9" class="text-center" style="color:white">Pembayaran</h6>
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

    <h1 class="text-center font-italic mt-5 mb-5 text-white">Transaksi Pembayaran</h1>

    {{-- Antrian Pembayaran --}}
    <div class="container text-white">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mb-5">
                
                <h4 class="text-white">Antrian Pembayaran</h4>
                <table class="table table-dark" id="tablePembayaran">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
                <br>
    <div id="pembayaran" style="display: none">
        <h4>Pembayaran</h4>
                <br>
                <h5 id="no_transaksi"></h5>
                <br>
                <h5 class="float-right">CS: <span id="customer_service"></span></h5>
                <h5>Customer: <span id="customer"></span></h5>
                <h5>No. Telp: <span id="no_telp"></span></h5>
                
                <br>
                <div id="service" style="display: none">
                    <table class="table" id="tableMotor">
                        <thead>
                            <tr>
                                <th>ID Kendaraan</th>
                                <th>No. Polisi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <br>
                    <table class="table" id="tableMontir">
                        <thead>
                            <tr>
                                <th>Montir</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <h4 class="text-center">Jasa Service</h4>
                    <table class="table table-dark" id="tableService">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">ID Kendaraan</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

                <br>
                <div id="sparepart" style="display: none">
                    <h4 class="text-center">Sparepart</h4>
                    <table class="table table-dark" id="tableSparepart">
                        <thead>
                            <tr>
                                <th scope="col">Kode</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <br>

                <h5 class="float-right">Sub-Total: Rp <span id="subtotal"></span></h5>
                <br>
                <br>
                <input type = "number"  onkeyup = "change()" type="text" id="diskon" placeholder="Masukan Diskon" 
                    class="form-control input w-25 float-right">
                <h5 class="float-right">Diskon: &nbsp&nbsp&nbsp</h5>
                <br>
                <br>
                <h5 class="float-right">Total: <span id="total">0</span></h5>
                <br>
                <br>
                <form  onsubmit = "return bayarCetakNota()">
                    <input onkeyup = "change2()" id="uang" type="number" name="bayar" placeholder="Masukkan Jumlah Uang" 
                    class="form-control input w-25 float-right">
                    <h5 class="float-right">Bayar:  &nbsp&nbsp&nbsp</h5>
                    <br>
                    <br>
                    <!-- <h5 class="float-right" >Kembalian: <span id="kembalian">0</span></h5> -->
                    <br>
                    <br>
                    <input type="submit" value="Bayar dan Cetak Nota" class="btn btn-success float-right">
                    <button type="button" class="btn btn-danger float-right" onclick="batal()">Batal</button>
                </form>
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
.form-dark{
    background-color: RGB(1,1,1,0.75);
}
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
    let tablePembayaran = document.querySelector('#tablePembayaran tbody');
    let tableSparepart = document.querySelector('#tableSparepart tbody');
    let tableService = document.querySelector('#tableService tbody');
    let tableMotor = document.querySelector('#tableMotor tbody');
    let tableMontir = document.querySelector('#tableMontir tbody');
    let pembayaran, detailSparepart, detailService, motor = [], montir = [], no_transaksi, bayarid;
    let colPembayaran = ['tanggal_transaksi', 'no_transaksi', 'nama_customer', 'status_transaksi'];
    let colService = ['id_jasa_service', 'id_kendaraan',  'subtotal_jasa' ];
    let colSparepart = ['kode_sparepart', 'jumlah_penjualan_sparepart', 'subtotal_sparepart'];

    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    axios.get('api/penjualan/tampil', config)
    .then((result) => {
        pembayaran = result.data;
        console.log(pembayaran);
        for(let i = 0; i < pembayaran.length; i++) {
            if(pembayaran[i].status_transaksi == 'Selesai' && pembayaran[i].keterangan_transaksi == 'Belum Lunas') {
                let tr = tablePembayaran.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= colPembayaran.length; j++){
                    td = tr.insertCell();  
                    if(j == colPembayaran.length) {
                        let buttonEdit = document.createElement('input');
                        buttonEdit.setAttribute('type', 'button');
                        buttonEdit.setAttribute('value', 'Bayar');
                        buttonEdit.setAttribute('class', 'btn btn-success');
                        buttonEdit.setAttribute('onclick', 'bayar(this)');
                        td.appendChild(buttonEdit);
                    }else {
                        td.innerHTML = pembayaran[i][colPembayaran[j]];
                    }
                } 
            }
            
        }    
    }).catch((err) => {
       console.log(err.response); 
    });


    function bayar(obj) {
        bayarid = obj.parentNode.parentNode.rowIndex-1;
        let penjualan;
        no_transaksi = obj.parentNode.parentNode.cells[1].innerHTML;
        console.log(no_transaksi);
        document.querySelector('#diskon').value = 0;
        document.querySelector('#uang').value = 0;
        document.querySelector('#no_transaksi').innerHTML = no_transaksi;
        axios.get('api/penjualan/cari/' + no_transaksi, config)
        .then((result) => {
            penjualan = result.data;
            console.log(penjualan);
            document.querySelector('#subtotal').innerHTML = penjualan.subtotal_transaksi;
            document.querySelector('#total').innerHTML = penjualan.subtotal_transaksi;
            document.querySelector('#no_telp').innerHTML = penjualan.no_telp_customer;
            // document.querySelector('#kembalian').innerHTML = '-';
            document.querySelector('#customer').innerHTML = penjualan.nama_customer;
            document.querySelector('#customer_service').innerHTML = penjualan.pegawai[0].nama_pegawai;
            if(no_transaksi.substring(0, 2) == 'SV') {
                tampilService(no_transaksi);
                document.querySelector('#service').style.display = 'block';
                document.querySelector('#sparepart').style.display = 'none';
            }
            else if (no_transaksi.substring(0, 2) == 'SP') {
                tampilSparepart(no_transaksi);
                document.querySelector('#sparepart').style.display = 'block';
                document.querySelector('#service').style.display = 'none';
            }
            else {
                tampilService(no_transaksi);
                tampilSparepart(no_transaksi);
                document.querySelector('#service').style.display = 'block';
                document.querySelector('#sparepart').style.display = 'block';
            }
        }).catch((err) => {
            console.log(err.response);
        });
        bayarid = obj.parentNode.parentNode.rowIndex-1;
        document.querySelector('#pembayaran').style.display = 'block';
    }

    let tes;

    function bayarCetakNota () {
        if(cek() == false)
            return false;

        console.log(document.querySelector('#total').innerHTML);
        console.log(document.querySelector('#uang').value);

        let total1 = document.querySelector('#total').innerHTML;
        let uang = document.querySelector('#uang').value;
        tes = uang-total1;
        console.log(tes);

        if( tes < 0 ){
            alert('Uang Pembayaran Kurang!');
            return false;
        }

        let diskon = document.querySelector('#diskon').value;
        let total = document.querySelector('#total').innerHTML;
        let formData = new FormData();
        formData.append('diskon', diskon);
        formData.append('total_transaksi', total);
        formData.append('_method', 'PUT');
        
        axios.post('api/penjualan/bayar/' + no_transaksi, formData, config)
        .then((result) => {
            if(no_transaksi.substring(0, 2) == 'SP' || no_transaksi.substring(0, 2) == 'SS') {
                postHistori(detailSparepart, no_transaksi, bayarid);
            }
            else {
                alert('Pembayaran Berhasil \n Kembalian: ' + tes);
                console.log("Tets");
                console.log(no_transaksi);
                let nota = 'nota_lunas/?notrans=' + no_transaksi;
                console.log(nota);
                window.open(nota);
                tablePembayaran.deleteRow(bayarid);
            }
            batal();

        }).catch((err) => {
            alert('Pembayaran Gagal');
            console.log(err.response);
        });

       

        return false;
    }

    function change(obj) {
        let subtotal = document.querySelector('#subtotal').innerHTML;
        let total = document.querySelector('#total');
        let diskon = document.querySelector('#diskon').value;
        let hitung = subtotal - diskon;
        total.innerHTML = hitung;
    }

    function change2(obj) {
        let uang = document.querySelector('#uang').value;
        let total = document.querySelector('#total').innerHTML;
        // let kembalian = document.querySelector('#kembalian');
        let hitung = uang - total;
        // kembalian.innerHTML = hitung;
    }

    function tampilService(no_transaksi) {
        tableService.innerHTML = ''; 
        tableMotor.innerHTML = '';
        tableMontir.innerHTML = '';   
        montir = [];
        motor = [];
        let promises = [];
        axios.get('api/penjualanjasa/cari/' + no_transaksi, config)
        .then((result) => {
            console.log(result.data);  

            for(let i = 0; i < result.data.length; i++) {
                let cek = motor.some(mt => mt.id_kendaraan === result.data[i].kendaraan.id_kendaraan);

                if(cek === false)
                    motor.push(result.data[i].kendaraan);

                let tr = tableService.insertRow(-1);
                let td = document.createElement('td');      
                for(j = 0; j <= colService.length-1; j++){
                    td = tr.insertCell();  
                    td.innerHTML = result.data[i][colService[j]];
                }
            }

            console.log(motor);

            for(let i = 0; i < motor.length; i++) {
                console.log(motor[i].id_kendaraan);
                let url = 'api/kendaraancustomer/cari/' + motor[i].id_kendaraan;
                promises.push(axios.get(url, config));
                console.log(motor);
                let tr = tableMotor.insertRow(-1);
                let td = document.createElement('td');
                for(j = 0; j < 2; j++) {
                    td = tr.insertCell();
                    if(j == 0)
                        td.innerHTML = motor[i].id_kendaraan;
                    else
                        td.innerHTML = motor[i].no_polisi;  
                }
                    
            }

            axios.all(promises)
            .then((result) => {
                result.forEach(function(res){
                    let cek = montir.some(mt => mt.id_pegawai === res.data.pegawai.id_pegawai);
                    if(cek === false)
                        montir.push(res.data.pegawai);                        
                });
                
                for(let i = 0; i < montir.length; i++) {
                    let tr = tableMontir.insertRow(-1);
                    let td = document.createElement('td');      
                    td = tr.insertCell();  
                    td.innerHTML = montir[i].nama_pegawai;
                }  
            }).catch((err) => {
                
            });
        }).catch((err) => {
            console.log(err.response);
        });
    }

    function tampilSparepart(no_transaksi) {
        tableSparepart.innerHTML = '';
        axios.get('api/penjualansparepart/cari/' + no_transaksi, config)
        .then((result) => {
            detailSparepart = result.data;
            for(let i = 0; i < result.data.length; i++) {
                let tr = tableSparepart.insertRow(-1);
                let td = document.createElement('td'); 

                for(j = 0; j <= colSparepart.length-1; j++){
                    td = tr.insertCell();  
                    td.innerHTML = result.data[i][colSparepart[j]];
                }
            }  
        }).catch((err) => {
            console.log(err.response);
        });
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
        if(document.querySelector('#diskon').value == "" || document.querySelector('#uang').value == ''){
            alert('Data Pembayaran Tidak Boleh Kosong!');
            return false;
        }
        else if(document.querySelector('#total').innerHTML < 0) {
            alert('Diskon Tidak Boleh Lebih dari Subtotal');
            return false;
        }
        else if(document.querySelector('#diskon').value < 0) {
            alert('Diskon Tidak Boleh Kurang Dari 0');
            return false;
        }
        else if(document.querySelector('#uang').value < 0) {
            alert('Uang Pembayaran Tidak Boleh Kurang Dari 0');
            return false;
        }
        // else if(document.querySelector('#total').innerHTML > document.querySelector('#uang').value){
        //     alert('Uang Pembayaran Kurang!');
        //     return false;
        // }
        
    }

    function batal(){
        document.querySelector('#pembayaran').style.display = "none";
        document.querySelector('#diskon').value = 0;
        document.querySelector('#uang').value = 0;
    }

    function postHistori(detail, no_transaksi, bayarid) {
        let histori = [];
        console.log(detail);
        for(let i = 0; i < detail.length; i++) {
            let his = {};
            his.kode_sparepart = detail[i].kode_sparepart;
            his.jumlah_histori = detail[i].jumlah_penjualan_sparepart;
            his.keterangan_histori = 'Keluar';
            histori.push(his);
        }
        
        let formData = new FormData();
        formData.append('data', JSON.stringify(histori));
        axios.post('api/histori/tambah', formData, config)
        .then((result) => {
            console.log(result);
            alert('Pembayaran Berhasil \n Kembalian: ' + tes);
            console.log("Tets");
            console.log(no_transaksi);
            let url = 'nota_lunas?notrans=' + no_transaksi;
            window.open(url);
            tablePembayaran.deleteRow(bayarid);
        }).catch((err) => {
            console.log(err.response);
        });
    }


</script>