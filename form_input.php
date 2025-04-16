<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staf_baru = [
        "nama" => $_POST["nama"],
        "divisi" => $_POST["divisi"],
        "periode" => $_POST["periode"],
        "jabatan" => $_POST["jabatan"],
        "status" => $_POST["status"],
        "keterangan" => $_POST["keterangan"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "role" => "staf"
    ];

    if (isset($_FILES["foto"])) {
        $foto = $_FILES["foto"];
        if ($foto["error"] === 0 && $foto["size"] < 2000000) {
            $ext = pathinfo($foto["name"], PATHINFO_EXTENSION);
            $new_name = $_POST["username"] . "." . $ext;
            $dest = "uploads/" . $new_name;
            move_uploaded_file($foto["tmp_name"], $dest);
            $staf_baru["foto"] = $new_name;
        }
    }

    $json_file = 'data_user.json';
    $all_users = file_exists($json_file) ? json_decode(file_get_contents($json_file), true) : [];
    $all_users[] = $staf_baru;
    file_put_contents($json_file, json_encode($all_users, JSON_PRETTY_PRINT));

    header("Location: ketua.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Staf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html,
        body {
            height: 100%;
            overflow-y: auto;
        }

        body::before {
            display: none !important;
        }

        .form-container {
            background-color: #ffffffdd;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .form-title {
            color: #292667;
            font-weight: 600;
        }

        .btn-primary-custom {
            background-color: #292667;
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: #1e1b4b;
        }

        .btn-secondary-custom {
            background-color: #adb5bd;
            color: white;
        }

        .form-label {
            font-weight: 500;
        }
    </style>

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="background-color: #292667;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="image/Logo.png" alt="Logo" width="45" height="45" class="me-2">
                <span class="fs-5 fw-bold">INFORSA</span>
            </a>
        </div>
    </nav>

    <!-- FORM SECTION -->
    <section class="content-section1 mt-5">
        <div class="container pb-5">
            <div class="form-container mx-auto" style="max-width: 720px;">
                <h3 class="form-title mb-4"><i class="bi bi-person-plus-fill me-2"></i>Form Tambah Data Staf</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Divisi</label>
                            <input type="text" name="divisi" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Periode</label>
                            <input type="text" name="periode" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan" class="form-select">
                                <option value="Anggota">Anggota</option>
                                <option value="Koordinator">Koordinator</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Aktif" checked>
                                <label class="form-check-label">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Tidak Aktif">
                                <label class="form-check-label">Tidak Aktif</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="ketua.php" class="btn btn-secondary-custom px-4">Kembali</a>
                        <button type="submit" class="btn btn-primary-custom px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>