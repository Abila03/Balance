<?php

include "config.php"; // Asumsikan file config.php berisi detail koneksi database

// Definisikan endpoint API
$endpoint = "https://66643779932baf9032aa6002.mockapi.io/kategori"; // Ganti localhost dengan alamat server Anda

// Definisikan metode HTTP yang digunakan
$method = "GET"; // Anda dapat mengubah metode sesuai kebutuhan

// Struktur request kosong karena API ini hanya mengambil data
$request = array();

// Definisikan struktur response yang diharapkan
$response = array(
  "status" => "success",
  "data" => array()
);
// Query SQL untuk mengambil data artikel
$sql = "SELECT * FROM kategori";
$result = mysqli_query($conn, $sql);

// Periksa eksekusi query
if (!$result) {
  $response["status"] = "error";
  $response["message"] = "Query failed: " . mysqli_error($conn);
  echo json_encode($response);
  exit;
}

// Proses data artikel dan tambahkan ke response
while ($row = mysqli_fetch_assoc($result)) {
  $artikel = array(
    "id_kategori" => $row["id_kategori"],
    "nama_kategori" => $row["nama_kategori"],
    "deskripsi" => $row["deskripsi"],
  );
  array_push($response["data"], $artikel);
}

// Tutup koneksi database
mysqli_close($conn);

// Set header dan kembalikan response sebagai JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
