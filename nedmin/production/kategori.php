<?php 
include 'header.php';
$kategorisor=$db->prepare("SELECT * From kategori order by kategori_sira ASC");
$kategorisor->execute();

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Listeleme <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green"> İşlem Başarılı</b> 
              <?php  }
              else if ($_GET['durum']=="no") {?>
                <b style="color:red"> İşlem Başarısız</b> 
              <?php  }?>


            </small></h2>
            
            <div class="clearfix"></div>
           <div align="right"><a href="kategori-ekle.php"><button class="brn btn-success btn-xs"> + Yeni  Ekle</button></a></div>
          </div>
          <div class="x_content">

            <!--Div İçeriğinin Başlangıcı -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20">Sıra No</th>
                  <th>kategori Adı</th>
                  <th>kategori Sıra</th>
                  <th width="80">kategori Durum</th>

                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $say=0; ?>
                <?php 
                
                while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){$say++;?>

                  <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $kategoricek['kategori_ad']; ?></td>
                    <td><?php echo $kategoricek['kategori_sira']; ?></td>
                    <td><center>
                      <?php   
                      if($kategoricek['kategori_durum']==1){?>
                        <button class="btn btn-success btn-xs">Aktif</button>

                        
                      <?php } else { ?>

                        <button class="btn btn-danger btn-xs">Pasif</button>
                      <?php } ?>

                    </center>
                  </td>


                  <td><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><button class="btn btn-primary btn-xs" >Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>&kategorisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

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
