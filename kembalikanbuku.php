<?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        if (isset($_GET['kode'])) {
            $id = $_GET['id'];
            $kode = $_GET['kode'];
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d');

            $query = mysqli_query($koneksi, "UPDATE peminjaman SET tanggal_kembali = '$date', status_peminjaman='kembali' WHERE id = '$id'");
            $query2 = mysqli_query($koneksi, "UPDATE stok_buku SET jumlah_buku = jumlah_buku+1 WHERE kode_buku = '$kode'");

            if ($query && $query2) {
                echo '<script type="text/javascript"> 
                alert("Pengembalian buku berhasil!"); 
                location.href="index.php?halaman=peminjamanbuku";
                </script>';
            }else {
                echo '<script type="text/javascript"> 
                alert("Pengembalian buku gagal!"); 
                location.href="index.php?halaman=peminjamanbuku";
                </script>';
            }
        }

    }
?>