<?php
include 'config.php';

// Upload folder path (replace with your desired location)
$uploadDir = 'uploads/';

// Check if image uploaded
if (isset($_FILES['image'])) {
  $file = $_FILES['image'];
  $fileName = basename($file['name']);
  $fileType = $file['type'];
  $tmpName = $file['tmp_name'];
  $fileSize = $file['size'];

  // Validate image (optional)
  $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
  if (!in_array($fileType, $allowedTypes)) {
    die('Invalid file type');
  }

  // Move uploaded file to the upload folder
  $targetPath = $uploadDir . $fileName;
  if (!move_uploaded_file($tmpName, $targetPath)) {
    die('Failed to upload image');
  }

  // Update user profile image in database (replace with your table and column names)
  $sql = "UPDATE pengguna SET foto_profil = '$targetPath' WHERE id_pengguna = {id_pengguna}"; // Replace {user_id} with logic to get current user ID
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo json_encode(['success' => true, 'imageUrl' => $targetPath]);
  } else {
    echo json_encode(['error' => 'Failed to update profile picture']);
  }
}

mysqli_close($conn);
