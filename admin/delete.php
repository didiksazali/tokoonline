<?php session_start();
if (session_is_registered('id'))
{
	include "./include/conn.php";
	$id=$_GET['id'];
	$hal=$_GET['hal'];
	$jenis=$_GET['type'];
	$id_lokasi=$_GET['id_lokasi'];
	$gambar=$_GET['gambar'];
	
	
	
	switch($jenis)
	{
		
	case "guest";
		//echo "anda hapus guestbook";
		$hapus="delete from guestbook where id_gb='$id'";
		$hasil=mysql_db_query($db,$hapus);
		if ($hasil)
		{
			echo "<script> document.location.href='home.php?page=4&status=Data sudah di hapus'; </script>";
		}
		else
		{
			echo "Proses Penghapusan data gagal";
			echo mysql_error();
		}
		break;
		
	case "member";
		//echo "anda hapus anggota";
		$hapus="delete from daftar where id='$id'";
		$hasil=mysql_db_query($db,$hapus);
		if ($hasil)
		{
			echo "<script> document.location.href='home.php?page=3&status=Data sudah di hapus'; </script>";
		}
		else
		{
			echo "Proses Penghapusan data gagal";
			echo mysql_error();
		}
		break;
		
	case "topik";
		//echo "anda hapus topik";
		$hapus="delete from forum where ID_topik='$id' or ID_replay='$id' ";
		$hasil=mysql_db_query($db,$hapus,$koneksi);
		if ($hasil)
		{
			//echo "berhasil di hapus";
			echo "<script> document.location.href='home.php?page=5&status=Data Forum sudah di hapus'; </script>";
		}
		else
		{
			echo "Proses Penghapusan data gagal";
			echo mysql_error();
		}
		break;
		
	case "replay";
		//echo "anda hapus replay";
		$hapus="delete from forum where ID_topik='$id'";
		$hasil=mysql_db_query($db,$hapus,$koneksi);
		if ($hasil)
		{
			//echo "berhasil di hapus";
			?><script> document.location.href='<? echo $hal; ?>&status=Data replay sudah di hapus'; </script><?
		}
		else
		{
			echo "Proses Penghapusan data gagal";
			echo mysql_error();
		}
		break;
	
	
	
		
	case "pesanan";
		//hapus pemesanan yang gagal
		$hapuslap=mysql_db_query($db,"delete from laporan where idlap='$id'");
		$hapuspesanan=mysql_db_query($db,"delete from pemesanan where idlap='$id'");
		
		if ($hapuslap)
		{
			echo "<script> document.location.href='home.php?page=7&status=Data Pesanan sudah di hapus'; </script>";
		}
		else
		{
			echo "Proses Penghapusan data gagal";
			echo mysql_error();
		}
		break;
		
	
	
	case "produk";
		//hapus data dan filenya
		$myFile ="./gambar/".$gambar;
		unlink($myFile);
		
		$hapus="delete from produk where idbrg='$id'";
		$hasil=mysql_db_query($db,$hapus);
		if ($hasil)
		{
			echo "<script> document.location.href='home.php?page=6&status=Data sudah di hapus'; </script>";
		}
		else
		{
			echo "Proses Penghapusan data gagal";
			echo mysql_error();
		}
		break;
	
	}
	
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>