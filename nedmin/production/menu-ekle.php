<?php 
include 'header.php';
//menu

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menü Ekleme <small>
              
            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <!-- / => en kök dizene çık
               ../ => bir üst dizine çık

             -->
             <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

             
             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Menü Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_ad" required="required" placeholder="Menü Adını Girin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay <span class="required">#</span></label>

                 <div class="col-md-6 col-sm-6 col-xs-12">

                   <textarea class="ckeditör" id="editör1"  name="menu_detay" ></textarea>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Menü url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_url" placeholder="Menü url Giriniz" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Menü Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="menu_sira" required="required" placeholder="Menü Sırasını Girin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>




             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="menu_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $menucek['menu_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" >Aktif</option>



                  <option value="0" >Pasif</option>
                


                 </select>
               </div>
             </div>
               <input type="hidden" name="menu_id">
             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="menukaydet" class="btn btn-primary">Kaydet</button>
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
