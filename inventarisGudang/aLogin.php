<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.CSS">
</head>
<body>
    <nav style="display: flex; justify-content: center;">
        <h1>Inventaris Gudang</h1>
    </nav>
    <div style="background-image: url(Background.jpg); height:90vh; display:flex; justify-content: center; align-items: center;">
        <div>
            <div style="border-radius: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%;">
                <div style="padding: 40px; display:flex; justify-content: center; align-items: center; gap: 5vh;">
                    <div>
                        <label for="username">ID:</label> <br> <br>
                        <label for="password">Password:</label>
                    </div>
                    <div>
                        <input type="text" id="username" name="username" required> <br> <br>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
            </div> <br>
            <div style="display:flex; justify-content: center; align-items: center;">
                <a class="btn btn-primary" type="submit" value="Login" onclick="validateLogin()">Login</a>
            </div>
        </div>
    </div>

    <script>
        function validateLogin() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username === "admin" && password === "admin") {
                window.location.href = "baGudang.php";
                alert("Login Berhasil");
                return false;
            } else {
                alert("ID atau Password salah!");
                return false;
            }
        }
    </script>
</body>
</html>