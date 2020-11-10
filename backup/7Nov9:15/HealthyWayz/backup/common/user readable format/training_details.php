<?php
session_start();
if(!(isset($_SESSION['login_id']))){
		header("location: ../../../index.php");
	}
include"../../../includes/config.php";
$query = "SELECT t.*,c.email,c.name FROM `training_details` as t inner join `client_details` as c on t.client_id=c.client_id";
$result = $conn->query($query);

$num_column = $result->field_count;		

$csv_header = "";
for($i=0;$i<$num_column;$i++) {
    	$csv_header .= mysqli_fetch_field_direct($result,$i)->name ."\t";	
}	
$csv_header .= "\n";

$csv_row ='';
while($row = mysqli_fetch_row($result)) {
	for($i=0;$i<$num_column;$i++) {
			$csv_row .=  $row[$i] ."\t";
	}
	$csv_row .= "\n";
}	
/* Download as CSV File */
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=All_training_details.csv');
//echo $csv_header . $csv_row;
print chr(255) . chr(254) . mb_convert_encoding($csv_header . $csv_row, 'UTF-16LE', 'UTF-8');
exit;
?>
