<?php session_start();
if (session_is_registered('id'))
{
	$_SESSION['id'];
	$_SESSION['user'];
	
	?>
	<html>
	<head>
		<title>[Admin Toko]</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<style type="text/css">
		<!--
		.style1 {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		}
		-->
		</style>
	</head>
	<body background="./img/background.jpg">
	<p>&nbsp;</p>
		<table border="0" align="center" bgcolor="#FFFFFF">
		<tr>
			<td width="210">
			
			
			
			<table width="189" height="247" border="0" align="center">
			<tr>
				<td width="103" align="center" valign="top"><? include "./include/banner.php"; ?></td>
			</tr>
			<tr>
				<td height="63" align="center"><? include "menu.php"; ?></td>
			</tr>
			<tr>
				<td height="50" align="center">
				 <?php include "isi.php"; ?>
				</td>
			</tr>
			<tr>
				<td><? include "./include/footer.php"; ?></td>
			</tr>
			</table>
			
			
			
			
			
		  </td>
		</tr>
		</table>
	    <p>&nbsp;</p>
	</body>
	</html>
<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>