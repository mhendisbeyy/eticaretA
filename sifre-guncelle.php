<?php include 'header.php'; ?>

<div class="container">
	

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifre Güncelleme</div>
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

				<?php } elseif ($_GET['durum']=="eskisifrehata") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifrenizi kontrol edip tekrar deneyiniz.
				</div>

				<?php } elseif ($_GET['durum']=="basarisiz") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
				</div>

				<?php } elseif ($_GET['durum']=="eskisifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Eski Şifreniz ile aynı Şifreyi koyamazsınız..
				</div>

				<?php }elseif ($_GET['durum']=="sifredegisti") {?>

				<div class="alert alert-success">
					<strong>Şifreniz Güncellendi</strong>
				</div>

				<?php }
				?>
				


				


				<div class="form-group dob">
					<div class="col-sm-12">
						<label>Eski Şifreniz</label>
						<input type="password" class="form-control"  required="" name="kullanici_eskipassword" placeholder="Eski Şifrenizi Giriniz">
					</div>
					
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<label>Yeni Şifre</label>
						<input type="password" class="form-control"  required="" name="kullanici_passwordone" placeholder="Yeni Şifrenizi Giriniz">
					</div>
					
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						<label>Yeni Şifrenizi Tekrar Giriniz</label>
						<input type="password" class="form-control"  required="" name="kullanici_passwordtwo" placeholder="Yeni Şifrenizi Tekrar Giriniz">
					</div>
					
				</div>
				
				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



				<button type="submit" name="kullanicisifreguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<div class="col-md-12" ><center><a href="sifre-guncelle"><img style="width: 80%;" src="dimg/sifrenimi-unuttun.png"></a></center></div>
			</div>
		</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>