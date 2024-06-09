<!DOCTYPE html>
<html lang="en">
    <?php include 'view/head.php'; ?>
    <body>
        <?php include 'view/header.php'; ?>
        <?php include 'view/navbar.php'; ?>
        <section class="py-1">
            <div class="container px-5 px-lg-5 mt-1">
            <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-6 row-cols-xl-5 justify-content-center">
                <div class="col mb-5">
                <div class="card h-75 filter-card" data-filter="all" style="background-color: #ffff;">
                    <div class="card-body p-3">
                    <div class="text-black text-center">
                        <img src="assets/img/filter.png" alt="Filter" class="intro-img filter" style="left: 0; bottom: 10; top:10; width: 30px; height: 30px;">
                        <h5 class="fw-bolder">Filter By:</h5>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col mb-5">
                <div class="card h-75 filter-card" data-filter="healthy-food" style="background-color: #ffff;">
                    <div class="card-body p-3">
                    <div class="text-black text-center">
                        <h5 class="fw-bolder">Healthy Food</h5>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col mb-5">
                <div class="card h-75 filter-card" data-filter="fitness" style="background-color: #ffff;">
                    <div class="card-body p-3">
                    <div class="text-black text-center">
                        <h5 class="fw-bolder">Fitness</h5>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col mb-5">
                <div class="card h-75 filter-card" data-filter="outfit" style="background-color: #ffff;">
                    <div class="card-body p-3">
                    <div class="text-black text-center">
                        <h5 class="fw-bolder">Outfit</h5>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col mb-5">
                <div class="card h-75 filter-card" data-filter="make-up" style="background-color: #ffff;">
                    <div class="card-body p-3">
                    <div class="text-black text-center">
                        <h5 class="fw-bolder">Make Up</h5> </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/article 1.png" alt="..." />
                    <div class="intro-text right-0 text-center bg-faded p-5 ms-auto rounded ">
                        <h2 class="section-heading mb-2">
                            <span class="section-heading-upper" id="judulD"></span>
                        </h2>
                        <p class="mb-1" id="isiD"></p>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'view/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            const filterCards = document.querySelectorAll('.filter-card');
            const articleContainer = document.querySelector('.article-container');

            filterCards.forEach(card => {
            card.addEventListener('click', async () => {
                const filter = card.dataset.filter;
                const articles = await fetchArticles(filter); // Replace with your function to fetch articles based on filter

                articleContainer.innerHTML = ''; // Clear existing articles

                if (articles.length > 0) {
                articles.forEach(article => {
                    articleContainer.innerHTML += createArticleElement(article); // Replace with your function to create article elements
                });
                } else {
                articleContainer.innerHTML = '<p>Tidak ada artikel yang ditemukan untuk filter ini.</p>';
                }
            });
            });

            // Your function to fetch articles from a JSON database based on the provided filter
            async function fetchArticles(filter) {
            // Replace 'articles.json' with the actual URL of your JSON database
            const response = await fetch('articles.json');
            const articlesData = await response.json();

            let filteredArticles = articlesData;
            if (filter !== 'all') {
                filteredArticles = articlesData.filter(article => article.category === filter);
            }

            return filteredArticles;
            }

            // Your function to create article elements from the fetched article data
            function createArticleElement(article) {
            const articleHTML = `
                <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="${article.image}" alt="..." />
                <div class="intro-text right-0 text-center bg-faded p-5 ms-auto rounded ">
                    <h2 class="section-heading mb-2">
                    <span class="section-heading-upper">${article.title}</span>
                    </h2>
                    <p class="mb-1">${article.description}</p>
                    <div class="intro-button mx-auto">
                    <a class="btn btn-primary text-white btn-xl" href="detail-article.php?id=${article.id}">
                        Baca Selengkapnya
                    </a>
                    </div>
                </div>
                </div>
            `;
            return articleHTML;
            }
        </script>
    </body>
</html>
