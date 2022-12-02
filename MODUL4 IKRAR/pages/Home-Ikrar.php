<?php
require './config/connector.php';

$query = "SELECT * FROM showroom_Ikrar_table";
$result = mysqli_query($connector, $query);

if (isset($_SESSION["login"])) {
  $login_as = $_SESSION["email"];
  $result_login = mysqli_query($connector, "SELECT * FROM user_Ikrar WHERE email = '$login_as'");
  $data_login = mysqli_fetch_assoc($result_login);
}

function cekdb($result) {
  if (mysqli_num_rows($result) > 0) {
    echo "./pages/ListCar-Ikrar.php";
  } else {
    echo "./pages/Add-Ikrar.php";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
      <?php include 'asset/style/index.css'; ?>
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand navbar-dark bg-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>">
    <div class="container py-2">
      <?php if (isset($_SESSION["login"])) : ?>
        <div class="navbar-nav">
          <a class="nav-link" style="color: white;" href="#home">Home</a>
          <a class="nav-link" href="./pages/ListCar-Ikrar.php">MyCar</a>
        </div>
        <div class="d-flex">
          <a href="./pages/Add-Ikrar.php" class="btn btn-light text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" role="button">Add Car</a>
          <div class="dropdown ms-4">
            <button class="btn btn-light dropdown-toggle text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $data_login["nama"]; ?>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="./pages/Profile-Ikrar.php">Profile</a></li>
              <li><a class="dropdown-item text-<?= isset($_COOKIE["warna_navbar"])  ? $_COOKIE["warna_navbar"] : "primary"; ?>" href="./config/logout.php">Log Out</a></li>
            </ul>
          </div>
        </div>
      <?php else : ?>
        <div class="navbar-nav w-100 d-flex justify-content-between">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="./pages/Login-Ikrar.php">Login</a>
        </div>
      <?php endif; ?>
    </div>
  </nav>

  <?php if (isset($_SESSION["login"])) : ?>
    <section id="home">
      <div class="container">
        <div class="d-flex gap-5 bungkus justify-content-center align-items-center">
          <div>
            <h1>Selamat Datang<br /> Di Show Room Ikrar</h1>
            <p class="mt-3">Berbekal pengalaman panjang yang didukung dengan sumber daya dan pabrik berstandar internasional, kami menghadirkan produk terbaik mulai dari kendaraan, mesin, komponen kendaraan, dan alat produksi.</p>
            <a href="<?php cekdb($result) ?>" class="button btn-primary">MyCar</a>
            <div class="d-flex align-items-center gap-5 mt-5">
              <img src="<?php echo "asset/images/logo-ead.png" ?>" alt="logoead" style="width:100px;">
              <p style="margin-top: 20px; font-size:14px;">Ikrar_1202200084</p>
            </div>
          </div>
          <img src="<?php echo "asset/images/car1.jpg" ?>" alt="car">
        </div>
      </div>
    </section>

  <?php else : ?>
    <section id="home">
      <div class="container">
        <div class="d-flex gap-5 bungkus justify-content-center align-items-center">
          <div>
            <h1>Selamat Datang<br /> Di Show Room Ikrar</h1>
            <p class="mt-3">Berbekal pengalaman panjang yang didukung dengan sumber daya dan pabrik berstandar internasional, kami menghadirkan produk terbaik mulai dari kendaraan, mesin, komponen kendaraan, dan alat produksi.</p>
            <div class="d-flex align-items-center gap-5 mt-5">
              <img src="<?php echo "asset/images/logo-ead.png" ?>" alt="logoead" style="width:100px;">
              <p style="margin-top: 20px; font-size:14px;">Ikrar_1202200084</p>
            </div>
          </div>
          <img src="<?php echo "asset/images/car1.jpg" ?>" alt="car">
        </div>
      </div>
    </section>

  <?php endif; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>