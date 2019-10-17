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
        </div>
    </div>

    <div style="background-image:url('wpp2.png');background-size:100% auto">
    <br><br>    
    
    

    {{-- Tampil Tabel --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <button class="btn btn-primary float-right" onclick="location.href='penjualan';">
                Tambah Penjualan
            </button>
            <h1 class="text-center font-italic text-white">Transaksi Penjualan</h1>
            <form action="" class="text-center font-italic">
            <input id="myInput" type="text" name="search" placeholder="Cari Transaksi Penjualan"
            class="rounded w-100 text-white pl-2"
            onkeyup="cari()" style="background-color:rgb(0,0,0,0.8);border:none">
            </form>
            <br>
            <table class="table table-dark" id="tableTransaksi">
                <thead>
                    <tr>
                        <th scope="col">No. Transaksi</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Subtotal Transaksi</th>
                        <th scope="col">Status Transaksi</th>
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
            <div class="col" style="background-color:#2c3e50;">
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


<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

    let tableTransaksi = document.querySelector('#tableTransaksi tbody');
    col = ['no_transaksi', 'tanggal_transaksi', 'subtotal_transaksi', 'status_transaksi'];
    let config = {
        headers: {
            'Authorization': "Bearer " + localStorage.getItem('token'),
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Accept': 'application/json'
        }
    }

    axios.get('api/penjualan/tampil', config)
    .then((result) => {
        for(let i = 0; i < result.data.length; i++) {
            let tr = tableTransaksi.insertRow(-1);
            let td = document.createElement('td');      
            for(j = 0; j <= col.length; j++){
                td = tr.insertCell();  
                if(j == col.length) {
                    let buttonEdit = document.createElement('input');
                    buttonEdit.setAttribute('type', 'button');
                    buttonEdit.setAttribute('value', 'Ubah');
                    buttonEdit.setAttribute('id', 'ubah');
                    buttonEdit.setAttribute('class', 'btn btn-primary');
                    buttonEdit.setAttribute('onclick', 'ubah(this)');

                    if(result.data[i].status_transaksi == 'Selesai')
                        buttonEdit.setAttribute('disabled', true);

                    td.appendChild(buttonEdit);
                    td.appendChild(document.createTextNode(' '));
                    let buttonHapus = document.createElement('input');
                    buttonHapus.setAttribute('type', 'button');
                    buttonHapus.setAttribute('value', 'Hapus');
                    buttonHapus.setAttribute('class', 'btn');
                    buttonHapus.setAttribute('class', 'btn btn-danger');
                    buttonHapus.setAttribute('onclick', 'hapus(this)');
                    
                    if(result.data[i].status_transaksi == 'Selesai')
                        buttonHapus.setAttribute('disabled', true);

                    td.appendChild(buttonHapus);
                    td.appendChild(document.createTextNode(' '));
                    let buttonSelesai = document.createElement('input');
                    buttonSelesai.setAttribute('type', 'button');
                    buttonSelesai.setAttribute('value', 'Selesai');
                    buttonSelesai.setAttribute('class', 'btn btn-success');

                    if(result.data[i].status_transaksi == 'Selesai')
                        buttonSelesai.setAttribute('disabled', true);
                        
                    buttonSelesai.setAttribute('onclick', 'selesai(this)');
                    td.appendChild(buttonSelesai);
                }else {
                    td.innerHTML = result.data[i][col[j]];
                    }
                }  
        }
    }).catch((err) => {
        console.log(err.response);
    });

    function ubah(obj) {
        let no_transaksi = obj.parentNode.parentNode.cells[0].innerHTML;
        let url = 'penjualan?id=';
        let url2 = url + no_transaksi;
        window.location.href = url2;
    }

    function hapus(obj) {
        if(confirm('Apakah Anda Yakin?')) {
            axios.delete('api/penjualan/hapus/'+obj.parentNode.parentNode.cells[0].innerHTML, config)
            .then((result) => {
                alert('Delete Berhasil!');
                tableTransaksi.deleteRow(obj.parentNode.parentNode.rowIndex-1);
            }).catch((err) => {
                console.log(err.response);
                alert('Delete Gagal');
            });
        }
    }

    function selesai(obj) {
        let data = obj.parentNode.parentNode;
        let formData = new FormData();
        formData.append('_method', 'PUT');
        axios.post('api/penjualan/selesai/' + data.cells[0].innerHTML, formData, config)
        .then((result) => {
            obj.setAttribute('disabled', true);
            data.cells[3].innerHTML = 'Selesai';
            obj.parentNode.childNodes[0].setAttribute('disabled', true);
            obj.parentNode.childNodes[2].setAttribute('disabled', true);
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

    function cari() {
        var input, sfilter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableTransaksi");
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
</script>