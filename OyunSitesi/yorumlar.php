<?php
include("db.php");
?>
<html>
<head>  <link href="css/game.css" style="text/css"  rel="Stylesheet" /></head>
<body>


<body>
</html>
<?php
echo'<div id="tumyorum" style="    width: 100%;
    height: 50%;
 
    background: cadetblue;">

		<div class="tumyorumlar" style="    width: 98%;
    height: 100%;
    
	float:left;
	margin-left: 1%;
    background: #FFF;">';
	
	
						
							
							 $sql2=mysqli_query($baglanti,"SELECT * FROM `yorumlar` INNER JOIN uye_tablosu ON yorumlar.KullaniciID=uye_tablosu.KullaniciID WHERE IcerikID=".$_POST['id']." ORDER by yorumID  ");
							 $yorum=mysqli_num_rows($sql2);
							 $yorum=$yorum-8;
							 $sql=mysqli_query($baglanti,"SELECT * FROM `yorumlar` INNER JOIN uye_tablosu ON yorumlar.KullaniciID=uye_tablosu.KullaniciID WHERE IcerikID=".$_POST['id']." ORDER by yorumID  LIMIT ".$yorum."");
							 
							while($cek=mysqli_fetch_array($sql)){
							echo'<div class="yorumEntry" style="    width: 97%;
    height: 12%;
    margin-left: 1%;
    border-bottom: 1px solid rgba(255, 193, 7, 0.54);">
								<div class="yorumgonder">
									<div class="yorumcuadi"><strong> '.$cek['KullaniciAD'].' </strong>  </div>
									<div class="yorumu"><h5>'.$cek['Yorum'].' </h5> </div>
								</div>
								
								<div class="yorumbegen">';
									
									echo'<form action="begen.php" method="post">
									<input type="submit" value="Beğen" name="begenbtn"></input>
									<input type="hidden" name="konuid" value="'.@$_GET['id'].'"></input>
									<input type="hidden" name="yorumid" value="'.$cek['yorumID'].'"></input></form>
											<h5>'.$cek['Begenisayi'].'</h5>';
											
											
											
									
									
									echo'
								</div>
						</div>';
							}
							
						
							
						
					
	
	
	echo '</div>


	</div>';
?>