<?php session_start(); 
if (session_is_registered('id'))
{
	include "./include/conn.php";
	?>
	<table width="57%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	<tr> 
		<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
	  <td width="87%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Edit Member </font></strong></div></td>
		<td width="11%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td background="./img/b-kiri.jpg">&nbsp; </td>
		<td>
		<table width="698" align="center">
			<tr><td width="690"><div align="center"><font face="verdana" size="2">
			  </font>
			  
	          <!--Isi-->
			  
			  
	          <?php
			//untuk paging
			$query=mysql_db_query($db,"select * from daftar",$koneksi); //input
			$get_pages=mysql_num_rows($query);
			
			if ($get_pages>$entries)  //proses
			{
				echo "<font face=verdana size=2>Halaman : </font>";
				$pages=1;
				while($pages<=ceil($get_pages/$entries))
				{
					if ($pages!=1)
					{
						echo " | ";
					}
				?>
			    <a href="home.php?page=3&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font face="verdana" size="2" color="#009900"><? echo $pages; ?>
		          </font></a> 
			   <?php
						$pages++;
				}
			}else{
				$pages=0;
			}
			?>
			  </font>
			  </p>
			  </div>
			  <p align="center">
			  <?php
			//akhir paging
		
		
			//proses halaman
			$page=(int)$_GET['id'];
			$offset=$page*$entries;
			$result=mysql_db_query($db,"select * from daftar order by tanggal asc limit $offset,$entries",$koneksi); //output
			$jumlah=mysql_num_rows($query);
			
			if ($jumlah){
				?>
			  <font color='#0066FF' face='verdana' size='2'><blink>
			  </blink></font></p>
			  <p><font color='#0066FF' face='verdana' size='2'>
		      <div align="center"><blink><? echo $_GET['status'] ?></blink></div>
			    </font></p>
				  <table width="687" border="0" align="center" cellpadding="0">
					<tr>
						<th width="166" bgcolor="#CCCCCC"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">NAMA LENGKAP</font></th>
						<th width="91" bgcolor="#CCCCCC"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">USERNAME</font></th>
						<th width="122" bgcolor="#CCCCCC"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">EMAIL</font></th>
						<th width="217" bgcolor="#CCCCCC"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">TANGGAL</font></th>
						<th width="69" bgcolor="#CCCCCC"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">HAPUS</font></th>
					</tr>
				<?php
				while($row=mysql_fetch_row($result))
				{
					?><tr>
					  <td><font face="verdana" size="2"><? echo $row[1]; ?></font></td>
					  <td align="center"><font  face="verdana" size="2"><? echo $row[2]; ?></font></td>
					  <td ><font  face="verdana" size="2"><? echo $row[3]; ?></font></td>
					  <td align="center"><font  face="verdana" size="2"><? echo $row[5] ?></font></td>
					  <td align="center">
						 <a href=warning.php?id=<? echo $row[0]; ?>&type=member&hal=home.php?page=3 style='text-decoration:none' title="hapus">
						 <img src="./img/hapus.png" border="0" title="Hapus">
						 </a>
					  </td>
					</tr>
					<tr><td colspan="6"><hr color="#CCCCCC"></td></tr>
			  <?php
				}
				?></table>
				  <div align="center">
				    <?php
			}else{
				?>
				      <font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font>
				      <?php
			}
			?>
				    
				    
				    
		            </div></td></tr>
		</table>
		</td>
		<td background="./img/b-kanan.jpg">&nbsp;</td>
		<td width="0%"></td>
	</tr>
	<tr> 
		<td align="right"><img src="./img/kib.jpg"></td>
		<td bgcolor="#5686c6" ><div align="center"><font color="#FFFFFF" face="verdana" size="2">
		<strong>Jumlah Member : <?php echo $jumlah; ?></strong></font></div></td>
		<td><img src="./img/kab.jpg"></td>
	</tr>
</table>

<p>
	  <?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>
</p>
	<p>&nbsp;</p>
