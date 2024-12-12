<?php 
include 'header.php';
?>
<!-- IMAGE -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .welcome-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 50px;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="margin: 0;padding: 0; position: relative;">
        <div class="image" style="margin-top: -21px">
            <img src="image/home/pbewan.png" style="width: 100%; height: 650px;">
            <div class="welcome-text">
                WELCOME TO FISHON
            </div>
			<div class="button-container" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);">
				<a href="produk.php" class="btn btn-primary" style="padding: 10px 20px; font-size: 18px; text-decoration: none; color: white; background-color: #91cdff; border: none; border-radius: 5px; transition: background-color 0.3s;">
					Lihat Produk Kami
				</a>
       		</div>
        </div>
    </div>
</body>
<br>
<br>

<!-- PRODUK TERBARU -->
<div class="container">


		<h4 class="text-center" style="font-family: arial; padding-top: 10px; padding-bottom: 10px; font-style: italic; line-height: 29px; border-top: 2px solid #91cdff; border-bottom: 2px solid #91cdff;">
			Platform FishOn hadir sebagai solusi e-commerce di Aceh Barat yang khusus bergerak dalam perdagangan produk perikanan, meliputi ikan segar, seafood, dan produk olahan ikan. FishOn bertujuan menjembatani kesenjangan antara nelayan, peternak ikan, dan konsumen, sekaligus memudahkan distribusi produk perikanan di tingkat lokal. Fokus platform ini adalah mendukung ekonomi Aceh Barat melalui pemberdayaan nelayan dan pelaku usaha perikanan dengan akses pasar yang lebih luas dan berkelanjutan.
		</h4>


	<h2 style=" width: 100%; border-bottom: 4px solid #91cdff; margin-top: 80px;"><b>Produk Kami</b></h2>

	<div class="row">
		<?php 
		$result = mysqli_query($conn, "SELECT * FROM produk");
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="image/produk/<?= $row['image']; ?>" >
					<div class="caption">
						<h3><?= $row['nama'];  ?></h3>
						<h4>Rp.<?= number_format($row['harga']); ?></h4>
						<div class="row">
							<div class="col-md-6">
								<a href="detail_produk.php?produk=<?= $row['kode_produk']; ?>" class="btn btn-warning btn-block">Detail</a> 
							</div>
							<?php if(isset($_SESSION['kd_cs'])){ ?>
								<div class="col-md-6">
									<a href="proses/add.php?produk=<?= $row['kode_produk']; ?>&kd_cs=<?= $kode_cs; ?>&hal=1" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
								</div>
								<?php 
							}
							else{
								?>
								<div class="col-md-6">
									<a href="keranjang.php" class="btn btn-success btn-block" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah</a>
								</div>

								<?php 
							}
							?>

						</div>

					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>

</div>
<br>
<br>
<br>
<br>
<?php 
include 'footer.php';
?>