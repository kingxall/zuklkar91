            
            <?php
                require "koneksi.php";
                $nama= htmlspecialchars($_GET['nama']);
                $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
                $produk = mysqli_fetch_array($queryProduk);

                $queryprodukterkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]'AND id!='$produk[id]' LIMIT 4");
    
            ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="fontawesome/css/all.min.css">
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
            <?php require "navbar.php" ?>

                <!-- detail produk -->
                <div class="container-fluid py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                        </div>
                        <div class="col-md-6 offset-md-1">
                            <h1> <?php echo $produk['nama']; ?> </h1>
                            <p class="fs-5">
                                <?php echo $produk['detail']; ?>
                            </p>
                            <p class="text-harga">
                                Rp <?php echo $produk['harga']; ?>
                            </p>
                            </php>
                            <p class="fs-5"> Status Ketersediaan : <strong><?php echo $produk ['ketersediaan_stok']; ?></strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid py-5 warna2">
                <div class="container">
                    <h2 class="text-center text-white mb-5">Produk Terkait</h2>
                    <div class="row">
                    <?php while($data=mysqli_fetch_array($queryprodukterkait)) {?>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="produk-detail.php?nama <?php echo $data['nama']; ?>">
                            <img src="image/<?php echo $data ['foto'];?>" class="img-fluid img-thumbnail" alt="">
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <?php require "footer.php"; ?> 
            
            <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
            <script src="fontawesome/js/all.min.js"></script>
            </body>
            </html>