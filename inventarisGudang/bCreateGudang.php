<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventarisgudang";

//ini koneksi
$connection = new mysqli($servername, $username, $password, $database);

// Deklarasi Variabel barang
$No_Gudang = "";
$Id_Admin = "";
$No_Barang = "";
$Tanggal_Masuk_Barang = "";
$Tanggal_Keluar_Barang = "";

// Deklarasi variabel pesan
$errorMessage = "";
$successMessage = "";

// Kondisi apabila menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $No_Gudang = $_POST["No_Gudang"];
    $Id_Admin = $_POST["Id_Admin"];
    $No_Barang = $_POST["No_Barang"];
    $Tanggal_Masuk_Barang = $_POST["Tanggal_Masuk_Barang"];
    $Tanggal_Keluar_Barang = $_POST["Tanggal_Keluar_Barang"];

    // Memeriksa kolom isi
    do {
        if (empty($No_Gudang) || empty($Id_Admin) || empty($No_Barang) || empty($Tanggal_Masuk_Barang) || empty($Tanggal_Keluar_Barang)){
            $errorMessage = "Semua bagian harus terisi";
            break;
        }

        // Querry menambahkan elemen
        $sql = "INSERT INTO gudang (No_Gudang, Id_Admin, No_Barang, Tanggal_Masuk_Barang, Tanggal_Keluar_Barang) 
            VALUES ('$No_Gudang', '$Id_Admin', '$No_Barang', '$Tanggal_Masuk_Barang', '$Tanggal_Keluar_Barang')";
        $result = $connection->query($sql);

        // Memeriksa querry
        if (!$result) {
            $errorMessage = "Kesalahan query: " . $connection->error;
            break;
        }

        // Mereset nilai elemen
        $No_Gudang = "";
        $Id_Admin = "";
        $No_Barang = "";
        $Tanggal_Masuk_Barang = "";
        $Tanggal_Keluar_Barang = "";

        // Pesan berhasil dan kembali
        $successMessage = "Data barang masuk gudang berhasil ditambah";
        header("location: /inventarisGudang/baGudang.php");
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
        <h1>Data Barang keluar-masuk</h1>
    </nav>

    <div class="container my-5">
        <?php // menampilkan pesan error
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
                <label class="col-sm-3 col-form-label">No_Gudang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="No_Gudang" value="<?php echo $No_Gudang; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id_Admin</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Id_Admin" value="<?php echo $Id_Admin; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">No_Barang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="No_Barang" value="<?php echo $No_Barang; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal_Masuk_Barang</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Tanggal_Masuk_Barang" value="<?php echo $Tanggal_Masuk_Barang; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal_Keluar_Barang</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Tanggal_Keluar_Barang" value="<?php echo $Tanggal_Keluar_Barang; ?>">
                </div>
            </div>

            <?php // menampilkan pesan berhasil
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
                    <a class="btn btn-outline-primary" href="/inventarisGudang/baGudang.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    <div>
</body>
</html>