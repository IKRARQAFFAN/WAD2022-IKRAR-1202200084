<?php
require './connector.php';

$id = $_GET['id'];

$sql = "DELETE FROM showroom_Ikrar_table WHERE id_mobil = $id";

if (mysqli_query($connector, $sql)) {
  header("location: ../pages/ListCar-Ikrar.php?pesan=hapus");
} else {
  header("location: ../pages/ListCar-Ikrar.php?pesan=gagal");
}