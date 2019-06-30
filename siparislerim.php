<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Sipariş Bilgilerim</div>
							<p >Vermiş olduğunuz siparişlerinizi listeliyorsunuz</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="title-bg">
				<div class="title">Sipariş Bilgileri</div>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered chart">
					<thead>
						<tr>

							<th>Sipariş No</th>
							<th>Tarih</th>
							<th>Tutar</th>
							<th>Ödeme Tip</th>
							<th>Durum</th>
							<th>Detay</th>

						</tr>
					</thead>
					<tbody>

						<?php 
						$kullanici_id=$kullanicicek['kullanici_id'];
						$siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:id order by siparis_id DESC");
						$siparissor->execute(array(
							'id' => $kullanici_id
						));

						while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {?>
							<tr>

								<td><?php echo $sipariscek['siparis_id']; ?></td>
								<td><?php echo $sipariscek['siparis_zaman']; ?></td>
								<td><?php echo $sipariscek['siparis_toplam']; ?></td>
								<td><?php echo $sipariscek['siparis_tip']; ?></td>
								<td><?php if($sipariscek['siparis_odeme']==0){
									echo "Onay Bekliyor";}
									elseif ($sipariscek['siparis_odeme']==1) {
										echo "Onaylandı";
										
									} ?></td>

									<td><a href="siparislerim?siparis_id=<?php echo $sipariscek['siparis_id']; ?>"><button class="btn btn-success btn-xs">+</button></a>
										<a href="siparislerim"><button class="btn btn-danger btn-xs">-</button></a>
									</td>

								</tr>

							<?php } ?>

						</tbody>
					</table>
				</div>


				<!---->

				<?php 
				$siparis_id=$_GET['siparis_id'];
				$siparisssor=$db->prepare("SELECT * FROM siparis where siparis_id=:id");
				$siparisssor->execute(array(
					'id' => $siparis_id
				));
				$siparisscek=$siparisssor->fetch(PDO::FETCH_ASSOC);

				if ($siparisssor->rowCount()>0){ ?>

					<div class="table-responsive">
						<table class="table table-bordered chart">
							<thead>
								<tr>
									<th>Ürün Resim</th>
									<th>Ürün Adı</th>
									<th>Ürün Kodu</th>
									<th>Ürün Adeti</th>
									<th>Birim Fiyat</th>
								</tr>
							</thead>
							<form action="nedmin/netting/islem.php" method="POST">
								<tbody>
									<tr>
										<?php 
										
										$siparisdetaysor=$db->prepare("SELECT * FROM siparis_detay where siparis_id=:id");
										$siparisdetaysor->execute(array(
											'id'=>$siparis_id
										));

										while($siparisdetaycek=$siparisdetaysor->fetch(PDO::FETCH_ASSOC)){

											$urun_id=$siparisdetaycek['urun_id'];

											$urunsor=$db->prepare("SELECT * From urun where urun_id=:urun_id");
											$urunsor->execute(array(
												'urun_id'=>$urun_id
											));
											$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
											?>

											<!--<input type="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id']; ?>">-->
											<td><img src="images\demo-img.jpg" width="100" alt=""></td>
											<td><?php echo  $uruncek['urun_ad']; ?></td>
											<td><?php echo  $uruncek['urun_keyword']; ?></td>
											<td><?php echo $siparisdetaycek['urun_adet']; ?></td>
											<td><?php echo $uruncek['urun_fiyat']; ?>TL</td>
											
										</tr>
										

										<?php $toplam+=$topla;
									} ?>
								</tbody>
							</table>
						</div>
					<?php } ?>
				</div>

			</div>
			<!---->	
			<div class="spacer"></div>
		</div>
	</div>

	<?php include 'footer.php'; ?>