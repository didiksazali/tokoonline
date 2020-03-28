<?php session_start();
if (session_is_registered('id'))
{
	$_SESSION['id'];
	$_SESSION['user'];
	
	?>
	<html>
	<head>
		<title>GIS-Endemik</title>
		<style type="text/css">
		<!--
		.style1 {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		}
.style2 {font-family: Arial, Helvetica, sans-serif}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #FF0000;
}
		-->
		</style>
	</head>
	<body background="./img/background.jpg">
	<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
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
				<td height="150" align="center"><?
				$type=$_GET['type'];
				$id=$_GET['id'];
				$hal=$_GET['hal'];
				$topik=$_GET['topik'];
				
				?>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				<p><img src="./img/delete.png"/>
				<font face="verdana" color="#666666"><span class="style1"><strong>Apakah anda yakin akan menghapus data ini??</strong></span>			        
				<br/>
				<br/>
				</font>
			  
				<a href="delete.php?id=<? echo $id; ?>&type=<? echo $type; ?>&hal=<? echo $hal; ?>" style="text-decoration:none"><font face="verdana" color="#FF3333">
				<font face="Times New Roman, Times, serif"><strong>[YA]</strong></font></font></a>
			  
				<strong><font face="Times New Roman, Times, serif"><a href="<? echo $hal; ?>" class="style2" style="text-decoration:none">
				<font color="#0033FF">[TIDAK]</font></a></font></strong></p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			  </td>
			</tr>
			<tr>
				<td><? include "./include/footer.php"; ?></td>
			</tr>
			</table>
		  </td>
		</tr>
	</table>
	</body>
	</html>
	<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>