<?php session_start();
if (session_is_registered('user_id')){

	$iduser=$_SESSION['user_id'];
	
	include "./include/conn.php";
	
	$alamat=htmlentities(ucwords($_POST['alamat']));
	$kota=htmlentities(ucwords($_POST['kota']));
	$kodepos=htmlentities(ucwords($_POST['kodepos']));
	$provinsi=htmlentities(ucwords($_POST['provinsi']));
	$telpon=htmlentities($_POST['telpon']);
	
	//periksa apakah udah submit
	if (isset($_POST['alamat']))
	{
		//periksa apakah masih kosong
		if (empty($alamat) || empty($kota) || empty($kodepos) || empty($provinsi) || empty($telpon))
		{
			echo "<script> document.location.href='index.php?page=8&status=<font color=red>Maaf, Data Anda belum lengkap!!</font>'; </script>";

		}else{	
			
			$update=mysql_db_query($db,"UPDATE daftar SET alamat='$alamat',kota='$kota', kodepos='$kodepos', provinsi='$provinsi', telpon='$telpon' where id='$iduser' ",$koneksi);
			
			//jika sudah berhasil 
			if ($update)
			{
				echo "<script> document.location.href='index.php?page=12'; </script>";
			}else{
				echo "GAGAL";
			}
		}

	}else{
		unset($_POST['user']);
	}
	?>
	<br>
	<table width="63%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	  <tr>
		<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="96%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">PEMESANAN</font></strong></div></td>
		<td width="2%"><img src="./img/kanan.jpg"></td>
	  </tr>
	  <tr>
		<td background="./img/b-kiri.jpg">&nbsp;</td>
		<td valign="top">
		
	
		 
		  <div align="center">
		    <?php
		include "./include/conn.php";
		$query=mysql_db_query($db,"select * from daftar where id='$iduser'",$koneksi);
		while ($row=mysql_fetch_array($query))
		{
		$nama=$row['nama'];
		$alamat=$row['alamat'];
		$kota=$row['kota'];
		$kodepos=$row['kodepos'];
		$provinsi=$row['provinsi'];
		$telpon=$row['telpon'];
		}
		?>
		      <font color="#0033FF" face='verdana' size='2'><? echo $_GET['status'] ?>
	          </p>
	        </font>
		    
	        </div>
		  <form action="index.php?page=8" method="post">
		<table width="343" border="0" align="center">
		<tr>
		<td width="128"><font face="verdana" size="2">Nama Lengkap </font></td>
		<td width="205"><font face="verdana" size="2" color="#666666"><? echo $nama; ?></font></td>
		</tr>
		
		<tr>
		<td valign="top"><font face="verdana" size="2">Alamat</font></td>
		<td><textarea cols="20" rows="7" name="alamat"><? echo $alamat;?></textarea></td>
		</tr>
		
		<tr>
		<td><font face="verdana" size="2">Kota</font></td>
		<td>
			<input type="text" size="20" name="kota" value="<? echo $kota;?>"/>
		</td>
		</tr>
		
		<tr>
		<td><font face="verdana" size="2">Kode POS</font></td>
		<td>
			<input type="text" size="20" name="kodepos" value="<? echo $kodepos;?>"/>
		</td>
		</tr>
		
		<tr>
		<td><font face="verdana" size="2">provinsi</font></td>
		<td>
			<input type="text" size="20" name="provinsi" value="<? echo $provinsi;?>"/>
		</td>
		</tr>
		
		<tr>
		<td><font face="verdana" size="2">Telpon (HP)</font></td>
		<td>
			<input type="text" size="20" name="telpon" value="<? echo $telpon;?>" />
		</td>
		</tr>
		
		<tr>
		<td>&nbsp;</td>
		<td><input name="submit" type="submit" value="Simpan" /></td>
		</tr>
		</table>
		</form >



		</td>
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
