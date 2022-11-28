<?php
require '../config/connector.php';

$sqlquery = "SELECT * FROM showroom_Ikrar_table";
$result = mysqli_query($connector, $sqlquery);

session_start();
if (isset($_SESSION["login"])) {
  $login_as = $_SESSION["email"];
  $result_login = mysqli_query($connector, "SELECT * FROM user_Ikrar WHERE email = '$login_as'");
  $data_login = mysqli_fetch_assoc($result_login);
}

$checkrow = mysqli_num_rows($result);

if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "berhasil") {
    echo "<div class='alert alert-success' role='alert'>
    Data Berhasil ditambahkan.
  </div>";
  } else if ($_GET['pesan'] == "gagal") {
    echo "<div class='alert alert-danger' role='alert'>
    Data Gagal ditambahkan.
  </div>";
  } else if ($_GET['pesan'] == "hapus") {
    echo "<div class='alert alert-success' role='alert'>
    Data Berhasil dihapus.
  </div>";
  } else if ($_GET['pesan'] == "update") {
    echo "<div class='alert alert-success' role='alert'>
    Data Berhasil diupdate.
  </div>";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ListCar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    <?php include '../asset/style/index.css'; ?>
  </style>
</head>

<body>
  <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>">
    <div class="container py-2">
      <?php if (isset($_SESSION["login"])) : ?>
        <div class="navbar-nav">
          <a class="nav-link" style="color: white;" href="../index.php">Home</a>
          <a class="nav-link" href="./ListCar-Ikrar.php">MyCar</a>
        </div>
        <div class="d-flex">
          <a href="./Add-Ikrar.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" role="button">Add Car</a>
          <div class="dropdown ms-4">
            <button class="btn btn-light dropdown-toggle text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $data_login["nama"]; ?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="./Profile-Ikrar.php">Profile</a></li>
              <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="../config/logout.php">Log Out</a></li>
            </ul>
          </div>
        </div>
      <?php else : ?>
        <div class="navbar-nav w-100 d-flex justify-content-between">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="./Login-Ikrar.php">Login</a>
        </div>
      <?php endif; ?>
    </div>
  </nav>

  <section id="list">
    <div class="container">
      <div>
        <h1>My Show Room</h1>
        <p>List Show Room Ikrar - 1202200084</p>
        <div class="d-flex gap-5">
          <?php
          if ($checkrow > 0) {
            while ($hasil = mysqli_fetch_assoc($result)) {
              echo "<div class='card cardcontent' style='width: 18rem;'>
            <img src='../asset/images/" . $hasil["foto_mobil"] . "' class='card-img-top' alt='fotomobil' style='padding: 16px;'>
            <div class='card-body'>
              <h5 class='card-title'>" . $hasil["nama_mobil"] . "</h5>
              <p class='card-text'>" . substr($hasil["deskripsi"], 0, 50) . '...' . "</p>
              <span class='d-flex'>
                <a href='Detail-Ikrar.php?id=" . $hasil["id_mobil"] . "' class='btn btn-primary' style='border-radius: 100px; width:140px; height: 36px;'>Detail</a>
                <a href='../config/delete.php?id=" . $hasil["id_mobil"] . "' class='btn btn-danger' style='border-radius: 100px; width:140px; height: 36px; margin-left:20px;'>Delete</a>
              </span>
            </div>
          </div>";
            }
          } else {
            echo "0 results";
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <footer class="" style="padding-bottom: 50px;">
    <div class="container">
      <p style="font-family: 'Raleway'; font-style: normal; font-weight: 700; font-size: 16px; line-height: 19px; color: #757575;">Jumlah Mobil : <?php echo $checkrow ?></p>
    </div>
  </footer>

  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>