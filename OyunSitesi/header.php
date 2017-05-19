<?php
include("db.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/>
<link href="css/header.css" type="text/css" rel="Stylesheet"/>
</head>
<body>
<div id="header">
<?php
session_start();

if(isset($_SESSION["uye"])){
	$sql=mysqli_query($baglanti,"select KullaniciAD from uye_tablosu where KullaniciID=".$_SESSION["uye"]."");
	$cek=mysqli_fetch_array($sql);
	
	if($cek['KullaniciAD']=="admin")
	{
		echo '<div class="uyegir"><div class="uyegir2"><a href="admin.php"><input type="submit" name="adminpanel" value="Panel" style="    height: 40%;
    width: 40%;
    float: right;" ><a/><form action="uyegiris.php" method="POST">
			
			<input type="submit" name="butonCikis" value="Çıkış" class="buton" ></form></div></div>';
	}
	else{
		
	
	echo '<div class="uyegir"><div class="uyegir2"><form action="uyegiris.php" method="POST">
	<input type="submit" name="butonCikis" value="Çıkış" class="buton" ></form></div></div>';}
}
else{
	echo '
	<div class="uyegir">
		<div class="uyetexts">
			<div class="yazılar">
			<span>Kullanıcı Adı : </span>
			</div>
			<div class="yazılar">
			 <span>Şifre        :</span>
			</div>
			
		</div>
		<div class="uyegir2">
		
			<form action="uyegiris.php?oyunId='.@$_GET['id'].'" method="POST">
			     
                <div>
                   <input type="text" name="nick" class="text">
                </div>
                <div>
                   <input type="password" name="pass" class="text">
                </div>
                <input type="submit" name="buton" value="Giriş" class="buton" >
        
			
			
			
			</form>
		
		
		</div>	
			
	</div>';
}
 ?>
	<div id="headerorta">
		<a href="index.php">
		<div id="headericon" >
		</div></a>
		<div id="sag">
		<div id="headerust">
			<div class="ustsol"></div>
			<div class="ustsag">
				<div class="ara">
					<div class="yazı">
					<header>Online ücretsiz oyunlar oyna!</header>
					</div>
					<div class="search">
							<form action="oyunkatogeriler.php" method="post">
							<div id="input"><input type="submit" value="Ara" name="ara" style="float:left"></div>
							<div class="arabar">
							
							<input type="text" name="veri">
							
							
							<a title="Oyun Ara" class="araSubmit"><span class="icon"></span></a>
							</form>
						</div>
					
						
						
						</div>
					</div>
				</div>
				<?php
				
				

						if(isset($_SESSION["uye"])){
								$sql=mysqli_query($baglanti,'SELECT KullaniciAD FROM uye_tablosu where KullaniciID='.$_SESSION["uye"].'');
								$ad=mysqli_fetch_assoc($sql);
							echo '	<div class="uye">
					<div class="uyebuton">
					
					</div>
					
					<div class="uyetext" >
						
						<p>Hoşgeldiniz '.$ad["KullaniciAD"].'</p>
					</div>
					</a>
				
				</div>';
						}
						else{
						echo'	<div class="uye">
					<div class="uyebuton">
					
					</div>
					<a href="uyekayit.php">
					<div class="uyetext" >
						
						<p>Üye ol</p>
					</div>
					</a>
				
				</div>';
						}
				?>
				
			
			</div>
		
		
		<div id="headeralt">
			<div class="butonlar">
				
				
					
				
						<?php
						$baglanti = @mysqli_connect('localhost', 'root', '','kraloyun');
							$cek=mysqli_query($baglanti,"select * from kategoriler");
							while($yaz=mysqli_fetch_array($cek))
							{	
									if($yaz['KategoriID']=="2"){
									echo'<a href="index.php"><div class="oyunbutonlar"><header>'.$yaz['KategoriADI'].'</header></div></a>';}
									else
									{
									echo'<a href="oyunkatogeriler.php?kid='.$yaz['KategoriID'].'"><div class="oyunbutonlar"><header>'.$yaz['KategoriADI'].'</header></div></a>';	
									}
							}
						
				
						?>
				
					
					
				
			
			
			</div>
		
		
		</div>
		</div>
		</div>
	
    
	  		    
			
		
		
		
		
	
	
	
	



	
	</div>

</div>
</body>
</html>
