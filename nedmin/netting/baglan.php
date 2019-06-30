<?php 
try {
	$db=new PDO("mysql:host=localhost;dbname=eticaret;chareset=utf8",'root','12345678');
	//echo "Veritabanı Baglantısı başarılı";
} catch (PDOException $e) {
	
	echo $e->getMessage();
}

 ?>