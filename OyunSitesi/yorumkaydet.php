<?php
include("db.php");
session_start();
$kulid=$_SESSION["uye"];
if(isset($_POST['yorumbuton']))
{
$yorum = $_POST['yorumarea'];
$konuid= $_POST['konuid'];

if(!empty($yorum))
{
	$sql=mysqli_query($baglanti,"insert into yorumlar values('','$konuid','$kulid','$yorum','0','Begen')");
	echo '<script>
	window.location.href = "oyunsayfa.php?id='.$_GET["id"].'" </script>';	
}
else
{
	echo '<script>alert("Boş yorum Atmayınız!")
	window.location.href = "oyunsayfa.php?id='.$_GET["id"].'" </script>';			

		
	
}

}

?>