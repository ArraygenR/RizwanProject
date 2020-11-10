<?php 

if (isset($_GET['downoad_panel']) && isset($_GET['details']) ){
// Load the database configuration file 
session_start();
include"includes/config.php"; 
 if ($_GET['details'] == 'details'){
    $filename =  $_GET['downoad_panel'].$_GET['name']. date('Y-m-d') . ".csv"; 
    $delimiter = "\t"; 
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('id','phenotype', 'traits', 'gene_id', 'gene', 'genotype', 'description', 'all_publication',  'snp'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Get records from the database 
    $result = $conn->query("SELECT * FROM panel where panel_info_id ='".$_GET['downoad_panel']."'"); 
    if($result->num_rows > 0){ 
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $result->fetch_assoc()){ 
            $lineData = array($row['id'], $row['phenotype'],$row['traits'], $row['gene_id'],$row['gene'], $row['genotype'],$row['description'], $row['all_publication'] ,$row['snp']); 
            fputcsv($f, $lineData, $delimiter); 
        } 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    fpassthru($f); 
}
if ($_GET['details'] == 'snp'){
    $filename =  $_GET['name'].$_GET['downoad_panel']."_".$_GET['details']. date('Y-m-d') . ".csv"; 
    $delimiter = "\t"; 
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('id', 'snp', 'pubmed_id', 'title', 'observed_genotype', 'others', 'variation_support_paper', 'clinical_significance'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Get records from the database 
    $result = $conn->query("SELECT * FROM panel_snp where panel_info_id ='".$_GET['downoad_panel']."'"); 
    if($result->num_rows > 0){ 
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $result->fetch_assoc()){ 
            $lineData = array($row['id'], $row['snp'], $row['pubmed_id'], $row['title'], $row['observed_genotype'],$row['others'], $row['variation_support_paper'],$row['clinical_significance']); 
            fputcsv($f, $lineData, $delimiter); 
        } 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    fpassthru($f); 
}

 
// Exit from file 
exit();
}
/*
if ($_GET['downoad_panel'] == 'Nutrition' && $_GET['details'] == 'details'){
    $filename =  $_GET['downoad_panel']. date('Y-m-d') . ".csv"; 
    $delimiter = "\t"; 
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('id','phenotype', 'traits', 'gene_id', 'gene', 'genotype', 'description', 'all_publication',  'snp'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Get records from the database 
    $result = $conn->query("SELECT * FROM nutrition"); 
    if($result->num_rows > 0){ 
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $result->fetch_assoc()){ 
            $lineData = array($row['id'], $row['phenotype'],$row['traits'], $row['gene_id'],$row['gene'], $row['genotype'],$row['description'], $row['all_publication'] ,$row['snp']); 
            fputcsv($f, $lineData, $delimiter); 
        } 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    fpassthru($f); 
}
if ($_GET['downoad_panel'] == 'Nutrition' && $_GET['details'] == 'snp'){
    $filename =  $_GET['downoad_panel']."_".$_GET['details']. date('Y-m-d') . ".csv"; 
    $delimiter = "\t"; 
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('id', 'snp', 'pubmed_id', 'title', 'observed_genotype', 'others', 'variation_support_paper', 'clinical_significance'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Get records from the database 
    $result = $conn->query("SELECT * FROM nutrition_snp"); 
    if($result->num_rows > 0){ 
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $result->fetch_assoc()){ 
            $lineData = array($row['id'], $row['snp'], $row['pubmed_id'], $row['title'], $row['observed_genotype'],$row['others'], $row['variation_support_paper'],$row['clinical_significance']); 
            fputcsv($f, $lineData, $delimiter); 
        } 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    fpassthru($f); 
}

*/
?>