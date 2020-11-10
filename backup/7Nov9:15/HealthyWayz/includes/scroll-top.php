<?php
   	 
if(isset($_POST['submit_report'])){
     
	$name= $_FILES['upload_report']['name'];
	
    $tmp_name= $_FILES['upload_report']['tmp_name'];
    if (isset($name)) {
        $path= 'uploads/';
        if (!empty($name)){
            if (move_uploaded_file($tmp_name, $path.$name)) {
                $sql = "UPDATE `user_details` SET  `upload_report_description`='".$_POST['upload_report_description']."' , 
                    `upload_report_document_type` = '".$_POST['upload_report_document_type']."',
                	`upload_report`='".$path.$name."' where `user_id`='".$_SESSION['login_id']."' ";
                if ($conn->query($sql) === TRUE) {
                   echo "<script>alert('Health data uploaded successfully');</script>";
                }
            }
        } 
    }
    
}

?>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<style>
    .list-group{
        max-height: 300px;
        margin-bottom: 10px;
        overflow:scroll;
       
}
.custom_upload {
    width: 250px;
    height: 150px;
    background-color: #17a2b8;
    margin: 0 auto;
    border-radius: 20px;
    text-align: center;
    line-height: 10;
    cursor: pointer;
}
.custom_upload i {
    color: #fff;
    font-size: 3rem;
}
</style>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disclaimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li><!-- <i class="fa fa-circle" style="font-size:5px"></i> -->This report is for investigational use only.</li>
            <li>This report is to be interpreted by a qualified and licensed medical practitioner only.</li>
            <li>This report does not constitute medical advice, diagnosis or treatment. Pharmacogenetics is oneof the several factors such as age, sex, ethnicity and medical history that determine a patient's response to medication.</li>
            <li>Licensed medical practitioners are trained and qualified to make therapeutic decisions based onpatient information and medical history, including the pharmacogenetic report.</li>
            <li>The FDA has recommended pharmacogenetic testing (PGx) for specific drugs and does not mandate it for routine use in guiding therapeutic definitions.</li>
            <li>Genotyping results do not eliminate the necessity to account for non-genetic factors that can influence dose requirements for medications metabolized by the CYP450 enzymes.</li>
            <li>CYP450 2C9, 2D6, 3A4, 3A5 and VKORC activity is dependent upon hepatic and renal functionstatus.</li>
            <li>The results of testing and dose adjustments in the context of renal and hepatic function should be taken into consideration. CYP450 2C9, 2D6, 3A4, 3A5 and VKORC activity can be altered byco-administration of inhibitors and inducers.</li>
            <li>This assay includes a limited set of polymorphisms that have been found to exist at high frequencies in the target population. It is possible that tested samples carry a mutation that is not included in this panel, in which case the genotype cannot be determined using this assay.</li>
            <li>These assays are carried out by trained individuals and use standard equipment and laboratory designed protocols.</li>
            <li>Possibilities exist for inaccuracies in the reported results for various reasons. Licensed practitioners may reorder tests for reconfirmation of results.</li>
            <li>The below tables show commonly prescribed medications with drug exposure likely to be impacted by the patient’s phenotype indicated. These tables are not all-inclusive and do notaccount for concomitant medication use.</li>
            <li>Medication dose adjustments reflect the usual starting dose or a maximum daily dose when provided.</li>
            <li>Dose adjustments from the literature may have been modified for simplified dose conversion.Dose adjustments and alternative recommendations do not supersede the clinician’s clinical judgment and should be used in the context of the patient’s status.</li>
          </ul>
      </div>
      <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="user_dna_report.php?dna_report=Accept">Accept</a>
        </div>

    </div>
  </div>
</div>

<div class="modal fade" id="HealthData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <center>
              
              <a href="" data-toggle="modal" data-target="#HealthDataUpload" >
                  Upload/Download Health Data
              </a>
              <br/>
               <br/>
              <a href="user_health_history.php">
                  Fill Health Data
              </a>
          </center>
      </div>
      <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
     </div>

    </div>
  </div>
</div>

<div class="modal fade" id="HealthDataUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">Upload Health Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php   $qry = "select * from `user_details` where user_id='".$_SESSION['login_id']."'";
                  $res = $conn->query($qry);
                  $row = $res->fetch_assoc();
                  $desc = $row['upload_report_description'];
                  $doc_type = $row['upload_report_document_type'];
                  $report = $row['upload_report'];
                  
                   if($desc!='' || $doc_type != '' ||$report !='')  {
                     
            ?>
                <h6><b>Existsing Data</b></h6>
                <h6>Description : <?php echo $desc; ?></h6>
                <h6>Document Type : <?php echo $doc_type; ?></h6>
                <a href= "<?php echo $report; ?>" target="_blank"> View Uploaded Report</a>
                <hr>
                <h6><b>Update Existsing Data</b></h6>
            <?php } ?>
                
          <form method="post" class="form-horizontal fields-group-lg form_radius" enctype="multipart/form-data" action="">
              <div>
                <h6>Description <font color="red">*</font></h6>
                <div class="w-100">
              <input type="text" name="upload_report_description" class="form-control " required placeholder="Please enter the description of the Uploaded File">  
            </div>
                <h6>Document Type</h6>
                <select name="upload_report_document_type" id="" class="form-control"  data-width="100%">
                        <option value="Imaging">Imaging</option> 
                        <option value="Diagnostic">Diagnostic</option> 
                        <option value="Other">Other</option> 
                </select>
              <br>
              <div class="row">
                <label for="upload_report" class="custom_upload">
                  <i class="fas fa-file-upload"></i>
                </label>
                <input id="upload_report" type="file" class="d-none" name="upload_report" onchange="">    
                <p class="text-center mx-auto mb-0 mt-2">Drag and Drop the report or 
                <label for="upload_report" class="text-info medium cursor">Upload here</label></p> 
                </div>
              
                  
              <button type="submit" name="submit_report" class="btn btn-md btn-primary mx-auto d-block mt-3"> 
             Submit	
            </button>
               <br/>
            </form>
      </div>
    </div>
  </div>
</div>
</div>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="includes/logout.php">Logout</a>
        </div>
      </div>
    </div>

</div>



</script>
<!--JS below-->


