<?php 
include 'header.php';
//urun
$urunsor=$db->prepare("SELECT * From urun where urun_id=:id");
$urunsor->execute(array(
  'id'=>$_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Ekle <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green"> İşlem Başarılı</b> 
              <?php  }
              else if ($_GET['durum']=="no") {?>
                <b style="color:red"> İşlem Başarısız</b> 
              <?php  }?>


            </small></h2>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <!-- / => en kök dizene çık
               ../ => bir üst dizine çık

             -->
             <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <!--
input type="text" id="first-name" name="urun_ad" value="<?php echo $_SERVER['HTTP_HOST']."/".$_SERVER['REQUEST_URI']?>/sayfa-<?php echo seo($uruncek['urun_ad']) ?>"required="required" class="form-control col-md-7 col-xs-12">
-->

<!--Kategori Seçme Başlangıç-->

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-6">

    <?php  

    $urun_id=$uruncek['kategori_id']; 

    $kategorisor=$db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
    $kategorisor->execute(array(
      'kategori_ust' => 0
    ));

    ?>
    <select class="select2_multiple form-control" required="" name="kategori_id" >


     <?php 

     while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

       $kategori_id=$kategoricek['kategori_id'];

       ?>

       <option <?php if ($kategori_id==$urun_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

     <?php } ?>

   </select>
 </div>
</div>


<!--Kategori Seçme Bitiş-->

<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ürün Ad <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="first-name" name="urun_ad" placeholder="Ürün Adını Girin" required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">#</span></label>

 <div class="col-md-6 col-sm-6 col-xs-12">

   <textarea class="ckeditör" id="editör1"name="urun_detay" ></textarea>
 </div>
 <script type="text/javascript">

   CKEDITOR.replace('editör1',
   {
    filebrowserBrowserUrl :'ckfinder/ckfinder.html',
    filebrowserImageBrowserUrl :'ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowserUrl :'ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    forcePasteAsPlainText:true




  }

  );

</script>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ürün Fiyat <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="first-name" name="urun_fiyat" placeholder="Ürün Fiyatını Girin" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ürün Video <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="first-name" name="urun_video" placeholder="Ürün Video Girin" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ürün Stok <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="first-name" name="urun_stok" placeholder="Ürün Stok Adedini Girin"required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>
<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Ürün Keyword <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    <input type="text" id="first-name" name="urun_keyword" placeholder="Ürün Keyword Girin" required="required" class="form-control col-md-7 col-xs-12">
  </div>
</div>





<div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
   <select id="heard" class="form-control" name="urun_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" >Aktif</option>



                  <option value="0" >Pasif</option>
                  <!-- <?php 

                   if ($uruncek['urun_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->


                 </select>
               </div>
             </div>

             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="urunekle" class="btn btn-primary">Ekle</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  <hr>
  <hr>
  <hr>

</div>
</div>

<?php 
include 'footer.php'; ?>

