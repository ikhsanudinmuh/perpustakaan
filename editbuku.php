<?php 
    include 'koneksi.php';

    if (isset($_POST['simpan'])) {
        $kode = $_POST['kode_buku'];
        $judul = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $kategori = $_POST['kategori'];
        $norak = $_POST['nomor_rak'];

        $query = mysqli_query($koneksi, "UPDATE daftar_buku SET judul_buku = '$judul', pengarang='$pengarang', kategori='$kategori' WHERE kode_buku = '$kode' ");
        $query2 = mysqli_query($koneksi, "UPDATE stok_buku SET judul_buku = '$judul', nomor_rak = '$norak' WHERE kode_buku = '$kode'");

        if ($query && $query2) {
            echo '<script type="text/javascript"> 
            alert("Data buku berhasil diubah!"); 
            location.href="index.php?halaman=databuku";
            </script>';
        }else {
            echo '<script type="text/javascript"> 
            alert("Data buku gagal diubah!"); 
            location.href="index.php?halaman=databuku";
            </script>';
        }
    }
?>