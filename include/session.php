<?php session_start(); 
if (session_is_registered('user_id'))
{
	echo $idbrg = $_GET['idbrg'];
	$_SESSION['idbrg'][]=$idbrg;
	echo "<script> document.location.href='index.php?page=5&status=Terimakasih, barang yang Anda beli sudah masuk ke shopping Chart'; </script>";
}else{
	echo "<script> document.location.href='index.php?page=4&error=Untuk membuat topik baru dan me-replay, silahkan daftar dan login'; </script>";
}
?>
