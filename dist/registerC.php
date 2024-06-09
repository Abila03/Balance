<?php

// Koneksi database
include 'config.php';

// Endpoint untuk registrasi
$endpoint = 'https://66643635932baf9032aa5c83.mockapi.io/pengguna';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Validasi data
  if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['password'])) {
    $response = ['success' => false, 'error' => 'Semua kolom harus diisi'];
    echo json_encode($response);
    exit;
  }

  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Cek email sudah terdaftar
  $sql = "SELECT * FROM pengguna WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $response = ['success' => false, 'error' => 'Email sudah terdaftar'];
    echo json_encode($response);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit;
  }

  // Cek apakah data kosong (opsional)
  $sql = "SELECT COUNT(*) AS total FROM pengguna";
  $stmt = mysqli_prepare($conn, $sql);
  if (!$stmt) { // Periksa persiapan query
    $response = ['success' => false, 'error' => 'Gagal menyiapkan query'];
    echo json_encode($response);
    exit;
  }
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $data = mysqli_fetch_assoc($result);
  $totalData = $data['total'];
  mysqli_stmt_close($stmt);

  // Atur AUTO_INCREMENT jika data kosong
  if ($totalData === 0) {
    $sql_reset_auto_increment = "ALTER TABLE pengguna AUTO_INCREMENT = 1;";
    $stmt = mysqli_prepare($conn, $sql_reset_auto_increment);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  // Query registrasi
  $sql = "INSERT INTO pengguna (nama, email, password) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $password);
  mysqli_stmt_execute($stmt);

  if (mysqli_affected_rows($conn) > 0) {
    $response = ['success' => true, 'message' => 'Registrasi berhasil'];
    header('Location: login.php');
    echo json_encode($response);
    exit;
  } else {
    $response = ['success' => false, 'error' => 'Gagal registrasi'];
    echo json_encode($response);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
