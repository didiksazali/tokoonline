<?php session_start(); 
if (session_is_registered('id'))
{

	include "./include/conn.php";
	$userid=$_SESSION['userid'];
	$tgl=$_SESSION['tanggal'];
	?>
	<p align="center">&nbsp;</p>
	<p align="center">&nbsp;</p>
	<p align="center"><img src="./img/admin.png" alt="Admin" border="0" /></p>
	<p align="center"><font color="#009933" size="2" face="verdana"><? include "./include/waktu.php"; ?><br />Silahkan pilih menu yang akan anda kerjakan.</font></p>
	<p align="center">&nbsp;</p>
	<p align="center">&nbsp;</p>
	<p align="center">&nbsp;</p>
	

	<font face="verdana" size="1" color="#666666"><b>STATUS</b> 
	Jam Masuk      : <?php echo substr($tgl,11,19);?> #
	Jam Sekarang   : <?php echo substr($tanggal,11,19);?> # 
	Tanggal        : <?php echo substr($tanggal,0,10);?> #
	<?php
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		echo 'IP Anda : ',$_SERVER['HTTP_X_FORWARDED_FOR'],'<br>';
	}else{
		echo 'IP Anda : ',$_SERVER['REMOTE_ADDR'],"<br>";
	}
	?>
	</font>

	
	
	
	
	
	
<p>
<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>
</p>
	