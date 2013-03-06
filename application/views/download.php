<?php
$file=$pdf.'.pdf';
//echo $file; die;
$filename='resume.pdf';

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=" . urlencode($filename));   
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
readfile($file);
?>

