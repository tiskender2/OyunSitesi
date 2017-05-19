
<?php
include("db.php");
session_start();
if(!isset($_SESSION["admin"])){
echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
}
else
{
	if ( isset($_POST['sil']) )
   {
	$sil=$_POST['kid'];
	$sorgu="DELETE FROM uye_tablosu WHERE KullaniciID=$sil";
	$sql=mysqli_query($baglanti,$sorgu);
	echo '<script> alert("Kullanıcı Başarıyla Silindi")</script>';	 
   }
   else if ( isset($_POST['guncelle']) ){
     $kid=$_POST['kid'];
	 $kad=$_POST['kad'];
	 $sifre=$_POST['sifre'];
	 $eposta=$_POST['eposta'];
	 $cinsiyet=$_POST['cinsiyet'];
	 $ktip=$_POST['ktip'];
	 $sorgu="update  uye_tablosu set KullaniciAD='$kad', Sifre='$sifre' , Eposta='$eposta' , Cinsiyet='$cinsiyet' , KullaniciTip='$ktip' where KullaniciID='$kid' ";
	 $sql=mysqli_query($baglanti,$sorgu);
	 	echo '<script> alert("Güncelleme Başarılı")</script>';	 
   }
   else if ( isset($_POST['kaydet']) )
   {
	 $isim=$_POST['isim'];
	 $resim=$_POST['resim'];
	 $link=$_POST['link'];
	 $kategori=$_POST['kategori'];
	 $detay=$_POST['detay'];
	 $tip=$_POST['tip'];
	 
	 $sorgu="insert into icerikler values('','$isim','$kategori','$resim','$detay','$tip','$link')";
	 $sql=mysqli_query($baglanti,$sorgu);
	 echo '<script> alert("Oyun Başarıyla Eklendi")</script>';	 
	   
   }
     else if ( isset($_POST['yorumsil']) )
   {
	
	 $sil=$_POST['kid'];
	 $sorgu="DELETE FROM yorumlar WHERE yorumID=$sil";
	 $sql=mysqli_query($baglanti,$sorgu);
	 echo '<script> alert("Yorum Başarıyla Silindi")</script>';	 
	   
   }
  

	echo'<html>
<head>
<title>  Tiskender2 Admin Panel   </title>
<link href="css/admin.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="game">
	<div id="game3">

		<div class="menu1"><h3>Oyun Ekle</h3></div>
		<div class="menu2"><h3>Kullanıcı Liste</h3></div>
		<div class="menu2"><h3>Yorum Liste</h3></div>
		<a href="index.php"><input type="button" value="AnaSayfa"></a>
	</div>
	
	<div id="game4">';
	
	$sql = "SELECT * FROM uye_tablosu "; 
$result = mysqli_query($baglanti,$sql); 


echo'<table><tr><th>K_id</th><th>K_Ad</th><th>Sifre</th><th>Eposta</th><th>Cinsiyet</th><th>K_Tip</th></tr>';
while ($cek = mysqli_fetch_array($result)) { 
                
echo'<form action="admin.php" method="post"><tr><td><label> '.$cek["KullaniciID"].' </label></td>
	<input type="hidden" name="kid" value="'.$cek["KullaniciID"].'"/>
	<td><input type="text" value="'.$cek["KullaniciAD"].'" name="kad"/></td>
	<td><input type="text" value="'.$cek["Sifre"].'" name="sifre"/></td>
	<td><input type="text" value="'.$cek["Eposta"].'" name="eposta"/></td>
	<td><input type="text" value="'.$cek["Cinsiyet"].'" name="cinsiyet"/></td>
	<td><input type="text" value="'.$cek["KullaniciTip"].'" name="ktip"/></td>
	<td><input type="submit" value="Ban" name="sil"/></td>
	<td><input type="submit" value="Güncelle" name="guncelle"/></td>
	<td><input type="submit" value="Yorumlar" name="yorum"/></td></tr></form>';
                                     
};
	echo'</table>
	</div>
	<div id="game2">
	<table><form action="admin.php" method="post">
	<tr>
		<td><div class="textadi"><div class="isim">Oyun İsim</div> <div class="text"> <input  type="text" name="isim"></div></div></td>
		</tr>
		<tr>
		<td><div class="textadi"><div class="isim">Oyun Resim</div> <div class="text"> <input  type="text" name="resim"></div></div></td>
		</tr>
	
		<tr><td><div class="textadi">Oyun Link <div class="text"><input type="text" name="link"></div></div></td></tr>
			<tr><td><div class="textadi">Oyun Kategori <div class="text1" ><select name="kategori">';
$sql = "SELECT * FROM kategoriler  ORDER BY KategoriADI desc LIMIT 8"; 
$result = mysqli_query($baglanti,$sql); 



while ($rand = mysqli_fetch_array($result)) { 
              
			
                echo "<option value=\"$rand[KategoriID]\">$rand[KategoriADI]</option>";                               
}; echo'</select> </div></div></td></tr>
<tr><td><div class="textadi">Oyun Detay <div class="text1" ><select name="detay">';
$sql = "SELECT * FROM icerikler  ORDER BY icerikDetay"; 
$result = mysqli_query($baglanti,$sql); 
while ($rand = mysqli_fetch_array($result)) { 
                echo "<option value=\"$rand[icerikDetay]\">$rand[icerikDetay]</option>";                               
}; echo'</select> </div></div></td></tr>
<tr><td><div class="textadi">Oyun Tipi <div class="text1" ><select name="tip">';
                echo '"<option value="1">Normal</option>"                             
					"<option value="2">Online</option>"                               
					"<option value="3">Tarayıcı Web</option>"';                              
echo'</select> </div></div></td></tr>
		<tr><td><div id="btn"><input type="submit" value="Kaydet" name="kaydet"/></div></td></tr>
		
		<tr><td><div ><option type="submit" value="1"></option></div></td></tr>
	</form></table>
	</div>';
	if ( isset($_POST['yorum']) )
   {
	  $kid=$_POST['kid'];
	  $sorgu="select * from yorumlar inner join uye_tablosu on yorumlar.KullaniciID=uye_tablosu.KullaniciID where  yorumlar.KullaniciID=$kid";
	 $sql=mysqli_query($baglanti,$sorgu);
	 
	echo'
	<div class="game6">';  
    $toplam=0;
	while($cek=mysqli_fetch_array($sql)){
		if($toplam<1){
		echo'<table><tr><th>'.$cek['KullaniciAD'].'  yorumlar</th></tr>';}
		
		echo'
		<form action="admin.php" method="post"><tr><td><label>'.$cek['Yorum'].'</label></td>
		<input type="hidden" name="kid" value="'.$cek["yorumID"].'"/>
		<td><input type="submit" value="Sil" name="yorumsil"/></td>
		</form>';
		$toplam++;
		}
		$toplam=0;
	echo'
		</table>

	



   </div>';}
   
echo'</div>

</body>
</html>';}

?>