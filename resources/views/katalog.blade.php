<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atma Auto: Home Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10" style="background-color:#3e83f2;color:white">
                <h1>Atma Auto</h1>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    {{-- Tampil Sparepart Terlaris --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-5 mb-5 text-center font-italic">
               <h1>Sparepart Terlaris</h1>
               <img src="" alt=""> 
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    {{-- Show Sparepart --}}
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-5 mb-5 text-center font-italic">
                <h1>Sparepart</h1>
                
                <select name="tipeSparepart" placeholder="Pilih Tipe Sparepart">
                    <option value="">--Pilih Tipe Sparepart--</option>
                    <option value="ban">Ban</option>
                    <option value="lampu">Lampu</option>
                </select>

                <img src="" alt="">
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10" style="background-color:#3e83f2;color:white">
                <h1>Atma Auto</h1>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
</html>