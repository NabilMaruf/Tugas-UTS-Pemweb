<?php
session_start();
include 'data_user.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'staf') {
    header("Location: login.php");
    exit;
}

$all_users = load_users();
$data = null;
foreach ($all_users as $user) {
    if ($user['username'] === $_SESSION['username']) {
        $data = $user;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Halaman Staf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylee.css">

    <style>
        body::before {
            display: none !important;
            /* menghilangkan efek hover stylee.css */
        }

        .profile-card {
            border-radius: 20px;
            background: #ffffffdd;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-left {
            background-color: #292667;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-bottom: 10px;
        }

        .profile-right {
            padding: 30px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-item i {
            color: #292667;
            margin-right: 10px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .info-value {
            color: #222;
        }

        /* Tambahan efek hover biar match sama stylee.css */
        .profile-card:hover {
            box-shadow: 0 0 20px 5px rgba(255, 255, 255, 0.5);
            transition: 0.3s ease;
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
        <div class="container shadow-sm">
            <div class="card profile-card shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4 profile-left d-flex flex-column align-items-center justify-content-center">
                        <?php if (!empty($data['foto'])): ?>
                            <img src="uploads/<?= htmlspecialchars($data['foto']) ?>" alt="Foto Profil" class="profile-pic">
                        <?php else: ?>
                            <div class="text-light mb-2">Foto tidak tersedia</div>
                        <?php endif; ?>
                        <h4 class="mt-2"><?= htmlspecialchars($data['nama']) ?></h4>
                        <p class="mb-0"><i class="bi bi-person-badge-fill"></i> <?= htmlspecialchars($data['jabatan']) ?></p>
                    </div>
                    <div class="col-md-8 profile-right">
                        <h3 class="mb-4">Profil Staf</h3>
                        <div class="info-item"><i class="bi bi-diagram-3-fill"></i> <span class="info-label">Divisi:</span> <span class="info-value"><?= htmlspecialchars($data['divisi']) ?></span></div>
                        <div class="info-item"><i class="bi bi-calendar-event-fill"></i> <span class="info-label">Periode:</span> <span class="info-value"><?= htmlspecialchars($data['periode']) ?></span></div>
                        <div class="info-item"><i class="bi bi-check-circle-fill"></i> <span class="info-label">Status:</span> <span class="info-value"><?= htmlspecialchars($data['status']) ?></span></div>
                        <div class="info-item"><i class="bi bi-info-circle-fill"></i> <span class="info-label">Keterangan:</span> <span class="info-value"><?= htmlspecialchars($data['keterangan']) ?></span></div>
                        <div class="info-item"><i class="bi bi-person-circle"></i> <span class="info-label">Username:</span> <span class="info-value"><?= htmlspecialchars($data['username']) ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>