<?php session_start();
if (session_is_registered('id'))
{
	$userid=$_SESSION['userid'];
	include "./include/conn.php";
	$tanggal;
	
	if (isset($_POST['isi']))//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan isi
	{
		$tanggal;
		$namabrg=ucwords(htmlentities($_POST['namabrg']));
		$harga=ucwords(htmlentities($_POST['harga']));
		$stok=ucwords(htmlentities($_POST['stok']));
		
		$isi=$_POST['isi'];
		$fotodoc=$_FILES['fotodoc']['name'];
		$type=$_FILES['fotodoc']['type'];
		
		if ($namabrg=="" || $harga=="" || $stok=="" || $fotodoc=="")//periksa jika data yang dimasukan belum lengkap
		{
			?><script> document.location.href='home.php?page=13&status=<font color=red>Data Anda belum lengkap!</font>';</script>";<?
		}
		else
		{
			
			$uploaddir='./gambar/';
			$alamatgambar=$uploaddir.$_FILES['fotodoc']['name'];
			$alamatdatabase='./admin/gambar/'.$_FILES['fotodoc']['name'];
			
			
			if (move_uploaded_file($_FILES['fotodoc']['tmp_name'],$alamatgambar))//periksa jika proses upload berjalan sukses
			{
				
				?><script> document.location.href='home.php?page=6&status=Data Anda berhasil di simpan.'; </script>";<?
				
				$upload=mysql_db_query($db,"INSERT INTO produk(tgl,namabrg,spek,hargabrg,stok,gambar) VALUES('$tanggal','$namabrg','$isi','$harga','$stok','$alamatdatabase')");
			}else{
				echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
			}
		}
		
	}
	else
	{
		unset($_POST['isi']);
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
		 
	<h2 align="center"><font size="3" face="Arial, Helvetica, sans-serif">[Tambah Barang] </font></h2>
	<p><font color='#0066FF' face='verdana' size='2'>
		      <div align="center"><blink><? echo $_GET['status'] ?></blink></div>
			    </font></p>
	<form enctype="multipart/form-data" action="edit-produk-new.php" method="post">
	
	<table width="729" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="23%" height="30"><font face="verdana" size="2">Tanggal</font>
          <input type="hidden" name="tgl" value="<? echo $tanggal;?>" /></td>
	    <td width="77%"><font face="verdana" size="2" color="#666666"><? echo $tanggal;?></font></td>
	</tr>
	<tr>
		<td width="23%" height="30"><font face="verdana" size="2"> Nama Barang</font></td>
	    <td width="77%"><font face="Times New Roman" size="2">
      <input type="text" name="namabrg"/ size="40"></font></td>
	</tr>
	
	<tr>
		<td width="23%" height="30">&nbsp;</td>
	    <td width="77%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">(Gunakan editor untuk menulis spesifikasi barang)</font></td>
	</tr>
	
	<tr>
		<td width="23%" height="182"><font face="verdana" size="2">Spesifikasi</font></td>
	  <td width="77%"><font face="Times New Roman" size="2">
      <textarea name="isi" cols="30" rows="10" id='elm2'></textarea></font></td>
	</tr> 
	
	<tr>
		<td height="37"><font face="verdana" size="2">Harga</font></td>
		<td><input type="text" name="harga" size="20" /> <font face="verdana" size="2">Dalam Rupiah (Rp)</font></td>
	</tr>
	
	<tr>
		<td><font face="verdana" size="2">Stok</font></td>
		<td><input type="text" name="stok" size="20" /></td>
	</tr>
	
	<tr>
	  <td width="23%" height="37" valign="middle">
	  <input type="hidden" name="MAX_FILE_SIZE" value="1000000" id="gambar">
	  <font size="2" face="verdana">Gambar</font></td>
		<td><input type="file" name="fotodoc" size="30" id="gambar"></td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td width="77%"><input type="submit" value="Kirim" onclick="return cek();">&nbsp;
	  <input type="button" name="batal" value="Batal" onclick="location.replace('home.php?page=6');" /></td>
	</tr>
	</table>
	
	</form>

					
			
<?php
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>