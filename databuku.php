<div class="container">
    <center>

    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Input Data
    </a>

    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form class="" style="" action="" method="post">
                <h2 class="text-center">Input Buku</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="judul_buku" required placeholder="Judul Buku">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pengarang" required placeholder="Pengarang">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="kategori" required placeholder="Kategori">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="nomor_rak" required placeholder="Nomor Rak">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn-outline-success" value="Tambahkan buku" name="tambah" required>
                </div>
            </form>
        </div>
    </div>
        
        <h2 class="text-center">Data Buku</h2>
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nomor Rak</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <?php
                $query = mysqli_query($koneksi, "SELECT * FROM daftar_buku INNER JOIN stok_buku ON daftar_buku.kode_buku = stok_buku.kode_buku");
                $no = 1;

                while ($r = mysqli_fetch_array($query)) {?>
                
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $r['kode_buku']; ?></td>
                        <td><?php echo $r['judul_buku']; ?></td>
                        <td><?php echo $r['pengarang']; ?></td>
                        <td><?php echo $r['kategori']; ?></td>
                        <td><?php echo $r['nomor_rak']; ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#myModal<?php echo $r['kode_buku']; ?>" class="btn btn-warning" type="button">Edit</button>
                            <button data-toggle="modal" data-target="#myModal2<?php echo $r['kode_buku']; ?>" class="btn btn-danger" type="button">Hapus</button>
                        </td>
                    </tr>

                    <div class="modal fade" id="myModal<?php echo $r['kode_buku']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data buku</h5>
                                </div>
                                <div class="modal-body">
                                <form class="" style="" action="editbuku.php" method="post">
                                    <input type="hidden" name="kode_buku" value="<?php echo $r['kode_buku']; ?>">
                                    <label for="" class="label-control">Judul Buku :</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?php echo $r['judul_buku'] ; ?>" name="judul_buku">
                                    </div>
                                    <label for="" class="label-control">Pengarang Buku :</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?php echo $r['pengarang'] ; ?>" name="pengarang">
                                    </div>
                                    <label for="" class="label-control">Kategori :</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?php echo $r['kategori'] ; ?>" name="kategori">
                                    </div>
                                    <label for="" class="label-control">Nomor Rak :</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="<?php echo $r['nomor_rak'] ; ?>" name="nomor_rak">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save" name="simpan">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal2<?php echo $r['kode_buku']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus data buku</h5>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data buku ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="deletebuku.php?kode=<?php echo $r['kode_buku'];?>">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <?php
                }
            ?>
            </table>
    </center>
</div>

<?php
    if (isset($_POST['tambah'])) {
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $kategori = $_POST['kategori'];
        $norak = $_POST['nomor_rak'];

        $query1 = mysqli_query($koneksi, "INSERT INTO daftar_buku(judul_buku,pengarang,kategori) values ('$judul_buku','$pengarang','$kategori')");
        $query2 = mysqli_query($koneksi, "INSERT INTO stok_buku(judul_buku, nomor_rak) values ('$judul_buku', '$norak')");

        if ($query1 && $query2) {
            echo '<script type="text/javascript"> 
            alert("Input buku berhasil!"); 
            location.href="index.php?halaman=databuku";
            </script>';
        }else {
            echo '<script type="text/javascript"> 
            alert("Input buku gagal!"); 
            location.href="index.php?halaman=databuku";
            </script>';
        }
    }
?>