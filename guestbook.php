<?php
if (isset($_POST['submit']))
{
	include "./include/conn.php";
	$tanggal;
	
	$nama=htmlentities($_POST['nama']);
	$email=htmlentities($_POST['email']);
	$pesan=$_POST['pesan'];
	$rand=htmlentities($_POST['rand']);
	$captcha=htmlentities($_POST['captcha']);
	
	
	if ($nama=="" or $email=="" or $pesan=="" or $rand!=$captcha)
	{
		echo "<script> document.location.href='index.php?page=3&status=<font color=red>Data Anda belum lengkap!</font>'; </script>";
	}else{
		$query=mysql_db_query($db,"insert into guestbook values('','$tanggal','$nama','$email','$pesan')",$koneksi);
		if ($query)
		{
			echo "<script> document.location.href='index.php?page=3&status=Data Anda berhasil disimpan'; </script>";
		}
	}
}else{
	unset($_POST['submit']);
}
?>

<html><br> 
<table width="40%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
  <tr>
	<td width="3%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="95%" bgcolor="#5686c6" ><div align="center"><strong><font color="#FFFFFF" size="2" face="verdana">GUESTBOOK</font></strong></div></td>
	<td width="2%"><img src="./img/kanan.jpg"></td>
  </tr>
  <tr>
	<td background="./img/b-kiri.jpg">&nbsp;</td>
	<td>
	
	<form action="index.php?page=3" method="post" name="formkomen"><br>
	<p align="center"><font color='#0066FF' face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font></p>
	<table width="388" border="0" align="center">
		<tr>
			<td width="79" align="left"><font face="verdana" size="2">Nama</font></td>
			<td width="299" align="left"><input type="text" name="nama" size="30"></td>
		</tr>
		<tr>
			<td align="left"><font face="verdana" size="2">Email</font></td><td align="left"><input type="text" name="email" size="30"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="left"><font face="verdana" size="-4">(Tekan Enter untuk ganti paragraf)</font></td>
		</tr>
		<tr>
			<td align="left"><font face="verdana" size="2">Pesan</font></td><td align="left">
			<textarea name="pesan" cols="30" rows="5" wrap="hard"></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="left"><input type="submit" value="Kirim" name="submit"> <input type="reset" value="Batal"></td>
		</tr>
	</table>
	</form>
	
	</td>
	<td background="./img/b-kanan.jpg">&nbsp;</td>
  </tr>
  <tr>
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td><img src="./img/kab.jpg"></td>
  </tr>
</table>



<p><? include "guestbook-view.php" ?></p>
</html>