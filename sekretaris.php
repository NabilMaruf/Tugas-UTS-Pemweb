<?php
session_start();
include 'data_user.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'sekretaris') {
    header("Location: login.php");
    exit;
}

$all_users = load_users();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman Sekretaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body::before {
            display: none !important;
            /* menghilangkan efek hover stylee.css */
        }

        html,
        body {
            height: 100%;
            overflow-y: auto;
        }

        .card-user {
            background-color: #ffffffcc;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card-user:hover {
            transform: scale(1.02);
        }

        .card-user img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .user-info {
            padding: 20px;
        }

        .user-info h5 {
            color: #292667;
            margin-bottom: 10px;
        }

        .user-info p {
            margin: 0;
            font-size: 14px;
        }

        .user-info i {
            color: #292667;
            margin-right: 8px;
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

    <section class="content-section pt-5 mt-5">
        <div class="container">
            <div class="card p-4 bg-white bg-opacity-75">
                <h2 class="text-center mb-4">Data Staf Organisasi</h2>
                <p class="text-center">Selamat datang, <strong><?= $_SESSION['username'] ?></strong> (Sekretaris)</p>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($all_users as $user): ?>
                        <div class="col">
                            <div class="card-user">
                                <?php if (!empty($user['foto'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($user['foto']) ?>" alt="Foto <?= $user['nama'] ?>">
                                <?php else: ?>
                                    <img src="uploads/default.png" alt="Default Foto">
                                <?php endif; ?>
                                <div class="user-info">
                                    <h5><?= htmlspecialchars($user['nama']) ?></h5>
                                    <p><i class="bi bi-diagram-3-fill"></i><strong>Divisi:</strong> <?= htmlspecialchars($user['divisi']) ?></p>
                                    <p><i class="bi bi-person-badge-fill"></i><strong>Jabatan:</strong> <?= htmlspecialchars($user['jabatan']) ?></p>
                                    <p><i class="bi bi-check-circle-fill"></i><strong>Status:</strong> <?= htmlspecialchars($user['status']) ?></p>
                                    <p><i class="bi bi-calendar-event-fill"></i><strong>Periode:</strong> <?= htmlspecialchars($user['periode']) ?></p>
                                    <p><i class="bi bi-info-circle-fill"></i><strong>Keterangan:</strong> <?= htmlspecialchars($user['keterangan']) ?></p>
                                    <p><i class="bi bi-person-fill"></i><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>