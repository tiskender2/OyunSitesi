<?php
include("db.php");
?>
<html>
<head>
 <link href="css/anasayfa.css" media="screen, print" rel="Stylesheet" type="text/css" /> 
</head>
<body style="background-color: gray;">
<div id="main">
    <div id="mainorta">
	    <div id="mainust">
			<div id="mainsol">
				<div id="solic">
					<div id="solicust">
						<div class="ustdiv">
							<header>En İyi Son Eklenen Oyunlar</header>
						
						</div>
						<div class="ustorta">
						<?php
						
						$baglanti=@mysqli_connect('localhost','root','','kraloyun');
						
							$cek=mysqli_query($baglanti,"select * from kategoriler inner join icerikler on icerikler.KategoriID=kategoriler.KategoriID order by IcerikID desc LIMIT 6");
							
							while($yaz=mysqli_fetch_array($cek))
							{
								
								
							echo '
							<a href="oyunsayfa.php?id='.$yaz['IcerikID'].'">
							
							<div class="goyun">
								<div class="goyunust"><img  style="width:100%; height:100%;" src="'.$yaz['IcerikRESIM'].'"></img>
								
								</div>
								<div class="goyunalt" >
									<h4>'.$yaz['icerikADI'].'</h4>
									<div class="alt_katogeri">
									<header>'.$yaz['KategoriADI'].'</header>
									</div>
								</div>
							
							</div> </a>';
							}
							?>
							
						</div>
						<div class="ustalt">
							<div class="metin">
							<a>   Diğer en iyi oyunları oyna</a>
							</div>
						
						</div>
					
					</div>
					
					<div id="altsol">
						<div class="solust">
					      <div class="ustdiv">
							<header>Online Oyun Önerileri</header>
						
						</div>
						
						</div>
						<div class="solorta">
							<?php
								$baglanti=mysqli_connect('localhost', 'root','','kraloyun');
								$cek=mysqli_query($baglanti,"SELECT * FROM `icerikler` INNER JOIN kategoriler on icerikler.KategoriID=kategoriler.KategoriID WHERE Oyuntipi=2");
						
								while($yaz=mysqli_fetch_array($cek)){
									
							echo '
							<a href="oyunsayfa.php?id='.$yaz['IcerikID'].'">	
							<div class="goyun">
								<div class="goyunust" > <img style="width:100%;  height:100%;" src='.$yaz['IcerikRESIM'].'></img>
								
								</div>
								<div class="goyunalt2"> <strong> '.$yaz['icerikADI'].'</strong>
								
								</div>
								<div class="alt_katogeri"> <header>'.$yaz['KategoriADI'].'</header></div>
							
								</div></a>';}
							?>
							
							
						</div>
						<div class="solalt">
						<div class="metin">
							<a>   Diğer oyun önerileri</a>
							</div>
						
						</div>
						
					
					</div>
					
					<div id="altsag">
						<div class="sagust">
							<div class="ustdiv">
								<header>Hergün Eklenen Ücretsiz Online Oyunlar!</header>
							</div>
						
						</div>
						<div class="sagorta">
							<?php
								$baglanti=mysqli_connect('localhost', 'root','','kraloyun');
								$cek=mysqli_query($baglanti,"SELECT * FROM `icerikler` INNER JOIN kategoriler on icerikler.KategoriID=kategoriler.KategoriID WHERE Oyuntipi=2 order by IcerikID DESC LIMIT 5 ");
								while($yaz=mysqli_fetch_array($cek))
								{
								echo '	<a href="oyunsayfa.php?id='.$yaz['IcerikID'].'">
								<div class="goyun">
								<div class="goyunust2">
									<img src='.$yaz['IcerikRESIM'].' style="width:100%; height:50%;"></img>
								</div>
								<div class="goyunalt3	">
									<strong> '.$yaz['icerikADI'].'</strong>
								</div>
								<div class="alt_katogeri2"> <header>'.$yaz['KategoriADI'].'</header></div>
							
								</div></a>';}
							?>
						
						</div>
						<div class="sagalt">
						
						<div class="metin3">
							<a>   Diğer yeni oyunları oyna</a>
							</div>
						</div>
						
					
					</div>
				
				</div>
			
			</div>
			<div id="mainsag">
				<div id="kainsag">
				<div class="mainsagust">
					<header>Tarayıcı Web Oyunları</header>
				
				</div>
				<div class="mainsagalt">
				<?php
						$baglanti=mysqli_connect('localhost', 'root'  , '' , 'kraloyun');
						$cek=mysqli_query( $baglanti,"SELECT * FROM `icerikler` INNER JOIN kategoriler on icerikler.KategoriID=kategoriler.KategoriID WHERE Oyuntipi=3 LIMIT 8");
								while($yaz=mysqli_fetch_array($cek)){
						echo '<div  class="mainsagaltic">
						
						<a href="oyunsayfa.php?id='.$yaz['IcerikID'].'">
							<div class="sagicoyunresim">
								<img src='.$yaz['IcerikRESIM'].' "></img>
							</div>
							<div class="sagicoyunad">
							 <strong> '.$yaz['icerikADI'].' </strong>
							
							</div>
							<div class="sagicoyunad2">
							<header>'.$yaz['KategoriADI'].'</header>
							
							</div>
		
						
							</div></a>';}	?>
						
				
				</div>
			</div>
			</div>
		
		</div>
		<div id="mainalt">
			<div class="mainaltust">
				<?php 
				$baglanti = @mysqli_connect('localhost', 'root', '','kraloyun');
							$cek=mysqli_query($baglanti,"select * from kategoriler where not KategoriID=2 and not KategoriID=3");
							
							
							
						
							while($yaz=mysqli_fetch_array($cek))
							{
								$cek3=mysqli_query($baglanti,"select * from icerikler where KategoriID=".$yaz['KategoriID']." ORDER BY IcerikID DESC LIMIT 3");
								$cek4=mysqli_query($baglanti,"select * from icerikler where KategoriID=" .$yaz['KategoriID']." limit 5");
							
			       
				echo '<div class="oyun">
					<div class="oyunust">
							
						<header> '.$yaz['KategoriADI'].'</header>
						
					</div>
					<div class="oyunoyun">
						
						<div class="resim">
						<img src="'.$yaz['Kategori_resim'].'" style="width: 100%; height: 100%;"></img>
    
						</div>
						<div class="oyunresim">
							';
							while($yaz2=mysqli_fetch_array($cek3))
							{
							echo '	
							<a href="oyunsayfa.php?id='.$yaz2['IcerikID'].'">
							<div>
							<div class="resimoyun" style="cursor:pointer;">
						<img src="'.$yaz2['IcerikRESIM'].'" style="width: 100%; height: 100%;"></img>
    
							</div>
							<div class="resimyazi" style="cursor:pointer;"> <h3>'.$yaz2['icerikADI'].'</h3></div>
							</div></a>';
							}
							echo '
						
						</div>
					
					</div>
						<div class="oyuntext">';
						
						while($yaz3=mysqli_fetch_array($cek4))
						{
						echo '
						<div class="oyunisimler" style="    background: rgba(76, 175, 80, 0.19); cursor:pointer;" > <h3>'.$yaz3['icerikDetay'].'</h3> </div>';
						}
					echo '
					</div>
				
							</div>';}
					
				?>
			
				
				
				
				<div class="mainaltaltalt">
				
				
				
				
				
			</div>
			
		
		
		</div>
		
	
	
	</div>


</div>


</body>
</html>