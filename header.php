<?php 
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
$ayarsor=$db->prepare("SELECT * From ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id'=> 0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
	'mail' => $_SESSION['userkullanici_mail']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo  $ayarcek['ayar_title']; ?></title>

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">

	
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
	<div id="wrapper">
		<div class="header"><!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo">
						<a href="index.php"><img src="<?php echo $ayarcek['ayar_logo']; ?>" alt="logo" class="logo img-responsive"></a>
					</div>




					<div class="col-md-8">
						<div class="pushright">
							<div class="top">

								<?php 

								if (!isset($_SESSION['userkullanici_mail'])) {?>

									<a href="#" id="reg" class="btn btn-default btn-dark">Giriş Yap<span>-- yada --</span>Kayıt Ol</a>
								<?php } else {?>

									<a href="#"  class="btn btn-default btn-dark">Hoş Geldin <span>--</span> <?php echo $kullanicicek['kullanici_adsoyad']; ?></a>


								<?php } ?>







								<div class="regwrap">
									<div class="row">
										<div class="col-md-6 regform">
											<div class="title-widget-bg">
												<div class="title-widget">Kullanıcı Girişi</div>
											</div>
											<form action="nedmin/netting/islem.php" method="POST" role="form">


												<div class="form-group">
													<input type="text" class="form-control" name="kullanici_mail" id="username" placeholder="Kullanıcı Adınız (Mail Adresiniz)">
												</div>


												<div class="form-group">
													<input type="password" class="form-control" name="kullanici_password" id="password" placeholder="Şifreniz">
												</div>


												<div class="form-group">
													<button type="submit" name="kullanicigiris" class="btn btn-default btn-red btn-sm">Giriş Yap</button>
												</div>

											</form>
										</div>
										<div class="col-md-6">
											<div class="title-widget-bg">
												<div class="title-widget">Kayıt Ol</div>
											</div>
											<p>
												Yeni Kullanıcı mısın ? Alışverişe başlamak için hemen Kayıt Ol..
											</p>
											<a href="register.php"><button class="btn btn-default btn-yellow">Hemen Kayıt Ol</button></a>
										</div>
									</div>
								</div>
								<div class="srch-wrap">
									<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
								</div>
								<div class="srchwrap">
									<div class="row">
										<div class="col-md-12">
											<form action="arama.php" method="POST" class="form-horizontal" role="form">
												<div class="form-group">
												
													<div class="col-xs-9" style="margin-top: 5px;">
														<input type="text" name="aranan" class="form-control" id="search">

													</div>
														<button name="arama" class="btn btn-default"><i class="fa fa-search "></i></button>
													
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashed"></div>
		</div><!--Header -->
		<div class="main-nav"><!--end main-nav -->
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="index.php" class="active">Anasayfa</a><div class="curve"></div></li>
									<?php 


									$menusor=$db->prepare("SELECT * From menu where menu_durum=:durum order by menu_sira ASC limit 5");									
									$menusor->execute(array(
										'durum'=>1

									));
									while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){?>
										
										<li><a href="
											<?php 
											if (!empty($menucek['menu_url'])){
												echo $menucek['menu_url'];
											}
											else{
												echo "sayfa-".seo($menucek['menu_ad']);
											}

											?>


											"><?php echo $menucek['menu_ad'] ?></a></li>

										<?php } ?>

									</ul>
								</div>
							</div>
							<div class="col-md-2 machart">
								<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Sepetim</span>|<span class="allprice">
									<?php 
									$kullanici_id=$kullanicicek['kullanici_id'];
									$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
									$sepetsor->execute(array(
										'id'=>$kullanici_id
									));
									$toplamurun=0;
									while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){
										$urun_id=$sepetcek['urun_id'];

										$urunsor=$db->prepare("SELECT * From urun where urun_id=:urun_id");
										$urunsor->execute(array(
											'urun_id'=>$urun_id
										));
										$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
										$total=$sepetcek['urun_adet']*$uruncek['urun_fiyat'];
										$toplamurun+=$total;

									}
									echo $toplamurun;
									?> TL

								</span></button>
								<div class="popcart">
									<table class="table table-condensed popcart-inner">
										<tbody>

											<?php 
											$kullanici_id=$kullanicicek['kullanici_id'];
											$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
											$sepetsor->execute(array(
												'id'=>$kullanici_id
											));

											$toplamfiyat=0;
											while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){

												$urun_id=$sepetcek['urun_id'];

												$urunsor=$db->prepare("SELECT * From urun where urun_id=:urun_id");
												$urunsor->execute(array(
													'urun_id'=>$urun_id
												));
												$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
												?>


												<tr>
													<td>
														<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
													</td>
													<td><a href="product.htm"><?php echo $uruncek['urun_ad']; ?></a><br><span>Color: green</span></td>
													<td><?php echo $sepetcek['urun_adet']; ?> X </td>
													<td><?php echo $uruncek['urun_fiyat']; ?></td>
													<td><form action="nedmin/netting/islem.php" method="POST">
														<input type="hidden" name="gelensepet_url" value="<?php echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; ?>">
														<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
														<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
														<input type="hidden" name="sepet_id" value="<?php echo $sepetcek['sepet_id']; ?>">
														<button type="submit" name="sepetsil" class="btn btn-sm"><i class="fa fa-times-circle fa-2x"></i></button>

													</form></td>
												</tr>

												<?php 
												$fiyat=$sepetcek['urun_adet']*$uruncek['urun_fiyat'];
												$toplamfiyat+=$fiyat ;
											} ?>

										</tbody>
									</table>
									<div class="btn-popcart">
										<a href="sepet.php" class="btn btn-default btn-red btn-sm">Sepete Git</a>
									</div>
									<div class="popcart-tot">
										<p>
											Toplam Tutar<br>	
										</p>
										<div align="center"><span style="color:#5F6771;"><?php echo $toplamfiyat; ?> TL</span></div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>


							<div class="container">



								<?php 
								if(isset($_SESSION['userkullanici_mail'])){?>
									?>

									<ul class="small-menu"><!--small-nav -->
										<li><a href="hesabim.php" class="myacc">Hesap Bilgilerim</a></li>
										<li><a href="siparislerim" class="myshop">Siparişlerim</a></li>
										<li><a href="logout" class="mycheck">Güvenli Çıkış</a></li>
									</ul>
									<div class="clearfix"></div>
									<div class="lines"></div>

								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div><!--end main-nav -->

