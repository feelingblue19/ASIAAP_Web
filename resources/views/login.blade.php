<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <title>Atma Auto: Login</title>
    <link rel="shortcut icon" href="Logo.ico" type="image/x-icon"/>
</head>
<body>
    {{-- Header --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#262626">
                <a href="/8900/public/"><img src="Logo.png" class="img-fluid mx-auto d-block" 
                style="width:20%;filter:invert(100%)" alt="Logo AA"></a>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
    </div>

    <div style="background-image:url('wpp2.png');background-size:100% auto">
    {{-- Form Login --}}
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-5 mb-5 p-4 isi text-center">
                <h1>Login</h1>
                <br>
                <form onsubmit="return post()">
                    <h5>Username</h5>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" 
                    class="form-control input">
                    <br>
                    <h5>Password</h5>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" 
                    class="form-control input">
                    <br><br>
                    <button id="submit" class="btn btn-success w-100">Submit</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    {{-- Footer Logo --}}
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-1"></div> -->
            <div class="col" style="background-color:#333">
                <!-- <img src="/Logo.png" class="img-fluid mx-auto d-block" style="width:10%" alt="Logo AA"> -->
                <h6 class="text-center font-weight-bold font-italic pt-3 pb-2 text-white">&copy;Atma Auto 2019</h6>
            </div>
            <!-- <div class="col-1"></div> -->
        </div>
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
    text-align: center;
}
</style>

</html>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script> 

    function post() {
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let formData=new FormData();
        
        if(document.getElementById("username").value == "" || document.getElementById("password").value == "")
        {
            alert("Data tidak boleh kosong!");
            return false;
        }else if( localStorage.getItem('token') !== null && localStorage.getItem('jabatan') !== null) {
            alert("Anda sudah Login! Silakan Logout terlebih dahulu!");
            return false;
        }
        else{
            formData.append('username', username);
            formData.append('password', password);
            axios.post('api/auth/login', formData).then(function(response)
            {
                console.log('login success');
                localStorage.setItem('jabatan', response.data.jabatan);
                localStorage.setItem('token', response.data.token);
                alert("Login Berhasil");
                if(response.data.jabatan == 'Admin')
                    window.location.href = "admin";
                else if(response.data.jabatan == 'Customer Service')
                    window.location.href = "tampilpenjualan";
                else if(response.data.jabatan == 'Kasir')
                    window.location.href = "pembayaran";
            })
            .catch(function(error)
            {
                console.log('login gagal');
                console.log(error.response);
                alert("Login Gagal");
            });
            return false;
        }
    }
     
</script>