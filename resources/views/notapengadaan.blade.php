<html><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author">
  <title>Atma Auto</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  <!-- Fonts -->
  <link href="{{ asset('/assets/fonts/fonts.css') }}" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('/assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('/assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
</head>
<style>
  #box1{
				width:950px;
				height:1420px;
        background:white;
        margin:auto;
			}
  #box2{
				width:900px;
				height:1380px;
        background:white;
        margin:auto;
        margin-top:50px;
        border:1px solid black;
			}
  #image{
        float:left;
        display:block;
        width:180px;
        margin-top:10px;
        margin-left:100px;
      }
    #title{
        margin-right:220px;
        margin-top:10px;
        margin-left:0px;
        text-align:center;
        font-family:"Times New Roman";
      }
      #title1{
        margin-right:240px;
        margin-top:10px;
        margin-left:0px;
        font-size:40px;
        text-align:center;
        font-family:"Times New Roman";
      }
      #border{
        border-width: 1px;
        border-style: solid;
        width:800px;
        margin:auto;
      }
      #title2{
        margin:auto;
        text-align:center;
        margin-top:10px;
        font-weight:bold;
        font-size:20px;
      }
      #right{
        margin-left:580px;
        margin-bottom:5px;
      }
      #boxSuplier{
        width:300px;
				height:180px;
        background:white;
        margin-left:50px;
        margin-top:50px;
        border:5px dotted black;
        padding:15px;
      }
      #tujuan{
        margin-right:5px;
        font-weight:bold;
        font-size:15px;
        padding:10px;
      }
      #i{
        margin-left:50px;
        margin-top:30px;
      }
      #tabel,th,td{
        width:780px;
        margin:auto;
        padding:8px;
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      @media print
    {
    #pager,
    form,
    .no-print
    {
        display: none !important;
        height: 0;
    }


    .no-print, .no-print *{
        display: none !important;
        height: 0;
    }
}
</style>
<body>
  <!-- Sidenav -->
  <div id="box1">
      <div style="border: 0px">
      <div id="box2">
        <img src="logoAA.ico" height="200px" width="180" align="left"/>
        <h1 id="title1">ATMA AUTO</h1>
        <h3 id="title">MOTORCYCLES SPAREPARTS AND SERVICES</h3>
        <h3 id="title">Jl Babarsari no 43 Yogyakarta</h3>
        <h3 id="title">(021)463974</h3>
        <div id="border"></div>
        
        <h3 id="title2">SURAT PEMESANAN</h3>
        <br>
       
        <h3 id="right">No : <span id="no"></span></h3>
        <h3 id="right">Tanggal : <span id="tanggal"></span></h3>
        <div id="boxSuplier">
          <h3 id="tujan">Kepada Yth : </span></h3>
          <h3 id="tujan" class="nama"></h3>
          <h3 id="tujan" class="alamat"></h3>
          <h3 id="tujan" class="telepon"></h3>
          </div>

        <h3 id="i">Mohon untuk disediakan barang-barang berikut :</h3><br>
        <table id="tabel">
          <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Tipe Barang</th>
            <th>Jumlah</th>
          </thead>
          <tbody>
          </tbody>
        </table>
        <br>
        <br>
        <h3 id="right">Hormat kami, </h3><br><br><br>
        <h3 id="right">(Philips Purnomo)</h3>
        </div>
      </div>
  </div>
</body></html>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

    const urlParams = new URLSearchParams(window.location.search);    
    let id;
    if(urlParams.get('id') !== null) {
        id = urlParams.get('id');
    }

    axios.get('api/getpengadaan/'+id)
    .then((result) => {
        console.log(result.data);
        let tanggal = result.data.tanggal_pengadaan;

        let date = tanggal.substring(8);
        let m = tanggal.substring(5, 7);
        let year = tanggal.substring(0, 4);

        let bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September"
                , "Oktober", "November", "Desember"];

        let month = bulan[m-1];


        document.querySelector('#no').innerHTML = result.data.id_pengadaan;
        document.querySelector('#tanggal').innerHTML = date + ' '+ month + ' ' + year;
        document.querySelector('.nama').innerHTML = result.data.supplier.nama_supplier;
        document.querySelector('.alamat').innerHTML = result.data.supplier.alamat_supplier;
        document.querySelector('.telepon').innerHTML = result.data.supplier.no_telp_supplier;
        detail();
    }).catch((err) => {
        
    });

    function detail() {
      axios.get('api/getdetailpengadaan/'+id)
      .then((result) => {
          let table = document.querySelector('#tabel tbody');
          console.log(table);
          for(let i = 0; i < result.data.length; i++) {
              let tr = table.insertRow(-1);
              let td = document.createElement('td'); 
              for(j = 0; j < 5; j++){
                  td = tr.insertCell();  
                  if(j == 0) {
                    td.innerHTML = i+1;
                  }else if (j == 1) {
                      td.innerHTML = result.data[i].sparepart.nama_sparepart;
                  } else if (j == 2) {
                      td.innerHTML = result.data[i].sparepart.merk_sparepart;
                  } else if (j == 3) {
                      td.innerHTML = result.data[i].sparepart.tipe_sparepart;
                  } else if (j==4) {
            td.innerHTML = result.data[i].jumlah;
          }
              }
      } 
      printDong(); 
          

      }).catch((err) => {
          
      });
    }

    

    function printDong(quality = 2) {
        window.print();
    } 
</script>
