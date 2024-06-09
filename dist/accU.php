<?php

include "config.php"; // Asumsikan file config.php berisi detail koneksi database

// Periksa apakah request method adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  echo "Error: Hanya request method PUT yang diizinkan.";
  exit;
}

// Dapatkan data yang dikirimkan dari form
$nama = $_POST["nama"];
$email = $_POST["email"];

// Validasi data (opsional)
// ... Tambahkan kode untuk memvalidasi data nama dan email

// Query SQL untuk memperbarui data profil
$sql = "UPDATE users SET nama = '$nama', email = '$email' WHERE id_pengguna=1"; // Ganti (kondisi_WHERE) dengan kondisi untuk mengidentifikasi user
$result = mysqli_query($conn, $sql);

// Periksa eksekusi query
if (!$result) {
  echo "Error: Query gagal dijalankan.";
  exit;
}

// Kirim response sukses
echo json_encode(array("message" => "Profil berhasil diperbarui."));

// Tutup koneksi database
mysqli_close($conn);

?>
