<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gudang</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.CSS">
</head>

<body style="background-image: url(Background.jpg);">
    <nav style="display: flex; justify-content: center;">
        <h1>List Barang</h1>
    </nav>
    <div class = "container my-5" >
        <a class="btn btn-primary" href="/inventarisgudang/baGudang.php" role="button">Kembali</a>
        <br>
        <br>
        <table class="table table-bordered" style="font-size: 20px;">
           <thead>
                <tr>
                    <th>No_Barang</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Action</th>
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
                $sql = "SELECT * FROM barang";
                $result = $connection->query($sql);

                // Mengecek tabel
                if (!$result) {
                    die("Kesalahan query: " . $connection->error);
                }
                
                // Loop membaca lalu menampilkan tabel dari database
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["No_Barang"] . "</td>
                        <td>" . $row["Nama"] . "</td>
                        <td>" . $row["Jenis"] . "</td>
                        <td>" . $row["Jumlah"] . "</td>
                        <td>" . $row["Harga"] . "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/inventarisGudang/cEdit.php?No_Barang=$row[No_Barang]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/inventarisGudang/Cdelete.php?No_Barang=$row[No_Barang]'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>    
            <tbody>
        <table>
    </div>
</body>
</html>