<?php
session_start();
if(!(isset($_SESSION['login_id']))){
		header("location: ../../index.php");
	}
include"../../includes/config.php";
$csv_row="";
$csv_row .="Contact Details of Client : \n\n";
$qry = "SELECT * FROM `client_details` where `client_id` = '".$_GET['id']."'";
$res = $conn->query($qry);
while($row = $res->fetch_assoc()) {	
    $name = str_replace(' ', '', $row['name']);
	$csv_row .= "Name : \t".trim($row['name'])."\n";
	$csv_row .= "Email : \t".trim($row['email'])."\n";
	$csv_row .= "Contact No :\t".trim($row['contact_no'])."\n";
	$csv_row .= "Registarion Date :\t".trim($row['starting_date'])."\n\n";
}
$csv_row .="Client Course Details : \n\n";
$csv_row .= "Module Name  \t Starting Date \t Duration \t Status \t Feedback \t Rating of Feedback\n";
$qry = "SELECT * FROM `training_details` where `client_id` = '".$_GET['id']."'";
$res = $conn->query($qry);
while($row = $res->fetch_assoc()) {
	$csv_row .= $row['course_name']."\t".$row['starting_date']."\t ".$row['duration']." \t ".$row['status']." \t ".$row['feedback']." \t  ".$row['feedback_rating']."\n"	;
}

$csv_row .="\nSchedule Details : \n\n";
$csv_row .= "Course Name  \t Topic \t Date \t Time \t Trainer \t Client Note \n";
$qry = "SELECT * FROM `training_details` as t_d right join `schedule` as s on t_d.`id` = s.`training_id` inner join `trainer` as t_r on t_r.id = s.trainer_id where s.`client_id` = '".$_GET['id']."'";
$res = $conn->query($qry);
while($row = $res->fetch_assoc()) {
	$csv_row .= $row['course_name']."\t".$row['topic']."\t".$row['date']." \t".$row['time']." \t".$row['name']."\t".$row['client_note']."\n"	;
}

/* Download as CSV File */
//header("Content-Encoding: UTF-8"); 
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$name.'_Client_info.csv');
print chr(255) . chr(254) . mb_convert_encoding($csv_row, 'UTF-16LE', 'UTF-8');
//echo $csv_row;
exit;
?>
