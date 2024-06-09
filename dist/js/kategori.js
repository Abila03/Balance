$(document).ready(function() {
  // Lakukan HTTP request ke API
  $.ajax({
  url: "http://localhost/balance/dist/kategoriC", // Ganti dengan URL API Anda
  method: "GET", // Sesuaikan dengan metode API Anda
  success: function(response) {
      // Proses data JSON yang dikembalikan
      if (response.status === "success") {
      var artikelList = response.data;
      
      // Buat elemen HTML untuk menampilkan data artikel
      for (var i = 0; i < artikelList.length; i++) {
          var artikel = artikelList[i];
          var html = 
                "<div class='col mb-5'>" +
                    "<div class='card h-100' style='background-color: #404040;'>" +
                        "<div class='card-body p-3'>" +
                          "<div class='text-white'>" +
                              "<h5 class='fw-bolder text-center'>" + artikel.nama_kategori + "</h5>" +
                              "<p>" + artikel.deskripsi + "</p>" +
                          "</div>" +
                        "</div>" +
                      "</div>" +
                  "</div>";
          // Tambahkan elemen HTML ke container
          $("#artikel-container").append(html);
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