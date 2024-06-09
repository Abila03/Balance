$(document).ready(function() {
    // Lakukan permintaan HTTP ke API
    $.ajax({
      url: "http://localhost/balance/dist/articleR", // Ganti dengan URL API Anda
      method: "GET",
      success: function(response) {
        if (response.status === "success") {
          var daftarArtikel = response.data;
          daftarArtikel.sort(function(a, b) {
            return a.id_artikel - b.id_artikel;
          });
  
          // Buat elemen HTML untuk menampilkan data artikel
          for (var i = 0; i < daftarArtikel.length; i++) {
            var artikel = daftarArtikel[i];
            var judul = artikel.judul;
            var isi = artikel.isi;
            var gambar = artikel.gambar;
  
            // Ganti struktur HTML sesuai kebutuhan
            var html = `
              <section class='page-section clearfix section-${i+1}'>  
                <div class='container'>
                  <div class='intro'>
                    
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/article 1.png" alt="..." />  
                    <div class="intro-text ${i%2 === 0 ? 'text-left' : 'text-right'} bg-faded p-5 rounded ">
                      <h2 class="section-heading mb-2">
                        <span class="section-heading-upper">
                          ${judul}
                        </span>
                      </h2>
                      <p class="mb-1">
                        ${isi}
                      </p>
                      <div class="intro-button mx-auto">
                        <a class="btn btn-primary text-white btn-xl" href="detail-article" name"button">
                          Baca Selengkapnya
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            `;
  
            $("#artikel-acc").append(html);
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
  