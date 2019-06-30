<?php 
include 'header.php';
?>

<div class="container">
	<div class="clearfix"></div>
</div>

<div class="container">
	<div class="row">
		
	</div>
	<div class="title-bg">
		<div class="title">Ödeme Sayfası</div>
	</div>
	
	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Remove</th>
					<th>Ürün Resim</th>
					<th>Ürün Adı</th>
					<th>Ürün Kodu</th>
					<th>Ürün Adeti</th>
					<th>Birim Fiyat</th>
					<th>Toplam Fiyat</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php 
					$kullanici_id=$kullanicicek['kullanici_id'];
					$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
					$sepetsor->execute(array(
						'id'=>$kullanici_id
					));

					$toplam=0;
					while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){

						$urun_id=$sepetcek['urun_id'];

						$urunsor=$db->prepare("SELECT * From urun where urun_id=:urun_id");
						$urunsor->execute(array(
							'urun_id'=>$urun_id
						));
						$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
						?>


						<td><form><input type="checkbox"></form></td>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo  $uruncek['urun_ad']; ?></td>
						<td><?php echo  $uruncek['urun_keyword']; ?></td>
						<td><form action="" method="GET" ><input type="number" name="fiyat" min="0" max="50" class="form-control quantity" value="<?php echo $sepetcek['urun_adet']; ?>"></form></td>
						<td><?php echo $uruncek['urun_fiyat']; ?>TL</td>
						<td><?php 
						echo $topla=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];
						?> TL</td>
					</tr>

					<?php $toplam+=$topla;
				} ?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-5">

		</div>
		<div class="col-md-4 col-md-offset-3">
			<div class="subtotal">
				<div class="total">Toplam Alışveriş Fiyatı : <span class="bigprice"><?php echo $toplam; ?> TL</span></div>
				<div class="clearfix"></div>
				<br>
				<div align="center"><a  href="odeme.php" class="btn btn-default btn-yellow">Ödeme Sayfası</a></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="spacer"></div>
</div>
<?php include 'footer.php'; ?>