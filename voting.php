<script type="text/javascript">
function voting(){
	
		alert('Terima Kasih Anda telah mengikuti Voting');
		return false;
	
}
</script>


<?php
if (isset($_POST['polling']))
{
	include "./include/conn.php";
	$pilihan=$_POST['polling'];
	$tanggal;
	
	$polling=mysql_db_query($db,"select * from voting",$koneksi);
	$baris=mysql_fetch_row($polling);
	list($bagus,$jelek,$tidaktahu)=$baris;
	
	/*penjumlahan*/
	$array1=$bagus+1;
	$array2=$jelek+1;
	$array3=$tidaktahu+1;
	
	switch($pilihan)
	{
	case "bagus";
		echo "<br>";
		$update=mysql_db_query($db,"update voting set bagus='$array1', waktu='$tanggal'",$koneksi);
		echo "<script> document.location.href='index.php'; </script>";
		break;
		
	case "jelek";
		echo "<br>";
		$update=mysql_db_query($db,"update voting set jelek='$array2', waktu='$tanggal'",$koneksi);
		echo "<script> document.location.href='index.php'; </script>";
		break;
		
	case "tidak";
		echo "<br>";
		$update=mysql_db_query($db,"update voting set tidaktahu='$array3', waktu='$tanggal'",$koneksi);
		echo "<script> document.location.href='index.php'; </script>";
		break;
	}	
	
}

?>

<html>
<table width="15%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
<tr> 
	<td width="22%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">VOTING</font></strong></div></td>
	<td width="6%"><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
	<table width="165" align="center">
		<tr>
		  <td width="157"><font face="verdana" size="2">&nbsp;
		</font>
		<form method="post" action="voting.php">
		<font size="2"><b><font face="Geneva, Arial, Helvetica, sans-serif">Bagaimana situs ini menurut Anda?</font></b><font face="Geneva, Arial, Helvetica, sans-serif"><br>
		
		<input type="Radio" name="polling" value="bagus" checked>
		Bagus
		<br>
		<input type="Radio" name="polling" value="jelek">
		Jelek
		<br>
		<input type="Radio" name="polling" value="tidak">
		Tidak Tahu <br>
		</font></font><br>
		<input type="submit" name="polling2" value="Vote" onClick="voting();">
		<form name="scrollwindow">
		<input type=button value="View" onClick="window.open('voting-view.php','scrollwindow','top=200,left=350,width=575,height=400');">
		</form>
		</form>		</td>
		</tr>
	</table>
	</td>
	<td>&nbsp;</td>
	<td width="2%"></td>
</tr>
<tr> 
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>
</html>
