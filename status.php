<?php
$user_name=ucwords($_SESSION['user_name']);
$time=date("G");
	?><font face="verdana" size="2" color="#FFFF66"><?
	if ($time<12)
	
	{	
		$status= "  Selamat Pagi ";
		}
		else if ($time<15)
		{
		$status= "  Selamat Siang ";
		}
		else if ($time<18)
		{
		$status= "  Selamat Sore ";
		}
		else
		{
		$status= "  Selamat Malam ";
	}
echo "</font>";

?>


<html>
<script language="javascript">
<!--
function konfirmasi()
{
	tanya=confirm("Apakah anda yakin akan keluar?")
	if (tanya !="0")
	{
		top.location="logout.php"
	}
}
//-->
</script>

<?php
include "./include/conn.php";
$query=mysql_db_query($db,"select * from daftar",$koneksi);
$count=mysql_num_rows($query);
?>

<table width="15%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
<tr> 
	<td width="22%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF"><? echo $status.$user_name; ?></font></strong></div></td>
	<td width="6%"><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
	<table width="165" align="center">
		<tr>
		<td width="157" align="center">
		<a href="" style="text-decoration:none " title="Keluar" onclick="konfirmasi()"><img src="./img/guestbook.png" border="0"><b><font face="verdana" size="2" color="#FF0000">Logout</font></b></a>
		</td>
		</tr>
	</table>
	</td>
	<td>&nbsp;</td>
	<td width="2%"></td>
</tr>
<tr> 
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><font face="verdana" size="2" color="#FFFFFF">Jumlah Member : <?php echo $count; ?></font></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>
</html>