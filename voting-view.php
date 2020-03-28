<html>
<head>
<title>View</title>
<link rel="shortcut icon" href="./img/voting.ico" type="image/x-icon">
<script language="javascript">
<!--
function tutup()
{
	top.window.close()
}
//-->
</script>
</head>
<body>

<?php
	include "./include/conn.php";
	
	$hasil=mysql_db_query($db,"select * from voting",$koneksi);
	$row=mysql_fetch_row($hasil);
	list($bagus,$jelek,$tidaktahu)=$row;
	$total=(int)$bagus+(int)$jelek+(int)$tidaktahu;
	
	//menampilkan persentase
	$persen_bagus=round(((int)$bagus/(int)$total)*100,2);
	$persen_jelek=round(((int)$jelek/(int)$total)*100,2);
	$persen_tidak=round(((int)$tidaktahu/(int)$total)*100,2);
	
	//mengkonversi persentasi menjadi ukuran pada diagram batang dengan mengalikan faktor 2, karena jika 100% artinya lebar maksimum digram adalah 100pt
	$lebar_bagus=$persen_bagus*2;
	$lebar_jelek=$persen_jelek*2;
	$lebar_tidak=$persen_tidak*2;


?>


<center>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
<tr>
	<td bgcolor="#9ABC67"><div align="center"><font color="#FFFFFF" face="Geneva, Arial, Helvetica, sans-serif" size="2"><strong>[HASIL VOTING]</strong></font></div></td>
</tr>
<tr>
	<td align="center"><p><font face="verdana" size="2" color="#666666"><? echo 'Current Votes : ',$tanggal; ?></font></p>
	  <p>&nbsp;</p></td>
</tr>
<tr>
	<td align="left" valign="bottom"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Bagaimana situs ini menurut Anda? <font color="#00CC66"></font></font>	</td>
</tr>
<tr>
	<td><table border="0" width="488">
      
      <tr>
        <td width="80" align="left"><font size="2" face="verdana">Bagus</font></td>
        <td width="24" align="right"><font size="2" face="verdana"><? echo $bagus;?></font></td>
        <td width="10">&nbsp;</td>
        <td width="356" align="left"><img src="./img/stat.jpg" border="1" width="<? echo $lebar_bagus ?>" height="12"> <font size="2" face="verdana">
		<?php echo $persen_bagus."%"; ?></font></td>
      </tr>
      <tr>
        <td align="left"><font size="2" face="verdana">Jelek</font></td>
        <td align="right"><font size="2" face="verdana"><? echo $jelek;?></font></td>
        <td>&nbsp;</td>
        <td align="left"><img src="./img/stat.jpg" border="1" width="<? echo $lebar_jelek ?>" height="12"> <font size="2" face="verdana">
		<?php echo $persen_jelek."%";?></font> </td>
      </tr>
      <tr>
        <td align="left"><font size="2" face="verdana">Tidak tahu</font></td>
        <td align="right"><font size="2" face="verdana"><? echo $tidaktahu;?></font></td>
        <td>&nbsp;</td>
        <td align="left"><img src="./img/stat.jpg" border="1" width="<? echo $lebar_tidak ?>" height="12"> <font size="2" face="verdana"> 
		<?php echo $persen_tidak."%";?></font></td>
      </tr>
    </table>
	  <p>&nbsp;</p></td>
</tr>
<tr>
	<td align="center"><p><font face="verdana" size="2" color="#666666"><? echo 'Total Voting : ',$total; ?></font></p>
	  <p><input type="button" onClick="tutup()" value="Keluar"></p></td>
</tr>
</table>
</center>

</body>
</html>
