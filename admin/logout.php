<?php session_start();
if (session_is_registered('id'))
{
	session_unregister("id");
	session_unregister("userid");
	session_unregister("tanggal");
	//session_destroy();
	echo "<script> document.location.href='index.php'; </script>";
	
}else{
	echo "<script> document.location.href='akses.php?go=session'; </script>";
}
?>