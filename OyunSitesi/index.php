<html>
<head>
</head>
<body>
<?php 
include("db.php");
include( "header.php" );	
include( "koyun.php" );
	
if(isset($_SESSION["uye"]))
{
	$id=$_SESSION["uye"];
	$sql=mysqli_query($baglanti,'SELECT KullaniciAD FROM uye_tablosu where KullaniciID='.$id.'');
	$ad=mysqli_fetch_assoc($sql);
	echo'<script>alert("Hoşgeldiniz '.$ad["KullaniciAD"].'")</script>';
}

?>

</body>
</html>