<?php
require "../config/connector.php";
session_start();

$colour = [
    "danger" => "Red",
    "success" => "Green",
    "primary" => "Blue",
];

if (isset($_SESSION["login"])) {
    $login_as = $_SESSION["email"];
    $result_login = mysqli_query($connector, "SELECT * FROM user_Ikrar WHERE email = '$login_as'");
    $data_login = mysqli_fetch_assoc($result_login);
} else {
    header("Location: Login-Ikrar.php");
    exit;
}

if (isset($_POST["update"])) {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $password = mysqli_real_escape_string($connector, $_POST["password"]);
    $konfirmasi_password = mysqli_real_escape_string($connector, $_POST["password2"]);
    setcookie("warna_navbar", $_POST["warna_navbar"], time() + 86400, "/");

    if ($password == $konfirmasi_password) {
        $query = "UPDATE user_Ikrar SET
                nama = '$nama',
                no_hp = '$no_hp',
                password = '$password'
              WHERE email = '$email'";
        mysqli_query($connector, $query);
    }

    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        <?php include 'asset/style/style.css'; ?>
    </style>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>">
        <div class="container py-2">
            <div class="navbar-nav">
                <a class="nav-link" href="../index.php">Home</a>
                <a class="nav-link" href="List-Nama.php">MyCar</a>
            </div>
            <div class="d-flex">
                <a href="./Add-Nama.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" role="button">Add Car</a>
                <div class="dropdown ms-4">
                    <button class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?> dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $data_login["nama"]; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="#">Profile</a></li>
                        <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="../config/logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="fw-bold text-center">Profile</h2>
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="mb-3 row position-relative">
                        <label for="email" class="col-sm-2 col-form-label text-muted">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext text-muted" id="email" name="email" value="<?= $data_login["email"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row position-relative">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-muted" id="nama" name="nama" value="<?= $data_login["nama"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row position-relative">
                        <label for="email" class="col-sm-2 col-form-label text-muted">No Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-muted" id="no_hp" name="no_hp" value="<?= $data_login["no_hp"]; ?>">
                        </div>
                    </div>
