<div class="main-slide">
		<div id="sync1" class="owl-carousel">

<?php 
$slidersor=$db->prepare("SELECT * From slider WHERE slider_durum=:durum order by slider_sira ASC");
$slidersor->execute(array(
'durum'=>1
));

 while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){?>


			<div class="item">
				<div class="slide-desc">
					<div class="inner">
						<h1><?php echo $slidercek['slider_ad']; ?></h1>
						<p style="color: white;">
							<?php echo $slidercek['slider_icerik']; ?>
						</p>
						<button class="btn btn-default btn-red btn-lg">Add to cart</button>
					</div>
					<div class="inner">
						<div class="pro-pricetag big-deal">
							<div class="inner">
								<span class="oldprice"><?php echo $slidercek['slider_fiyat']*1.2; ?>₺</span>
								<span style="font-size: 20px;"><?php echo $slidercek['slider_fiyat']; ?>₺</span>
								<span class="ondeal">en iyi fiyat</span>
							</div>
						</div>
					</div>
				</div>
				<div class="slide-type-1">
					<a href="<?php echo $slidercek['slider_link']; ?>"><img src="<?php echo $slidercek['slider_resimyol'] ?>" alt="" class="img-responsive"></a>
				</div>
			</div>
		
			
			<?php } ?>
			
			
			
		</div>
	</div>
<!--
	<div class="bar"></div>
	<div id="sync2" class="owl-carousel">
		<div class="item">
			<div class="slide-type-1-sync">
				<h3>Stylish Jacket</h3>
				<p>Description here here here</p>
			</div>
		</div>
		<div class="item">
			<div class="slide-type-1-sync">
				<h3>Stylish Jacket</h3>
				<p>Description here here here</p>
			</div>
		</div>
		<div class="item">
			<div class="slide-type-1-sync">
				<h3>Nike Airmax</h3>
				<p>Description here here here</p>
			</div>
		</div>
		<div class="item">
			<div class="slide-type-1-sync">
				<h3>Unique smaragd ring</h3>
				<p>Description here here here</p>
			</div>
		</div>
		<div class="item">
			<div class="slide-type-1-sync">
				<h3>Stylish Jacket</h3>
				<p>Description here here here</p>
			</div>
		</div>
		<div class="item">
			<div class="slide-type-1-sync">
				<h3>Nike Airmax</h3>
				<p>Description here here here</p>
			</div>
		</div>
	</div>
</div>
-->