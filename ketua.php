<?php
session_start();
include 'data_user.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'ketua') {
    header("Location: login.php");
    exit;
}

$all_users = load_users();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman Ketua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body::before {
            display: none !important;
            /* menghilangkan efek hover stylee.css */
        }

        .card-custom {
            border-radius: 20px;
            background: #ffffffdd;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #292667;
            color: white;
        }

        .table img {
            border-radius: 10px;
            border: 2px solid #292667;
        }

        .btn-tambah {
            background-color: #292667;
            color: white;
            transition: 0.3s ease;
        }

        .btn-tambah:hover {
            background-color: #1e1b4b;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #292667; z-index: 2;">
        <div class="container-fluid">
            <a href="index.php"><img src="image/Logo.png" width="50" height="50" class="me-2"></a>
            <a class="navbar-brand" href="index.php">INFORSA</a>
            <div class="ms-auto">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <section class="content-section1 pt-5 mt-5">
        <div class="container">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><i class="bi bi-people-fill me-2"></i>Data Seluruh Staf</h3>
                    <a href="form_input.php" class="btn btn-tambah"><i class="bi bi-plus-circle me-1"></i>Tambah Staf</a>
                </div>
                <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> (Ketua)</p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>Periode</th>
                                <th>Keterangan</th>
                                <th>Username</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_users as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars($user['nama']) ?></td>
                                    <td><?= htmlspecialchars($user['divisi']) ?></td>
                                    <td><?= htmlspecialchars($user['jabatan']) ?></td>
                                    <td><?= htmlspecialchars($user['status']) ?></td>
                                    <td><?= htmlspecialchars($user['periode']) ?></td>
                                    <td><?= htmlspecialchars($user['keterangan']) ?></td>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td>
                                        <?php if (!empty($user['foto'])): ?>
                                            <img src="uploads/<?= htmlspecialchars($user['foto']) ?>" width="60">
                                        <?php else: ?>
                                            Tidak ada
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>