<?php session_start();
if (session_is_registered('user_id')){
	include "./inlcude/conn.php";
	$tanggal;
	$iduser=$_SESSION['user_id'];
	$kode=$_GET['kode'];
	
	
	//cek status pelanggan
	$view=mysql_db_query($db,"select * from laporan where iduser='$iduser'",$koneksi);
	while($row=mysql_fetch_array($view)){
		$status=$row['status'];
	}
	
	//cek apakan dia pernah bertransaksi
	$cek=mysql_num_rows($view);
	
	//jik belum ada id pelanggan di tabel laporan, berarti pelanggan tersebut belum pernah transaksi
	//jadi dia boleh belakukan transaksi (syarat pertama)
	if (!empty($cek)){
		//echo "pernah transaksi";
		
		//jika transaksi sebelumnya sudah lunas, maka boleh transaksi lagi
		if ($status=='proses'){
			
		}else{
			$deletetrans=mysql_db_query($db,"delete from shoping where iduser='$iduser'",$koneksi);
			//masukan ke laporan
			$insert=mysql_db_query($db,"insert into laporan(iduser,tgl,status,kode) values('$iduser','$tanggal','proses','$kode')",$koneksi); 
			
		}		
	}else{
		$deletetrans=mysql_db_query($db,"delete from shoping where iduser='$iduser'",$koneksi);
		//masukan ke laporan
		$insert=mysql_db_query($db,"insert into laporan(iduser,tgl,status,kode) values('$iduser','$tanggal','proses','$kode')",$koneksi); 
		
	}

	
?><br>
	<table width="74%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99" align="center">
	  <tr>
		<td width="2%" align="right"><img src="./img/kiri.jpg"></td>
		<td width="96%" bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="2" color="#FFFFFF">KONFIRMASI</font></strong></div></td>
		<td width="2%"><img src="./img/kanan.jpg"></td>
	  </tr>
	  <tr>
		<td background="./img/b-kiri.jpg">&nbsp;</td>
		<td valign="top"><p align="right">&nbsp;
		</p>
		  <p align="right">
		  <a href="#" onclick="window.print()" style="text-decoration:none" title="Klik untuk cetak Nota"><font color="#00CC33" size="2" face="Verdana, Arial, Helvetica, sans-serif">Print Nota <img src="./img/print.png" border="0"/></font></a><br />
	        </p>
		  <p>&nbsp;</p>
		  <p><em><font color="#666666" size="2" face="Verdana, Arial, Helvetica, sans-serif">Terima kasih Anda telah bertransaksi dengan kami,</font></em></p>
		  <p align="center"><img src="./img/bisnis.jpg" alt="ds" border="0"></p>
		  <p><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Hal-hal yang perlu Anda perhatikan :</font></p>
	    <ol>
	      <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Segera lakukan pembayaran ke rekening kami :<br>
          (<strong>Bank DKI, Cabang Univ Gunadarma, No.502.20.22304.6, a/n Agus Sumarna</strong>)          </font></li>
          <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Jika Anda sudah melakukan pembayaran, <em>scan</em> blanko bukti transfer Bank dan KTP yang masih berlaku.</font></li>
	      <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Kemudian kirim ke alamat <strong>sumarna_agus@yahoo.com</strong>. dengan <em>Subject:</em><strong>Pesanan <?php echo $_GET['kode'];?></strong></font></li>
	      <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Barang akan dikirim paling lambat 3 hari setelah pembayaran. <br>
	      </font></li>
	      <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Jika lebih dari 3 hari tidak melakukan pembayaran, maka transaksi akan kami batalkan.</font></li>
	      </ol>
	    <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Terima kasih atas kepercayaan anda..<br>
          Salam,</font></p>
	    <p align="left">&nbsp;<font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
        Divisi Keuangan<br>
        tokoOnline.com</font></p>
	    <p align="center"><input type="button" value="Selesai Transaksi" onClick="location.replace('ok.php');"/><br><br />
	      </p></td>
		<td background="./img/b-kanan.jpg">&nbsp;</td>
	  </tr>
	  <tr>
		<td align="right"><img src="./img/kib.jpg"></td>
		<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
		<td><img src="./img/kab.jpg"></td>
	  </tr>
</table><br />
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
