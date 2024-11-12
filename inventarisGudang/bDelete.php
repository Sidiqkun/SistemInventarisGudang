<?php
if (isset($_GET["No_Gudang"])) {
  $No_Gudang = $_GET["No_Gudang"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "inventarisgudang";

  // Membuat koneksi dengan database
  $connection = new mysqli($servername, $username, $password, $database);

  // Querry menghapus elemen yang ingin dihapus
  $sql = "DELETE FROM gudang WHERE No_Gudang=$No_Gudang";
  $connection->query($sql); 
}

header("Location: /inventarisGudang/baGudang.php");
exit;
?>