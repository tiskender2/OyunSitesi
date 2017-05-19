<?php
include("db.php");
?>
<html>
<head>
<link type="text/css" href="css/oyunlar.css" rel="Stylesheet"> 
</head>

<body>
	<div id="anasayfa">
		<?php
		
			 if ( isset($_POST['ara']) )
			{
				echo'<div id="header1"><h1>Arama Sonuclari</h1></div>';
			}
			else
			{
				$sql=mysqli_query($baglanti,"SELECT * FROM `kategoriler` WHERE KategoriID=".@$_GET['kid']." ");
				$cek=mysqli_fetch_array($sql);
				echo'<div id="header1"><h1>'.$cek['KategoriADI'].'</h1></div>';
			}
		?>
		
		<div id="main">
		<?php
			if(@$_GET['kid']=="3"){
			$sql=mysqli_query($baglanti,"SELECT * FROM `icerikler` WHERE 1");
			while($cek=mysqli_fetch_array($sql)){
			echo'<a href="oyunsayfa.php?id='.$cek['IcerikID'].'"><div class="oyun">
				<div class="oyunresim1"><img src="'.$cek['IcerikRESIM'].'"></img></div>
				<div class="oyunad1"><strong>'.$cek['icerikADI'].'</strong></div></a>
			
			</div>';}}
			else if ( isset($_POST['ara']) )
			{
				$ara=$_POST['veri'];
				$sorgu=mysqli_query($baglanti,"select * from icerikler where icerikADI like '%$ara%'");
					if (empty($ara)){
						echo '<script>alert("Arama Alanını boş bıraktınız")
						window.location.href = "index.php" </script>';
					}
					else{
							if (mysqli_num_rows($sorgu)>0)
							{
								while($kayit=mysqli_fetch_array($sorgu))
									{
									echo'<a href="oyunsayfa.php?id='.$kayit['IcerikID'].'"><div class="oyun">
										<div class="oyunresim1"><img src="'.$kayit['IcerikRESIM'].'"></img></div>
										<div class="oyunad1"><strong>'.$kayit['icerikADI'].'</strong></div></a>
			
										</div>';
									}
							}
							else
							{
								echo '<script>alert("Oyun Bulunamadı!") 
								window.location.href = "index.php" </script> ';
								
							}
						}
			}
			else
			{
				$sql=mysqli_query($baglanti,"SELECT * FROM `icerikler` WHERE KategoriID=".@$_GET['kid']." ");
			while($cek=mysqli_fetch_array($sql)){
			echo'<a href="oyunsayfa.php?id='.$cek['IcerikID'].'"><div class="oyun">
				<div class="oyunresim1"><img src="'.$cek['IcerikRESIM'].'"></img></div>
				<div class="oyunad1"><strong>'.$cek['icerikADI'].'</strong></div></a>
			
			</div>';}
			}
		?>
		
		
		</div>
		
		
		<div id="footer"></div>
	
	
	
	</div>

</body>



</html>