<?php 
include 'header.php';
$hakkimizdasor=$db->prepare("SELECT * From hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
  'id'=> 0
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hakkımızda Ayarlar <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green"> İşlem Başarılı</b> 
              <?php  }
              else if ($_GET['durum']=="no") {?>
                <b style="color:red"> İşlem Başarısız</b> 
              <?php  }?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <!-- / => en kök dizene çık
               ../ => bir üst dizine çık

             -->
             <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Başlık<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>"required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              

                <!-- Ck Editör Başlangıç-->
                <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">#</span></label>

                 <div class="col-md-6 col-sm-6 col-xs-12">

                   <textarea class="ckeditör" id="editör1"name="hakkimizda_icerik" ><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
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
              <!--Ck Editör Bitiş-->

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="<?php echo $hakkimizdacek['hakkimizda_video'] ?>" name="hakkimizda_video" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>" name="hakkimizda_vizyon" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>" name="hakkimizda_misyon" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="hakkimizdaayarkaydet" class="btn btn-primary">Güncelle</button>
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

