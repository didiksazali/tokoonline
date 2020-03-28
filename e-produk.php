<?php session_start(); 
	include "./include/conn.php";
?>

<html> 
<head> 
<title>Edit Artikel</title>
<script language="javascript">
<!--
function konfirm(idbrg)
{
	tanya=confirm("Apakah anda yakin akan membeli barang ini ?")
	if (tanya !="0")
	{
		//alert(idbrg);
		top.location="e-shoping.php?idbrg="+idbrg;
	}
}
//-->
</script>
</head>
<br />
<table width="42%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
<tr> 
	<td width="8%" align="right"><img src="./img/kiri.jpg"></td>
	<td width="90%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">PRODUK</font></strong></div></td>
	<td width="2%"><img src="./img/kanan.jpg"></td>
</tr>

<tr>   
	<td background="./img/b-kiri.jpg"></td>
	<td>  
		<table width="505" align="center"> 
			 <tr><td width="497">     
			
			 
			
			
			   <div align="center">
				 <p><a href="home.php?page=13" style="text-decoration:none" title="Masukan Produk Baru"></a></p>
				<p><font color='#0066FF' face='verdana' size='2'>
		  <div align="center"><? echo $_GET['status'] ?></div>
			</font></p>
			   <div align="left"><a href="index.php?page=6" style="text-decoration:none"><font size="2" face="Verdana" color="#666666">Shopping cart</font><img src="./img/cart.gif" border="0"></a></div>
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
						<a href="index.php?page=5&id=<? echo ($pages-1); ?> " style="text-decoration:none"><font color="#0066FF"><? echo $pages; ?></font></a> 
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
				   <table align="center" width="497" border="0">
			<tr>
			  <td width="26%" bgcolor="#CCCCCC"><div align="center"><b>
					<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">GAMBAR</font></b></div>
			  </td>
			  <td width="39%" bgcolor="#CCCCCC"><div align="center"><b>
			  <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">BARANG</font></b></div></td>
			  <td width="22%" bgcolor="#CCCCCC"><div align="center"><b>
					<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">HARGA</font></b></div>
			  </td>
			  <td width="13%" bgcolor="#CCCCCC"><div align="center"><b>
					<font color="#666666" size="2" face="Arial, Helvetica, sans-serif">AKSI</font></b></div>
			  </td>
			</tr>
				<?php
				
				while ($row=mysql_fetch_array($result))
				{
				?>
				<tr>
					<td align="center" valign="top">
						<?php 
						$gambar=$row['gambar'];
						$pic=substr($gambar,15,40); 
						$idbrg=$row['idbrg'];
						
						?>
						<img src="./admin/gambar/<? echo $pic; ?>" width="100" height="100" border="0">
					</td>
					
					<td align="left" valign="top">
						<font face="verdana" size="2" color="#666666">
						<?php 
						echo "<font color='#99CC00' size=4>".$row['namabrg']."</font>";
						echo "<br>";
						echo $row['spek'];
						//echo $idbrg;
						?></font>
					</td>
					
					
					<td align="left">
						<font face="verdana" size="2" color="#666666"><? echo "Rp ".$row['hargabrg'];?></font>
					</td>
					
					<td align="center">
						<a  href="#" title="Klik untuk membeli" onClick="konfirm(<? echo $idbrg; ?>)"><img src="./img/beli.jpg" border="0"></a>
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
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">Jumlah Barang : <b><? echo $jumlah; ?></font></strong></div></td>
	<td><img src="./img/kab.jpg"></td>
</tr>
</table>


 <p>&nbsp;</p>
