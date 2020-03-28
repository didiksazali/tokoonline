<?php
if (isset($_POST['daftar']))
{
	include "./include/conn.php";
	$nama=ucwords($_POST['nama']);
	$user=$_POST['user'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	

	if (!empty($nama) && !empty($user) && !empty($email) && !empty($password))
	{	
		
		$cek=mysql_db_query($db,"select * from daftar where user='$user'",$koneksi);
		$valid=mysql_num_rows($cek);
		
		if ($valid){
			echo "<script> document.location.href='signup.php?status=<font color=red>Maaf, USERNAME Anda sudah ada yang punya!!</font>'; </script>";
		}else{
			
			$insert=mysql_db_query($db,"insert into daftar(nama,user,email,pass,tanggal) values('$nama','$user','$email','$password','$tanggal')",$koneksi);
			if ($insert)
			{
				echo "<script> document.location.href='signup.php?status=Selamat bergabung dengan situs kami.'; </script>";
			}
		}
		
	}
	else
	{
		echo "<script> document.location.href='signup.php?status=<font color=red>Maaf, Data yang anda kirim belum lengkap!!</font>'; </script>";
	}
	
}

?>

<html>
<head>
<title>SignUp</title>
<link rel="shortcut icon" href="./img/guestbook.png" type="image/x-icon">
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

<center>
<table width="100%" cellspacing="2" cellpadding="2" >
<tr>
<td bgcolor="#9ABC67" colspan="2"><div align="center">
	<font color="#FFFFFF" face="Geneva, Arial, Helvetica, sans-serif"><strong>[DAFTAR ANGGOTA]</strong></font></div>
</td>	
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td valign="top">&nbsp;</td>
	<td>
		<form name="daftar" action="signup.php" method="post">
		<table width="100%" cellspacing="2" cellpadding="2" >
			<tr>
				<td><font face="verdana" size="2">Nama Lengkap</font></td>
				<td><input type="text"  dir="ltr" size="25" name="nama"><td>
			</tr>
			
			<tr>
				<td><font face="verdana" size="2">User name</font></td>
				<td><input type="text" size="10" name="user"></td>
			</tr>
			
			<tr>
				<td><font face="verdana" size="2">Email</font></td>
				<td>
				<input type="text" size="25" name="email"></td>
			</tr>
			
			<tr>
				<td height="30"><font face="verdana" size="2">Password</font></td>
				<td><input type="password" size="10" name="password">
				<font size="-1" color="#A0A0A4" face="verdana"> (Max 6 digit 0-9 a-z case sensitif)</font></td>
			</tr>
			
			<tr>
				<td></td><td><p>
				  <input type="submit" value="Kirim" name="daftar">
			      &nbsp;
			      <input type="button" onClick="tutup()" value="Keluar">
				  </p>
				  </td>
			</tr>
		</table>
		</form><br>
		<p align="center"><font color="#0033FF" face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font><br></p>
	</td>
</tr>
</tr>
</table>

</center>
</body>
</html>
