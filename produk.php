<?php
require "koneksi.php";
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($con, $_GET['keyword']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$keyword%' ");
} elseif (isset($_GET['kategori'])) {
    $queryGETkategoriId = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$_GET[kategori]' ");
    if ($kategoriId = mysqli_fetch_array($queryGETkategoriId)) {
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    } else {
        echo "<p>Kategori tidak ditemukan.</p>";
        $queryProduk = false;
    }
} else {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require "navbar.php" ?>
<div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
        <h1 class="text-white text-center">Produk</h1>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-5">
            <h3>Kategori</h3>
            <ul class="list-group">
                <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                    <a href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                        <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                    </a>
                <?php } ?>
            </ul>
        </div>
        <div class="col-lg-9">
            <h3 class="text-center mb-3">Produk</h3>
            <div class="row">
                <?php if ($queryProduk && mysqli_num_rows($queryProduk) > 0) { ?>
                    <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="image/<?php echo !empty($produk['foto']) ? $produk['foto'] : 'default.jpg'; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                                    <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                    <p class="card-text text-harga">Rp <?php echo $produk['harga']; ?></p>
                                    <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn warna2 text-white">Lihat detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p>Produk tidak ditemukan.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>
<script src="bootsrap/js/bootstrap.bundle.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
</body>
</html>
