<?php

// Include database configuration (assuming 'config.php' is in the same directory)
require_once 'config.php';
require_once 'sqlreset.php';

// Check if request is POST and has 'submit' key
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

  // Initialize response array
  $response = [];

  try {

    // Validate data using prepared statements
    $judul = '';
    $isi = '';

    $sql = "INSERT INTO artikel (judul, isi) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      throw new Exception('Failed to prepare statement: ' . $conn->error);
    }

    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $stmt->bind_param('ss', $judul, $isi);

    if (!$stmt->execute()) {
      throw new Exception('Failed to execute statement: ' . $conn->error);
    }

    // Get ID of inserted article
    $idArtikel = $conn->insert_id;

    // Set response data
    $response = [
      'success' => true,
      'message' => 'Artikel berhasil disimpan',
    ];
    header('Location: create.php');

    // Close statement and connection
    $stmt->close();
    $conn->close();

  } catch (Exception $e) {
    // Handle exceptions gracefully
    $response = [
      'success' => false,
      'error' => $e->getMessage()
    ];
  }

  // Encode and return JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
  exit;
} else {
  // Allow only POST requests with 'submit' key
  header('Allow: POST');
  header('Content-Type: application/json');
  echo json_encode(['success' => false, 'error' => 'Invalid request method or data']);
  exit;
}
