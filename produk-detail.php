<?php
require "koneksi.php";

// Validasi input GET
$nama = mysqli_real_escape_string($con, htmlspecialchars($_GET['nama']));

// Ambil data produk
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);

// Jika produk tidak ditemukan
if (!$produk) {
    echo "<p>Produk tidak ditemukan.</p>";
    exit;
}

// Ambil produk terkait
$queryprodukterkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- Detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 offset-md-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5"><?php echo $produk['detail']; ?></p>
                    <p class="text-harga">Rp <?php echo $produk['harga']; ?></p>
                    <p class="fs-5">Status Ketersediaan: 
                        <strong><?php echo !empty($produk['ketersediaan_stok']) ? $produk['ketersediaan_stok'] : 'Tidak tersedia'; ?></strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk terkait -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Produk Terkait</h2>
            <div class="row">
                <?php if (mysqli_num_rows($queryprodukterkait) > 0) { ?>
                    <?php while ($data = mysqli_fetch_array($queryprodukterkait)) { ?>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <a href="produk-detail.php?nama=<?php echo urlencode($data['nama']); ?>">
                                <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail" alt="">
                            </a>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-white text-center">Tidak ada produk terkait ditemukan.</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?> 

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>
