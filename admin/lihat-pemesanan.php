<?php session_start();
if (session_is_registered('id'))
{
	include "./include/conn.php";
	?>
	
	
	
	<table width="46%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	<tr> 
		<td width="3%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="92%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Lihat Pemesanan </font></strong></div></td>
		<td width="3%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td background="./img/b-kiri.jpg">&nbsp; </td>
		<td width="300" height="200">
		
		
		
	  	</td>
		<td background="./img/b-kanan.jpg">&nbsp;</td>
		<td width="2%"></td>
	  </tr>
			<tr> 
				<td align="right"><img src="./img/kib.jpg"></td>
				<td bgcolor="#5686c6" ><div align="center"><strong><font color="#FFFFFF" size="2" face="verdana">Jumlah Forum : <b><? echo $jumlah; ?></b></font></strong></div></td>
				<td><img src="./img/kab.jpg"></td>
			</tr>
</table>
	
    <p>
      <?php
}else{
	echo "<script> document.location.href='konfirmasi.php?id=session'; </script>";
}
?>
</p>
    <p>&nbsp;        </p>
