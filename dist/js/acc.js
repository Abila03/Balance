$(document).ready(function() {
    // Lakukan HTTP request ke API
    $.ajax({
    url: "http://localhost/balance/dist/accC", // Ganti dengan URL API Anda
    method: "GET", // Sesuaikan dengan metode API Anda
    success: function(response) {
        // Proses data JSON yang dikembalikan
        if (response.status === "success") {
        var artikelList = response.data;
        
        // Buat elemen HTML untuk menampilkan data artikel
        for (var i = 0; i < artikelList.length; i++) {
            var pengguna = artikelList[i];
            var html = 
            "<br>"+
            "<strong class='section-heading text-white nama-profil'>"+ pengguna.nama+ "</strong>"+
            "<br>"+
            "<span class='text-white nama-profil'>"+ pengguna.email+ "</span>";
            // Tambahkan elemen HTML ke container
            $("#acc").append(html);
        }
        } else {
        console.error("Error:", response.message);
        }
    },
    error: function(error) {
        console.error("Error:", error);
    }
    });
  });