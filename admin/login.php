<?phpphp
session_start();
include ('koneksi.php');
$nama=$_POST['nama'];
$pass=md5($_POST['pass']);

$result=mysql_query("select * from biodata where nama='$nama' and pass='$pass'");

while ($row=mysql_fetch_array($result)){
	$id=$row['id'];
}

$cek_login=mysql_num_rows($result);
if (empty($cek_login))
{
	?>
	<script language="javascript">alert("Password atau Username Anda salah!!");</script>
	<script> document.location.href='index.php'; </script>
	<?php
}
else
{
	session_register('id');
	session_register('nama');
	?>
	<script> document.location.href='admin.php'; </script>
	<?php
}

?>