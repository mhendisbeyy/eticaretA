<?php 
include 'header.php';
//banka
$banka_id=$_GET['banka_id'];

$bankasor=$db->prepare("SELECT * From banka WHERE banka_id=:id");
$bankasor->execute(array(
'id'=>$banka_id
));
$bankacek=$bankasor->fetch(PDO::FETCH_ASSOC);
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Banka Ekleme <small>
              
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Banka Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="banka_ad" required="required" value="<?php echo $bankacek['banka_ad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >IBAN Numarası  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="banka_iban" required="required" value="<?php echo $bankacek['banka_iban'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Banka Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="banka_sira" required="required" value="<?php echo $bankacek['banka_sira'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Hesap Adı Soyadı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="banka_hesapadsoyad" required="required" value="<?php echo $bankacek['banka_hesapadsoyad'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>




             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banka Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="banka_durum" required>

                  <option value="1" <?php echo $bankacek['banka_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($bankacek['banka_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  


                </select>
              </div>
            </div>
               <input type="hidden" name="banka_id" value="<?php echo $bankacek['banka_id'] ?>">
             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="bankaduzenle" class="btn btn-primary">Düzenle</button>
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
