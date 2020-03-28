<?php session_start();
include "./include/conn.php";
if (session_is_registered('user_id'))
{
	//tampilkan data user yang sudah login
	$userid=$_SESSION['user_id'];
	$query=mysql_db_query($db,"select * from daftar where id='$userid'",$koneksi);
	while ($row=mysql_fetch_array($query))
	{
		$nama=$row['nama'];
		$email=$row['email'];
	}

?>
	<html>
	<p><font color="#FF0000" face='verdana' size='2'><blink><br>
    <?php echo $_GET['status'] ?></blink></font><br>
    </p>
	<table width="45%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
	<tr> 
		<td width="22%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Reply Forum</font></strong></div></td>
		<td width="6%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<table width="331" align="center">
			<tr><td width="269">
			
			<form action="forum-reply-save.php" method="post" name="form1">
			<table width="100%" border="0">
			<tr >
				<td align="left"><font face="verdana" size="2">ID</font></td><td>:</td><td align="left">
				<input type="hidden" value="<? echo $_GET['ID_topik']; ?>" name="ID_topik"><font face="verdana" size="2"><? echo $_GET['ID_topik']; ?></font></td>
			</tr>
			<tr >
				<td align="left"><font face="verdana" size="2">Nama</font></td><td>:</td><td align="left">
				<input type="hidden" value="<? echo "$nama"; ?>" name="nama"><font face="verdana" size="2"><? echo "$nama"; ?></font></td>
			</tr>
			
			<tr>
				<td align="left"><font face="verdana" size="2">Email</font></td><td>:</td><td align="left">
				<input type="hidden" value="<? echo "$email"; ?>" name="email"><font face="verdana" size="2"><? echo "$email"; ?></font></td>
			</tr>
			
			<tr>
				<td align="left"><font face="verdana" size="2">TOPIK</font></td><td>:</td><td align="left">
				<input type="text" value="<? echo $_GET['topik']; ?>" name="topik" size="33"></td>
			</tr>
			
			<tr>
				<td align="left"><font face="verdana" size="2">Isi</font></td><td>:</td><td align="left"><textarea name="isi" cols="25" rows="10"></textarea>
				<input type="hidden" name="aksi" id="aksi" value="<? echo "$aksi"; ?>"</td>
			</tr>
			
			<tr>
				<td>
				<a href="index.php?page=9&ID_topik=<? echo $_GET['ID_topik']; ?>&topik=<? echo $_GET['topik'];?>" style="text-decoration:none" title="Kembali">
				<img src="./img/back.png" border="0">
				</a>
				</td>
				<td></td>
				<td><input type="submit" name="submit" value="POST"></td>
			</tr>
			</table>
			</form>
			
			
			</td></tr>
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
	<p>&nbsp;</p>
	</html>
<?php
}else{
	echo "<script> document.location.href='index.php?page=4&error=Untuk membuat topik baru dan me-replay, silahkan daftar dan login'; </script>";
}
?>
