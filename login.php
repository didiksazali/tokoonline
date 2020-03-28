<?php
ini_set('display_errors',FALSE);
if (isset($_POST['login']))
{
	include "./include/conn.php";
	$username=htmlentities((trim($_POST['username'])));
	$password=htmlentities(md5($_POST['password']));
	
	$login=mysql_db_query($db,"select * from daftar where user='$username' and pass='$password'",$koneksi);
	while($row=mysql_fetch_array($login))
	{
		$user_id=$row[0];
		$user_name=$row[2];
		$status=$row['status'];
	}
	
	
	
	$cek_login=mysql_num_rows($login);
	if (empty($cek_login))
	{
		?>
		<script language="javascript">alert("Password atau Username Anda salah!!");</script>
		<script> document.location.href='index.php?page=4'; </script>
		<?php
	}
	else
	{
		//ubah status login
		$update_stat=mysql_db_query($db,"update daftar set status='1' where id='$user_id'",$koneksi);
		session_register('user_id');
		session_register('user_name');
		?>
		<script language="javascript">alert("Anda Berhasil Login");</script>
		<script> document.location.href='index.php?page=1'; </script>
		<?php
	}

	
}

?>
 
<html>

<script language="javascript">
function cek(){
	var user= document.getElementById('userid').value;
	var pass= document.getElementById('passwd').value;
	if(user.replace(/^\s+|\s+$/g, '')==''){
		alert('Maaf, Username Anda masih kosong !');
		return false;
	} 
	if(pass.replace(/^\s+|\s+$/g, '')==''){
		alert('Maaf, Password Anda masih kosong  !');
		return false;
	}
	return true;
}
</script>
<table width="15%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
<tr> 
	<td width="22%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="70%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">LOGIN</font></strong></div></td>
	<td width="6%"><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
	<table width="165" align="center">
		<tr><td width="157"><font face="verdana" size="2">&nbsp;
		</font>
		    
		<form name="masuk" action="login.php" method="post">
		<table border="0" bordercolor="blue" align="left">
			
		<tr>	
			<td><font face="verdana" size="2">Username</font></td>
			<td><input type="text" size="10" name="username" id="userid"></td>
		</tr>
		
		<tr>
			<td><font face="verdana" size="2">Password</font></td>
			<td><input type="password" size="10" name="password" id="passwd"></td>
		</tr>
		
		<tr>
			<td><input type="submit" value="Login" name="login" onClick="return cek()"></td>
			<td>
				
				<input type=button value="Daftar" onClick="window.open('signup.php','scrollwindow','top=200,left=350,width=575,height=400');">
				
			</td>
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
</html>
