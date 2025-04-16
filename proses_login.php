<?php
session_start();
include 'data_user.php'; // Memuat fungsi load_users

$all_users = load_users(); // Ambil data pengguna dari JSON

// Periksa apakah form login sudah di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah username dan password cocok
    foreach ($all_users as $user) {
        if ($_POST['username'] === $user['username'] && $_POST['password'] === $user['password']) {
            // Jika cocok, simpan data ke session
            $_SESSION['Login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['nama'] = $user['nama'];

            // Arahkan ke halaman sesuai dengan role
            if ($user['role'] === 'ketua') {
                header("Location: ketua.php");
            } elseif ($user['role'] === 'sekretaris') {
                header("Location: sekretaris.php");
            } elseif ($user['role'] === 'staf') {
                header("Location: staf.php");
            }
            exit;
        }
    }

    // Jika login gagal
    echo "Login gagal. <a href='login.php'>Coba lagi</a>";
}
