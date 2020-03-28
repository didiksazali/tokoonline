<html>
<head>
<title>View</title>
</head>
<body>

<p><font face="verdana" size="2">
<?php
	include "./include/conn.php";
	$query=mysql_db_query($db,"select * from guestbook",$koneksi); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries)  //proses
	{
		echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			if ($pages!=1)
			{
				echo " | ";
			}
		?>
		<a href="index.php?page=3&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"><? echo $pages; ?></font></a> 
		 <?php
				$pages++;
		}
	}else{
		$pages=0;
	}
	
	
	?>
	  </font>
	<?php
	$page=(int)$_GET['id'];
	$offset=$page*$entries;
	
	$result=mysql_db_query($db,"select * from guestbook order by tgl desc limit $offset,$entries",$koneksi); //output
	$jumlah=mysql_num_rows($query);
	
?>
</p>
<br>
<table align="center" width="423" border="0">
	<?php
	if ($jumlah){
		while ($row=mysql_fetch_array($result))
		{
		?>
			<tr>
				<td valign="top" colspan="2">
					<img src="./img/guestbook.png" border="0">
				</td>
				<td width="349">
					<b><font face="verdana" size="2" color="#333333">Dari : <?php echo $row['nama']; ?></font></b><br>
					<font face="verdana" size="1" color="#999999"><? echo $row['tgl']; ?></font><br><br>
					<font face="verdana" size="2"><? echo $row['pesan']; ?></font><br>
			  </td>
			</tr>
			<tr>
				<td colspan="3"><hr color="#CCCCCC"></td>
			</tr>
		<?php	
		} 
	}else{
		?><p align="center"><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></p><?
	}
	?>
</table>
<p><font face="verdana" size="2" color="#333333">Jumlah Guestbook : <?php echo $jumlah; ?></font></p>
</body>
</html>
