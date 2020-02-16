<h2 class="text-center">Data Stok Buku</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Kode Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">No. Rak</th>
            <th scope="col">Stok</th>
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
            <td><?php echo $r['nomor_rak']; ?></td>
            <td><?php echo $r['jumlah_buku']; ?></td>
            <td>
                <button data-toggle="modal" data-target="#myModal<?php echo $r['kode_buku']; ?>" class="btn btn-warning" type="button">Edit</button>
            </td>
        </tr>

        <div class="modal fade" id="myModal<?php echo $r['kode_buku']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Stok buku</h5>
                    </div>
                    <div class="modal-body">
                    <form class="" style="" action="" method="post">
                        <input type="hidden" name="kode_buku" value="<?php echo $r['kode_buku']; ?>">
                        <label for="" class="label-control">Judul Buku :</label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $r['judul_buku'] ; ?>" name="judul_buku" readonly>
                        </div>
                        <label for="" class="label-control">Jumlah Buku :</label>
                        <div class="form-group">
                            <input type="number" class="form-control" value="<?php echo $r['jumlah_buku'] ; ?>" name="jumlah_buku">
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

<?php
    }


    if (isset($_POST['simpan'])) {
        $kode = $_POST['kode_buku'];
        $jumlah = $_POST['jumlah_buku'];

        $query = mysqli_query($koneksi, "UPDATE stok_buku SET jumlah_buku = '$jumlah' WHERE kode_buku = '$kode'");

        if ($query) {
            echo '<script type="text/javascript"> 
            alert("Jumlah buku berhasil diubah!"); 
            location.href="index.php?halaman=stokbuku";
            </script>';
        }else {
            echo '<script type="text/javascript"> 
            alert("Jumlah buku gagal diubah!"); 
            location.href="index.php?halaman=stokbuku";
            </script>';
        }
    }
?>                                                          
</table>