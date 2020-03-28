<?php
session_start();
include "./include/conn.php";
//hapus session
$iduser=$_SESSION['user_id'];

$idlaporan=mysql_db_query($db,"select * from laporan where iduser='$iduser' AND status='proses'",$koneksi);
while($row=mysql_fetch_array($idlaporan)){
	$idlap=$row['idlap'];
}


//update idlaporan di tabel pemesanan
$updatetrans=mysql_db_query($db,"update pemesanan set idlap='$idlap' where iduser='$iduser' AND status='proses'",$koneksi);
echo "<script> document.location.href='index.php?page=1'; </script>";

?>


