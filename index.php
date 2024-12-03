            <?php 
            
            require "koneksi.php";
            $queryproduk = mysqli_query($con, "SELECT id,nama,harga,foto,detail FROM produk LIMIT 6");

            ?>     
              
              <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
                    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
                    <link rel="stylesheet" href="style.css">
                </head>
                <body>
                    <?php require "navbar.php" ?>
            <!--tampilan banner-->
            <div class="container-fulid banner d-flex align-items-center">
                <div class="container text-center text-white">
                    <h1>Toko Kopi</h1>
                    <h3>Mau Cari Apa</h3>
            <!--btn search-->
            <div class="col-8 offset-md-2">
                <form method="get" action="produk.php">
                <div class="input-group my-5">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                      <button type="submit" class="btn warna3">Cari</button>
                        </div>
                </form>
            </div>
                </div>
            </div>

            <!--hight ligtit-->
            <div class="conntainer-fluid py-5">
                <div class="container text-center">
                    <h3>Barang Telaris</h3>
            <!--tranding-->
                    <div class="row mt-5">
                        <div class="col-md-4 mb-3">
                            <div class="higt-ligt kategori-kopisatu d-flex justify-content-center align-items-center">
                                <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=kopi 50g">kopi 50g</a></h4>
                            </div>

                        </div>
                          <!--tranding-->
                          <div class="col-md-4 mb-3">
                            <div class="higt-ligt kategori-kopidua d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=kopi 100g">kopi 100g</a></h4>
                            </div>

                        </div>
                          <!--tranding-->
                          <div class="col-md-4 mb-3">
                            <div class="higt-ligt kategori-kopitiga d-flex justify-content-center align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=kopi 250g">kopi 250g</a></h4>
                            </div>

                        </div>
                    </div>
                   
                </div>
            </div>

            <!--tentang kami-->
                <div class="container-fluid warna3 py-5">
                    <div class="container text-center">
                        <h3>Tentang Kami</h3>
                        <p class="fs-5 mt-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id laborum maxime est repudiandae illum repellat ea enim mollitia asperiores, porro quis quas, adipisci cupiditate? Odio delectus quidem nulla fugit! Accusamus?
                        </p>
                    </div>
                </div>

            <!--produk-->
                <div class="container-fluid py-5">
                    <div class="container text-center">
                        <h3></h3>


                        <div class="row mt-5">
                        <?php while($data = mysqli_fetch_array($queryproduk)) { ?>
                            <!--awalan-->
                            <div class="col-sm-6 col-md-4 mb-4">
                            <div class="card h-100" >
                                <div class="image-box">
                                <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                                    <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
<<<<<<< Updated upstream
                                    <p class="card-text text-harga"> Rp <?php echo $data['harga']; ?></p>
                                    <a href="produk-detail.php?nama=<?php echo $data['nama'];?>" class="btn warna2 text-white">Lihat detail</a>
=======
                                    <p class="card-text text-harga"> Rp<?php echo $data['harga']; ?></p>
                                    <a href="produk-detail.php?nama=$data['nama']" class="btn warna2 text-white">Lihat detail</a>
                                    
>>>>>>> Stashed changes
                                </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <!--footer-->
                <?php require "footer.php"; ?> 
                    
                            <?php require "footer.php" ?>



                <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
                <script src="fontawesome/js/all.min.js"></script>
                </body>
                </html>