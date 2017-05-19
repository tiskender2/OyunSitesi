<?php
include("db.php");
?>
<html>
<head>
   <link href="css/game.css" style="text/css"  rel="Stylesheet" />
   <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
   <script>
function AjaxFunction(btn) {
    var bilgi = 'id=<?php echo $_GET['id'];?>';
    btn.style.visibility="hidden";
	
    $.ajax({
        type: 'post',
        url: 'yorumlar.php',
        data:  bilgi,
        success: function(result) {
            $('#sonuc').html(result);
        }
    });
 
}
</script>
</head>
<body style="  background: rgba(0, 0, 0, 0.71);">
	<div id="oyunmain">
		<?php
		 $sql=mysqli_query($baglanti,"select * from icerikler where IcerikID=".@$_GET['id']."");
		 while($cek=mysqli_fetch_array($sql)){
			 
		echo'<div id="gameust">
			<div id="gameisim">
				<h2 style="text-align:center;">'.$cek['icerikADI'].'</h2>
			</div>
		</div>
		<div id="gameorta">
			<div id="gamegame">
				
		 <iframe style="scrolling="no" frameborder="0"" src="'.$cek['Oyunlink'].'" > </iframe>
		
			</div>
			<div id="gamedetay" style="text-align:center;">
			<header >Bu <strong>'.$cek['icerikADI'].'</strong> oyununu begendin mi? Simdi yorum yaz</header>
			</div>
			
		
		
		 </div>';}
		?>
		<div id="gamealt">
			<div id="gameyorum">
				<div id="gameyorumust">
					<div class="uyeisim" style="    margin-left: 45%; padding: 6px;">
					<header>Üye Yorumları</header>
					</div>
				</div>
				<div id="gameyorumalt">
					<div class="gameyorumbest">
						<h4>En İyi Yorumlar</h4>
							<?php
								
								$sql=mysqli_query($baglanti,"SELECT * FROM `yorumlar` INNER JOIN begeniler ON yorumlar.yorumID=begeniler.YorumID WHERE yorumlar.IcerikID=".$_GET['id']." GROUP BY yorumlar.yorumID ORDER by Begenisayi DESC LIMIT 2");
								
								while($cek=mysqli_fetch_array($sql)){
									$sql2=mysqli_query($baglanti,"SELECT KullaniciAD FROM uye_tablosu where KullaniciID=".$cek['KullaniciID']."");
									$kad=mysqli_fetch_array($sql2);
									
							echo '<div class="yorumEntry">
									<div class="yorumgonder">
										<div class="yorumcuadi"><strong> '.$kad['KullaniciAD'].'</strong></div>
										<div class="yorumu"><h5>'.$cek['Yorum'].'</h5> </div>
									
								</div>
								<div class="yorumbegen">';
									if(isset($_SESSION['uye']))
									{
										
									echo'<form action="begen.php" method="post">
									<input type="submit" value="'.$cek['B_Durum'].'" name="begenbtn"></input>
									<input type="hidden" name="konuid" value="'.@$_GET['id'].'"></input>
									<input type="hidden" name="yorumid" value="'.$cek['yorumID'].'"></input></form>
											<h5>'.$cek['Begenisayi'].'</h5>';
										
									}
									else
									{
										echo'<header>Begenisayisi: </header>
										<h5 class="h5ust">'.$cek['Begenisayi'].'</h5>';
									}
									
								echo'</div>
								</div>';}
						?>
					
					</div>

					<div id="yorumform">
						<div id="formgir">
							<div class="yorumarea">
							
							<?php
							
							if(isset($_SESSION["uye"]))
							{		
									
									
									echo'<form action="yorumkaydet.php?id='.@$_GET['id'].'" method="Post">
									 <input type="textarea" name="yorumarea"> </input> 
									<input type="submit" value="Gönder" name="yorumbuton"></input>
									<input type="hidden" name="konuid" value="'.@$_GET['id'].' "">
							        </form>';
									
							}
							else
							{
								echo'<input type="textarea"> </input>
								     <a href="uyekayit.php"><input type="button" value="Giriş/Üye Ol"></input>
										
									 </a>';
							}
							?>
							</div>
						</div>
						
						
					
					</div>
					<div class="gameyorumlar">
						<div>
						<h4>Tüm Yorumlar</h4>
						</div>
						<?php
								$deger="0";
						  $sql=mysqli_query($baglanti,"SELECT * FROM `yorumlar` INNER JOIN uye_tablosu ON yorumlar.KullaniciID=uye_tablosu.KullaniciID WHERE IcerikID=".$_GET['id']." ORDER by yorumID DESC LIMIT 8");
							while($cek=mysqli_fetch_array($sql)){
							echo'<div class="yorumEntry">
								<div class="yorumgonder">
									<div class="yorumcuadi"><strong> '.$cek['KullaniciAD'].' </strong>  </div>
									<div class="yorumu"><h5>'.$cek['Yorum'].' </h5> </div>
								</div>
							
								<div class="yorumbegen">';
									if(isset($_SESSION['uye'])){
											
										
									echo'<form action="begen.php" method="post">
									<input type="submit" value="'.$cek['B_Durum'].'" name="begenbtn"></input>
									<input type="hidden" name="konuid" value="'.@$_GET['id'].'"></input>
									<input type="hidden" name="yorumid" value="'.$cek['yorumID'].'"></input></form>
									<h5>'.$cek['Begenisayi'].'</h5>';
											
											
											
											}
											
									else
									{
										echo'<header>Begenisayisi: </header>
										<h5>'.$cek['Begenisayi'].'</h5>';
									}
									echo'
								</div>
						</div>';
							}
						$cek2=mysqli_num_rows($sql);
						if($cek2!="8")
						{
						echo'<div id="fazlayorum">
							
						</div>';}
						else
						{
							echo'<div id="fazlayorum">
							
							<input type="button" value="Diğer Yorumlar" name="dyorum"  onclick="AjaxFunction(this);"></input>
						</div>';
						}
					?>
					</div>
					
				
				</div>
			
				
			</div>
		
		<div id="sonuc"> </div>
		</div>
		
	</div>


</body>
</html>