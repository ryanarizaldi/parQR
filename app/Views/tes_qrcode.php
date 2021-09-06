<?php

// $no_rekening="123414512400912312";
// $nama="agoes tinus psdfmsdf asdfaasdf asdfadf asdfasfda asdfasfsd";
// $pjw="agustinus pamungkas sumardjono<br>";
// $tgl="2021-12-01";
$base = base_url();
$tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
 if (!file_exists($tempdir)) //Buat folder bername temp
    mkdir($tempdir);

	QRcode::png("$no_plat $nama_pemilik $jabatan", $tempdir.'007_4.png', QR_ECLEVEL_L);
	
	echo "<table>";
	echo "<tr><td>";
	echo '<img src="'.$base.'/'.$tempdir.'007_4.png" />'; 
	echo"</tr>";
	echo"</table";
	
	//$kode=<img src="'.$tempdir.'007_4.png" />;
?>