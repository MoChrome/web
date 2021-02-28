<?php
session_start();
include 'config.php';
if (!empty($_SESSION['usernm']) and !empty($_SESSION['passwd'])) {
    header('location:mahasiswa.php');
} else {

    if (isset($_POST['login'])) {
        $usernm = $_POST['username'];
        $passwd = md5($_POST['password']);
        $tampil = mysqli_query($koneksi, "SELECT * FROM chevirispanrizal_user WHERE usernm='$usernm' AND passwd='$passwd'");
        $data = mysqli_fetch_array($tampil);

        if (empty($data['usernm'])) {
            echo "<script>alert('Gagal Login');
            window.location='login.php';</script>";
        } elseif ($_SESSION["captcha"] != $_POST["captcha"]) {
            echo "<script>alert('Wrong Captcha!')</script>";
        } else {
            $_SESSION['id'] = $data['id'];
            $_SESSION['usernm'] = $data['usernm'];
            $_SESSION['passwd'] = $data['passwd'];
            echo "<script>alert('Berhasil Login');
        window.location='mahasiswa.php';</script>";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Login</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="container bg-light shadow p-3 mb-5 bg-body rounded">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" required />
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-3">
                                    <img src="captcha.php" alt="">
                                </div>
                                <div class="col">
                                    <input type="text" name="captcha" class="form-control" placeholder="Captcha" required>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button name="login" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>