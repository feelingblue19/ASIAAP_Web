<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Sisa Stok</title>
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
            <div id="containerdalam">
                

                <hr>

                <p style="text-align: center"><strong>LAPORAN SISA STOK</strong></p>
                <p>Tahun: <span id="tahun"></span></p>
                <p>Tipe Barang: <span id="sparepart"></span></p>
            
                <table id="tableBulan">
                    <thead>
                        <tr>
                            <th style="width: 50px; text-align: center">No</th>
                            <th style="width: 150px; text-align: Center">Bulan</th>
                            <th style="width: 200px; text-align: Center">Sisa Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <p id="dicetak" align="right" style="display: none">dicetak tanggal <span id="tanggal"></span></p>
            </div>
            
        </div>
        <br>
        <br>
        <div id="container2">
            <canvas id="myChart"></canvas>
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

table tr td:nth-child(1) {
    text-align: center;
}

img {
    float: left;
    width: 150px;
    height: 150px;
    margin-right: -50px;
}

table tr td:nth-child(3) {
    text-align: right;
}

#container {
    margin: auto;
    width: 500px;
    border: 3px solid black;
    border-collapse: collapse;
    padding: 40px 100px;
}

#containerdalam {
    margin: auto;
    width: 400px;
}

#judultotal {
    text-align: right;
}

#tableBulan {
    margin:auto;
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
    let sparepart = null;
    if(urlParams.get('tahun') !== null && urlParams.get('jenis') !== null && urlParams.get('sparepart') !== null) {
        tahun = urlParams.get('tahun');
        jenis = urlParams.get('jenis');
        sparepart = urlParams.get('sparepart');
    }

    console.log(sparepart);

    document.querySelector('#tahun').innerHTML = tahun;
    document.querySelector('#sparepart').innerHTML = sparepart;

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

    let dat = ['-','-','-','-','-','-','-','-','-','-','-','-'];

    let table = document.querySelector('#tableBulan tbody');


    axios.get('api/sisastok/' + sparepart + '/' + tahun)
    .then((result) => {
        console.log(result.data);
        let temp = result.data;
        for(let i = 0 ; i < temp.length; i++) {
            dat[temp[i].bulan-1] = temp[i].sisa_stok
        }

        console.log(dat);

        for(let j = 0; j < 12; j++) {
            let tr = table.insertRow(-1);
            let td = document.createElement('td');      
            for(let k = 0; k < 3; k++){
                td = tr.insertCell();  
                if (k == 0)
                    td.innerHTML = j+1;
                else if (k == 1) 
                    td.innerHTML = bul[j];
                else if (k == 2)
                    td.innerHTML = dat[j];
            }   
        }

        var ctx = document.getElementById("myChart").getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: bul,
                datasets: [{
                    label: "Sisa Stok",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#4286f4",
                    borderColor: "#4286f4",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#4286f4",
                    pointBackgroundColor: "#4286f4",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#4286f4",
                    pointHoverBorderColor: "#4286f4",
                    pointHoverBorderWidth: 2,
                    pointRadius: 5,
                    pointHitRadius: 10,
                    data: dat
                }],
                fill: false,
            },
            options: {
                // animations: false,
                legend: {
                    position: 'right'
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display:false
                        }  
                    }]
                }
            }
        });

        if(jenis === 'cetak')
            setTimeout(printDong, 500);        
    }).catch((err) => {
        
    });   

    function printDong() {
        window.print();
    } 

</script>