<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Sparepart Terlaris</title>
</head>
<body>
    <div id="fullcontainer">
        <div id="container">
            <div id="header">
                <img src="logoAA.ico" alt="Logo">
                <p>ATMA AUTO</p>
                <p>MOTORCYCLE SPAREPARTS AND SERVICES </p>
                <p>Jl. Babarsari No. 43 Yogyakarta 552181 </p>
                <p>Telp. (0274) 487711 </p>
                <p>http://atmaauto.com </p>
            </div>

            <hr>

            <p style="text-align: center"><strong>LAPORAN SPAREPART TERLARIS</strong></p>
            <p>Tahun: <span id="tahun"></span></p>
        
            <table id="tableBulan">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center">No</th>
                        <th style="width: 150px; text-align: center">Bulan</th>
                        <th style="width: 180px; text-align: center">Nama Barang</th>
                        <th style="width: 180px; text-align: center">Tipe Barang</th>
                        <th style="width: 180px; text-align: center">Jumlah Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <p id="dicetak" align="right" style="display: none">dicetak tanggal <span id="tanggal"></span></p>
        </div>
        
        <br>
        <br>
    </div>    
</body>
</html>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}

img {
    float: left;
    width: 150px;
    height: 150px;
    margin-left: 50px;
    margin-right: -170px;
}

#container {
    margin: auto;
    width: 780px;
    border: 3px solid black;
    border-collapse: collapse;
    padding: 30px 40px;
}

#judultotal {
    text-align: right;
}

#container2 {
    width: 600px;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 20px;

}

#header {
    margin: auto;
    text-align: center;
}

</style>

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="/html2canvas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

    const urlParams = new URLSearchParams(window.location.search);    
    let tahun = null;
    let jenis = null;
    if(urlParams.get('tahun') !== null && urlParams.get('jenis') !== null) {
        tahun = urlParams.get('tahun');
        jenis = urlParams.get('jenis');
    }

    let bul = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September"
                , "Oktober", "November", "Desember"];

    if(jenis === 'cetak') {
        document.querySelector('#dicetak').style.display = 'block';
        let date = new Date().getDate();
        let month = new Date().getMonth();
        let year = new Date().getFullYear();

        let bulan = bul[month];

        document.querySelector('#tanggal').innerHTML = date + ' ' + bulan + ' ' + year;
        
    } 

    document.querySelector('#tahun').innerHTML = tahun;

    let nama = ['-','-','-','-','-','-','-','-','-','-','-','-'];
    let tipe = ['-','-','-','-','-','-','-','-','-','-','-','-'];
    let jumlah = ['-','-','-','-','-','-','-','-','-','-','-','-'];

    let table = document.querySelector('#tableBulan tbody');

    axios.get('api/sparepartterlaris/' + tahun)
    .then((result) => {
        let temp = result.data;
        console.log(temp);
        for(let i = 0 ; i < temp.length; i++) {
            nama[temp[i].bulan-1] = temp[i].nama;
            tipe[temp[i].bulan-1] = temp[i].tipe;
            jumlah[temp[i].bulan-1] = temp[i].total;
        }

        console.log(nama);

        for(let j = 0; j < 12; j++) {
            let tr = table.insertRow(-1);
            let td = document.createElement('td');      
            for(let k = 0; k < 5; k++){
                td = tr.insertCell();  
                if (k == 0)
                    td.innerHTML = j+1;
                else if (k == 1) 
                    td.innerHTML = bul[j];
                else if (k == 2)
                    td.innerHTML = nama[j];
                else if (k == 3)
                    td.innerHTML = tipe[j];
                else if (k == 4)
                    td.innerHTML = jumlah[j];
            }   
        }

        if(jenis === 'cetak')
            printDong();
        
    }).catch((err) => {
        
    });   

    function printDong(quality = 2) {
        window.print();
    } 

</script>