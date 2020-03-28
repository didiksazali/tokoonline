<?php session_start();
if (session_is_registered('user_id')){

	$iduser=$_SESSION['user_id'];
	
?>
	<br>
	<table width="32%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	  <tr>
		<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="77%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">RINCIAN</font></strong></div></td>
		<td width="21%"><img src="./img/kanan.jpg"></td>
	  </tr>
	  <tr>
		<td background="./img/b-kiri.jpg">&nbsp;</td>
		<td valign="top">
		
	
		<?php
		include "./include/conn.php";
		?>
		<br />
		<a href="#" onclick="window.print()" style="text-decoration:none" title="Klik untuk cetak Nota"><font color="#00CC33" size="2" face="Verdana, Arial, Helvetica, sans-serif">Print Nota <img src="./img/print.png" border="0"/></font></a><br />
			<table width="418" border="0" align="center" cellspacing="2">
			<tr bgcolor="#999999">
				<th width="28"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">NO</font></th>
				<th width="245"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">NAMA BARANG</font></th>
				<th width="131"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">HARGA</font></th>
			</tr>
		<?php
		$query=mysql_db_query($db,"select * from shoping where iduser='$iduser' order by tgl",$koneksi);
		$pemesanan=mysql_db_query($db,"select * from pemesanan where iduser='$iduser' order by tgl",$koneksi);
		$cek=mysql_num_rows($query);
		
		
		if (!empty($cek)){
			?>
			
			<?php
			while ($row=mysql_fetch_array($query)){
			$idshop=$row['idshop'];
			$idbrg=$row['idbrg'];
			$iduser=$row['iduser'];
			
			$trow=mysql_fetch_array($pemesanan);
			$idpesan=$trow['idpesan'];
			
				//translate id
				$transbrg=mysql_db_query($db,"select * from produk where idbrg='$idbrg'",$koneksi);
				while ($row=mysql_fetch_array($transbrg)){
					$namabrg=$row['namabrg'];
					$hargabrg=$row['hargabrg'];
					$total=$hargabrg+$total;
				}
				
			?>
			  <tr>
				<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $c=$c+1; ?></font></td>
				<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo $namabrg;?></font></td>
				<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? echo "Rp ".$hargabrg;?></font></td>
			  </tr>
			 <?php
			 
			}
			?>
			<tr><td colspan="4"><hr  color="#CCCCCC"/></td></tr>
			<tr>
			  <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><em>*Ongkos kirim menggunakan jasa TIKI </em></font></td>
			  <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Rp 15000 </font></td>
			  </tr>
			<tr>
				<td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>TOTAL</b></font></td>
				<?php 
				$tiki='15000';
				$jumlah=$total+$tiki; 
				?>
				<td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><? echo "Rp ".$jumlah; ?></b></font></td>
			</tr>
			<tr>
				 <td colspan="4">
				 <p align="center">&nbsp;</p>
				 
				 <?php
				 $user=mysql_db_query($db,"select * from daftar where id='$iduser'",$koneksi);
				 
				 while ($row=mysql_fetch_array($user))
				 {
					$nama=$row['nama'];
					$email=$row['email'];
					$alamat=$row['alamat'];
					$kota=$row['kota'];
					$kodepos=$row['kodepos'];
					$provinsi=$row['provinsi'];
					$telpon=$row['telpon'];
				 }
				 ?>
				<table width="421" border="0" align="left">
				<tr>
				<td width="128"><font face="verdana" size="2">Nama Lengkap</font></td>
				<td width="277"><font face="verdana" size="2" color="#666666"><? echo $nama; ?></font></td>
				</tr>
				
				<tr>
				<td valign="top"><font face="verdana" size="2">Email</font></td>
				<td width="277"><font face="verdana" size="2" color="#666666"><? echo $email; ?></font></td>
				</tr>
				
				<tr>
				<td><font face="verdana" size="2">Alamat</font></td>
				<td width="277"><font face="verdana" size="2" color="#666666"><? echo $alamat; ?></font></td>
				</tr>
				
				<tr>
				<td><font face="verdana" size="2">Kota</font></td>
				<td width="277"><font face="verdana" size="2" color="#666666"><? echo $kota; ?></font></td>
				</tr>
				
				<tr>
				<td><font face="verdana" size="2">Provinsi</font></td>
				<td width="277"><font face="verdana" size="2" color="#666666"><? echo $provinsi; ?></font></td>
				</tr>
			
				
				<tr>
				<td><font face="verdana" size="2">Telpon (HP)</font></td>
				<td width="277"><font face="verdana" size="2" color="#666666"><? echo $telpon; ?></font></td>
				</tr>
				<tr><td colspan="4" align="center"><p>&nbsp;</p>
				  <p><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Kode Pemesanan : 
				    <?php  echo $kode=date('dmy-His');?>
				    </font></strong></p>
          <p>
				      <input type="button" value="Konfirmasi" onClick="location.replace('index.php?page=13&kode=<? echo $kode;?>');"/>
		          </p></td>
				</tr>
				</table>				 </td>
			</tr>
			</table>
			<?php
		}else{
			echo "<p align=center><font face='verdana' size='2' color='green'>Maaf, Belum ada barang yang Anda pilih</font></p>";
		}
		?>		</td>
		<td background="./img/b-kanan.jpg">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="right"><img src="./img/kib.jpg"></td>
		<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
		<td><img src="./img/kab.jpg"></td>
	  </tr>
</table>
<?php
}else{
?>
<br />
<p align="center"><img src="./img/troli.jpg"  border="0"/>  </p>
<p align="center"><br />
  <font color="#009966" size="2" face="Verdana, Arial, Helvetica, sans-serif">Maaf, Anda belum memilih produk kami :)  </font></p>
<p align="center"><a href="index.php?page=5" style="text-decoration:none" title="Lakukan transaksi"><img src="./img/beli.jpg" border="0" /></a></p>
<?php
}
?>
