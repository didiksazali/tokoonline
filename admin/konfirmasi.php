<?php session_start();
if (session_is_registered('id'))
{
	?>
	<html>
	<head>
		<title>GIS-Endemik</title>
		<style type="text/css">
		<!--
		.style2 {
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
		}
				-->
		</style>
		
		<script languange="Javascript1.2"><!--
		function ya(){
			
		location.replace("home.php?page=8");
		}
		--></script>
		
		<script languange="Javascript1.2"><!--
		function tidak(){
			
		location.replace("home.php?page=7");
		}
		--></script>
		
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
				<td height="200" align="center">
				  <p>
				    <?php 
				$konfirm=$_GET['go'];
				$id=$_GET['id'];
				
				switch($konfirm)
				{	
					case "berhasil_gis";
					?>
			      </p>
				  <p><img src="./img/gis.png" border="0"></p>
				  <p align="center"><span class="style2"><font color="#0033FF" size="2">Data Anda berhasil di simpan, apakah ada data yang lain??</font></span><br>
				    <br> 
				    <input type="button" value="Ya" onClick="ya()"> 
				    <input type="button" value="Tidak" onClick="tidak()">
			      </p>
				  <?php
					break;
					
				}
				?>
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