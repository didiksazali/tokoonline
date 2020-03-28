<?php
session_start();
include"./include/conn.php";
if (session_is_registered('user_id'))
{
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$topik=$_POST['topik'];
	$isi=$_POST['isi'];
	$ID_topik=$_POST['ID_topik'];
	
	if (empty($nama) || empty($email) || empty($topik) || empty($isi))
	{
		?><script language="javascript">document.location.href='index.php?page=10&ID_topik=<? echo $ID_topik;?>&topik=<? echo $topik;?>&status=Maaf, Data Anda masih kosong!!'; </script>";</script><?
	}else{
		$query=mysql_db_query($db,"insert into forum(nama,email,topik,isi,tanggal,ID_replay) values('$nama','$email','$topik','$isi','$tanggal','$ID_topik')",$koneksi);
	
		
		if($query)
		{
			echo "<script>alert('Berhasil mengisi reply!!');</script>";
			?><script language="javascript">document.location.href='index.php?page=9&ID_topik=<? echo $ID_topik;?>'; </script>";</script><?
		}else{
			echo "<script>alert('gagal!!');</script>";
		}
	}
	
}else{
	echo "<script>alert('Anda harus Login!!');</script>";
}
?>