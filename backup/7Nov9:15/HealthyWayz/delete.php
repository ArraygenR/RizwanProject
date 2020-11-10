<?php
session_start();
include"includes/config.php"; 
$qry = "delete from ".$_GET['table']." where id='".$_GET['id']."'";
if ($conn->query($qry) === TRUE) {
    if($_GET['table']=='login'){
        $qry = "delete from `user_details` where user_id='".$_GET['id']."'";
        $conn->query($qry);
        $qry = "delete from `panel_details` where user_id='".$_GET['id']."'";
        $conn->query($qry);
    }
    header("location: ".$_GET['return']."?delete=1");
}

?>
