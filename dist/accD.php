<?php

include "config.php"; // Asumsikan file config.php berisi detail koneksi database

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['judul'])) {
  
  // Dapatkan judul artikel dari form
  $judul = $_GET["judul"];

  // Query SQL untuk menghapus artikel
  $sql = "DELETE FROM artikel WHERE judul = '$judul'";
  $result = mysqli_query($conn, $sql);

  // Periksa eksekusi query
  if (!$result) {
    echo "Error: Query gagal dijalankan.";
    exit;
  }

  // Tampilkan pesan sukses dan tombol kembali
  echo "Artikel berhasil dihapus. <a href='index.php'>Kembali</a>";
}

?>
