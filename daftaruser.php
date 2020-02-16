<h3 class="text-center">Daftar user yang telah terdaftar :</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <?php
        $nama = $_SESSION['username'];

        $query = mysqli_query($koneksi, "SELECT * FROM user");
        $no = 1;

        while ($r = mysqli_fetch_array($query)) { ?>
        
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $r['username']; ?></td>
                <td><?php echo $r['password']; ?></td>
                <td>
                    <?php
                    if ($r['status'] == 'admin') {?>
                        <span class="badge badge-primary">Admin</span>
                    <?php
                    } elseif ($r['status'] == 'user') {?>
                        <span class="badge badge-warning">User</span>
                    <?php
                    }
                    ?>
                </td>
            </tr>

            <?php 
                } 
            ?>
</table>
