<?php
$time=date("G");
	if ($time<12)
	
	{	
		echo "  Selamat Pagi ". ucwords($userid);
		}
		else if ($time<15)
		{
		echo "  Selamat Siang ".ucwords($userid);
		}
		else if ($time<18)
		{
		echo "  Selamat Sore ". ucwords($userid);
		}
		else
		{
		echo "  Selamat Malam ". ucwords($userid);
	}
	
	
?>
	<script language="javascript">window.status="LepNet@2008"</script>