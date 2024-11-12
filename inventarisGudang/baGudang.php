<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.CSS">
</head>
<body style="background-image: url(Background.jpg);">
    <nav>
        <h1 style="position: absolute; left : 1%;">Sistem Manajemen Barang keluar-masuk</h1>
        <div style="display: flex;">
            <a style="text-decoration: none;" href="/inventarisgudang/aProfile.php"><div class="button">Profile</div></a>
            <a style="text-decoration: none;" href="/inventarisgudang/aLogin.php"><div class="button">Logout</div></a>
        </div>
    </nav>
    <div class = "container my-5" >
        <a class="btn btn-primary" href="/inventarisgudang/caBarang.php" role="button">Detail_Barang</a>
        <a class="btn btn-primary" href="/inventarisgudang/bCreateBarang.php" role="button">Tambah Barang</a>
        <a class="btn btn-primary" href="/inventarisgudang/bCreateGudang.php" role="button">Tambah Data Gudang</a>
        <br>
        <br>
        <table class="table table-bordered" style="font-size: 20px;">
           <thead>
                <tr>
                    <th>No_Gudang</th>
                    <th>Id_Admin</th>
                    <th>No_Barang</th>
                    <th>Tanggal_Masuk_Barang</th>
                    <th>Tanggal_Keluar_Barang</th>
                    <th>Kelola</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "inventarisgudang";
            
                // Membuat koneksi dengan database
                $connection = new mysqli($servername, $username, $password, $database);

                // Mengecek koneksi apakah error/tidak
                if ($connection->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Membaca tabel dari database
                $sql = "SELECT * FROM gudang";
                $result = $connection->query($sql);

                // Mengecek tabel
                if (!$result) {
                    die("Kesalahan query: " . $connection->error);
                }
                
                // Loop membaca lalu menampilkan tabel dari database
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["No_Gudang"] . "</td>
                        <td>" . $row["Id_Admin"] . "</td>
                        <td>" . $row["No_Barang"] . "</td>
                        <td>" . $row["Tanggal_Masuk_Barang"] . "</td>
                        <td>" . $row["Tanggal_Keluar_Barang"] . "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/inventarisgudang/bEdit.php?No_Gudang=$row[No_Gudang]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/inventarisgudang/bDelete.php?No_Gudang=$row[No_Gudang]'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>    
            <tbody>
        <table>
    </div>
</body>
</html>