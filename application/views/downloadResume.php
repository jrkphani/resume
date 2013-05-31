<?php
header("Content-Type: text/csv");  
header("Cache-Control: no-store, no-cache");  
header('Content-Disposition: attachment; Filename="Selected_Resumes.csv"');

$outstream = fopen("php://output",'w');  

//$outstream = fopen(FCPATH.$this->config->item('path_temp_file').'Selected_Resumes.csv', 'w');
fputcsv($outstream, $titles);

foreach ($result as $data) {
    fputcsv($outstream, $data);
}
fclose($outstream);
?>