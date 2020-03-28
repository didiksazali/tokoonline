<html>
</html>
<?php  session_start(); 
if (session_is_registered('id'))
{
	include "./include/conn.php";
	?>
	
	<table width="48%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
		<tr> 
			<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
			<td width="96%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Edit Guestbook</font></strong></div></td>
			<td width="2%"><img src="./img/kanan.jpg"></td>
		</tr>
		<tr>
			<td background="./img/b-kiri.jpg">&nbsp; </td>
			<td>
			<table width="480" align="center">
				<tr><td width="472">
	<?php
	
	
	?>
	<p align="center"><font face="verdana" size="2"><?
	//untuk paging
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
		?><a href="home.php?page=4&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><? echo $pages; ?></font></a><?
				$pages++;
		}
	}else{
		$pages=0;
	}
	?></font></p><?
	//akhir paging
	
	
	//proses halaman
	$page=(int)$_GET['id'];
	$offset=$page*$entries;
	$result=mysql_db_query($db,"select * from guestbook order by id_gb desc limit $offset,$entries",$koneksi); //output
	$jumlah=mysql_num_rows($query);
	

	if ($jumlah){
		?>
		
					
				
				
		  <div align="center">
		    <p><font color='#0066FF' face='verdana' size='2'><? echo $_GET['status'] ?></font></p>
		    </div>
		  <table width="471" border=0 align=center cellpadding="0">
		<tr>
			<td width="148"  bgcolor="#CCCCCC"><div align="center"><b><font size="2" face="Arial, Helvetica, sans-serif" color="#666666">NAMA</font></b></font></td>
			<td width="234"  bgcolor="#CCCCCC"><div align="center"><b><font size="2" face="Arial, Helvetica, sans-serif" color="#666666">PESAN</font></b></font></td>
			<td width="51"  bgcolor="#CCCCCC"><div align="center"><b><font size="2" face="Arial, Helvetica, sans-serif" color="#666666">HAPUS</font></b></td>
		</tr>
		<?php
		while ($data=mysql_fetch_array($result))
		{
			?>
			<tr>
			<td><font color='#666666' face='verdana' size='1'><? echo $data['tgl']; ?></font><br>
					<a href="mailto:<? echo $data['email'];?>" style="text-decoration:none" title="<? echo $data['email'];?>"><font color='#0066FF' face='verdana' size='2'><? echo $data['nama']; ?>
					</font></a></td>
			<td><font color='#000000' face='verdana' size='2'><? echo $data['pesan']; ?></font></td>
			<td>
			  <div align="center"><a href=warning.php?id=<? echo $data['id_gb']; ?>&type=guest&hal=home.php?page=4 style='text-decoration:none' title="Hapus">
			      <img src="./img/hapus.png" border="0"></a></div></td>
			</tr>
			<tr>
				<td height="12" colspan="6"><hr color="#CCCCCC"></td>
			</tr>
			<?php
		}
		?>
		</table>
		<?php
		
		}else{
		?><font color="#FF0000" face="verdana" size="2"><b><p align="center">Belum ada data!!</p></b></font><?
		}
		?>					
				
				
				
						
				</td></tr>
			</table>
			</td>
			<td background="./img/b-kanan.jpg">&nbsp;</td>
		</tr>
		<tr> 
			<td align="right"><img src="./img/kib.jpg"></td>
			<td bgcolor="#5686c6" ><div align="center"><font face="verdana" size="2" color="#FFFFFF"><b>Jumlah Guestbook : <b><? echo $jumlah ?></b></font></div></td>
			<td><img src="./img/kab.jpg"></td>
		</tr>
</table>	
		
		
    <p>&nbsp;</p>
    <p>
      <?php			
}else{
	?>
</p>
    <p>
      <script> document.location.href='akses.php?go=session'; </script>
      <?php
}
?>
        </p>
