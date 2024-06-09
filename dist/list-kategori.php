<?php
    include "config.php"; 
    $sql=mysqli_query($conn, "SELECT * FROM kategori") 
    or die (mysqli_error($conn));
    while ($data = mysqli_fetch_array($sql)){
        echo "<option value=$data [id_kategori]> $data[nama_kategori]</option>";
    }
?>