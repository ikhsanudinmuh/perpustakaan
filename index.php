<?php
    include 'header.php';
    session_start();
    if ($_SESSION['status'] == 'admin') {?>
        <title>Menu Admin</title>
    <?php
    } elseif($_SESSION['status'] == 'user') {?>
        <title>Menu User</title>
    <?php
    }
    ?>

</head>
<body>
    <div class="container text-right">
        Selamat datang, <?php echo $_SESSION['username']; ?>
        <button class="btn btn-secondary"><a style="text-decoration:none; color: white" href="logout.php">LOGOUT</a></button>
    </div>
    <?php if ($_SESSION['status'] == 'admin') { ?>
        <div class="container">
            <nav class="navbar navbar-expand navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Perpustakaan Ikhsan</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=datapeminjaman">Data Peminjaman Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=databuku">Data Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=stokbuku">Stok Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=registrasi">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=daftaruser">Daftar User</a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php } elseif ($_SESSION['status'] == 'user') { ?>
        <div class="container">
            <nav class="navbar navbar-expand navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Perpustakaan Ikhsan</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=peminjamanbuku">Peminjaman Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?halaman=riwayatpeminjamanbuku">Riwayat Peminjaman Buku</a>
                    </li>
                </ul>
            </nav>

        <?php
        }
        ?>

    <div class="container">
        <?php
            if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == 'datapeminjaman') {
                    include 'datapeminjaman.php';
                }elseif ($_GET['halaman'] == 'databuku') {
                    include 'databuku.php';
                }elseif ($_GET['halaman'] == 'stokbuku') {
                    include 'stokbuku.php';
                }elseif ($_GET['halaman'] == 'registrasi') {
                    include 'registrasi.php';
                }elseif ($_GET['halaman'] == 'daftaruser') {
                    include 'daftaruser.php';
                }elseif ($_GET['halaman'] == 'peminjamanbuku') {
                    include 'peminjamanbuku.php';
                }elseif ($_GET['halaman'] == 'riwayatpeminjamanbuku') {
                    include 'riwayatpeminjamanbuku.php';
                }
            }
        ?>
    </div>
    
</body>

<?php include 'footer.php' ?>