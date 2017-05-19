<?php

include("db.php");
	session_start();

if(isset($_POST['buton']) && !empty($_POST['nick'] )&& !empty($_POST['pass']))
{

$gelad=$_POST["nick"];
$gelpass=$_POST["pass"];

$sql=@mysqli_query($baglanti, "SELECT * FROM uye_tablosu WHERE KullaniciAD='".$gelad."' and Sifre='".$gelpass."'")or die(mysqli_error());

if($yaz=mysqli_fetch_array($sql))
{
  echo '<script> alert("Giriş Başarılı..")</script>';
   $id=mysqli_fetch_assoc($sql);
	$_SESSION["uye"]=$yaz['KullaniciID'];
		
	
	if(@$_GET["oyunId"])
			echo'<script>window.location.href ="oyunsayfa.php?id='.$_GET["oyunId"].'"</script>';
	else if(@$_GET["kid"])
	{
		echo'<script>window.location.href ="oyunkatogeriler.php?kid='.$_GET["kid"].'</script>';
	}
	else if($yaz['KullaniciTip']==2)
	{
		$_SESSION["admin"]="true";
		echo'<script>window.location.href = "admin.php"</script>';
	}
	else
	echo'<script>window.location.href = "index.php"</script>';
  
 
}
	else{
		echo '<script> alert("Kullanıcı Adınızı veya Şifrenizi Yanlış Girdiniz")
		window.location.href = "index.php"</script>';
		
 }
 		
	}

else if( isset($_POST['buton']) && empty($_POST["nick"]) || empty($_POST["pass"]) && !isset($_POST["butonCikis"]))
{
	  echo '<script> alert("Boş alanları doldurunuz")
		window.location.href = "index.php" </script>';
	  
	  
}


else if(isset($_POST["butonCikis"])){
	session_destroy();

 echo '<script>
	window.location.href = "index.php" </script>';
}



?>