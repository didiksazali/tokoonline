<marquee behavior="scroll" direction="left" scrollamount="3" title="Galery">
<div align="center">
  <?php
  
include "./include/conn.php";

$gambar=mysql_db_query($db,"select * from produk",$koneksi);
while($row=mysql_fetch_array($gambar)){
	$pic=$row['gambar'];
	
	?>
  <img src="<? echo $pic;?>" border="0" width="150" height="150" title="<? echo "Gambar : ".substr($pic,15,30); ?>">
  <?php
}

?>
</div>
</marquee>