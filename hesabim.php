<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Kayıt Bilgileri</div>
				</div>

				<?php 

				if ($_GET['durum']=="farklisifre") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
					</div>

				<?php } elseif ($_GET['durum']=="eksiksifre") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
					</div>

				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
					</div>

				<?php } elseif ($_GET['durum']=="basarisiz") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
					</div>

				<?php }
				?>


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control" disabled=""  required="" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail'] ?>">
					</div>
					
				</div>


				<div class="form-group dob">
					<div class="col-sm-12">
						<label>Ad Soyad</label>
						<input type="text" class="form-control"  required="" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
					</div>
					
				</div>
				
				<div class="form-group dob">
					<div class="col-sm-12">
						<label>TC</label>
						<input type="text" class="form-control" disabled="" required="" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>">
					</div>
					
				</div>
				
				<div class="form-group dob">
					<div class="col-sm-12">
						<label>Telefon Numarası</label>
						<input type="text" class="form-control"  required="" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm'] ?>">
					</div>
					
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<label>Adres</label>
						<textarea class="form-control"   name="kullanici_adres" ><?php echo $kullanicicek['kullanici_adres'] ?>
					</textarea>

				</div>

			</div>



			<div class="form-group dob">
				<div class="col-sm-6">
					<label>İl</label>
					<input type="text" class="form-control" name="kullanici_il"    value="<?php echo $kullanicicek['kullanici_il'] ?>">
				</div>
				<div class="col-sm-6">
					<label>İlçe</label>
					<input type="text" class="form-control" name="kullanici_ilce"   value="<?php echo $kullanicicek['kullanici_ilce'] ?>">
				</div>
			</div>

			<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



			<button type="submit" name="kullanicibilgiguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
		</div>
		<div class="col-md-6">
			<div class="title-bg">
				<div class="title">Şifrenizi mi Unuttunuz?</div>
			</div>
			<div class="col-md-12" ><center><a href="sifre-guncelle"><img style="width: 100%;" src="dimg/sifrenimi-unuttun.png"></a></center></div>

		</div>
	</div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>