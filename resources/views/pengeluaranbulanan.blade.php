<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengeluaran Bulanan</title>
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

            <p style="text-align: center"><strong>LAPORAN PENGELUARAN BULANAN</strong></p>
            <p>Tahun: <span id="tahun"></span></p>
        
            <table id="tableBulan">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center">No</th>
                        <th style="width: 200px; text-align: left">Bulan</th>
                        <th style="width: 240px; text-align: center">Jumlah Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <p id = "judultotal"><strong>TOTAL <span id="total"><span></strong></p>

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

table tr td:nth-child(1) {
    text-align: center;
}

table tr td:nth-child(3) {
    text-align: right;
}

#container {
    width: 530px;
    margin: auto;
    border: 3px solid black;
    border-collapse: collapse;
    padding: 30px 40px;
}

img {
    float: left;
    width: 150px;
    height: 150px;
    margin-left: 0px;
    margin-right: -70px;
}

#judultotal {
    text-align: right;
}

#container2 {
    margin: auto;
    width: 500px;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 20px;

}

#header {
    margin: auto;
    text-align: center;
}

#tableBulan {
    margin: auto;
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

    

    let dat = [0,0,0,0,0,0,0,0,0,0,0,0];

    let table = document.querySelector('#tableBulan tbody');
    let table2 = document.querySelector('#tableJasa tbody');

    let total = 0;

    axios.get('api/pengeluaranbulanan/'+tahun)
    .then((result) => {
        let temp = result.data;
        for(let i = 0 ; i < temp.length; i++) {
            dat[temp[i].bulan-1] = temp[i].pengeluaran;
        }

        console.log(dat);

        for(let j = 0; j < 12; j++) {
            total += dat[j];
        
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

        document.querySelector('#total').innerHTML = total;

        var ctx = document.getElementById("myChart").getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: bul,
                datasets: [{
                    backgroundColor: [
                        "#5daf3a",
                        "#bc6631",
                        "#95a5a6",
                        "#9b59b6",
                        "#f1c40f",
                        "#e74c3c",
                        "#34495e",
						"#f4e542",
						"#ff00a5",
						"#00ffa1",
						"#ff0000",
						"#ffaa00"
                    ],
                    data: dat
                }]
            },
            options: {
                legend: {
                    position: 'right'
                },
                // scales: {
                //     yAxes: [{
                //         ticks: {
                //         beginAtZero: true
                //         }
                //     }]
                // }
            }

            
        });

        if(jenis === 'cetak')
                setTimeout(printDong, 1000);
        
    }).catch((err) => {
        
    });   

    function printDong1(quality = 4) {
        const filename  = 'ThisIsYourPDFFilename.pdf';

		html2canvas(document.querySelector('#fullcontainer'), {scale: quality}
		).then(canvas => {
			let pdf = new jsPDF('p', 'mm', 'a4');
			pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
			pdf.save(filename);
        });
    } 

    function printDong() {
        window.print();
    }

</script>