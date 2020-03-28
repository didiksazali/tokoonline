<?php session_start();
	$konfirm=$_GET['go'];
	switch($konfirm)
	{
		case "session";
		?>
		<p align="center">&nbsp;</p>
		<p align="center"><font color="#FF3F55" size="+1" face="sans-serif">Anda tidak berhak mengakses, 
		<a href="index.php" style="text-decoration:none "><font color="#0066FF">Silahkan Login</font>.</a></font><br>
		<img src="./img/lock.png" alt="Lock" /></p>
		<p align="center"><font color="#A0A0A4" face="sans-serif">[Administrator]</font></p>
		<?php
		break;
				
		case "salah_password";
		?>
		<script language="javascript">alert("Password atau Username anda salah, silahkan coba lagi");</script>
		<script> document.location.href='index.php'; </script>
		<?php
		break;
		
		default;
		?>
		<p>&nbsp;</p>
		<p align="center"><font color="#FF3F55" size="+1" face="sans-serif">Anda tidak berhak mengakses, 
		<a href="index.php" style="text-decoration:none "><font color="#0066FF">Silahkan Login</font>.</a></font><br>
		<img src="./img/lock.png" alt="Lock" /></p>
		<p align="center"><font color="#A0A0A4" face="sans-serif">[Administrator]</font></p>
		<?php
		break;
		
		
		
	}
?>
<html><link rel="shortcut icon" href="lock.ico" type="image/x-icon"></html>