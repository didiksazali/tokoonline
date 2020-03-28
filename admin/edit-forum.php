<?php session_start();
if (session_is_registered('id'))
{
	include "./include/conn.php";
	?>
	
	
	
	<table width="46%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	<tr> 
		<td width="3%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="92%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Edit Forum</font></strong></div></td>
		<td width="3%"><img src="./img/kanan.jpg"></td>
	</tr>
	<tr>
		<td background="./img/b-kiri.jpg">&nbsp; </td>
		<td>
		<table width="547" align="center">
			<tr><td width="508"><div align="center"><font face="verdana" size="2">
			  </font>
			  
			  
			  
			  
			  
	          <?php
			//untuk paging
			$query=mysql_db_query($db,"select * from forum where ID_replay=0 order by tanggal asc",$koneksi); //input
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
			    <a href="home.php?page=5&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font face="verdana" size="2" color="#009900"><? echo $pages; ?>
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
			$result=mysql_db_query($db,"select * from forum where ID_replay=0 order by tanggal asc limit $offset,$entries",$koneksi); //output
			$jumlah=mysql_num_rows($query);
		
		
			
			if ($jumlah){
				?>
			  <font color='#0066FF' face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font></p>
			<table width="115%" border="0" align="center" cellpadding="0">
				<tr>
				  <td width="42%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">TOPIK</font></b></div>
				  </td>
				  <td width="14%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">REPLAY</font></b></div>
				  </td>
				  <td width="32%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">POSTING</font></b></div>
				  </td>
				  <td width="12%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">HAPUS</font></b></div>
				  </td>
				</tr>
				<?php
				while ($row=mysql_fetch_array($result))
				{
					$ID_topik=$row[0];
					$nama=$row[1];
					$email=$row[2];
					$topiku=$row[3];
					$isi=$row[4];
					$ID_replay=$row[5];
					$tanggal=$row[6];
					
					$replay=mysql_db_query($db,"select * from forum where ID_replay='$ID_topik'",$koneksi);
					$jml=mysql_num_rows($replay);
				?>
				
				<tr>
					<td align="left">
						<font face="verdana" size="4" color="#666666">
						<?php if (strlen($topiku)>20)
							{
								$topik=substr($topiku,0,20)."...";
							}else{
								$topik=$topiku;
							}
						?>
						
						<b><a href="edit-forum-reply.php?id=<? echo $ID_topik;?>" style="text-decoration:none " title="<? echo $topiku;?>">
						<font size="2" face="Arial, Helvetica, sans-serif" color="#0033FF"><? echo $topik;?></font></a>
						</b><br>
						</font>
						
						<font face="Courier New, Courier, mono" size="2" color="#666666">Isi : </font><font face="verdana" size="2"><? echo substr($isi,0,50);?></font>
					</td>
					
					<td align="center">
						<font face="verdana" size="2"><? echo $jml; ?></font>
					</td>
					
					<td align="center">
						<font face="verdana" size="-4" color="#666666"><? echo $tanggal; ?></font>
						<font face="verdana" size="-4" color="#666666"><br />Autor: <?php echo $nama; ?> </font>
					</td>
					
					<td align="center">
					
						<script language="javascript">
						<!--
						function konfirmasi()
						{
							tanya=confirm("Apakah anda yakin akan menghapus data ini?!")
							if (tanya !="0")
							{
								top.location="delete.php?id=<? echo $ID_topik; ?>&type=topik&hal=home.php?page=5"
							}
						}
						//-->
						</script>
					
						 <a href=warning.php?id=<? echo $row[0] ?>&type=topik&hal=home.php?page=5 style='text-decoration:none'>
						 <img src="./img/hapus.png" border="0" title="Hapus">
						 </a>
					</td>
				</tr>
				
				<tr>
					<td colspan="4"><hr color="#CCCCCC"></td>
				</tr>
				<?php	
				}
				?>
			</table>

			</body>
			</html>
		
			<?php
			}else{
			?><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font><?
			}
			?>		
					
				
					
							
					
		  </table>
	  </td>
				<td background="./img/b-kanan.jpg">&nbsp;</td>
				<td width="2%"></td>
	  </tr>
			<tr> 
				<td align="right"><img src="./img/kib.jpg"></td>
				<td bgcolor="#5686c6" ><div align="center"><strong><font color="#FFFFFF" size="2" face="verdana">Jumlah Forum : <b><? echo $jumlah; ?></b></font></strong></div></td>
				<td><img src="./img/kab.jpg"></td>
			</tr>
</table>
	
    <p>
      <?php
}else{
	echo "<script> document.location.href='konfirmasi.php?id=session'; </script>";
}
?>
</p>
    <p>&nbsp;        </p>
