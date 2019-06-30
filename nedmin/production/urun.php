<?php 
include 'header.php';
$urunsor=$db->prepare("SELECT * From urun order by urun_id Desc ");
$urunsor->execute();

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme <small>
              <?php 
              if ($_GET['durum']=="ok") {?>
                <b style="color:green"> İşlem Başarılı</b> 
              <?php  }
              else if ($_GET['durum']=="no") {?>
                <b style="color:red"> İşlem Başarısız</b> 
              <?php  }?>


            </small></h2>
            
            <div class="clearfix"></div>
            <div align="right"><a href="urun-ekle.php"><button class="brn btn-success btn-xs"> + Yeni  Ekle</button></a></div>
          </div>
          <div class="x_content">

            <!--Div İçeriğinin Başlangıcı -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20">Sıra No</th>
                  <th>Ürün Adı</th>
                  <th>Ürün stok</th>
                  <th>Ürün Fiyat</th>
                  <th><center>Resim İşlemleri</center></th>
                  <th width="80">Ürün Durum</th>
                  <th width="80">Öne Çıkar</th>

                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $say=0; ?>
                <?php 
                
                
                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){$say++;?>

                  <tr>
                    <td><center><?php echo $say; ?></center></td>
                    <td><?php echo $uruncek['urun_ad']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $uruncek['urun_stok']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;<?php echo $uruncek['urun_fiyat']; ?></td>
                    <td><center><a href="urun-galeri.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-success btn-xs">Resim Ekle</button></a></center></td>
                    <td><center>
                      <?php   
                      if($uruncek['urun_durum']==1){?>
                       <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urundurumaktifmi=aktif""> <button class="btn btn-success btn-xs">Aktif</button></a>

                        
                      <?php } else { ?>

                        <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urundurumaktifmi=pasif""> <button class="btn btn-danger btn-xs">Pasif</button></a>
                      <?php } ?>

                    </center>
                  </td>
                  <td><center>
                    <?php   
                    $urunon=$uruncek['urun_onecikar'];
                    if($urunon==1){?>
                      <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urunonecikar=evet""><button class="btn btn-success btn-xs">Evet</button></a>


                    <?php } else { ?>

                     <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urunonecikar=hayir""><button class="btn btn-danger btn-xs">Hayır</button></a>

                     <?php } ?>

                   </center>
                 </td>


                 <td><center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-primary btn-xs" >Düzenle</button></a></center></td>
                 <td><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

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
