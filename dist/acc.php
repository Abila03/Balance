<!DOCTYPE html>
<html lang="en">
    <?php include 'view/head.php'; ?>
    <body>
        <?php include 'view/header.php'; ?>
        <?php include 'view/navbar.php'; ?>
        <div class="banner">
            <a onclick="showPopup()">
                <img  src="assets/img/pensil.png" alt="..." class="pensil"/>
            </a>
            <div class="acc-edit text-white" id="popup">
                <div class="profil-container">
                    <h2>Edit Profil</h2>
                    <br>
                    <img src="assets/img/intro.jpg" alt="..." class="profil" />
                    <br>
                    <!--<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>-->
                    <a onclick="changeProfile()">
                        <img  src="assets/img/changeProfile.png" alt="..." class="kamera"/>
                    </a>
                </div>
                <br>
                <input class="text-center" type="text" id="nama" placeholder="Masukkan nama" style="border: none; background-color: transparent;">
                <br>
                <input class="text-center" type="text" id="email" placeholder="Masukkan email" style="border: none; background-color: transparent;">
                <br>
                <div class="mx-auto" style="margin-top: 1rem;">
                    <a onclick="closePopup()" class=" btn-save text-black" id="btn-save"href="#!">
                        Simpan
                    </a>
                </div>
            </div>
            <img src="assets/img/intro.jpg" alt="..." style="display: block; margin: 0 auto;" class="profil"/>
            <div id="acc"></div>
        </div>
        <div class="banner-acc">
            <a onclick="showDeleteForm()">
                <img  src="assets/img/pensil.png" alt="..." class="pensil"/>
            </a>
            <form class="acc-edit text-white" id="form">
                <div class="profil-container" action="accD.php" method="post">
                    <h2>Hapus Artikel</h2>
                    
                </div>
                <br>
                <input class="text-center text-white" type="text"  id="judul" placeholder="Masukkan judul" style="border: none; background-color: transparent;">
                <br>
                <div class="mx-auto" style="margin-top: 1rem;">
                    <button type="submit" name="judul" class=" btn-save text-black" id="judul">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
        <div id="artikel-acc"></div>
        <?php include 'view/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            function showPopup() {
                document.getElementById('popup').style.display = 'block';
            }

            function closePopup() {
                // Ambil nilai input text
                var nama = $("#nama").val();
                var email = $("#email").val();
            
                // Kirim data ke API updateProfile.php
                $.ajax({
                url: "http://localhost/balance/dist/accU.php",
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
                closePopup();
            });
            document.getElementById('popup').style.display = 'none';
            function changeProfile() {
                const inputFile = document.createElement('input');
                inputFile.type = 'file';
                inputFile.accept = 'image/*';
                inputFile.addEventListener('change', (event) => {
                    const file = event.target.files[0];

                    const formData = new FormData();
                    formData.append('image', file);

                    fetch('image-acc.php', {
                    method: 'POST',
                    body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                    if (data.success) {
                        // Gambar diunggah dengan sukses
                        console.log('Gambar diunggah dengan sukses');
                        document.querySelector('.profil').src = data.imageUrl; // Perbarui gambar profil dengan URL yang diunggah
                    } else {
                        // Pengunggahan gagal
                        console.error(data.error);
                        alert('Gagal mengunggah gambar');
                    }
                    });
                });
                inputFile.click();
            }
            function showDeleteForm() {
                // Tampilkan form untuk memasukkan judul artikel
                document.getElementById('form').style.display = 'block';
            }

                function deleteArticle() {
                    var judul = $("#judul").val();

                    // Kirim data ke API deleteArticle.php
                    $.ajax({
                        url: "http://localhost/balance/dist/accD.php",
                        method: "DELETE",
                        data: {
                        judul: judul
                        },
                        success: function(response) {
                        alert(response.message); // Tampilkan pesan sukses
                        $("#artikel-acc").html(""); // Kosongkan form
                        },
                        error: function(error) {
                        console.error("Error:", error);
                        alert("Error: Artikel gagal dihapus.");
                        }
                    });
                }

        </script>
    </body>
</html>
