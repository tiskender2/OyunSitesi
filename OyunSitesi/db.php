<?php

 $baglanti = @mysqli_connect('localhost', 'root', '','kraloyun');
 
if($baglanti ) {
   
} else {
    die ('Bağlantı kurulamadı.'.mysqli_error());
}
 

?>