<?php session_start();
if (isset($_POST['admin']))
{
	include ("./include/conn.php");
	$userid=htmlentities((trim($_POST['admin'])));
	$password=htmlentities(md5($_POST['kunci']));
	
	$login=mysql_db_query($db,"select * from admin where user='$userid' and password='$password'",$koneksi);
	
	$cek_login=mysql_num_rows($login);
		if (empty($cek_login))
		{
			echo "<script> document.location.href='akses.php?go=salah_password'; </script>";
		}
		else
		{
			//daftarkan ID jika user dan password BENAR
			while ($row=mysql_fetch_array($login))
			{
				$id=$row[0];
				session_register('id');
				session_register('userid');
				session_register('tanggal');
			}
			echo "<script> document.location.href='home.php'; </script>";
		}
}
?>


<html>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<title>Login</title>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="19%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
<tr> 
	<td width="4%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="74%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">ADMINISTRATOR</font></strong></div></td>
	<td width="21%"><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td background="./img/b-kiri.jpg">&nbsp; </td>
	<td>
	<table width="259" align="center">
		<tr><td width="251"><font face="verdana" size="2">&nbsp;
		</font>
		 <script language="javascript">
		function cek(){
			var user= document.getElementById('userid').value;
			var pass= document.getElementById('passwd').value;
			if(user.replace(/^\s+|\s+$/g, '')==''){
				alert('Username Harus Diisi!');
				return false;
			} 
			if(pass.replace(/^\s+|\s+$/g, '')==''){
				alert('Password Harus diisi!');
				return false;
			}
			return true;
		}
		</script>
		<form action="index.php" method="post">
		  <table width="251" height="101" border="0" align="center">
		  <tr valign="bottom">
			<td width="104" height="35"><font size="4" face="verdana">Username</font></td>
			  <td width="137"><font size="4" face="verdana">
				<input type="text" name="admin" size="20" id="userid">
			  </font></td>
		  </tr>
		  
		  <tr valign="top">
			<td height="34"><font size="4" face="verdana">Password</font></td>
			  <td><font size="4" face="verdana">
				<input type="password" name="kunci" size="20" id="passwd">
			  </font></td>
		  </tr>
		  
		  <tr>
		  	<td>&nbsp;</td>
		  	<td><font size="4" face="verdana">
				<input type="submit" value="LOGIN" onClick="return cek()">
			  </font></td>
		  </tr>
		  </table>
		</form>
		
				
		</td></tr>
	</table>
	</td>
	<td background="./img/b-kanan.jpg">&nbsp;</td>
	<td width="1%"></td>
</tr>
<tr> 
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>

<div align="center">
  <p>
  <font size="1" face="verdana" color="#999999">
    <?php
echo $waktu=date("d-m-Y H:i:s");
echo "<br>";
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
	echo 'IP Anda : ',$_SERVER['HTTP_X_FORWARDED_FOR'],'<br>';
}else{
	echo 'IP Anda : ',$_SERVER['REMOTE_ADDR'],"<br>";
}
echo "<br>";
?>
	</font>
  </p>
</div>
</body>
</html>