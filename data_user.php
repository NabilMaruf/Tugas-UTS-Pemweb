<?php
// Fungsi untuk memuat data dari file JSON
function load_users() {
    $file = 'data_user.json';
    if (file_exists($file)) {
        $data = file_get_contents($file);
        return json_decode($data, true);
    }
    return [];
}

// Fungsi untuk menyimpan data ke file JSON
function save_users($users) {
    $file = 'data_user.json';
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}
?>
