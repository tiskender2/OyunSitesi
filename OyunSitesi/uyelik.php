<?php

include("db.php");

if(isset($_POST['buton']))
{
$kadi=$_POST['nick'];
$sifre=$_POST['pass'];
$resifre=$_POST['repass'];	
$email=$_POST['email'];
$gender=$_POST['gender'];
$kontrol="select * from uye_tablosu where Eposta='".$email."' and KullaniciAD='".$kadi."'";


}
	session_start();
if(empty($kadi) || empty($sifre) || empty($resifre || empty($email) || empty($gender)))
{
	
	
	
			  echo "1 saniye sonra yönlendiriliyorsunuz...";
			  
	echo '<script> alert("Kullanıcı Bilgilerini Kontrol ediniz..!")	 
	window.location.href = "uyekayit.php";
	</script>';
	
}
else if($sifre!=$resifre)
{

	
			  echo "1 saniye sonra yönlendiriliyorsunuz...";
			  	
				echo '<script> alert("Şifreler Eşleşmiyor Lütfen Kontrol ediniz.")	 
		window.location.href = "uyekayit.php";
	</script>';
}
else if($sonuc=mysqli_query($baglanti,$kontrol))
{
	$sonuc2= mysqli_num_rows($sonuc);
				
	echo $sonuc2;
	if($sonuc2!=0){
		echo '<script> alert("Böyle bir kayıt bulunmaktadir Lütfen Bilgilerinizi güncelleyiniz!")</script>';
		header(" Refresh:1; uyekayit.php");
			  echo "1 saniye sonra yönlendiriliyorsunuz...";
	}
	
	else {
		$sql_kayit="insert into uye_tablosu values('','$kadi','$sifre','$email','$gender','1')";
		if(mysqli_query($baglanti,$sql_kayit))
		{
			
		
			$id=mysqli_insert_id($baglanti);
			$_SESSION["uye"]=$id;
			
			
	
			  echo "1 saniye sonra yönlendiriliyorsunuz...";
			  echo'<script>alert("Kayit İşleminiz Tamamlanmistır.")
			 window.location.href = "index.php";
			</script>';
			 
		}
	}
}

else 
{
	echo '__HATa var';
}
	



?>