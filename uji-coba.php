<?php
    require "koneksi.php";
    $nama= htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv=X-UA-Compatible" content= "IE=edge">
        <meta name= "viewport" content="width=device-width, initial-scale=0.1">
        <title>Toko online | Detail produk</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
                <h1><?php echo $produk['nama']; ?></h1>
                <p class="fs-5">
                    <?php echo $produk['detail']; ?>
                </p>
                <p class="text-harga">
                    Rp <?php echo $produk['harga']; ?>
                </p>
                </php>
                <p class="fs-5"> Status Ketersediaan : <strong><?php echo $produk ['ketersediaan-stok']; ?></strong></p>
            </div>
        </div>
    </div>
</div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>

        