<h3 class="text-center">Data Peminjaman Buku</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Dipinjam Oleh</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <?php
            $nama = $_SESSION['username'];

            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN daftar_buku ON peminjaman.kode_buku = daftar_buku.kode_buku");
            $no = 1;

            while ($r = mysqli_fetch_array($query)) { ?>
            
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['kode_buku']; ?></td>
                    <td><?php echo $r['judul_buku']; ?></td>
                    <td><?php echo $r['tanggal_pinjam']; ?></td>
                    <td><?php echo $r['tanggal_kembali']; ?></td>
                    <td><?php echo $r['nama_peminjam']; ?></td>
                    <td>
                        <?php
                        if ($r['status_peminjaman'] == 'pinjam') {?>
                            <span class="badge badge-primary">Dipinjam</span>
                        <?php
                        } elseif ($r['status_peminjaman'] == 'kembali') {?>
                            <span class="badge badge-success">Dikembalikan</span>
                        <?php
                        }
                        ?>
                    </td>
                </tr>

                <?php 
                    } 
                ?>
        </table>
    </div>
