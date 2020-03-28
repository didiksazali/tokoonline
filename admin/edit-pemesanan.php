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
		<td width="96%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Pemesanan</font></strong></div></td>
		<td width="2%"><img src="./img/kanan.jpg"></td>
	</tr>
	
	<tr>   
		<td background="./img/b-kiri.jpg"></td>
		<td>  
			<table width="559" align="center"> 
				 <tr><td width="518">     
				
				 
				
				
				   <div align="center">
				     <p><a href="home.php?page=13" style="text-decoration:none" title="Masukan Produk Baru"></a></p>
				    <font color='#0066FF' face='verdana' size='2'><div align="center"><blink><? echo $_GET['status'] ?></blink></div>
			    </font></p>
				   </div>
				   <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			    <?php
				//untuk paging
				$query=mysql_db_query($db,"select * from laporan ",$koneksi); //input
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
							<a href="home.php?page=7&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><? echo $pages; ?></font></a> 
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
				$result=mysql_db_query($db,"select * from laporan order by tgl asc limit $offset,$entries",$koneksi); //output
				$jumlah=mysql_num_rows($query);
					
				
				if ($jumlah){
					?>
				   </div><font face="verdana" size="2" color="#666666"><? echo "Tanggal Sekarang : ".$tanggal;?></font><br><br>
					   <table align="center" width="563" border="0">
				<tr>
				  <td width="5%" bgcolor="#CCCCCC"><div align="center"><b>
				  <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">NO</font></b></div>
				  </td>
				  <td width="21%" bgcolor="#CCCCCC"><div align="center"><b>
				  <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">KODE PESANAN</font></b></div>
				  </td>
				  <td width="23%" bgcolor="#CCCCCC"><div align="center"><b>
				  <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">PELANGGAN</font></b></div>
				  </td>
				  <td width="22%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">TANGGAL</font></b>
				  </div> </td>
				  <td width="16%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">STATUS</font></b></div>
				  </td>
				  <td width="13%" bgcolor="#CCCCCC"><div align="center"><b><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">AKSI</font></b></div>
				  </td>
				</tr>
					<?php
					
					while ($row=mysql_fetch_array($result))
					{
					
							$idlap=$row['idlap'];
							$iduser=$row['iduser'];
							$tgl=$row['tgl'];
							$status=$row['status'];
							$kode=$row['kode'];
							
							
							
							
							//translate id
							$transbrg=mysql_db_query($db,"select * from daftar where id='$iduser'",$koneksi);
							while ($row=mysql_fetch_array($transbrg)){
								$nama=$row['nama'];
							}
							
							
							
					?>
					<tr>
						<td align="center">
							<font face="verdana" size="1" color="#999999"><? echo $c=$c+1;?></font>
						</td>
						
						<td align="center">
							<font face="verdana" size="1" color="#666666"><? echo $kode;?></font>
						</td>
						
						<td align="center">
							<font face="verdana" size="1" color="#999999"><? echo $nama;?></font>
						</td>
						
						<td align="center">
							<font face="verdana" size="1" color="#999999"><? echo $tgl;?></font>
						</td>
						
						<td align="center">
							<font face="verdana" size="1" color="#333333"><? echo ucwords($status);?></font>
						</td>
						
						<td align="center">
							<a href="#" onClick="window.open('cetak-laporan.php?idlap=<? echo $idlap;?>&iduser=<? echo $iduser;?>','scrollwindow','top=200,left=350,width=575,height=500');" style="text-decoration:none" title="Info Situs"><img src="./img/print.png" border="0" title="Cetak Laporan"></a>
							
							<a href="home.php?page=12&nama=<? echo $nama;?>&iduser=<? echo $iduser;?>">
							<img src="./img/update.png" border="0" title="Ganti Status Pemesanan"></a>
							
							<a href=warning.php?id=<? echo $idlap; ?>&type=pesanan&hal=home.php?page=7 style='text-decoration:none' title="hapus">
							<img src="./img/hapus.png" border="0" title="Hapus">
							</a>
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