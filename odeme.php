<?php 
include 'header.php';
?>


<div class="container">
	<div class="row">
		
	</div>
	<div class="title-bg">
		<div class="title">Alışveriş  Sepetim</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Ürün Resim</th>
					<th>Ürün Adı</th>
					<th>Ürün Kodu</th>
					<th>Ürün Adeti</th>
					<th>Birim Fiyat</th>
					<th>Toplam Fiyat</th>
				</tr>
			</thead>
			<form action="nedmin/netting/islem.php" method="POST">
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

							<!--<input type="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id']; ?>">-->
							<td><img src="images\demo-img.jpg" width="100" alt=""></td>
							<td><?php echo  $uruncek['urun_ad']; ?></td>
							<td><?php echo  $uruncek['urun_keyword']; ?></td>
							<td><?php echo $sepetcek['urun_adet']; ?></td>
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
					<div align="center"><a  href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a></div>
				</div>
				<div class="clearfix"></div>

			</div>
		</div>
		<div class="tab-review">
			<ul id="myTab" class="nav nav-tabs shop-tab">
				<li class="active"><a href="#desc" data-toggle="tab">Kredi kartı</a></li>

				<li ><a href="#rev" data-toggle="tab">Banka Havalesi</a></li>




			</ul>
			<div id="myTabContent" class="tab-content shop-tab-ct">
				<div class="tab-pane fade active in" id="desc">
					<p>
						Entegrasyon Tamamlandı..
					</p>

				</div>

				<div class="tab-pane fade" id="rev">


					<p>
					Ödeme yapacağınız bankayı seçerek işleminizi tamamlayınız..</p>
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Banka Adı</th>
								<th>IBAN</th>
								<th>İşlem</th>
							</tr>
						</thead>
						<tbody><?php 
						$bankasor=$db->prepare("SELECT * From banka order by banka_sira ASC");
						$bankasor->execute();
						while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)){?>
							<tr>


								<td><?php echo $bankacek['banka_ad']; ?></td>
								<td><?php echo $bankacek['banka_iban']; ?></td>
								<td><input type="radio" name="banka_idd" value="<?php echo $bankacek['banka_id']; ?>"></td>


								</tr><?php } ?>
							</tbody>
						</table>
						<input type="hidden" name="siparis_toplam" value="<?php echo $toplam ?>">
						<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
						<div align="right" class="col-md-12">
							<button type="submit" name="bankasiparisekle" class="btn btn-success">Sipariş Ver</button>
						</div>
					</form>






				</div>


				<div class="spacer"></div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>