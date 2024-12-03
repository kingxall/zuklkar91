<body>
    <?php require "navbar.php";?>

    <!-- detail produk-->
     <div class="container fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="image/<?php echo $produk['foto'];?>"class="w-100" alt="">
</div>
<div class="col-md-6 offset-md-1">
    <h1><?php echo  $produk['nama']; ?></h1>
    <p class ="fs-5">
        <?php echo $produk['detail']; ?>
</p>
<p class="text-harga">
    Rp <?php echo $produk ['harga']; ?>
</p>
<p class="fs-5">Status ketersediaan : <strong><?php echo $produk['ketersediaan_stok']; ?></strong ></p>
</div>
</div>