<?php
    include 'header.php';
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and password='$password'");
        $cek = mysqli_num_rows($query);
        $r = mysqli_fetch_array($query);

        if ($cek > 0) {
            echo '<script type="text/javascript"> 
            alert("Anda berhasil login!"); 
            location.href="index.php";
            </script>';
            session_start();
            $_SESSION['username'] = $r['username'];
            $_SESSION['status'] = $r['status'];
        }else {
            echo '<script type="text/javascript"> 
            alert("Username atau password yang anda masukkan salah!"); 
            location.href="login.php";
            </script>';
        }
    }
?>
    
    <title>LOGIN PERPUSTAKAAN</title>
    
</head>
<body>
    <div class="container">
    <center>
        <form class="col-md-4" style="border-style:solid; margin-top:200px" action="" method="post">
            <h2 class="text-center">Login Perpustakaan</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" required placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" required placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn-primary" value="Login" name="login" required>
            </div>
        </form>
        </center>
    </div>
    
    
</body>
<?php
    include 'footer.php';
?>
