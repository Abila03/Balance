$(document).ready(function() {
    // Menambahkan event click pada elemen artikel
    $(".artikel").click(function() {
      var judul = $(this).data("judul"); // Dapatkan ID artikel dari data-id
      var url = "detailR.php?id_artikel=" + judul; // Buat URL dengan ID artikel
  
      // Lakukan request ke API detail artikel
      $.ajax({
        url: url,
        method: "GET",
        success: function(response) {
          var artikel = response;
          // Tampilkan detail artikel
          $("#judulD").text(artikel.judul);
          $("#isiD").html(artikel.isi);
          // ... Tampilkan data artikel lainnya
        },
        error: function(error) {
          console.error("Error:", error);
        }
      });
    });
  });
  