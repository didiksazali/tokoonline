<?php
include "./include/conn.php";
$tanggal;
$quey=mysql_db_query($db,"select * from counter",$koneksi);
while ($rows=mysql_fetch_array($quey))
{
	$visit=$rows[1];
}

if ($visit=="")
{
mysql_db_query($db,"insert into counter values('$tanggal',1)",$koneksi);
}

if (!isset($_COOKIE['counter']))
{
	$visit=$visit+1;
	mysql_db_query($db,"update counter set jml='$visit'",$koneksi);
}

?>
<html>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
<tr> 
	<td align="right"><img src="./img/kiri.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">PENGUNJUNG</font></strong></div></td>
	<td><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td height="29" colspan="3" align="center"><br>
	<font face="verdana" size="2" color="#FF9933"><b><? echo $visit." Orang"?></b><br><br></font>	
	</td>
</tr>

<tr> 
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><font face="verdana" size="2" color="#FFFFFF"><? echo $tanggal=date('D, d-M-Y');?></font></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>
</html>
