<?php

// Informasi koneksi database
$host = "localhost";
$user = "root";
$pass = "123456";
$db = "paa";

// Buat koneksi database
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>