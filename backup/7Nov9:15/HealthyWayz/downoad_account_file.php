<?php
session_start();
if($_SESSION['role']!='Admin'){
		header("location: index.php");
	}
// Downloads files
if (isset($_GET['download_account_file'])) {
   
    $filepath = 'includes/Account.csv';

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('includes/Account.csv'));
        readfile('includes/Account.csv');

        exit;
    }

}
// Downloads files
if (isset($_GET['download_barcode_file'])) {
   
    $filepath = 'includes/Barcode.csv';

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('includes/Barcode.csv'));
        readfile('includes/Barcode.csv');

        exit;
    }

}
?>