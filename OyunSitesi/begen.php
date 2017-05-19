<?php
include("db.php");
session_start();
$kulid=$_SESSION["uye"];
if(isset($_POST['begenbtn']))
{
$konuid=$_POST['konuid'];
$yorumid=$_POST['yorumid'];

$sql=mysqli_query($baglanti,"select * from begeniler");
		$sayac="0";
		
		while($cek=mysqli_fetch_array($sql)){
			$gelbegenid=$cek['BegeniID'];
			$gelkulid=$cek['KullaniciID'];
			$gelyorumid=$cek['YorumID'];
			
		if($kulid==$gelkulid  && $yorumid==$gelyorumid)
		{
			$sayac++;
			 
			break;
		}
		
		
			
		}
		
			
		if($sayac=="0")
		{
			$sql=mysqli_query($baglanti,"insert into begeniler values('','$yorumid','$kulid')");	
			$sqlyorumbegen= mysqli_query($baglanti,"update yorumlar set Begenisayi=Begenisayi+1 , B_Durum='Begendin' where yorumID=".$yorumid."");
			
			echo'<script>alert("Başarıyla Beğendiniz ")
			window.location.href = "oyunsayfa.php?id='.$konuid.'"</script>';
		}
		else
		{
			$sql=mysqli_query($baglanti,"DELETE FROM `begeniler` WHERE `BegeniID`='".$gelbegenid."' AND `KullaniciID`='".$kulid."'");
			$sql2=mysqli_query($baglanti,"update `yorumlar` set Begenisayi = Begenisayi-1 , B_Durum='Begen' where yorumID=".$yorumid."");
			
			if($sql && $sql2)
				echo'<script>alert("Begenmekten vazgeçtiniz!")
			window.location.href = "oyunsayfa.php?id='.$konuid.'"</script>';
		}

}

?>