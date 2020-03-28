<html>
<head><title>TokoOnline.com</title>
<script language="javascript" src="./include/klik.js"></script>
</head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<body background="./img/background.jpg">
<p>&nbsp;</p>

<table width="1001" height="341" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr valign="top">
	<td height="18" colspan="7" align="center"><? include "./include/banner.php"; ?></td>
</tr>


<tr>
	<td width="13" valign="top" align="left"  background="./img/b-kiri.jpg">&nbsp;</td>
	<td width="38" valign="top" colspan="0" rowspan="0">
		<?php include "menu1.php";?>
		<?php include "menu2.php";?><br>
		<?php include "counter.php"; ?><br>
		<?php include "jam.php"; ?><br>
	</td>
	
	<td width="23" valign="top" align="right" background="./img/b-kanan.jpg">&nbsp;</td>
	<td width="730" valign="top" align="center"><? include "isi.php" ?>	</td>		
	<td width="12" valign="top" align="right" background="./img/b-kiri.jpg">&nbsp;</td>
	<td width="166" valign="top" align="center"><br>
	<?php 
	
	if (session_is_registered('user_id'))
	{
		include "status.php";
	}else{
		include "login.php";
	} 
	
	?>
	<br>
	<?php include "voting.php"; ?><br>
	<?php //include "./include/slide.php"; ?>
	<br><br>
	<a href="ymsgr:sendIM?sumarna_agus"><img border="0" src="./img/ym.jpg" title="YM : sumarna_agus"> </a><br><br>
	<a href="http://www.facebook.com/agusumarna" target="_blank"><img border="0" src="./img/fb.jpg" title="FB : n_clausa@yahoo.com"> </a> <br><br>
	<a href="http://gunadarma.ac.id" target="_blank"><img src="./img/gundar.jpg" width="114" height="115" border="0" title="Gunadarma University"> </a>	<br><br></td>
	<td width="19" valign="top" align="right" background="./img/b-kanan.jpg">&nbsp;</td>
</tr>

<tr valign="top">
	<td height="18" colspan="7" align="center"><? include "./include/footer.php"; ?></td>
</tr>
</table>
<p>&nbsp;</p>
</body>
</html>