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
    <title>Atma Auto: Form Merk</title>
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
                    title="Kelola Data Merk">
                </a>
                <h6 class="text-center" style="color:white">Merk</h6>
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
    <h1 class="text-center font-italic mb-3 text-white">Kelola Data Merk</h1>

    {{-- Inputan Form --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center mb-5 p-4 isi">
                <form onsubmit = "return post()">
                    <h5>Nama Merk</h5>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Merk"
                    class="form-control input" maxlength="50" onkeyup="cekNama()">
                    <br>
                    <input type="submit" value="Input" class="btn btn-success w-50 float-left">
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
            <h1 class="text-center font-italic text-white">Cari Data Merk Kendaraan</h1>
            <form action="" class="text-center font-italic">
            <input id="myInput" type="text" name="search" placeholder="Cari Merk Kendaraan"
            class="rounded w-100 text-white pl-2"
            onkeyup="cari()" style="background-color:rgb(0,0,0,0.8);border:none">
            </form>
            <br>
            <br>
            <h1 class="text-center font-italic text-white">Table Merk Kendaraan</h1>
            <table class="table table-dark text-center" id="tableMerk">
                    <tr>
                    <th scope="col">ID Merk</th>
                    <th scope="col">Nama Merk</th>
                    <th scope="col">Aksi</th>
                    </tr>

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
    let merk;
    let tableMerk = document.querySelector('#tableMerk');
    let col = ['id_merk', 'nama_merk'];
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
        edited = false;
    }

    axios.get('api/merkkendaraan/tampil', config)
        .then((result) => {
            console.log(result.data);
            merk = result.data;
            for(let i = 0; i < merk.length; i++) {
            let tr = tableMerk.insertRow(-1);
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
                }else {
                    td.innerHTML = merk[i][col[j]];
                    }
                }
            }
        }).catch((err) => {
            console.log(err);
        });

        function post() {
            if(document.getElementById("nama").value == "")
            {
                alert("Data Tidak Boleh Kosong");
                return false;
            }
            else{
                let nama = document.querySelector('#nama').value;
                let formData = new FormData();
                formData.append('nama_merk', nama);
                if(edited == false) {
                    axios.post('api/merkkendaraan/tambah', formData, config)
                    .then((result) => {
                        console.log(result);
                        let mrk = {};
                        mrk.id_merk = result.data.merk.id_merk;
                        mrk.nama_merk = nama;
                        merk.push(mrk);

                        let tr = tableMerk.insertRow(-1);
                        let td = document.createElement('td');
                        for(j = 0; j <= Object.keys(mrk).length; j++){
                            td = tr.insertCell();
                            if(j == Object.keys(mrk).length) {
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
                            }else {
                                td.innerHTML = mrk[col[j]];
                            }
                        }
                        alert("Input Berhasil!");
                    }).catch((err) => {
                        console.log(err);
                        alert("Input Gagal");
                    });
                } else {
                    formData.append('_method', 'PUT')
                    axios.post('api/merkkendaraan/ubah/' + editedPK, formData, config)
                    .then((result) => {
                        tableMerk.rows[editedID].cells[1].innerHTML = nama;
                        edited = false;
                        alert("Edit Berhasil!");
                    }).catch((err) => {
                        console.log(err);
                        alert("Edit Gagal");
                    });
                }
                cls();
                return false;
            }
        }

        function hapus(obj) {
            if(confirm("Apakah anda yakin?"))
            {
                axios.delete('api/merkkendaraan/hapus/'+ obj.parentNode.parentNode.cells[0].innerHTML ,config)
                .then((result) => {
                    merk.splice(obj.parentNode.parentNode.rowIndex-1, 1);
                    tableMerk.deleteRow(obj.parentNode.parentNode.rowIndex);
                    alert("Delete Berhasil!");
                }).catch((err) => {
                    console.log(err);
                    alert("Delete Gagal!");
                });
            }
        }

        function ubah(obj) {
            document.querySelector('#nama').value = obj.parentNode.parentNode.cells[1].innerHTML;
            editedID = obj.parentNode.parentNode.rowIndex;
            editedPK = obj.parentNode.parentNode.cells[0].innerHTML;
            edited = true;
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
            table = document.getElementById("tableMerk");
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

        function cekNama()
        {
            let nama = document.getElementById("nama").value;
            if(nama.match(/[0-9]/) || nama.match(/[$-/:-@{-~!"^_`\[\]]/))
            {
                alert("Inputan hanya alfabet");
                document.getElementById("nama").value = "";
                return false;
            }
        }
</script>
