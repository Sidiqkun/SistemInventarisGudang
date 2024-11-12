<?php
if (isset($_GET["No_Barang"])) {
  $No_Barang = $_GET["No_Barang"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "inventarisgudang";

  // Membuat koneksi dengan database
  $connection = new mysqli($servername, $username, $password, $database);

  // Querry menghapus elemen yang ingin dihapus
  $sql = "DELETE FROM barang WHERE No_Barang=$No_Barang";
  $connection->query($sql); 
}

header("Location: /inventarisGudang/caBarang.php");
exit;
?>