<?php 
    include 'koneksi.php';
    if (isset($_GET['kode'])) {
        
        $kode = $_GET['kode'];

        $query = mysqli_query($koneksi, "DELETE FROM daftar_buku WHERE kode_buku = '$kode'");
        $query2 = mysqli_query($koneksi, "DELETE FROM stok_buku WHERE kode_buku = '$kode'");
        $query3 = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE kode_buku = '$kode'");

        if ($query && $query2 && $query3) {
            echo '<script type="text/javascript"> 
            alert("Data buku berhasil dihapus!"); 
            location.href="index.php?halaman=databuku";
            </script>';
        }else {
            echo '<script type="text/javascript"> 
            alert("Data buku gagal dihapus!"); 
            location.href="index.php?halaman=databuku";
            </script>';
        }
    }
        
?>