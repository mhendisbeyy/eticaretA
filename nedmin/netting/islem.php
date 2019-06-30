<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';

if(isset($_POST['admingiris'])){
  $kullanici_mail=$_POST['kullanici_mail'];
  echo "<br>";
  $kullanici_password=md5($_POST['kullanici_password']);

  $kullanicisor=$db->prepare("SELECT * From kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
  $kullanicisor->execute(array(
    'mail'=> $kullanici_mail,
    'password'=>$kullanici_password,
    'yetki'=>5

  ));
  echo $say=$kullanicisor->rowCount();
  if($say==1){
    $_SESSION['kullanici_mail']=$kullanici_mail;
    header("Location:../production/index.php");



  }
  else {
    header("Location:../production/login.php?durum=no");
    exit;
  }


}
//Genel Ayar Kaydet
if(isset($_POST['genelayarkaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("UPDATE ayar SET 
    ayar_title=:ayar_title,
    ayar_description=:ayar_description,
    ayar_keywords=:ayar_keywords,
    ayar_author=:ayar_author
    WHERE ayar_id=0
    ");
  $update=$ayarkaydet->execute(array(
    'ayar_title'=>$_POST['ayar_title'],
    'ayar_description'=>$_POST['ayar_description'],
    'ayar_keywords'=>$_POST['ayar_keywords'],
    'ayar_author'=>$_POST['ayar_author'],
  ));

  if($update)
  {
    header("Location:../production/genel-ayar.php?durum=ok");
  }
  else{
    header("Location:../production/genel-ayar.php?durum=no");
  }
}
//İletişim Ayarları
if(isset($_POST['iletisimayarkaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("UPDATE ayar SET 
    ayar_tel=:ayar_tel,
    ayar_gsm=:ayar_gsm,
    ayar_faks=:ayar_faks,
    ayar_mail=:ayar_mail,
    ayar_ilce=:ayar_ilce,
    ayar_il=:ayar_il,
    ayar_adres=:ayar_adres,
    ayar_mesai=:ayar_mesai
    WHERE ayar_id=0
    ");
  $update=$ayarkaydet->execute(array(
    'ayar_tel'=>$_POST['ayar_tel'],
    'ayar_gsm'=>$_POST['ayar_gsm'],
    'ayar_faks'=>$_POST['ayar_faks'],
    'ayar_mail'=>$_POST['ayar_mail'],
    'ayar_ilce'=>$_POST['ayar_ilce'],
    'ayar_il'=>$_POST['ayar_il'],
    'ayar_adres'=>$_POST['ayar_adres'],
    'ayar_mesai'=>$_POST['ayar_mesai'],
  ));

  if($update)
  {
    header("Location:../production/iletisim-ayar.php?durum=ok");
  }
  else{
    header("Location:../production/iletisim-ayar.php?durum=no");
  }
}
//Api Ayarları
if(isset($_POST['apiayarkaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("UPDATE ayar SET 
    ayar_analiystic=:ayar_analiystic,
    ayar_maps=:ayar_maps,
    ayar_zopim=:ayar_zopim

    WHERE ayar_id=0
    ");
  $update=$ayarkaydet->execute(array(
    'ayar_analiystic'=>$_POST['ayar_analiystic'],
    'ayar_maps'=>$_POST['ayar_maps'],
    'ayar_zopim'=>$_POST['ayar_zopim']

  ));

  if($update)
  {
    header("Location:../production/api-ayar.php?durum=ok");
  }
  else{
    header("Location:../production/api-ayar.php?durum=no");
  }
}
//Sosyal Ayarları
if(isset($_POST['sosyalayarkaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("UPDATE ayar SET 
    ayar_facebook=:ayar_facebook,
    ayar_twitter=:ayar_twitter,
    ayar_youtube=:ayar_youtube,
    ayar_google=:ayar_google

    WHERE ayar_id=0
    ");
  $update=$ayarkaydet->execute(array(
    'ayar_facebook'=>$_POST['ayar_facebook'],
    'ayar_twitter'=>$_POST['ayar_twitter'],
    'ayar_youtube'=>$_POST['ayar_youtube'],
    'ayar_google'=>$_POST['ayar_google']

  ));

  if($update)
  {
    header("Location:../production/sosyal-ayar.php?durum=ok");
  }
  else{
    header("Location:../production/sosyals-ayar.php?durum=no");
  }
}
//Mail Ayarları
if(isset($_POST['mailayarkaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("UPDATE ayar SET 
    ayar_smtphost=:ayar_smtphost,
    ayar_smtpuser=:ayar_smtpuser,
    ayar_smtppassword=:ayar_smtppassword,
    ayar_smtpport=:ayar_smtpport,
    ayar_mail=:ayar_mail

    WHERE ayar_id=0
    ");
  $update=$ayarkaydet->execute(array(
    'ayar_smtphost'=>$_POST['ayar_smtphost'],
    'ayar_smtpuser'=>$_POST['ayar_smtpuser'],
    'ayar_smtppassword'=>$_POST['ayar_smtppassword'],
    'ayar_smtpport'=>$_POST['ayar_smtpport'],
    'ayar_mail'=>$_POST['ayar_mail']

  ));

  if($update)
  {
    header("Location:../production/mail-ayar.php?durum=ok");
  }
  else{
    header("Location:../production/mail-ayar.php?durum=no");
  }
}

//Hakkımızda Ayarları
if(isset($_POST['hakkimizdaayarkaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("UPDATE hakkimizda SET 
    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_icerik=:hakkimizda_icerik,
    hakkimizda_video=:hakkimizda_video,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_misyon=:hakkimizda_misyon

    WHERE hakkimizda_id=0
    ");
  $update=$ayarkaydet->execute(array(
    'hakkimizda_baslik'=>$_POST['hakkimizda_baslik'],
    'hakkimizda_icerik'=>$_POST['hakkimizda_icerik'],
    'hakkimizda_video'=>$_POST['hakkimizda_video'],
    'hakkimizda_vizyon'=>$_POST['hakkimizda_vizyon'],
    'hakkimizda_misyon'=>$_POST['hakkimizda_misyon']

  ));

  if($update)
  {
    header("Location:../production/hakkimizda.php?durum=ok");
  }
  else{
    header("Location:../production/hakkimizda.php?durum=no");
  }
}

//Kullanıcı Düzenleme
if(isset($_POST['kullaniciduzenle'])){
  $kullanici_id=$_POST['kullanici_id'];

  $ayarkaydet=$db->prepare("UPDATE kullanici SET 
    kullanici_tc=:kullanici_tc,
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_durum=:kullanici_durum
    WHERE kullanici_id={$_POST['kullanici_id']}
    ");
  $update=$ayarkaydet->execute(array(
    'kullanici_tc'=>$_POST['kullanici_tc'],
    'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],
    'kullanici_durum'=>$_POST['kullanici_durum'],
  ));

  if($update)
  {
    header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
  }
  else{
    header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
  }
}
//Arayüz Kullanıcıları düzenleme
if(isset($_POST['kullanicibilgiguncelle'])){
  $kullanici_id=$_POST['kullanici_id'];

  $ayarkaydet=$db->prepare("UPDATE kullanici SET 
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_il=:kullanici_il,
    kullanici_ilce=:kullanici_ilce,
    kullanici_gsm=:kullanici_gsm,
    kullanici_adres=:kullanici_adres
    WHERE kullanici_id={$_POST['kullanici_id']}
    ");
  $update=$ayarkaydet->execute(array(
    'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],
    'kullanici_il'=>$_POST['kullanici_il'],
    'kullanici_ilce'=>$_POST['kullanici_ilce'],
    'kullanici_gsm'=>$_POST['kullanici_gsm'],
    'kullanici_adres'=>$_POST['kullanici_adres']
  ));

  if($update)
  {
    header("Location:../../hesabim.php?durum=ok");
  }
  else{
    header("Location:../../hesabim.php?durum=no");
  }
}
// 

//Kullanıcı Silme
if ($_GET['kullanicisil']=="ok"){
  $sil=$db->prepare("DELETE FROM  kullanici where kullanici_id=:id");
  $kontrol=$sil->execute(array(
    'id'=>$_GET['kullanici_id']
  ));

  if ($kontrol)
  {
    header("Location:../production/kullanici.php?sil=ok");
  }
  else{
    header("Location:../production/kullanici.php?sil=no");
  }
}
//Menü Düzenleme
if(isset($_POST['menuduzenle'])){
  $menu_id=$_POST['menu_id'];
  $menu_seourl=seo($_POST['menu_ad']);



  $ayarkaydet=$db->prepare("UPDATE menu SET 
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_detay=:menu_detay,
    menu_durum=:menu_durum
    WHERE menu_id={$_POST['menu_id']}
    ");
  $update=$ayarkaydet->execute(array(
    'menu_ad'=>$_POST['menu_ad'],
    'menu_detay'=>$_POST['menu_detay'],
    'menu_url'=>$_POST['menu_url'],
    'menu_sira'=>$_POST['menu_sira'],
    'menu_seourl'=>$menu_seourl,
    'menu_durum'=>$_POST['menu_durum']
  ));

  if($update)
  {
    header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
  }
  else{
    header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
  }
}
//Menü Silme
if ($_GET['menusil']=="ok"){
  $sil=$db->prepare("DELETE FROM  menu where menu_id=:id");
  $kontrol=$sil->execute(array(
    'id'=>$_GET['menu_id']
  ));

  if ($kontrol)
  {
    header("Location:../production/menu.php?sil=ok");
  }
  else{
    header("Location:../production/menu.php?sil=no");
  }
}
//Menü Kaydetme
if(isset($_POST['menukaydet'])){
  $menu_seourl=seo($_POST['menu_ad']);



  $ayarekle=$db->prepare("INSERT INTO menu SET 
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_sira=:menu_sira,
    menu_seourl=:menu_seourl,
    menu_durum=:menu_durum
    ");

  $insert=$ayarekle->execute(array(
    'menu_ad'=>$_POST['menu_ad'],
    'menu_detay'=>$_POST['menu_detay'],
    'menu_url'=>$_POST['menu_url'],
    'menu_sira'=>$_POST['menu_sira'],
    'menu_seourl'=>$menu_seourl,
    'menu_durum'=>$_POST['menu_durum']
  ));

  if($insert)
  {
    header("Location:../production/menu.php?durum=ok");
  }
  else{
    header("Location:../production/menu.php?durum=no");
  }
}

//Logo Düzenleme

if (isset($_POST['logoduzenle'])) {

  if($_FILES['ayar_logo']['size']>524288){
    echo "dosya boyutut büyük";

    Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");

  }
  else{
     $izinliuzantilar=array('jpg','png','gif');
//echo $_FILES['ayar_logo']["name"];
  echo $ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));

  if (in_array($ext,$izinliuzantilar)===false) {
   Header("Location:../production/genel-ayar.php?durum=uzantiyok");
  }
  else{
     $uploads_dir = '../../dimg';

  @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
  @$name = $_FILES['ayar_logo']["name"];

  $benzersizsayi4=rand(20000,32000);
  $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

  
  $duzenle=$db->prepare("UPDATE ayar SET
    ayar_logo=:logo
    WHERE ayar_id=0");
  $update=$duzenle->execute(array(
    'logo' => $refimgyol
  ));



  if ($update) {

    $resimsilunlink=$_POST['eski_yol'];
    unlink("../../$resimsilunlink");

    Header("Location:../production/genel-ayar.php?durum=ok");

  } else {

    Header("Location:../production/genel-ayar.php?durum=no");
  }
  }
 
  }
 

}
//Slider Resim Ekleme
if (isset($_POST['sliderkaydet'])) {



  $uploads_dir = '../../dimg/slider';

  @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
  @$name = $_FILES['slider_resimyol']["name"];
//resmin isminin benzersiz olması 
  $benzersizsayi1=rand(20000,32000);
  $benzersizsayi2=rand(20000,32000);
  $benzersizsayi3=rand(20000,32000);
  $benzersizsayi4=rand(20000,32000);
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

  
  $kaydet=$db->prepare("INSERT INTO slider SET
    slider_ad=:slider_ad,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_resimyol=:slider_resimyol,
    slider_icerik=:slider_icerik,
    slider_fiyat=:slider_fiyat
    ");
  $insert=$kaydet->execute(array(
    'slider_ad'=>$_POST['slider_ad'],
    'slider_sira'=>$_POST['slider_sira'],
    'slider_link'=>$_POST['slider_link'],
    'slider_icerik'=>$_POST['slider_icerik'],
    'slider_fiyat'=>$_POST['slider_fiyat'],
    'slider_resimyol' => $refimgyol
  ));



  if ($insert) {

    Header("Location:../production/slider.php?durum=ok");

  } else {

    Header("Location:../production/slider.php?durum=no");
  }

}


//Slider resim Düzenleme
// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {


  if($_FILES['slider_resimyol']["size"] > 0)  { 


    $uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $duzenle=$db->prepare("UPDATE slider SET
      slider_ad=:ad,
      slider_link=:link,
      slider_sira=:sira,
      slider_durum=:durum,
      slider_icerik=:icerik,
      slider_fiyat=:fiyat,
      slider_resimyol=:resimyol 
      WHERE slider_id={$_POST['slider_id']}");
    $update=$duzenle->execute(array(
      'ad' => $_POST['slider_ad'],
      'link' => $_POST['slider_link'],
      'sira' => $_POST['slider_sira'],
      'durum' => $_POST['slider_durum'],
      'icerik' => $_POST['slider_icerik'],
      'fiyat' => $_POST['slider_fiyat'],
      'resimyol' => $refimgyol,
    ));
    

    $slider_id=$_POST['slider_id'];

    if ($update) {

      $resimsilunlink=$_POST['slider_resimyol'];
      unlink("../../$resimsilunlink");

      Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

    } else {

      Header("Location:../production/slider-duzenle.php?durum=no");
    }



  } else {

    $duzenle=$db->prepare("UPDATE slider SET
      slider_ad=:ad,
      slider_link=:link,
      slider_sira=:sira,
      slider_durum=:durum,
      slider_icerik=:icerik,
      slider_fiyat=:fiyat  
      WHERE slider_id={$_POST['slider_id']}");
    $update=$duzenle->execute(array(
      'ad' => $_POST['slider_ad'],
      'link' => $_POST['slider_link'],
      'sira' => $_POST['slider_sira'],
      'durum' => $_POST['slider_durum'],
      'icerik' => $_POST['slider_icerik'],
      'fiyat' => $_POST['slider_fiyat'],
    ));

    $slider_id=$_POST['slider_id'];

    if ($update) {

      Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

    } else {

      Header("Location:../production/slider-duzenle.php?durum=no");
    }
  }

}


// Slider Düzenleme Bitiş
//Slider Silme 
if ($_GET['slidersil']=="ok") {

  $sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
  $kontrol=$sil->execute(array(
    'slider_id' => $_GET['slider_id']
  ));

  if ($kontrol) {

    $resimsilunlink=$_GET['slider_resimyol'];
    unlink("../../$resimsilunlink");

    Header("Location:../production/slider.php?durum=ok");

  } else {

    Header("Location:../production/slider.php?durum=no");
  }

}
//Slider Durumu Aktif ve Pasif Yapma
if ($_GET['sliderdurumaktifmi']=="aktif") {

  $kaydet2=$db->prepare("UPDATE slider SET slider_durum=:slider_durum where slider_id=:slider_id");
  $guncelle1=$kaydet2->execute(array(
    'slider_id' => $_GET['slider_id'],
    'slider_durum'=>0
  ));

  if ($guncelle1) {

    Header("Location:../production/slider.php?durum=ok");

  } else {

    Header("Location:../production/slider.php?durum=no");
  }
}
elseif($_GET['sliderdurumaktifmi']=="pasif")
{
  $kaydet2=$db->prepare("UPDATE slider SET slider_durum=:slider_durum where slider_id=:slider_id");
  $guncelle1=$kaydet2->execute(array(
    'slider_id' => $_GET['slider_id'],
    'slider_durum'=>1
  ));

  if ($guncelle1) {

    Header("Location:../production/slider.php?durum=ok");

  } else {

    Header("Location:../production/slider.php?durum=no");
  }
}
//Kullanıcı Kayıt İşlemleri
if (isset($_POST['kullanicikaydet'])) {


  echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
  echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

  echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
  echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";



  if ($kullanici_passwordone==$kullanici_passwordtwo) {


    if (strlen($kullanici_passwordone)>=6) {







// Başlangıç

      $kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
      $kullanicisor->execute(array(
        'mail' => $kullanici_mail
      ));

      //dönen satır sayısını belirtir
      $say=$kullanicisor->rowCount();



      if ($say==0) {

        //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
        $password=md5($kullanici_passwordone);

        $kullanici_yetki=1;

      //Kullanıcı kayıt işlemi yapılıyor...
        $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
          kullanici_adsoyad=:kullanici_adsoyad,
          kullanici_mail=:kullanici_mail,
          kullanici_password=:kullanici_password,
          kullanici_yetki=:kullanici_yetki
          ");
        $insert=$kullanicikaydet->execute(array(
          'kullanici_adsoyad' => $kullanici_adsoyad,
          'kullanici_mail' => $kullanici_mail,
          'kullanici_password' => $password,
          'kullanici_yetki' => $kullanici_yetki
        ));

        if ($insert) {


          header("Location:../../index.php?durum=loginbasarili");


        //Header("Location:../production/genel-ayarlar.php?durum=ok");

        } else {


          header("Location:../../register.php?durum=basarisiz");
        }

      } else {

        header("Location:../../register.php?durum=mukerrerkayit");



      }




    // Bitiş



    } else {


      header("Location:../../register.php?durum=eksiksifre");


    }



  } else {



    header("Location:../../register.php?durum=farklisifre");
  }
  


}
if (isset($_POST['kullanicigiris'])) {



  echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
  echo $kullanici_password=md5($_POST['kullanici_password']); 



  $kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
  $kullanicisor->execute(array(
    'mail' => $kullanici_mail,
    'yetki' => 1,
    'password' => $kullanici_password,
    'durum' => 1
  ));


  $say=$kullanicisor->rowCount();



  if ($say==1) {

    echo $_SESSION['userkullanici_mail']=$kullanici_mail;

    header("Location:../../");
    exit;
    




  } else {


    header("Location:../../?durum=basarisizgiris");

  }


}

//Kategori işlenmleri Başla
if (isset($_POST['kategoriduzenle'])) {

  $kategori_id=$_POST['kategori_id'];
  $kategori_seourl=seo($_POST['kategori_ad']);

  
  $kaydet=$db->prepare("UPDATE kategori SET
    kategori_ad=:ad,
    kategori_durum=:kategori_durum, 
    kategori_seourl=:seourl,
    kategori_sira=:sira
    WHERE kategori_id={$_POST['kategori_id']}");
  $update=$kaydet->execute(array(
    'ad' => $_POST['kategori_ad'],
    'kategori_durum' => $_POST['kategori_durum'],
    'seourl' => $kategori_seourl,
    'sira' => $_POST['kategori_sira']   
  ));

  if ($update) {

    Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

  } else {

    Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
  }

}


if (isset($_POST['kategorikaydet'])) {

  $kategori_seourl=seo($_POST['kategori_ad']);

  $kaydet=$db->prepare("INSERT INTO kategori SET
    kategori_ad=:ad,
    kategori_durum=:kategori_durum, 
    kategori_seourl=:seourl,
    kategori_sira=:sira
    ");
  $insert=$kaydet->execute(array(
    'ad' => $_POST['kategori_ad'],
    'kategori_durum' => $_POST['kategori_durum'],
    'seourl' => $kategori_seourl,
    'sira' => $_POST['kategori_sira']   
  ));

  if ($insert) {

    Header("Location:../production/kategori.php?durum=ok");

  } else {

    Header("Location:../production/kategori.php?durum=no");
  }

}



if ($_GET['kategorisil']=="ok") {

  $sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
  $kontrol=$sil->execute(array(
    'kategori_id' => $_GET['kategori_id']
  ));

  if ($kontrol) {

    Header("Location:../production/kategori.php?durum=ok");

  } else {

    Header("Location:../production/kategori.php?durum=no");
  }

}
//Kategori işlemleri bit

//Ürün Silme İşlemi
if ($_GET['urunsil']=="ok") {

  $sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
  $kontrol=$sil->execute(array(
    'urun_id' => $_GET['urun_id']
  ));

  if ($kontrol) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }
}
//Ürün İşlemleri
/*
if ($_GET['urunsil']=="ok") {
  
  $sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
  $kontrol=$sil->execute(array(
    'urun_id' => $_GET['urun_id']
    ));

  if ($kontrol) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }

}

*/

if (isset($_POST['urunekle'])) {

  $urun_seourl=seo($_POST['urun_ad']);

  $kaydet=$db->prepare("INSERT INTO urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_keyword=:urun_keyword,
    urun_durum=:urun_durum,
    urun_stok=:urun_stok, 
    urun_seourl=:seourl   
    ");
  $insert=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_video' => $_POST['urun_video'],
    'urun_keyword' => $_POST['urun_keyword'],
    'urun_durum' => $_POST['urun_durum'],
    'urun_stok' => $_POST['urun_stok'],
    'seourl' => $urun_seourl

  ));

  if ($insert) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }

}

if (isset($_POST['urunduzenle'])) {

  $urun_id=$_POST['urun_id'];
  $urun_seourl=seo($_POST['urun_ad']);

  $kaydet=$db->prepare("UPDATE urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_keyword=:urun_keyword,
    urun_durum=:urun_durum,
    urun_stok=:urun_stok, 
    urun_onecikar=:urun_onecikar,
    urun_seourl=:seourl   
    WHERE urun_id={$_POST['urun_id']}");
  $update=$kaydet->execute(array(
    'kategori_id' => $_POST['kategori_id'],
    'urun_ad' => $_POST['urun_ad'],
    'urun_detay' => $_POST['urun_detay'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_video' => $_POST['urun_video'],
    'urun_keyword' => $_POST['urun_keyword'],
    'urun_durum' => $_POST['urun_durum'],
    'urun_stok' => $_POST['urun_stok'],
    'urun_onecikar' => $_POST['urun_onecikar'],
    'seourl' => $urun_seourl

  ));

  if ($update) {

    Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");

  } else {

    Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
  }

}


//Ürün İşlemleri



if ($_GET['urunonecikar']=="evet") {

  $kaydet1=$db->prepare("UPDATE urun SET urun_onecikar=:urun_onecikar where urun_id=:urun_id");
  $guncelle=$kaydet1->execute(array(
    'urun_id' => $_GET['urun_id'],
    'urun_onecikar'=>0
  ));

  if ($guncelle) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }
}elseif($_GET['urunonecikar']=="hayir")
{
 $kaydet1=$db->prepare("UPDATE urun SET urun_onecikar=:urun_onecikar where urun_id=:urun_id");
 $guncelle=$kaydet1->execute(array(
  'urun_id' => $_GET['urun_id'],
  'urun_onecikar'=>1
));

 if ($guncelle) {

  Header("Location:../production/urun.php?durum=ok");

} else {

  Header("Location:../production/urun.php?durum=no");
}
}

//
if ($_GET['urundurumaktifmi']=="aktif") {

  $kaydet2=$db->prepare("UPDATE urun SET urun_durum=:urun_durum where urun_id=:urun_id");
  $guncelle1=$kaydet2->execute(array(
    'urun_id' => $_GET['urun_id'],
    'urun_durum'=>0
  ));

  if ($guncelle1) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }
}
elseif($_GET['urundurumaktifmi']=="pasif")
{
  $kaydet2=$db->prepare("UPDATE urun SET urun_durum=:urun_durum where urun_id=:urun_id");
  $guncelle1=$kaydet2->execute(array(
    'urun_id' => $_GET['urun_id'],
    'urun_durum'=>1
  ));

  if ($guncelle1) {

    Header("Location:../production/urun.php?durum=ok");

  } else {

    Header("Location:../production/urun.php?durum=no");
  }
}
//Yorum kaydetme
/*
if(isset($_POST['yorumkaydet'])){

$gelen_url=$_POST['gelen_url'];
  $yorumekle=$db->prepare("INSERT INTO yorum SET 
    yorum_detay=:yorum_detay,
    kullanici_id=:kullanici_id
    ");

  $insert=$yorumekle->execute(array(
    'yorum_detay'=>$_POST['yorum_detay'],
    'kullanici_id'=>$_POST['kullanici_id']
  ));

  if($insert)
  {
    header("Location:$gelen_url?durum=ok");
  }
  else{
    header("Location:$gelen_url?durum=no");
  }
}
*/
//
//YORUM EKLE



if (isset($_POST['yorumekle'])) {



  echo $gelen_url=htmlspecialchars($_SERVER['HTTP_REFERER']);



  echo $gelen_urlok=str_replace('?durum=ok','',$gelen_url);


  $ayarekle=$db->prepare("INSERT INTO yorum SET

    yorum_detay=:yorum_detay,

    kullanici_id=:kullanici_id,

    urun_id=:urun_id,
    yorum_durum=:durum
    ");

  $insert=$ayarekle->execute(array(

    'yorum_detay'=> $_POST['yorum_detay'],

    'kullanici_id'=> $_POST['kullanici_id'],

    'urun_id'=> $_POST['urun_id'],
    'durum'=>0

  ));

  if ($insert) {

    header("Location:$gelen_urlok?durum=ok");

  } else {

    header("Location:$gelen_url?durum=no");

  }

}
//Yorum Onayla
if ($_GET['yorumdurumaktifmi']=="aktif") {

  $kaydet2=$db->prepare("UPDATE yorum SET yorum_durum=:yorum_durum where yorum_id=:yorum_id");
  $guncelle1=$kaydet2->execute(array(
    'yorum_id' => $_GET['yorum_id'],
    'yorum_durum'=>0
  ));

  if ($guncelle1) {

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }
}elseif($_GET['yorumdurumaktifmi']=="pasif")
{
  $kaydet2=$db->prepare("UPDATE yorum SET yorum_durum=:yorum_durum where yorum_id=:yorum_id");
  $guncelle1=$kaydet2->execute(array(
    'yorum_id' => $_GET['yorum_id'],
    'yorum_durum'=>1
  ));

  if ($guncelle1) {

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }
}
//bütün yorum aktif
if ($_GET['butunyorum']=="aktif") {

  $kaydet2=$db->prepare("UPDATE yorum SET yorum_durum=:yorum_durum");
  $guncelle1=$kaydet2->execute(array(
    'yorum_durum'=>1
  ));

  if ($guncelle1) {

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }
}
//Yorum Sil
if ($_GET['yorumsil']=="ok") {

  $sil=$db->prepare("DELETE from yorum where yorum_id=:yorum_id");
  $kontrol=$sil->execute(array(
    'yorum_id' => $_GET['yorum_id']
  ));

  if ($kontrol) {

    Header("Location:../production/yorum.php?durum=ok");

  } else {

    Header("Location:../production/yorum.php?durum=no");
  }

}
//Sepet İşlemleri
if (isset($_POST['sepete_ekle'])) {

 $gelensepetekle_url=htmlspecialchars($_SERVER['HTTP_REFERER']);

 $gelen_urlok=str_replace('?durum=ok','',$gelensepetekle_url);

 $kaydet=$db->prepare("INSERT INTO sepet SET
  urun_adet=:urun_adet,
  kullanici_id=:kullanici_id,
  urun_id=:urun_id
  ");
 $insert=$kaydet->execute(array(
  'urun_adet' => $_POST['urun_adet'],
  'kullanici_id' => $_POST['kullanici_id'],
  'urun_id' => $_POST['urun_id']


));

 if ($insert) {

   header("Location:$gelen_urlok?durumm=ok");

 } else {

  header("Location:$gelen_url?durumm=no");
}
}
//Ürünü Sepetten Sil

if (isset($_POST['sepetsil'])) {
  $kullanici_id=$_POST['kullanici_id'];
  $urun_id=$_POST['urun_id'];
  $sepet_id=$_POST['sepet_id'];

  $gelensepet_url=htmlspecialchars($_SERVER['HTTP_REFERER']);

  $gelen_urlok=str_replace('?durum=ok','',$gelensepet_url);

  $sil=$db->prepare("DELETE from sepet where urun_id=:urun_id and kullanici_id=:kullanici_id and sepet_id=:sepet_id");
  $kontrol=$sil->execute(array(
    'urun_id' => $urun_id,
    'kullanici_id' => $kullanici_id,
    'sepet_id'=>$sepet_id
  ));

  if ($kontrol) {

   header("Location:$gelen_urlok?durum=ok");

 } else {

  header("Location:$gelen_url?durum=no");

}

}

//Banka Kaydetme İşlenleri


if(isset($_POST['bankakaydet'])){

//tablo güncelleme işlemi
  $ayarkaydet=$db->prepare("INSERT INTO banka SET 
    banka_ad=:banka_ad,
    banka_iban=:banka_iban,
    banka_sira=:banka_sira,
    banka_hesapadsoyad=:banka_hesapadsoyad,
    banka_durum=:banka_durum
    ");
  $update=$ayarkaydet->execute(array(
    'banka_ad'=>$_POST['banka_ad'],
    'banka_iban'=>$_POST['banka_iban'],
    'banka_sira'=>$_POST['banka_sira'],
    'banka_hesapadsoyad'=>$_POST['banka_hesapadsoyad'],
    'banka_durum'=>$_POST['banka_durum']
  ));

  if($update)
  {
    header("Location:../production/banka.php?durum=ok");
  }
  else{
    header("Location:../production/banka.php?durum=no");
  }
}

//banka duzenleme
if(isset($_POST['bankaduzenle'])){
  $banka_id=$_POST['banka_id'];

  $ayarkaydet=$db->prepare("UPDATE banka SET 
   banka_ad=:banka_ad,
   banka_iban=:banka_iban,
   banka_sira=:banka_sira,
   banka_hesapadsoyad=:banka_hesapadsoyad,
   banka_durum=:banka_durum
   WHERE banka_id=$banka_id
   ");
  $update=$ayarkaydet->execute(array(
   'banka_ad'=>$_POST['banka_ad'],
   'banka_iban'=>$_POST['banka_iban'],
   'banka_sira'=>$_POST['banka_sira'],
   'banka_hesapadsoyad'=>$_POST['banka_hesapadsoyad'],
   'banka_durum'=>$_POST['banka_durum']
 ));

  if($update)
  {
    header("Location:../production/banka.php?banka_id=$banka_id&durum=ok");
  }
  else{
    header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
  }
}
//banka HizliPasif Aktif etme
if ($_GET['bankadurumaktifmi']=="aktif") {

  $kaydet2=$db->prepare("UPDATE banka SET banka_durum=:banka_durum where banka_id=:banka_id");
  $guncelle1=$kaydet2->execute(array(
    'banka_id' => $_GET['banka_id'],
    'banka_durum'=>0
  ));

  if ($guncelle1) {

    Header("Location:../production/banka.php?durum=ok");

  } else {

    Header("Location:../production/banka.php?durum=no");
  }
}
elseif($_GET['bankadurumaktifmi']=="pasif")
{
  $kaydet2=$db->prepare("UPDATE banka SET banka_durum=:banka_durum where banka_id=:banka_id");
  $guncelle1=$kaydet2->execute(array(
    'banka_id' => $_GET['banka_id'],
    'banka_durum'=>1
  ));

  if ($guncelle1) {

    Header("Location:../production/banka.php?durum=ok");

  } else {

    Header("Location:../production/banka.php?durum=no");
  }
}

//Banka Silme İşlemleri
if ($_GET['bankasil']=="ok"){
  $sil=$db->prepare("DELETE FROM  banka where banka_id=:id");
  $kontrol=$sil->execute(array(
    'id'=>$_GET['banka_id']
  ));

  if ($kontrol)
  {
    header("Location:../production/banka.php?sil=ok");
  }
  else{
    header("Location:../production/banka.php?sil=no");
  }
}

//Kullanıcı Şifre Güncelleme İşlemleri
if (isset($_POST['kullanicisifreguncelle'])) {

  echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
  echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
  echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

  $kullanici_password=md5($kullanici_eskipassword);


  $kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
  $kullanicisor->execute(array(
    'password' => $kullanici_password
  ));

      //dönen satır sayısını belirtir
  $say=$kullanicisor->rowCount();



  if ($say==0) {

    header("Location:../../sifre-guncelle?durum=eskisifrehata");



  } else {



  //eski şifre doğruysa başla


    if (($kullanici_passwordone==$kullanici_passwordtwo) and ($kullanici_passwordone==$kullanici_eskipassword)) {



      header("Location:../../sifre-guncelle.php?durum=eskisifre");




    // Bitiş



    } elseif($kullanici_passwordone==$kullanici_passwordtwo){
     if (strlen($kullanici_passwordone)>=6) {


        //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
      $password=md5($kullanici_passwordone);

      $kullanici_yetki=1;

      $kullanicikaydet=$db->prepare("UPDATE kullanici SET
        kullanici_password=:kullanici_password
        WHERE kullanici_id={$_POST['kullanici_id']}");


      $insert=$kullanicikaydet->execute(array(
        'kullanici_password' => $password
      ));

      if ($insert) {


        header("Location:../../sifre-guncelle.php?durum=sifredegisti");


        //Header("Location:../production/genel-ayarlar.php?durum=ok");

      } else {


        header("Location:../../sifre-guncelle.php?durum=no");
      }

    }


    else {


      header("Location:../../sifre-guncelle.php?durum=eksiksifre");


    }



  } else {

    header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

    exit;


  }


}

exit;

if ($update) {

  header("Location:../../sifre-guncelle?durum=ok");

} else {

  header("Location:../../sifre-guncelle?durum=no");
}

}



//Sipariş Ekle

if(isset($_POST['bankasiparisekle'])){
  //banka sor
  $banka_id=$_POST['banka_idd'];
  $bankasor=$db->prepare("SELECT * From banka where banka_id=:banka_id");
  $bankasor->execute(array(
    'banka_id'=>$banka_id
  ));
  $bankacek=$bankasor->fetch(PDO::FETCH_ASSOC);
    //

  $siparis_banka=$bankacek['banka_ad'];
  $siparis_tip="Banka Havalesi";


  $kaydet=$db->prepare("INSERT INTO siparis SET 
    kullanici_id=:kullanici_id,
    siparis_tip=:siparis_tip,
    siparis_banka=:siparis_banka,
    siparis_toplam=:siparis_toplam
    ");

  $insert=$kaydet->execute(array(
    'kullanici_id'=>$_POST['kullanici_id'],
    'siparis_tip'=>$siparis_tip,
    'siparis_banka'=>$siparis_banka,
    'siparis_toplam'=>$_POST['siparis_toplam']
  ));

  if($insert)
  {
    //Sipariş Kaydedilirse
    $siparis_id=$db->lastInsertId();
    echo "<hr>";


    $kullanici_id=$_POST['kullanici_id'];
    $sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
    $sepetsor->execute(array(
      'id'=>$kullanici_id
    ));

    while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){
     $urun_id=$sepetcek['urun_id'];
     $urun_adet=$sepetcek['urun_adet'];

     $urunsor=$db->prepare("SELECT * From urun where urun_id=:urun_id");
     $urunsor->execute(array(
      'urun_id'=>$urun_id
    ));
     $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
     echo $urun_fiyat=$uruncek['urun_fiyat'];

     $kaydet=$db->prepare("INSERT INTO siparis_detay SET 
      siparis_id=:siparis_id,
      urun_id=:urun_id,
      urun_fiyat=:urun_fiyat,
      urun_adet=:urun_adet

      ");

     $insert=$kaydet->execute(array(
      'siparis_id'=>$siparis_id,
      'urun_id'=>$urun_id,
      'urun_fiyat'=>$urun_fiyat,
      'urun_adet'=>$urun_adet     
    ));
   }
   if($insert)
    //Sipariş Kayıtda Başarılı İse Sepeti Boşalt
    $sil=$db->prepare("DELETE FROM sepet where kullanici_id=:kullanici_id ");
  $kontrol=$sil->execute(array(
    'kullanici_id'=>$kullanici_id
  ));

  header("Location:../../siparislerim.php?durum=ok");

      //
}
else{
  header("Location:../../odeme.php?durum=no");
}
}
//Seçilen Ürün Fotograflarını Silme
if(isset($_POST['urunfotosil'])){

  $urun_id=$_POST['urun_id'];
  echo $checklist=$_POST['urunfotosec'];

  foreach ($checklist as $list ) {
    $sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
    $kontrol=$sil->execute(array(
      'urunfoto_id'=>$list
    ));
  }
  if ($kontrol) {
    header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");
  }else{
    header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
  }
}

//Seçilen Ürün Fotograflarını Silme

?>

