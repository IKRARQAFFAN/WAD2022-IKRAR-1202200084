<?php
require "../config/connector.php";
session_start();

$warna = [
    "danger" => "Red",
    "warning" => "Yellow",
    "success" => "Green",
    "primary" => "Blue",
];

if (isset(["login"])) {
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