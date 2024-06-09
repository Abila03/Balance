<?php
// Cek apakah data kosong (opsional)
$sql = "SELECT COUNT(*) AS total FROM artikel";
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
  $sql_reset_auto_increment = "ALTER TABLE artikel AUTO_INCREMENT = 1;";
  $stmt = mysqli_prepare($conn, $sql_reset_auto_increment);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}
?>