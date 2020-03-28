<?php
$page=$_GET['page'];

switch($page)
{
	case "1";
	include "welcome.php";
	break;
			
	case "2";
	include "edit-profil.php";
	break;
	
	case "3";
	include "edit-member.php";
	break;
	
	case "4";
	include "edit-guestbook.php";
	break;
	
	case "5";
	include "edit-forum.php";
	break;
	
	case "6";
	include "edit-produk.php";
	break;
	
	case "7";
	include "edit-pemesanan.php";
	break;
	
	case "12";
	include "status.php";
	break;
	
	case "13";
	include "edit-produk-new.php";
	break;
	
	case "14";
	include "edit-produk-update.php";
	break;
	
	default;
	include "welcome.php";
	break;
}

?>