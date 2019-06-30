<?php 
include 'header.php'; 

$urunsor=$db->prepare("SELECT * From urun where urun_id=:urun_id");
$urunsor->execute(array(
	'urun_id'=>$_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
//
if($urunsor->rowCount()==0)
{
	header("Location:index.php?durum=oynasma");
}

?>
<head>
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
</head>

<?php 
if ($_GET['durum']=="ok") {?>
	<script type="text/javascript">
		alert("Yorum Başarıyla Eklendi");
	</script>

<?php } ?>


<div class="container">

	<div class="clearfix"></div>
</div>

<div class="container">
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad'] ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php 
					$urun_id=$uruncek['urun_id'];
					$urunfotosor=$db->prepare("SELECT * From urunfoto where urun_id=:urun_id order by urunfoto_sira asc limit 1");
					$urunfotosor->execute(array(
						'urun_id'=>$urun_id
					));
					$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

					?>
					<div class="dt-img">
						<div class="detpricetag"><div class="inner"><?php echo $uruncek['urun_fiyat']; ?>TL</div></div>
						<center>	<a class="fancybox" href="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="<?php echo $uruncek['urun_ad'] ?>"><img style="height: 240px;" src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a></center>
					</div>
					<?php 
					$urun_id=$uruncek['urun_id'];
					$urunfotosor=$db->prepare("SELECT * From urunfoto where urun_id=:urun_id order by urunfoto_sira asc limit 1,3");
					$urunfotosor->execute(array(
						'urun_id'=>$urun_id
					));
					while($urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC)){?>
					
					<div class="thumb-img">
						<a class="fancybox" href="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
					</div>
<?php } ?>
				</div>
				<div class="col-md-6 det-desc">
					<div class="productdata">
						<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id'] ?></span></div>
						<div class="infospan">Önceki Fiyat <span style="color: gray; text-decoration: line-through;"><?php echo $uruncek['urun_fiyat']*1.1 ?>&nbsp;₺</span></div>
						<div class="infospan">Fiyat <span><?php echo $uruncek['urun_fiyat'] ?>&nbsp;₺</span></div>
						<br>

						<div class="clearfix"></div>
						<form action="nedmin/netting/islem.php" method="POST" >

							<div class="form-group"><?php 
							if($_SESSION['userkullanici_mail']) {?>
								<label for="qty" class="col-sm-2 control-label">Adet</label>
								<div class="col-sm-4">
									<input type="number" name="urun_adet" min="0" max="100" value="1" class="form-control">
								</div>
								
								<div class="col-sm-4">
									<button type="submit" name="sepete_ekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
								</div>
							<?php } else { ?>
								<div class="col-sm-4">
									<a class="btn btn-warning" href="register.php"><span class="addchart">Sepete Eklemek</span>İçin Kayıt Ol</a>
								</div>
							<?php } ?>
							<div class="clearfix"></div>
						</div>
						<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
						<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
						<input type="hidden" name="gelensepetekle_url" value="<?php echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; ?>">

					</form>


					<div class="sharing">
							<!--<div class="share-bt">
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
								<div class="clearfix"></div>
							</div>-->
							<div class="avatock"><span>

								<?php 
								if($uruncek['urun_stok']>20){?>

									<button  class="btn btn-success text-white"><?php echo "Stok Adeti : ".$uruncek['urun_stok'];?></button>

									


								<?php }elseif ($uruncek['urun_stok']>0 ) {?>

									<button  class="btn btn-warning text-white"><?php echo "Son ".$uruncek['urun_stok']." Adet Kalmıştır...";?></button>
									
								<?php }
								else { ?>
									<button  class="btn btn-danger text-white"><?php echo "Ürün Bitmiştir";?></button>

								<?php } ?>
							</span></div>

						</div>

					</div>
				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li 
					<?php if(empty($_GET['durum'])) {?>

						class="active"
					<?php } ?>
					><a href="#desc" data-toggle="tab">Açıklama</a></li>

					<li<?php if(isset($_GET['durum'])=="ok") {?>

						class="active"
					<?php } ?>

					<?php 

					$urun_id=$uruncek['urun_id'];


					$yorumsor=$db->prepare("SELECT * From yorum where urun_id=:urun_id and yorum_durum=:durum");
					$yorumsor->execute(array(
						'urun_id'=>$urun_id,
						'durum'=>1

					));

					
					?>
					><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $yorumsor->rowCount(); ?>)</a></li>

					<li class=""><a href="#video" data-toggle="tab">Ürün Video</a></li>



				</ul>
				<div id="myTabContent" class="tab-content shop-tab-ct">
					<div class="tab-pane fade <?php if(empty($_GET['durum'])) {?>

						active in
					<?php } ?>


					" id="desc">



					<p>
						<?php echo $uruncek['urun_detay']?>
					</p>
				</div>
				<div class="tab-pane fade <?php if(($_GET['durum'])=="ok") {?>

					active in
					<?php } ?>" id="rev">

					<?php 


					while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)){
						?>
						<?php 
                        //Kullanici
						$ykullanici_id=$yorumcek['kullanici_id'];
						$ykullanicisor=$db->prepare("SELECT * From kullanici where kullanici_id=:id");
						$ykullanicisor->execute(array(
							'id'=>$ykullanici_id
						));
						$ykullanicicek=$ykullanicisor->fetch(PDO::FETCH_ASSOC);
						?>

						<!--Yorumları Yazacaz-->

						<p class="dash">
							<span><?php echo $ykullanicicek['kullanici_adsoyad']."  "; ?></span> (<?php echo $yorumcek['yorum_zaman']; ?>)<br><br>
							<?php echo $yorumcek['yorum_detay']; ?>
						</p>
					<?php } ?>



					<!--Yorumları Yazacaz-->
					<h4>Yorum yazın</h4>
					<?php 
					if(isset($_SESSION['userkullanici_mail'])){?>
						<form action="nedmin/netting/islem.php" method="POST" role="form">

							<?php 


							?>

							<div class="form-group">
								<textarea name="yorum_detay" class="form-control" placeholder="Lütfen Yorumunuzu Yazınız" id="text"></textarea>
								
							</div>
							<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
							<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
							<input type="hidden" name="gelen_url" value="<?php echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; ?>">
							
							<button type="submit" name="yorumekle" class="btn btn-default btn-red btn-sm">Yorum Yap</button>
						</form>

					<?php } else {?>

						Yorum yapabilmek için  <a style="color:red;" href="register.php">Kayıt </a> olmalısınız ve giriş yapmalısınız.. 
					<?php } ?>


				</div>
				<div class="tab-pane fade" id="video">
					<?php 
					if (strlen($uruncek['urun_video'])>0) {?>
						<iframe width="650" height="400" src="https://www.youtube.com/embed/<?php echo $uruncek['urun_video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

					<?php } else { 
						echo "Bur Ürüne Ait Video Henüz Eklenmemiştir.";

					} ?>
				</div>
			</div>
		</div>

		<div id="title-bg">
			<div class="title">Benzer Ürünler</div>
		</div>
		<div class="row prdct"><!--Products-->
			<?php 

			$kategori_id=$uruncek['kategori_id'];

			$urunaltsor=$db->prepare("SELECT * From urun where kategori_id=:kategori_id order by rand() Desc limit 3  ");

			$urunaltsor->execute(array(
				'kategori_id'=>$kategori_id
			));
			while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)){?>


				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="urun-<?=seo($urunaltcek["urun_ad"]).'-'.$urunaltcek["urun_id"]?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urunaltcek['urun_fiyat']*1.1; ?>TL</span><?php echo $urunaltcek['urun_fiyat']; ?>TL</span></div></div>
						</div>
						<span class="smalltitle"><a href="urun-<?=seo($urunaltcek["urun_ad"]).'-'.$urunaltcek["urun_id"]?>"><?php echo $urunaltcek['urun_ad']; ?></a></span>
						<span class="smalldesc">Ürün Kodu.: <?php echo $urunaltcek['urun_keyword']; ?></span>
					</div>
				</div>
			<?php } ?>

		</div><!--Products-->
		<div class="spacer"></div>
	</div><!--Main content-->


	<?php include 'sidebar.php'; ?>

</div>
</div>

<?php 
include 'footer.php';
?>