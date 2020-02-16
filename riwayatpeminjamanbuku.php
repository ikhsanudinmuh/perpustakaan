<h3 class="text-left">Buku yang pernah anda pinjam :</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
            </tr>
        </thead>
        <?php
            $nama = $_SESSION['username'];

            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN daftar_buku ON peminjaman.kode_buku = daftar_buku.kode_buku WHERE nama_peminjam = '$nama' && status_peminjaman = 'kembali'");
            
            $no = 1;

            while ($r = mysqli_fetch_array($query)) { ?>
            
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['kode_buku']; ?></td>
                    <td><?php echo $r['judul_buku'] ?></td>
                    <td><?php echo $r['tanggal_pinjam']; ?></td>
                    <td><?php echo $r['tanggal_kembali']; ?></td>
                </tr>

                <?php 
                    } 
                ?>
        </table>
    </div>
