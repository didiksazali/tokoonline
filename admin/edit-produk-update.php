<?php session_start();
ini_set("display_errors",FALSE);

if (session_is_registered('id'))
{
	include "./include/conn.php";
	$ok=$_POST['ok'];
	$id=$_GET['id']; //id catatan
	$fotodoc=$_FILES['fotodoc']['name'];
	$type=$_FILES['fotodoc']['type'];
	$gambar=$_POST['gambar'];
	
	if (isset($_POST['spek']))//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan isi
	{
		$tanggal;
		$namabrg=htmlentities($_POST['namabrg']);
		$hargabrg=htmlentities($_POST['hargabrg']);
		$stok=htmlentities($_POST['stok']);
		$spek=$_POST['spek'];
		
		$idu=$_POST['id'];
		
		if ($ok=="ok"){
			//echo "pilih ok, berarti gambar tidak di ubah";
			
			//kalo gambar gak mau di ganti
			if ($namabrg=="" || $hargabrg=="" || $stok=="" ||$spek=="")//periksa jika data yang dimasukan belum lengkap
			{
				?><script> document.location.href='home.php?page=14&id=<? echo $id; ?>&status=<font color=red>Maaf, Data Anda belum lengkap</font>'; </script>;<?
			}
			else
			{	
				$upload=mysql_db_query($db,"UPDATE produk SET tgl='$tanggal',namabrg='$namabrg', spek='$spek',hargabrg='$hargabrg',stok='$stok' where idbrg='$idu'",$koneksi);
				?><script> document.location.href='home.php?page=6&status=Data berhasil di ubah'; </script>";<?
			}
			
		
		}else{
			//echo "tidak pilih ok";
			
			//kalo gambar di ganti
			if ($fotodoc=="" || $namabrg=="" || $hargabrg=="" || $stok=="" ||$spek=="")//periksa jika data yang dimasukan belum lengkap
			{
				?><script> document.location.href='home.php?page=14&id=<? echo $id; ?>&status=<font color=red>Maaf, Data Anda belum lengkap</font>'; </script>;<?
			}
			else
			{
				//echo "salah parameter";
				
				
				$uploaddir='./gambar/';
				$alamatgambar=$uploaddir.$_FILES['fotodoc']['name'];
				$alamatdatabase='./admin/gambar/'.$_FILES['fotodoc']['name'];
				
				
				if (move_uploaded_file($_FILES['fotodoc']['tmp_name'],$alamatgambar))//periksa jika proses upload berjalan sukses
				{
					
					?><script> document.location.href='home.php?page=6&status=Data Anda berhasil di simpan.'; </script>";<?
					
					$upload=mysql_db_query($db,"UPDATE produk SET tgl='$tanggal',namabrg='$namabrg', spek='$spek',hargabrg='$hargabrg',gambar='$alamatdatabase',stok='$stok' where idbrg='$idu'",$koneksi);
					
					
					$myFile ="./gambar/".$gambar;
					unlink($myFile);
					
				}else{
					echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
				}
				
			}
		}
		
		
	}
	else
	{
		unset($_POST['isi']);
	}
	?>




	<html>
	<head>
		<title>GIS-Endemik</title>
		<style type="text/css">
		<!--
.style2 {
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #FF0000;
}
		-->
		</style>
	</head>
	<body>
	<p>&nbsp;</p>
		
		<?php
		
		$tampil=mysql_db_query($db,"select * from produk where idbrg='$id'",$koneksi);
		while ($row=mysql_fetch_array($tampil))
		{
			$id=$row['idbrg'];
			$tgl=$row['tgl'];
			$namabrg=$row['namabrg'];
			$stok=$row['stok'];
			$spek=$row['spek'];
			$hargabrg=$row['hargabrg'];
			$gambar=$row['gambar'];
		}
		?> 
		<html><head>
	
		<script type="text/javascript" src="./jscripts/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		mode : "exact",
		elements : "elm2",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
		
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		});
		</script>
		</head>

		<h2 align="center" class="style2">	[Update Produk]</h2>
		<p><font color='#0066FF' face='verdana' size='2'>
		      <div align="center"><blink><? echo $_GET['status'] ?></blink></div>
			    </font></p>
				
		<form enctype="multipart/form-data" action="edit-produk-update.php?id=<? echo $id; ?>" method="post">
		<table width="735" cellspacing="0" cellpadding="0" border="0" align="center">
		<tr>
			<td width="39%" height="30"><font face="verdana" size="2">Tanggal Update </font>
			<td width="61%"><font face="verdana" size="2" color="#666666"><? echo $tanggal;?></font></td>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<? echo $id;?>" >
			<td width="39%" height="36"><font face="verdana" size="2">Nama Barang </font></td>
		    <td width="61%"><font face="Times New Roman" size="2">
	      <input type="text"name="namabrg" cols="30" rows="1" value="<? echo $namabrg;?>"></textarea></font></td>
		</tr>
		
		<tr>
			<td width="39%" height="36"><font face="verdana" size="2">Harga Barang </font></td>
		    <td width="61%"><font face="Times New Roman" size="2">
	      <input type="text"name="hargabrg" cols="30" rows="1" value="<? echo $hargabrg;?>"></textarea></font></td>
		</tr>
		
		<tr>
			<td width="39%" height="36"><font face="verdana" size="2">Stok Barang </font></td>
		    <td width="61%"><font face="Times New Roman" size="2">
	      <input type="text"name="stok" cols="30" rows="1" value="<? echo $stok;?>"></textarea></font></td>
		</tr>
		
		
		<tr>
			<td width="39%" height="30">&nbsp;</td>
			<td width="61%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">(Gunakan editor untuk menulis spesifikasi barang)</font></td>
		</tr>
		
		<tr>
			<td width="39%" height="163"><font face="verdana" size="2">Spesifikasi</font></td>
		    <td width="61%"><font face="Times New Roman" size="2">
	      <textarea name="spek" cols="30" rows="10" id="elm2"><? echo $spek; ?></textarea></font></td>
		</tr> 
		
		<?php $pic=substr($gambar,15,40); ?>
		
		<tr>
			<td height="115"><span class="style3"><img src="./gambar/<? echo $pic; ?>" width="100" height="100" border="0" title="<? echo substr($gambar,15,40); ?>"></span>
			</td>
			<input type="hidden" name="gambar" value="<? echo $pic; ?>">
			<td><p><font face="verdana" size="1" color="#666666"><? echo $gambar; ?></font></p>
		    <p>
		      <input type="checkbox" name="ok" value="ok">
              <span class="style5">Jika gambar tidak ingin di ganti, silahkan ceklist tanda ini !!</span></p></td>
		</tr>
		
		<tr>
			<td height="27">&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
		<tr>
		  <td width="39%" height="33" valign="middle">
		  <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
		  <font size="2" face="verdana">Gambar</font></td>
			<td><input type="file" name="fotodoc" size="30"></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td width="61%">&nbsp;</td>
		</tr>
		
		<tr>
			<td width="39%"><p>&nbsp;
			  </p>
		  <p>&nbsp;</p></td>
		  <td width="61%"><input type="submit" value="Update">&nbsp;
		  <input type="button" name="batal" value="Batal" onClick="location.replace('home.php?page=6');" /></td>
		</tr>
		</table>
		</form>
	
				
			 
	</body>
	</html>
	<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>