<?php
session_start();
if(!(isset($_SESSION['login_id']))){
		header("location: ../../../index.php");
	}
include"../../../includes/config.php";
$query = "SELECT s.id,c.name,c.email,td.course_name,s.topic,s.date,s.time,tr.name,tr.skype_id,s.note FROM `schedule` as s inner join `client_details` as c on s.client_id=c.client_id left join `training_details` as td on s.training_id=td.id inner join `trainer` as tr on s.trainer_id=tr.id order by s.date";
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
header('Content-Disposition: attachment; filename=All_Schedule.csv');
//echo $csv_header . $csv_row;
print chr(255) . chr(254) . mb_convert_encoding($csv_header . $csv_row, 'UTF-16LE', 'UTF-8');
exit;
?>
