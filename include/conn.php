<html>
<head>
</head>
<body>
<?phpphp
ini_set('display_errors',FALSE);
$host="localhost";
$user="root";
$pass="";
$db="tokonlinedb";
$entries=3;



$koneksi=mysql_connect($host,$user,$pass);
$tanggal=date('D, d-M-Y H:i:s');

if ($koneksi)
{
	//echo "berhasil : )";
}else{
	?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?php
}

?>

</body>
</html>
