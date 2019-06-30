<?php 
include 'header.php';
$bankasor=$db->prepare("SELECT * From banka order by banka_sira ASC");
$bankasor->execute();

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kanka Listeleme <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green"> İşlem Başarılı</b> 
              <?php  }
              else if ($_GET['durum']=="no") {?>
                <b style="color:red"> İşlem Başarısız</b> 
              <?php  }?>


            </small></h2>
            
            <div class="clearfix"></div>
           <div align="right"><a href="banka-ekle.php"><button class="brn btn-success btn-xs"> + Yeni  Ekle</button></a></div>
          </div>
          <div class="x_content">

            <!--Div İçeriğinin Başlangıcı -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20">Sıra No</th>
                  <th>Banka Adı</th>
                  <th>Banka IBAN</th>
                  <th>Banka Sıra</th>
                  <th>Hesap Adı Soyadı</th>
                  <th width="80">Banka Durum</th>

                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $say=0; ?>
                <?php 
                
                while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)){$say++;?>

                  <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $bankacek['banka_ad']; ?></td>
                    <td><?php echo $bankacek['banka_iban']; ?></td>
                    <td><?php echo $bankacek['banka_sira']; ?></td>
                    <td><?php echo $bankacek['banka_hesapadsoyad']; ?></td>
                    <td><center>
                      <?php   
                      if($bankacek['banka_durum']==1){?>
                        <a href="../netting/islem.php?banka_id=<?php echo $bankacek['banka_id'] ?>&bankadurumaktifmi=aktif">
                        <button class="btn btn-success btn-xs">Aktif</button></a>

                        
                      <?php } else { ?>

                        <a href="../netting/islem.php?banka_id=<?php echo $bankacek['banka_id'] ?>&bankadurumaktifmi=pasif"><button class="btn btn-danger btn-xs">Pasif</button></a>
                      <?php } ?>

                    </center>
                  </td>


                  <td><center><a href="banka-duzenle.php?banka_id=<?php echo $bankacek['banka_id'] ?>"><button class="btn btn-primary btn-xs" >Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?banka_id=<?php echo $bankacek['banka_id'] ?>&bankasil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

                </tr>




              <?php } ?>

            </tbody>
          </table>

          <!--Div İçeriğinin Bitişi -->
        </div>
      </div>
    </div>
  </div>


</div>
</div>

<?php 
include 'footer.php'; ?>
