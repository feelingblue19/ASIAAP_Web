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
    <title>Atma Auto: Form Pegawai</title>
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
                    title="Kelola Data Pegawai">
                </a>
                <h6 class="text-center" style="color:white">Pegawai</h6>
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
    <h1 class="text-center font-italic mb-3 text-white">Kelola Data Pegawai</h1>

    {{-- Inputan Form --}}
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4 text-center mb-5 p-4 isi" style="border-radius:20px 0px 0px 20px">
                <form onsubmit = "return post()">
                    <h5>Nama</h5>
                    <input type="text"  name="nama" id="nama" placeholder="Masukkan Nama"
                    class="form-control input" onkeyup="cekNama()">
                    <br>
                    <h5>Alamat</h5>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat"
                    class="form-control input" maxlength="50">
                    <br>
                    <h5>No. Telp</h5>
                    <input type="text" id="noTelp" name="noTelp" placeholder="Masukkan No. Telp"
                    class="form-control input" onkeyup="cekNoTelp()" maxlength=12>
                    <br>
                    <h5>Gaji / Minggu</h5>
                    <input type="number" id="gaji" name="gaji" placeholder="Masukkan Gaji"
                    class="form-control input" min="0">
                    <br>
                    <input type="submit" value="Input" class="btn btn-success w-50">
            </div>
            <div class="col-4 text-center mb-5 p-4 isi" style="border-radius:0px 20px 20px 0px">
                    <h5>Cabang</h5>
                    <select id="kodeCabang" name="kodeCabang" placeholder="Pilih Kode Cabang" 
                    class="form-control input">
                        <option value="">--Pilih Cabang--</option>
                    </select>
                    <br>
                    <h5>Jabatan</h5>
                    <select name="jabatan" id="jabatan"
                    class="form-control input">
                        <option value="">--Pilih Jabatan--</option>
                        <option value="Kasir">Kasir</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Montir">Montir</option>
                    </select>
                    <br>
                    <h5>Username</h5>
                    <input type="text" name="username" id="username" placeholder="Masukkan Username"
                    class="form-control input" minlength="4" maxlength="10">
                    <br>
                    <h5>Password</h5>
                    <input type="password" name="password" id="password" placeholder="Masukkan Password"
                    class="form-control input" minlength="4" maxlength="10" onkeyup="cekPassword()">
                    <br>
                </form>
                <button class="btn btn-danger w-50" onclick="cls()">Batal</button>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    {{-- Tampil Tabel --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <h1 class="text-center font-italic text-white">Cari Data Pegawai</h1>
            <form action="" class="text-center font-italic">
                <input id="myInput" type="text" name="search" placeholder="Cari Pegawai" 
                class="rounded w-100 text-white pl-2" onkeyup="cari()"
                style="background-color:rgb(0,0,0,0.8);border:none">
            </form>
            <br>
            <br>
            <h1 class="text-center font-italic text-white">Table Pegawai</h1>
            <table class="table table-dark text-center" id="tablePegawai">
                <tr>
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Kode Cabang</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Gaji/Minggu</th>
                    <th scope="col">Role</th>
                    <th scope="col">Username</th>
                    <th scope="col">Aksi</th>
                </tr>
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
    let pegawai;
    let cabang = [];
    let tablePegawai = document.querySelector('#tablePegawai');
    let col = ['id_pegawai', 'id_cabang', 'nama_pegawai', 'alamat_pegawai', 'no_telp_pegawai', 'gaji_per_minggu',
                'jabatan_pegawai', 'username'];
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
        document.getElementById("nama").value="";
        document.getElementById("alamat").value="";
        document.getElementById("noTelp").value="";
        document.getElementById("gaji").value="";
        document.getElementById("kodeCabang").selectedIndex = "0";
        document.getElementById("jabatan").selectedIndex = "0";
        document.getElementById("username").value="";
        document.getElementById("password").value="";
        edited = false;
    }

    function cekEmpty(){
        if(document.getElementById("nama").value =="" ||
        document.getElementById("alamat").value == "" ||
        document.getElementById("noTelp").value == "" ||
        document.getElementById("gaji").value =="" ||
        document.getElementById("kodeCabang").selectedIndex == "0" ||
        document.getElementById("jabatan").selectedIndex == "0" ||
        (document.getElementById("jabatan").value != "Montir" && 
        (document.getElementById("username").value == "" ||
        document.getElementById("password").value == "")))
        {
            return true;
        }
        else
            return false;
    }

    let select = document.querySelector('#kodeCabang');

    axios.get('api/cabang/tampil', config)
    .then((result) => {
        for(let i = 0; i<result.data.length; i++) {
            let option = document.createElement('option');
            let txt = document.createTextNode(result.data[i].nama_cabang);
            option.appendChild(txt);
            option.setAttribute('value', result.data[i].id_cabang);
            select.insertBefore(option, select.lastChild);
        }
    }).catch((err) => {
        console.log(err);
    });

    axios.get('api/pegawai/tampil', config)
        .then((result) => {
            console.log(result.data);
            pegawai = result.data;
            for(let i = 0; i < pegawai.length; i++) {
                if(pegawai[i].jabatan_pegawai != 'Admin') {
                    let tr = tablePegawai.insertRow(-1);
                    let td = document.createElement('td');      
                    for(j = 0; j <= col.length; j++){
                        td = tr.insertCell();  
                        if(j == col.length) {
                            let buttonEdit = document.createElement('input');
                            buttonEdit.setAttribute('type', 'button');
                            buttonEdit.setAttribute('value', 'Ubah');
                            buttonEdit.setAttribute('class', 'btn btn-primary');
                            buttonEdit.setAttribute('onclick', 'ubah(this)');
                            td.appendChild(buttonEdit);
                            td.appendChild(document.createTextNode(' '));
                            let buttonHapus = document.createElement('input');
                            buttonHapus.setAttribute('type', 'button');
                            buttonHapus.setAttribute('value', 'Hapus');
                            buttonHapus.setAttribute('class', 'btn');
                            buttonHapus.setAttribute('class', 'btn btn-danger');
                            buttonHapus.setAttribute('onclick', 'hapus(this)');
                            td.appendChild(buttonHapus);
                        } else {
                            td.innerHTML = pegawai[i][col[j]];
                        }
                    }  
                }
            }
        }).catch((err) => {
            console.log(err);
        });

        function post() {
            if(cekEmpty())
            {
                alert("Data Tidak Boleh Kosong");
                return false;
            }
            else if(document.querySelector('#jabatan').value == 'Montir' && 
            (document.querySelector('#username').value != '' || document.querySelector('#password').value != '')) {
                alert('Montir Tidak Memiliki Username dan Password');
                return false;

            }
            else {
                let nama = document.querySelector('#nama').value;
                let alamat = document.querySelector('#alamat').value;
                let noTelp = document.querySelector('#noTelp').value;
                let gaji = document.querySelector('#gaji').value;
                let kodeCabang = document.querySelector('#kodeCabang').value;
                let jabatan = document.querySelector('#jabatan').value;
                let username = document.querySelector('#username').value;
                let password = document.querySelector('#password').value;
                let formData = new FormData();
                formData.append('id_cabang', kodeCabang);
                formData.append('nama_pegawai', nama);
                formData.append('alamat_pegawai', alamat);
                formData.append('no_telp_pegawai', noTelp);
                formData.append('gaji_per_minggu', gaji);
                formData.append('jabatan_pegawai', jabatan);
                formData.append('username', username);
                formData.append('password', password);
                if(edited == false) {
                    axios.post('api/pegawai/tambah', formData, config)
                    .then((result) => {
                        console.log(result);
                        let peg = {};
                        peg.id_pegawai = result.data.pegawai.id_pegawai;
                        peg.id_cabang = kodeCabang;
                        peg.nama_pegawai = nama;
                        peg.alamat_pegawai = alamat;
                        peg.no_telp_pegawai = noTelp;
                        peg.gaji_per_minggu = gaji;
                        peg.jabatan_pegawai = jabatan; 
                        peg.username = username;
                        peg.password = password;
                        pegawai.push(peg);

                        let tr = tablePegawai.insertRow(-1);
                        let td = document.createElement('td'); 
                        for(j = 0; j <= Object.keys(peg).length-1; j++){
                            td = tr.insertCell();  
                            if(j == Object.keys(peg).length-1) {
                                let buttonEdit = document.createElement('input');
                                buttonEdit.setAttribute('type', 'button');
                                buttonEdit.setAttribute('value', 'Ubah');
                                buttonEdit.setAttribute('class', 'btn btn-primary');
                                buttonEdit.setAttribute('onclick', 'ubah(this)');
                                td.appendChild(buttonEdit);
                                td.appendChild(document.createTextNode(' '));
                                let buttonHapus = document.createElement('input');
                                buttonHapus.setAttribute('type', 'button');
                                buttonHapus.setAttribute('value', 'Hapus');
                                buttonHapus.setAttribute('class', 'btn');
                                buttonHapus.setAttribute('class', 'btn btn-danger');
                                buttonHapus.setAttribute('onclick', 'hapus(this)');
                                td.appendChild(buttonHapus);
                            }
                            else {
                                td.innerHTML = peg[col[j]];
                            }
                        }
                        alert("Input Berhasil!");
                    }).catch((err) => {
                        console.log(err.response);
                        alert("Input Gagal!");
                    });
                } else {
                    formData.append('_method', 'PUT')
                    axios.post('api/pegawai/ubah/' + editedPK, formData, config)
                    .then((result) => {
                        tablePegawai.rows[editedID].cells[1].innerHTML = kodeCabang;
                        tablePegawai.rows[editedID].cells[2].innerHTML = nama;
                        tablePegawai.rows[editedID].cells[3].innerHTML = alamat;
                        tablePegawai.rows[editedID].cells[4].innerHTML = noTelp;
                        tablePegawai.rows[editedID].cells[5].innerHTML = gaji;
                        tablePegawai.rows[editedID].cells[6].innerHTML = jabatan;
                        tablePegawai.rows[editedID].cells[7].innerHTML = username;
                        edited = false;
                        alert("Edit Berhasil!");
                    }).catch((err) => {
                        console.log(err.response);
                        alert("Edit Gagal!");
                    });
                }
                cls();
                return false;
            }
        }

        function hapus(obj) {
            if(confirm("Apakah anda yakin?"))
            {
                axios.delete('api/pegawai/hapus/'+ obj.parentNode.parentNode.cells[0].innerHTML ,config)
                .then((result) => {
                    pegawai.splice(obj.parentNode.parentNode.rowIndex-1, 1);
                    tablePegawai.deleteRow(obj.parentNode.parentNode.rowIndex);
                    alert("Delete Berhasil!");
                }).catch((err) => {
                    console.log(err);
                    alert("Delete Gagal!");
                });
            }
        }

        function ubah(obj) {
            document.querySelector('#kodeCabang').value = obj.parentNode.parentNode.cells[1].innerHTML;
            document.querySelector('#nama').value = obj.parentNode.parentNode.cells[2].innerHTML;
            document.querySelector('#alamat').value = obj.parentNode.parentNode.cells[3].innerHTML;
            document.querySelector('#noTelp').value = obj.parentNode.parentNode.cells[4].innerHTML;
            document.querySelector('#gaji').value = obj.parentNode.parentNode.cells[5].innerHTML;
            document.querySelector('#jabatan').value = obj.parentNode.parentNode.cells[6].innerHTML;
            document.querySelector('#username').value = obj.parentNode.parentNode.cells[7].innerHTML;
            document.querySelector('#password').value = '';
            editedID = obj.parentNode.parentNode.rowIndex;
            editedPK = obj.parentNode.parentNode.cells[0].innerHTML;
            edited = true;
        }

        function cari() {
            var input, sfilter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tablePegawai");
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

        function cekNama(){
            let nama = document.getElementById("nama").value;
            
            if(nama.match(/[!-/:-@{-~!"^_`\[\]]/) || nama.match(/[0-9]/)){
                alert("Inputan hanya alfabet");
                document.getElementById("nama").value = '';
                return false;
            }

            if(nama.length > 50)
            {
                alert("Nama maksimal 50 karakter");
                document.getElementById("nama").value = '';
                return false;
            }
        }

        function cekNoTelp(){
            let telp = document.getElementById("noTelp").value;

            // if(telp.length < 8 || telp.length > 12)
            // {
            //     alert("Nomor telfon kependekan atau kepanjangan");
            //     cls();
            //     return false;
            // }

            if(telp.match(/[$-/:-?{-~!"^_`\[\]]/) || telp.match(/[a-z]/) || telp.match(/\s/)){
                alert("Inputan hanya numerik");
                document.getElementById("noTelp").value = '';
                return false;
            }
        }

        function cekPassword()
        {   let pwd = document.getElementById("password").value;

            if(pwd.match(/\s/))
            {
                alert("Password tidak boleh ada spasi");
                document.getElementById("password").value = '';
                return false;
            }
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

        function fadeout(i){
            document.getElementById("img" + i).style.opacity="0.5";
            document.getElementById("text" + i).style.display = "none";
        }

        function fadein(i){
            document.getElementById("img" + i).style.opacity="1";
            document.getElementById("text" + i).style.display = "block";
        }
</script>