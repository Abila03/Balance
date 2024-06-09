function updateProfile() {
    var nama = $("#nama").val();
    var email = $("#email").val();
  
    // Kirim data ke API updateProfile.php
    $.ajax({
      url: "http://localhost/balance/dist/accu.php",
      method: "PUT", // Ubah method menjadi PUT
      data: {
        nama: nama,
        email: email
      },
      success: function(response) {
        alert(response.message); // Tampilkan pesan sukses
        // Kosongkan form (opsional)
        $("#nama").val("");
        $("#email").val("");
      },
      error: function(error) {
        console.error("Error:", error);
        alert("Error: Profil gagal diperbarui.");
      }
    });
  }
  
  $("#btn-save").click(function() {
    updateProfile();
  });
  