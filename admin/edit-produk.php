<?php session_start(); 
	include "./include/conn.php";
if (session_is_registered('id'))
{
?>

	<html> 
	<head> 
	<title>Edit Artikel</title>
	<table width="49%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	<tr> 
		<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="96%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Edit Produk </font></strong></div></td>
		<td width="2%"><img src="./img/kanan.jpg"></td>
	</tr>
	
	<tr>   
		<td background="./img/b-kiri.jpg"></td>
		<td>  
			<table width="559" align="center"> 
				 <tr><td width="518">     
				
				 
				
				
				   <div align="center">
				     <p><a href="home.php?page=13" style="text-decoration:none" title="Masukan Produk Baru"><img src="./img/new-artikel.png" / border="0"><font face="verdana" size="2" color="#666666">Tambah Barang</font></a></p><br>
				    <p><font color='#0066FF' face='verdana' size='2'>
		      <div align="center"><blink><? echo $_GET['status'] ?></blink></div>
			    </font></p>
				   </div>
				   <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			    <?php
				//untuk paging
				$query=mysql_db_query($db,"select * from produk order by tgl asc",$koneksi); //input
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
							<a href="home.php?page=6&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><? echo $pages; ?></font></a> 
						 <?php
							$pages++;
					}
				}else{
					$pages=0;
				}
				?>
						 </font>
					 </p>
						 
						 <?php
				//akhir paging
				
				
				//proses halaman
				$page=(int)$_GET['id'];
				$offset=$page*$entries;
				$result=mysql_db_query($db,"select * from produk order by tgl asc limit $offset,$entries",$koneksi); //output
				$jumlah=mysql_num_rows($query);
					
				
				if ($jumlah){
					?>
				   </div>
					   <table align="center" width="563" border="0">
				<tr>
				  <td width="19%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">GAMBAR</font></b></div>
				  <td width="18%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">BARANG</font></b>
				  </div>
				  </td>
				  <td width="28%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">RINCIAN</font></b></div>
				  </td>
				  <td width="15%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">HARGA</font></b></div>
				  </td>
				  <td width="10%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">STOK</font></b></div>
				  <td width="10%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">EDIT</font></b></div>
				  </td>
				</tr>
					<?php
					
					while ($row=mysql_fetch_array($result))
					{
					?>
					<tr>
						<td align="center">
							<?php 
							$gambar=$row['gambar'];
							$pic=substr($gambar,15,40); 
							
							?>
							<img src="./gambar/<? echo $pic; ?>" width="100" height="100" border="0">
						</td>
						
						<td align="center">
							<font face="verdana" size="1" color="#999999"><? echo $row['namabrg'];?></font>
						</td>
						
						<td align="left">
							<font face="verdana" size="1" color="#999999"><? echo $row['spek'];?></font>
						</td>
						
						<td align="left">
							<font face="verdana" size="1" color="#999999"><? echo " Rp ".$row['hargabrg'];?></font>
						</td>
						
						<td align="center">
							<font face="verdana" size="1" color="#999999"><? echo $row['stok'];?></font>
						</td>
						
						
						<td align="center">
							<a href=home.php?page=14&id=<? echo $row[0]; ?> style='text-decoration:none' title="Update terakhir : <?php echo $row['tgl'];?>">
							<img src="./img/update.png" border="0"></a>&nbsp;
							<a href=warning.php?id=<? echo $row[0]; ?>&gambar=<? echo $pic; ?>&type=produk&hal=home.php?page=6 style='text-decoration:none' title="hapus">
							<img src="./img/hapus.png" border="0"></a>
						</td>
						
					</tr>
					
					<tr>
						<td colspan="6"><hr color="#CCCCCC"></td>
					</tr>
					<?php
					}
					?> 
				   </table>
					<?php
				
				}else{
					echo "<font color='#FF0000' face='verdana' size='2'><b>Belum ada data!!</b></font>";
				}
				?>
				 
				 
						
				</td></tr> 
		  </table>
		</td>
		<td background="./img/b-kanan.jpg"></td>
	</tr>
	<tr> 
		<td align="right"><img src="./img/kib.jpg"></td>
		<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Jumlah Artikel : <b><? echo $jumlah; ?></font></strong></div></td>
		<td><img src="./img/kab.jpg"></td>
	</tr>
	</table>


    <p>&nbsp;</p>
    <?php	
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>