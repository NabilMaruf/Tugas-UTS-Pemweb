<?php
//mengecek apakah sudah ada session pada saat mau masuk ke halaman ketua
session_start();

// Jika sudah login, arahkan ke halaman sesuai role
// if (isset($_SESSION['role'])) {
//     if ($_SESSION['role'] === 'ketua') {
//         header("Location: ketua.php");
//         exit;
//     } elseif ($_SESSION['role'] === 'sekretaris') {
//         header("Location: sekretaris.php");
//         exit;
//     } elseif ($_SESSION['role'] === 'staf') {
//         header("Location: staf.php");
//         exit;
//     }
// }
// Jika sudah login, arahkan ke halaman sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'ketua') {
        header("Location: ketua.php");
        exit;
    } elseif ($_SESSION['role'] === 'sekretaris') {
        header("Location: sekretaris.php");
        exit;
    } elseif ($_SESSION['role'] === 'staf') {
        header("Location: staf.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="stylee.css">

    <!-- Link Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">



    <title>LOGIN</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #292667;">
        <div class="container-fluid">
            <a href="index.php"><img src="image/Logo.png" alt="Logo" width="50" height="50" class="me-2 d-inline-block align-text-top"></a>
            <a class="navbar-brand" href="index.php">INFORSA</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Login -->
    <section class="log">
        <div class="container">
            <div class="row logs mt-5 justify-content-center">
                <div class="columnlogin mt-5 col-md-6" style="background-color: #ffffff; opacity: 90%; border-radius: 10px; padding: 20px;">
                    <form action="proses_login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                            <div class="form-text">Masukkan NIM anda.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="form-text">Masukkan Password anda.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Login -->


</body>




</html>