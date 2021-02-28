<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Data Mahasiswa</title>
</head>

<body>
    <div class=".container-fluid p-3 mb-2 bg-light" style="height: 100vh">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 shadow p-3 mb-5 bg-white rounded">
                <h2>Data Mahasiswa</h2>
                <div class="row">
                    <div class="col-6"><button type="button" class="btn btn-info" style="margin-bottom: 10px;" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user-plus"></i>Tambah</button></div>
                    <div class="col-6">
                        <a href="logout.php" class="btn btn-warning float-right" style="margin-bottom: 10px;" onclick="confirm('yakin')"><i class="fa fa-sign-out"></i>Logout</a>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahdata">Tambah data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <table align="center" width="500px">
                                        <tr>
                                            <td>NPM</td>
                                            <td>:
                                                <input type="number" name="npm" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:
                                                <input type="text" name="nama" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:
                                                <select type="text" name="kelamin" required>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:
                                                <input type="text" name="alamat" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:
                                                <input type="text" name="email" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:
                                                <input type="text" name="telp" required />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:
                                                <input type="text" name="agama" required />
                                            </td>
                                        </tr>

                                    </table>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover table-responsive-lg" style="text-align:center;">
                    <tr class="table-info">
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Kelamin</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Agama</th>
                        <th>Aksi</th>
                    </tr>

                    <?php
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data = mysqli_query($koneksi, "SELECT COUNT(npm) FROM chevirispanrizal_mahasiswa");
                    $jumlah_row = mysqli_fetch_array($data);
                    $total_halaman = ceil($jumlah_row[0] / $batas);

                    $data_mahasiswa = mysqli_query($koneksi, "select * from chevirispanrizal_mahasiswa limit $halaman_awal, $batas");
                    $nomor = $halaman_awal + 1;
                    while ($d = mysqli_fetch_array($data_mahasiswa)) {
                    ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $d['npm']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['kelamin']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['telp']; ?></td>
                            <td><?= $d['agama']; ?></td>
                            <td>
                                <button class="btn btn-primary" style="margin-bottom: 3px;" data-toggle='modal' data-target='#modal-<?= "$d[npm]"; ?>'><i class='fas fa-edit'></i>Edit</button>
                                <a class="btn btn-danger" style="margin-bottom: 3px;" href='mahasiswa.php?npm=<?= $d["npm"]; ?>'><i class='fas fa-trash'></i>Delete</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-<?= "$d[npm]"; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <?php
                                            $npm = $d['npm'];
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM chevirispanrizal_mahasiswa WHERE npm='$npm'");
                                            while ($row = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <div class="form-group">
                                                    <label for="" class="form-label">NPM</label>
                                                    <input type="number" class="form-control" name="npm" value="<?= $row['npm'] ?>">
                                                    <input type="hidden" class="form-control" name="npm_tmp" value="<?= $row['npm'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?= $row['nama'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label"> Jenis Kelamin</label>
                                                    <select class="form-control" name="kelamin" required>
                                                        <option value="Laki-Laki" <?php if ($row['kelamin'] == 'Laki-Laki') {
                                                                                        echo 'selected';
                                                                                    } ?>>Laki-Laki</option>
                                                        <option value="Perempuan" <?php if ($row['kelamin'] == 'Perempuan') {
                                                                                        echo 'selected';
                                                                                    } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" value="<?= $row['alamat'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Telepon</label>
                                                    <input type="number" class="form-control" name="telp" value="<?= $row['telp'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Agama</label>
                                                    <input type="text" class="form-control" name="agama" value="<?= $row['agama'] ?>">
                                                </div>
                                            <?php endwhile; ?>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </table>
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman > 1) {
                                                        echo "href='?halaman=$previous'";
                                                    } ?>>Previous</a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) {
                        ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                        echo "href='?halaman=$next'";
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>