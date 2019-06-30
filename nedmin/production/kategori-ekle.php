<?php 
include 'header.php';
//kategori

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Ekleme <small>
              
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Kategori Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kategori_ad" required="required" placeholder="Kategori Adını Girin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Kategori Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="kategori_sira" required="required" placeholder="Kategori Sırasını Girin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>




             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="kategori_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $kategoricek['kategori_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" >Aktif</option>



                  <option value="0" >Pasif</option>
                


                 </select>
               </div>
             </div>
               <input type="hidden" name="kategori_id">
             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="kategorikaydet" class="btn btn-primary">Kaydet</button>
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
