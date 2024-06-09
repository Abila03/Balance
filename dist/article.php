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
                        <div class="card h-75" style="background-color: #ffff;">
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <img  
                                        src="assets/img/filter.png" 
                                        alt="..." 
                                        class="intro-img filter" 
                                        style="left: 0; bottom: 10; top:10; width: 30px; height: 30px;"
                                    />
                                    <h5 class="fw-bolder">Filter By:</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <h5 class="fw-bolder">Healthy Food</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fitness</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Outfit</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-75" style="background-color: #ffff;">
                            <div class="card-body p-3">
                                <div class="text-black text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Make Up</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="artikel"></div>
        <?php include 'view/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
