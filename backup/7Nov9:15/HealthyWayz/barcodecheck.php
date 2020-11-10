<?php
session_start();
include"includes/config.php"; 
$barcode = $_POST['barcode'];
$qry = "select * from `login` where barcode='".$barcode."' and uname ='' ";
$res = $conn->query($qry);
$count =$res->num_rows;
#echo "<script>alert('".$barcode."');</script>";
#echo "<script>alert('".$count."');</script>";
echo $res->num_rows;
?>