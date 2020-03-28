<script language="javascript">
<!--
function konfirm(idbrg)
{
	tanya=confirm("Apakah anda yakin akan membeli barang ini ?")
	if (tanya !="0")
	{
		//alert(idbrg);
		top.location="e-shoping.php?idbrg="+idbrg;
	}
}
//-->
</script>

<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #00CC33;
	font-size: 14px;
}
.style5 {font-size: 14px}
.style6 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #0066FF;
}
.style7 {color: #0066FF}
.style8 {color: #999900}
-->
</style>

<table width="490" align="center"> 
<tr><td width="482">     
<div align="center"></p><span class="style4">
<marquee behavior="alternate">
</marquee>
</span><span class="style1">
<marquee behavior="alternate">
</marquee>
</span>
<span class="style5">
<marquee behavior="alternate">
</marquee>
</span>
<marquee behavior="alternate">
</marquee><div align="left"><a href="index.php?page=6" style="text-decoration:none"></a></div>
</div>
<div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
<?php
//untuk paging
$query=mysql_db_query($db,"select * from produk order by tgl asc",$koneksi); //input
$get_pages=mysql_num_rows($query);

if ($get_pages>$entries)  //proses
{
//echo "Halaman : ";
$pages=1;
while($pages<=ceil($get_pages/$entries))
{
	if ($pages!=1)
	{
		//echo " | ";
	}
?>
		<a href="index.php?page=5&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><?// echo $pages; ?></font></a> 
	 <?php
		$pages++;
}
}else{
$pages=0;
}
?>
	 </font>
 </p>
	 
	 <?php
//akhir paging


//proses halaman
$page=(int)$_GET['id'];
$offset=$page*$entries;
$result=mysql_db_query($db,"select * from produk order by tgl asc limit $offset,$entries",$koneksi); //output
$jumlah=mysql_num_rows($query);


if ($jumlah){
?>
</div>
   <table align="center" width="482" border="0">
   <tr>
	<td colspan="4" align="center" valign="top">
	<p align="right" class="style7"><marquee behavior="scroll"><img src="./img/promo.jpg" /></marquee></p>
	<p class="style7">&nbsp;</p></td>
	</tr>
<?php

while ($row=mysql_fetch_array($result))
{
?>

<tr>
	<td width="26%" align="left" valign="top">
		<?php 
		$gambar=$row['gambar'];
		$pic=substr($gambar,15,40); 
		$idbrg=$row['idbrg'];
		
		?>
		<img src="./admin/gambar/<? echo $pic; ?>" width="100" height="100" border="0">	</td>
	
	<td width="39%" align="left" valign="top">
		<font face="verdana" size="2" color="#666666">
		<?php 
		echo "<font color='#99CC00' size=4>".$row['namabrg']."</font>";
		echo "<br>";
		echo $row['spek'];
		//echo $idbrg;
		?></font>	</td>
	
	
	<td width="24%" align="left">
		<font face="verdana" size="2" color="#666666"><? echo "Rp ".$row['hargabrg'];?></font>	</td>
	
	<td width="11%" align="center">
		<a  href="#" title="Klik untuk membeli" onClick="konfirm(<? echo $idbrg; ?>)"><img src="./img/beli.jpg" border="0"></a>	</td>
</tr>

<tr>
	<td colspan="6"><hr  color="#CCCCCC"/></td>
</tr>
<?php
}
?> 
</table>
<?php

}else{
echo "<font color='#FF0000' face='verdana' size='2'><b>Belum ada data!!</b></font>";
}
?>
</td></tr> 
</table>
<p>&nbsp;</p>
