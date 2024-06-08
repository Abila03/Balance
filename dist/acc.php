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
                    <a onclick="closePopup()" class=" btn-save text-black" href="#!">
                        Simpan
                    </a>
                </div>
            </div>
            <img src="assets/img/intro.jpg" alt="..." style="display: block; margin: 0 auto;" class="profil"/>
            <br>
            <strong class="section-heading text-white nama-profil">NAMA PROFIL</strong>
            <br>
            <span class="text-white nama-profil">email</span>
        </div>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Blended to Perfection</span>
                                <span class="section-heading-lower">Coffees & Teas</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-01.jpg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">We take pride in our work, and it shows. Every time you order a beverage from us, we guarantee that it will be an experience worth having. Whether it's our world famous Venezuelan Cappuccino, a refreshing iced herbal tea, or something as simple as a cup of speciality sourced black coffee, you will be coming back for more.</p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex me-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">Delicious Treats, Good Eats</span>
                                <span class="section-heading-lower">Bakery & Kitchen</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-02.jpg" alt="..." />
                    <div class="product-item-description d-flex ms-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Our seasonal menu features delicious snacks, baked goods, and even full meals perfect for breakfast or lunchtime. We source our ingredients from local, oragnic farms whenever possible, alongside premium vendors for specialty goods.</p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper">From Around the World</span>
                                <span class="section-heading-lower">Bulk Speciality Blends</span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/products-03.jpg" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0">Travelling the world for the very best quality coffee is something take pride in. When you visit us, you'll always find new blends from around the world, mainly from regions in Central and South America. We sell our blends in smaller to large bulk quantities. Please visit us in person for more details.</p></div>
                    </div>
                </div>
            </div>
        </section>
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
                var nama = document.getElementById('nama').value;
                var email = document.getElementById('email').value;

                // kirim ke server
                console.log("Nama: " + nama);
                console.log("Email: " + email);
                document.getElementById('popup').style.display = 'none';
            }
            function changeProfile() {
                // Buka dialog untuk memilih gambar baru
                const inputFile = document.createElement('input');
                inputFile.type = 'file';
                inputFile.accept = 'image/*';
                inputFile.addEventListener('change', (event) => {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = (event) => {
                    const gambarBaru = event.target.result;
                    // Ubah gambar profil dengan gambar baru
                    document.querySelector('.profil').src = gambarBaru;
                    // Simpan gambar baru ke penyimpanan lokal
                    // ... Simpan gambar baru ke penyimpanan lokal ...
                };
                reader.readAsDataURL(file);
                });
                inputFile.click();
            }
        </script>
    </body>
</html>
