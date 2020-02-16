<div class="container">
    <center>
        <form class="col-md-4" style="" action="" method="post">
            <h2 class="text-center">Registrasi Perpustakaan</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" required placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" required placeholder="Password">
            </div>
            <div class="form-group">
                <select name="status" class="form-control" id="">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn-primary" value="Register" name="register" required>
            </div>
        </form>
    </center>
</div>

<?php
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        $query = mysqli_query($koneksi, "INSERT INTO user values ('$username','$password','$status')");
        
        if ($query) {
            echo '<script type="text/javascript"> 
            alert("Registrasi berhasil!"); 
            location.href="index.php?halaman=registrasi";
            </script>';
        }else {
            echo '<script type="text/javascript"> 
            alert("Registrasi gagal!"); 
            location.href="index.php?halaman=registrasi";
            </script>';
        }
    }
?>