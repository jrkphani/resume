<?php
$fp = fopen(FCPATH.$this->config->item('path_temp_file').'Selected_Resumes.csv', 'w');
fputcsv($fp, $titles);

foreach ($result as $data) {
    fputcsv($fp, $data);
}
fclose($fp);

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=Selected_Resumes.csv");

// send file to browser
readfile(FCPATH.$this->config->item('path_temp_file').'Selected_Resumes.csv');
unlink(FCPATH.$this->config->item('path_temp_file').'Selected_Resumes.csv');
?>