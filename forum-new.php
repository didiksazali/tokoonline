<?php session_start();
if (session_is_registered('user_id'))
{
	include "./include/conn.php";
	$user_id=$_SESSION['user_id'];
	$topik=$_GET['topik'];
	
	$query=mysql_db_query($db,"select * from daftar where id='$user_id'",$koneksi);
	while ($row=mysql_fetch_array($query))
	{
		$nama=$row['nama'];
		$email=$row['email'];
	}

	if(isset($_POST['nama']))
	{
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$topik=$_POST['topik'];
		$isi=$_POST['isi'];
		$tanggal;
		
		
		if (empty($nama) || empty($email) || empty($topik) || empty($isi))
		{
			echo "<script> document.location.href='index.php?page=11&status=Maaf, Data Anda belum lengkap!!'; </script>";
		}else{
			
			$query=mysql_db_query($db,"insert into forum(nama,email,topik,isi,tanggal) values('$nama','$email','$topik','$isi','$tanggal')",$koneksi);
			
			if($query)
			{
				echo "<script> document.location.href='index.php?page=4&status=Berhasil Membuat Forum Baru'; </script>";
			}else{
				echo "<script> alert('Gagal Query!!'); </script>";
			}
		}
	
	}else{
		unset($_POST['nama']);
	}


?>
	<html><br>
	<font color="#FF0000" face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font><br><br>
	<table width="45%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
	<tr> 
		<td width="22%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">New Forum</font></strong></div></td>
		<td width="6%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<table width="331" align="center">
			<tr><td width="269">
			
			<form action="index.php?page=11" method="post" name="form1">
			<table width="100%" border="0">
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
				<input type="text" value="<? echo "$topik"; ?>" name="topik"></td>
			</tr>
			
			<tr>
				<td align="left"><font face="verdana" size="2">Isi</font></td><td>:</td><td align="left"><textarea name="isi" cols="20" rows="10"></textarea>
				<input type="hidden" name="aksi" id="aksi" value="<? echo "$aksi"; ?>"</td>
			</tr>
			
			<tr>
				<td><input type="hidden" name="ID_topik" value="<? echo $ID_topik; ?>"></td>
				<td><input type="hidden" name="aksi" value="<? echo $aksi; ?>"></td>
			</tr>
			
			<tr>
				<td><a href="index.php?page=4" title="Kembali"><img src="./img/back.png" border="0"></a></td>
				<td></td>
				<td><input type="submit" name="submit" value="Kirim"></td>
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
