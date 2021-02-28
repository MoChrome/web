<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "db_chevirispanrizal_mahasiswa";
$koneksi = new mysqli($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
    trigger_error('Koneksi ke database gagal: ' .
        mysqli_connect_error(), E_USER_ERROR);
}

if (isset($_POST['simpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO chevirispanrizal_mahasiswa(npm,nama,kelamin,alamat,email,telp,agama) VALUES('$_POST[npm]','$_POST[nama]','$_POST[kelamin]','$_POST[alamat]','$_POST[email]','$_POST[telp]','$_POST[agama]')");
}

if (isset($_GET['npm'])) {
    $delete = mysqli_query($koneksi, "DELETE FROM chevirispanrizal_mahasiswa WHERE npm='$_GET[npm]'");
    if ($delete) {
        header("location:mahasiswa.php");
    } else {
        echo "Gagal Menghapus";
    }
}

if (isset($_POST['update'])) {
    $update = mysqli_query($koneksi, "UPDATE chevirispanrizal_mahasiswa SET npm='$_POST[npm]',nama='$_POST[nama]',kelamin='$_POST[kelamin]',alamat='$_POST[alamat]',email='$_POST[email]',telp='$_POST[telp]',agama='$_POST[agama]' WHERE npm='$_POST[npm_tmp]' ");
    if ($update) {
        header("location:mahasiswa.php");
    } else {
        echo "Gagal Memperbaharui";
    }
}
