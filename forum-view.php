<html><br>
<table width="45%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
<tr> 
	<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="95%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">View Forum</font></strong></div></td>
	<td width="3%"><img src="./img/kanan.jpg"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><table width="489" align="center">
		<tr><td width="481">
		
		<table width="133%" border="0">
		<tr>
			<td bgcolor="#CCCCFF" align="left">
			<?php
			#menampilkan topik
			$ID_topik=$_GET['ID_topik'];
			
			include"./include/conn.php";
			$query=mysql_db_query($db,"select * from forum where ID_topik='$ID_topik'",$koneksi); //untuk posting
			$quey=mysql_db_query($db,"select * from forum where ID_replay='$ID_topik'",$koneksi); //untuk jumlah replay
			$jml=mysql_num_rows($quey); //untuk jumlah replay
			
			while ($row=mysql_fetch_array($query))
			{
				$ID_topik=$row[0];
				$nama=$row[1];
				$email=$row[2];
				$topik=$row[3];
				$isi=$row[4];
				$ID_replay=$row[5];
				$tanggal=$row[6];	
			}
			?>
				<table>
				<tr>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Topik</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $topik;?></font></td>
				</tr>
				<tr>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Penulis</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="mailto:<? echo $email;?>" style="text-decoration:none "><? echo $nama; ?></a></font></td>
				</tr>
				<tr>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tanggal</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $tanggal;?></font></td>
				</tr>
				<tr>
					<td valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Isi</font></td>
					<td valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
					<td valign="top"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $isi;?></font></td>
				</tr>
				<tr>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Reply</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">:</font></td>
					<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $jml;?></font></td>
				</tr>
				</table>
				
			</td>
		</tr>
		<tr>
			<td align="left">
			<p align="center"><font face="verdana" size="2"><?
			//untuk paging
			$query2=mysql_db_query($db,"select * from forum where ID_replay='$ID_topik' order by tanggal asc",$koneksi); //input
			$get_pages=mysql_num_rows($query2);
			
			if ($get_pages>$entries)  //proses
			{
				echo "<br>Halaman : ";
				$pages=1;
				while($pages<=ceil($get_pages/$entries))
				{
					if ($pages!=1)
					{
						echo " | ";
					}
				?>
				<a href="index.php?page=9&id=<? echo ($pages-1); ?>&ID_topik=<? echo $_GET['ID_topik']; ?> " style="text-decoration:none"><font face="verdana" size="2" color="#009900"><? echo $pages; ?></font></a> 
				 <?php
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
			$result=mysql_db_query($db,"select * from forum where ID_replay='$ID_topik' order by tanggal asc limit $offset,$entries",$koneksi); //output
			$jumlah=mysql_num_rows($query2);
			
			
			if($jumlah){
			
				while ($row2=mysql_fetch_array($result))
				{
					$ID_topik2=$row2[0];
					$nama2=$row2[1];
					$email2=$row2[2];
					$topik2=$row2[3];
					$isi2=$row2[4];
					$ID_replay2=$row2[5];
					$tanggal2=$row2[6];	
					
					
					?><br><br><font face="verdana" size="2"><b>Re : <?php echo $topik2 ?></b></font>
					<font face="verdana" size="1" color="#666666"><?
					echo "Posted : ".$tanggal2;
					?> By : <a href="mailto:<? echo $email2;?>" style="text-decoration:none "><? echo $nama2; ?></a><? 
					?></font><?
					
					echo "<br><br><font face='verdana' size='2'>";
					echo $isi2;
					echo "<hr></font>";
				}
				
			}else{
				?>
				<p align="center"><font color="#0066FF" face="verdana" size="2"><blink>Belum ada data!!</blink></font></p>
				<?php
			}
				
			
			?>
			</td>
		</tr>
		<tr>
			<td>
				<center>
				  <p><a href="index.php?page=10&ID_topik=<? echo $ID_topik; ?>&topik=<? echo $topik;?>" style="text-decoration:none ">
				      </a><a href="index.php?page=4" title="Kembali"><img src="./img/back.png" alt="kembali" border="0"></a><a href="index.php?page=10&ID_topik=<? echo $ID_topik; ?>&topik=<? echo $topik;?>" style="text-decoration:none "><img src="./img/reply.gif" border="0"></a></p>
				  
			      </center>
			</td>
		</tr>
		</table>
		
		</td></tr>
	</table>
	</td>
	<td width="3%"></td>
</tr>
<tr> 
	<td align="right"><img src="./img/kib.jpg"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>
<p>&nbsp;</p>
</html>
