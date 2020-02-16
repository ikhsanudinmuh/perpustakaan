<form class="" style="" action="" method="post">
    <h2 class="text-center">Pinjam Buku</h2>
    <div class="form-group">
        <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['username'];?>" readonly>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="alamat" required placeholder="Alamat">
    </div>
    <div class="form-group">
        <select name="kode_buku" class="form-control" id="">
            <option value="Judul Buku">-Judul Buku-</option>
            <?php 
                date_default_timezone_set('Asia/Jakarta');
                $date = date('Y-m-d');

                $query = mysqli_query($koneksi, "SELECT * FROM daftar_buku");

                while ($r = mysqli_fetch_array($query)) {
                    echo "<option value='$r[0]'>$r[1]</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $date; ?>" name="tanggal_pinjam" readonly>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn-outline-success" value="Pinjam Buku" name="pinjam" required>
    </div>
</form>

<h3 class="text-left">Buku yang sedang anda pinjam :</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php
            $nama = $_SESSION['username'];

            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN daftar_buku ON peminjaman.kode_buku = daftar_buku.kode_buku WHERE nama_peminjam = '$nama' && status_peminjaman = 'pinjam'");
            $no = 1;

            while ($r = mysqli_fetch_array($query)) { ?>
            
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['kode_buku']; ?></td>
                    <td><?php echo $r['judul_buku']; ?></td>
                    <td><?php echo $r['tanggal_pinjam']; ?></td>
                    <td>
                        <a href="kembalikanbuku.php?id=<?php echo $r['id']; ?>&kode=<?php echo $r['kode_buku']; ?>">
                            <button class="btn btn-warning" type="button">Kembalikan</button>
                        </a>
                    </td>
                </tr>
    </table>
<?php 
    } 
?>

<?php 
    if (isset($_POST['pinjam'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $kode = $_POST['kode_buku'];
        $tanggal = $_POST['tanggal_pinjam'];

        $querycek = mysqli_query($koneksi, "SELECT * FROM stok_buku WHERE kode_buku = '$kode'");
        $cekbuku = mysqli_fetch_array($querycek);

        if ($cekbuku['jumlah_buku'] == 0) {
            echo '<script type="text/javascript"> 
            alert("Buku yang ingin anda pinjam sedang tidak tersedia!"); 
            location.href="index.php?halaman=peminjamanbuku";
            </script>';

        }else {
            $query = mysqli_query($koneksi, "INSERT INTO peminjaman(nama_peminjam, alamat_peminjam, kode_buku, tanggal_pinjam, status_peminjaman) VALUES ('$nama', '$alamat', '$kode', '$tanggal', 'pinjam')");
            $query2 = mysqli_query($koneksi, "UPDATE stok_buku SET jumlah_buku = jumlah_buku-1 WHERE kode_buku = '$kode'");
            if ($query && $query2) {
                echo '<script type="text/javascript"> 
                alert("Peminjaman buku berhasil!"); 
                location.href="index.php?halaman=peminjamanbuku";
                </script>';
            }else {
                echo '<script type="text/javascript"> 
                alert("Peminjaman buku gagal!"); 
                location.href="index.php?halaman=peminjamanbuku";
                </script>';
            }
        }
        
    }
?>