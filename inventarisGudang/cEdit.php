<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventarisgudang";

//ini koneksi
$connection = new mysqli($servername, $username, $password, $database);

$No_Barang = "";
$Nama = "";
$Jenis = "";
$Jumlah = "";
$Harga = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client
    if (!isset($_GET["No_Barang"])) {
        header("location: /inventarisGudang/index.php");
        exit;
    }

    $No_Barang = $_GET["No_Barang"];
    // read the row of the selected client from database table
    $sql = "SELECT * FROM barang WHERE No_Barang=$No_Barang";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /inventarisGudang/index.php");
        exit;
    }
    
    $Nama = $row["Nama"];
    $Jenis = $row["Jenis"];
    $Jumlah = $row["Jumlah"];
    $Harga = $row["Harga"];
}
else {
    var_dump($_POST);
    // POST method: Update the data of the client

    $No_Barang = $_POST["No_Barang"];
    $Nama = $_POST["Nama"];
    $Jenis = $_POST["Jenis"];
    $Jumlah = $_POST["Jumlah"];
    $Harga = $_POST["Harga"];

    do {
        if (empty($No_Barang) || empty($Nama) || empty($Jenis) || empty($Jumlah) || empty($Harga)){
            $errorMessage = "Semua bagian harus terisi";
            break;
        }
    
        $sql = "UPDATE barang
            SET Nama = '$Nama', Jenis = '$Jenis', Jumlah = '$Jumlah', Harga = '$Harga'
            WHERE No_Barang = $No_Barang";

        $result = $connection->query($sql);
    
        if (!$result) {
            $errorMessage = "Kesalahan query: " . $connection->error;
            break;
        }

        $successMessage = "Barang berhasil diupdate dengan benar";

        header("location: /inventarisGudang/caBarang.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gudang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="index.CSS">
</head>
<body style="background-image: url(Background.jpg);">
    <nav style="display: flex; justify-content: center;">
        <h1>Edit Barang</h1>
    </nav>
    <div class="container my-5">
        <?php // pesan error
        if (!empty($errorMessage)) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            "; 
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">No_Barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="No_Barang" value="<?php echo $No_Barang; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Nama" value="<?php echo $Nama; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jenis</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Jenis" value="<?php echo $Jenis; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jumlah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Jumlah" value="<?php echo $Jumlah; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Harga" value="<?php echo $Harga; ?>">
                </div>
            </div>

            <?php // pesan berhasil
            if (!empty($successMessage)) {
                echo "<div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>"; 
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/inventarisGudang/caBarang.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    <div>
</body>
</html>