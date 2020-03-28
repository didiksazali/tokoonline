<?php
$page=$_GET['page'];

switch($page)
{
	case "1";
	include "welcome.php";
	break;
	
		
	case "2";
	include "contact.php";
	break;
	
	
	case "3";
	include "guestbook.php";
	break;
	
	
	case "4";
	include "forum.php";
	break;
			
	case "5";
	include "e-produk.php";
	break;
	
	case "6";
	include "e-transaksi.php";
	break;
	
	case "7";
	include "e-shoping.php";
	break;
	
	
	case "8";
	include "e-pemesanan.php";
	break;
	
	
	case "9";
	include "forum-view.php";
	break;
	
	case "10";
	include "forum-reply.php";
	break;
	
	case "11";
	include "forum-new.php";
	break;
	
	case "12";
	include "e-rincian.php";
	break;
	
	case "13";
	include "e-konfirmasi.php";
	break;
	
	case "14";
	include "pembayaran.php";
	break;
	
	default;
	include "welcome.php";
	break;
}

?>