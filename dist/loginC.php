<?php

// Koneksi database
include 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM pengguna WHERE email = ? AND password = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $email, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    // Autentikasi berhasil
    $user = mysqli_fetch_assoc($result);
    $response = ['success' => true, 'pengguna' => $user];
    header('Location: index.php');
  } else {
    // Autentikasi gagal
    $response = ['success' => false, 'error' => 'Email atau password salah'];
  }

  echo json_encode($response);
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
