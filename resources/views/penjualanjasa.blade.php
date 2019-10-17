<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan Jasa</title>
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

            <p style="text-align: center"><strong>LAPORAN PENJUALAN JASA</strong></p>
            <p>Tahun: <span id="tahun"></span></p>
            <p>Bulan: <span id="bulan"></p>
        
            <table id="tableBulan">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center">No</th>
                        <th style="width: 150px; text-align: left">Merk</th>
                        <th style="width: 180px; text-align: left">Tipe Motor</th>
                        <th style="width: 200px; text-align: Center">Nama Service</th>
                        <th style="width: 200px; text-align: Center">Jumlah Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <p id="dicetak" align="right" style="display: none">dicetak tanggal <span id="tanggal"></span></p>
        </div>
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

table tr td:nth-child(1) {
    text-align: center;
}

table tr td:nth-child(2, 3, 4) {
    text-align: left;
}

table tr td:nth-child(5) {
    text-align: right;
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
    margin: auto;
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
    let bulan = null;
    if(urlParams.get('tahun') !== null && urlParams.get('jenis') !== null && urlParams.get('bulan') !== null) {
        tahun = urlParams.get('tahun');
        jenis = urlParams.get('jenis');
        bulan = urlParams.get('bulan');
    }

    let bul = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September"
                , "Oktober", "November", "Desember"];

    let month = new Date().getMonth();
    let bln = bul[month];
    let bln2 = bul[bulan-1];

    if(jenis === 'cetak') {
        document.querySelector('#dicetak').style.display = 'block';
        let date = new Date().getDate();
        let year = new Date().getFullYear();
        document.querySelector('#tanggal').innerHTML = date + ' ' + bln + ' ' + year;
        
    } 

    document.querySelector('#tahun').innerHTML = tahun;
    document.querySelector('#bulan').innerHTML = bln2;

    let table = document.querySelector('#tableBulan tbody');


    axios.get('api/penjualanjasa/' + bulan + '/' + tahun)
    .then((result) => {
        let temp = result.data;

        for(let j = 0; j < result.data.length; j++) {
            let tr = table.insertRow(-1);
            let td = document.createElement('td');      
            for(let k = 0; k < 5; k++){
                td = tr.insertCell();  
                if (k == 0)
                    td.innerHTML = j+1;
                else if (k == 1) 
                    td.innerHTML = result.data[j].nama_merk;
                else if (k == 2)
                    td.innerHTML = result.data[j].nama_tipe;
                else if (k == 3)
                    td.innerHTML = result.data[j].nama_jasa_service;
                else if (k == 4)
                    td.innerHTML = result.data[j].total;
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