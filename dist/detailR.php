<?php

include "config.php"; // Asumsikan file config.php berisi detail koneksi database

// Dapatkan ID artikel dari URL
if (isset($_GET["button"])) {
    $judul = $_GET["judul"];
} else {
    echo "Error: judul tidak ditemukan";
    exit;
}

// Query SQL untuk mengambil data artikel
$sql = "SELECT * FROM artikel WHERE judul = $judul";
$result = mysqli_query($conn, $sql);

// Periksa eksekusi query
if (!$result) {
  echo "Error: Query failed";
  exit;
}

// Ambil data artikel
$row = mysqli_fetch_assoc($result);
$artikel = array(
  "judul" => $row["judul"],
  "isi" => $row["isi"],
  // ... Tambahkan data artikel lainnya
);

// Tutup koneksi database
mysqli_close($conn);

// Kembalikan data artikel sebagai JSON
header('Content-Type: application/json');
echo json_encode($artikel);

?>
