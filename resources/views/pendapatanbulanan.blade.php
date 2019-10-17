<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan Bulanan</title>
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

            <p style="text-align: center"><strong>LAPORAN PENDAPATAN BULANAN</strong></p>
            <p>Tahun: <span id="tahun"></span></p>
        
            <table id="tableBulan">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center">No</th>
                        <th style="width: 150px; text-align: center">Bulan</th>
                        <th style="width: 150px; text-align: center">Service</th>
                        <th style="width: 150px; text-align: center">Spareparts</th>
                        <th style="width: 150px; text-align: center">Total</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <p id = "judultotal"><strong>TOTAL <span id="total"><span></strong></p>
            <br>
            <p id="dicetak" align="right" style="display: none">dicetak tanggal <span id="tanggal"></span></p>
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

img {
    float: left;
    width: 150px;
    height: 150px;
    margin-left: 0px;
    margin-right: -70px;
}

#container {
    margin: auto;
    width: 650px;
    border: 3px solid black;
    border-collapse: collapse;
    padding: 10px 40px;
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

    let service = [0,0,0,0,0,0,0,0,0,0,0,0];
    let sparepart = [0,0,0,0,0,0,0,0,0,0,0,0];
    let total = [0,0,0,0,0,0,0,0,0,0,0,0];

    let table = document.querySelector('#tableBulan tbody');

    let total1 = 0;

    axios.get('api/pendapatanbulanan/'+tahun)
    .then((result) => {
        let temp = result.data;
        console.log(temp);
        for(let i = 0 ; i < temp.length; i++) {
            service[temp[i].bulan-1] = temp[i].service;
            sparepart[temp[i].bulan-1] = temp[i].sparepart;
            total[temp[i].bulan-1] = temp[i].total;
        }

        console.log(service);

        for(let j = 0; j < 12; j++) {
            total1 += total[j];
        
            let tr = table.insertRow(-1);
            let td = document.createElement('td');      
            for(let k = 0; k < 5; k++){
                td = tr.insertCell();  
                if (k == 0)
                    td.innerHTML = j+1;
                else if (k == 1) 
                    td.innerHTML = bul[j];
                else if (k == 2)
                    td.innerHTML = service[j];
                else if (k == 3)
                    td.innerHTML = sparepart[j];
                else if (k == 4)
                    td.innerHTML = total[j];
            }   
        }

        document.querySelector('#total').innerHTML = total1;

        var ctx = document.getElementById("myChart").getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: bul,
                datasets: [{
                    label: "Service",
                    backgroundColor: "blue",
                    data: service
                }, {
                    label: "Spareparts",
                    backgroundColor: "red",
                    data: sparepart,
                }, {
                    label: "Total",
                    backgroundColor: "grey",
                    data: total
                }]
            },
            options: {
                legend: {
                    position: 'right'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero: true
                        }
                    }],
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

    function printDong(quality = 2) {
        window.print();
    } 

</script>