<?php
$time=date("G");
	if ($time<12)
	
	{	
		echo "  Selamat Pagi ";
		}
		else if ($time<15)
		{
		echo "  Selamat Siang ";
		}
		else if ($time<18)
		{
		echo "  Selamat Sore ";
		}
		else
		{
		echo "  Selamat Malam ";
	}
	
?>
	<script language="javascript">window.status="LepNet@2008"</script>