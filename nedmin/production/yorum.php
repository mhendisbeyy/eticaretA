<?php 
include 'header.php';
$yorumsor=$db->prepare("SELECT * From yorum order by yorum_id Desc ");
$yorumsor->execute();



?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Listeleme <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green"> İşlem Başarılı</b> 
              <?php  }
              else if ($_GET['durum']=="no") {?>
                <b style="color:red"> İşlem Başarısız</b> 
              <?php  }?>


            </small></h2>
            
            <div class="clearfix"></div>
            <div align="right">
             <a href="../netting/islem.php?butunyorum=aktif"><button class="btn btn-success btn-xs">Tüm Yorumları Aktif Et</button></a></div>
            
          <div class="x_content">

            <!--Div İçeriğinin Başlangıcı -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20">Sıra No</th>
                  <th>Ürün Adı</th>
                  <th>Kullanici Adı</th>
                  <th>Yorum Detay</th>
                  <th width="80">Yorum Durum</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $say=0; ?>
                <?php 
                
                
                while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)){$say++;?>
                  <?php 
                  $kullanici_id=$yorumcek['kullanici_id'];


                  $kullaniciysor=$db->prepare("SELECT * From kullanici where kullanici_id=:id");
                  $kullaniciysor->execute(array(
                    'id'=>$kullanici_id
                  ));
                  $kullaniciycek=$kullaniciysor->fetch(PDO::FETCH_ASSOC);
                  //
                  $urun_id=$yorumcek['urun_id'];
                  $urunysor=$db->prepare("SELECT * From urun where urun_id=:id");
                  $urunysor->execute(array(
                    'id'=>$urun_id
                  ));
                  $urunycek=$urunysor->fetch(PDO::FETCH_ASSOC);

                  ?>
                  <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $urunycek['urun_ad'] ?></td>
                    <td><?php echo $kullaniciycek['kullanici_adsoyad'] ?></td>
                    <td><?php echo substr($yorumcek['yorum_detay'],0,50); ?></td>  
                    <td><center>
                      <?php   
                      if($yorumcek['yorum_durum']==1){?>
                       <a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorumdurumaktifmi=aktif"> <button class="btn btn-success btn-xs">Aktif</button></a>


                     <?php } else { ?>

                      <a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorumdurumaktifmi=pasif"> <button class="btn btn-danger btn-xs">Pasif</button></a>
                    <?php } ?>

                  </center>
                </td>

                <td><center><a href="yorum-duzenle.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>"><button class="btn btn-primary btn-xs" >Yorumun Tamamını Oku</button></a></center></td>

                <td><center><a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorumsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

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
