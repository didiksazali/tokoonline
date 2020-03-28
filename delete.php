<?php session_start();
if (session_is_registered('user_id'))
{
	include "./include/conn.php";
	$iduser=$_GET['iduser'];
	$idshop=$_GET['idshop'];
	$idpesan=$_GET['idpesan'];
	
	$hasil=mysql_db_query($db,"delete from shoping where idshop='$idshop' and iduser='$iduser'",$koneksi);
	$pemesanan=mysql_db_query($db,"delete from pemesanan where idpesan='$idpesan' and iduser='$iduser'",$koneksi);
	if ($hasil)
	{
		?><script> document.location.href='index.php?page=6&status=Data sudah di hapus'; </script><?
	}
	else
	{
		echo "Proses Penghapusan data gagal";
		echo mysql_error();
	}
	

}else{
	echo "<script> document.location.href='index.php?page=1'; </script>";
}
?>