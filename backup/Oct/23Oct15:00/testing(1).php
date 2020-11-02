<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;


$html='
<!DOCTYPE html>
<html>
   <body>
     
      <div style="border: 5px solid #ffffff;">
         <div id="content">
            <style> 
            @page {margin: 5px; }
                .box-indicator{
                    background-color:#dfdfdf;
                    margin:1px;
                    padding:5px 16px;
                }
                body{
                    color: #262626;
                }
                .page{
                    margin-top:10px;
                    position:relative;
                    page-break-before: always;
                }
                .page:first-child {
                    page-break-before: avoid;
                }
                .page:before {
                    content: "Gene-Think";
                    position:absolute;
                    left:0;
                    width:100%;
                    padding:20px;
                    text-align:right;
                    color:#11142f;
                    font-weight: bold;
                }
                .page:after{
                    width:100%;
                    position:absolute;
                    background-color: #dfdfdf;
                    text-align: center;
                    padding:15px 0px;
                    display:block;
                    bottom:0px;
                    content: "Powered By Pro Healthywayz International LLP ";
                }
                .traits-img{
                    width:150px;
                    height:auto;
                }
                .header{
                    top:0px;
                    width:100%;
                    background-color: #11142f;
                    padding: 10px 0px;
                    text-align: center;
                }
                .para-content{
                    padding:0px 25px;
                }
                
               .table-user-info, .table-user-info th, .table-user-info td {
                   border-bottom: 1px solid #0065aa87;
                   border-collapse: collapse;
                   width:auto;
                   font-size: 20px;
                   color: #0065aa;
               }
               .table-user-info th, .table-user-info td {
                    padding: 10px;
               }
               .table-user-info th {
                    text-align: left;
               }
               
               .table-score-info, .table-score-info th, .table-score-info td {
                    border: 1px solid #ddd;
                    text-align: left;
               }
                .table-score-info{
                    border-collapse: collapse;
                    width: 100%;
                }
               .table-score-info th, .table-score-info td {
                    padding: 10px;
               }
               
               
               .table-score {
                   padding: 0 50px;
               }
               .table-score th, .table-score td {
                    padding: 15px;
                    text-align: center;
               }
               
               
               .row::after {
                  content: "";
                  clear: both;
                  display: table;
                }
                .main-title{
                    font-size: 40 px;
               }
               .title{
                    /*font-size: 30px;*/
                    text-align: center;
                    display: block;
               }
               
                .row::after {
                  content: "";
                  clear: both;
                  display: table;
                }
                
                [class*="col-"] {
                  float: left;
                  padding: 15px;
                  border: 1px solid red;
                }
                
                .col-1 {width: 8.33%;}
                .col-2 {width: 16.66%;}
                .col-3 {width: 25%;}
                .col-4 {width: 33.33%;}
                .col-5 {width: 41.66%;}
                .col-6 {width: 50%;}
                .col-7 {width: 58.33%;}
                .col-8 {width: 66.66%;}
                .col-9 {width: 75%;}
                .col-10 {width: 83.33%;}
                .col-11 {width: 91.66%;}
                .col-12 {width: 100%;}
                
               .do{
                   border: 1px solid #00e339;
                   background-color: #f1ffea;
                   margin: 20px;
                   border-radius:15px;
                   padding: 20px;
               }
               
               .dont{
                   border: 1px solid #ff8c8c;
                   background-color: #ffecde;
                   margin:20px;
                   border-radius:15px;
                   padding: 20px;
               }
               
               
               
               
               .bg-secondary{
                   background-color:#808080;
               }
               .bg-sucess{
                    background-color:#00cc0e;
               }
               .bg-sucess-light{
                    background-color:#7bc700;
               }
               .bg-warning{
                    background-color:#f3f700;
               }
               .bg-danger-light{
                    background-color:#f7b100;
               }
               .bg-danger{
                    background-color:#f72100;
               }
               
               
               .primary{
                   color:#0065aa;
               }
               .secondary{
                   color:#808080;
               }
               .sucess{
                    color:#00cc0e;
               }
               .sucess-light{
                    color:#7bc700;
               }
               .warning{
                    color:#f0d600;
               }
               .danger-light{
                    color:#f7b100;
               }
               .danger{
                    color:#f72100;
               }
               
               .gene-table{
                    border: 2px solid #cacaca;
                    padding: 5px 20px;
                    border-radius: 15px;
                    margin:20px 0px;
               }
               .gene-table-btn1{
                    border: 2px solid #0065aa;
                    padding: 10px;
                    border-radius: 15px;
                    background-color: #0065aa;
                    margin: 10px 0px;
                    color: white;
                    font-size: 20px;
               }
               .gene-table-btn2{
                    border: 2px solid #cacaca;
                    padding: 10px;
                    border-radius: 15px;
                    background-color: #cacaca;
                    margin:10px 0px;
                    color: white;
                    font-size: 20px;
               }
            </style>
            <!-- Page 1 starts -->
            <div class="page">
                <div class="header"> <a target="_blank" href="https://genething.com"><img style="width: 40%;" src="images/genetics.png"></a></div>
               <div class="para-content" >
                  <center>
                     <h1 class="main-title primary">
                         <span style="font-size: 30px;" >Predictive</span> <br/>DNA REPORT<br/>
                    </h1>
                    <div>
                         <img style="width: 70%; display:block;" src="images/pdf_report/img.png">
                    </div>
                
                     <h3> DISCOVER YOUR TRUE POTENTIAL </h3>
                  </center>
                  <div class="para-content">
                        <table class="table-user-info">
                           <tr>
                              <th>Barcode</th>
                              <td>:&nbsp;&nbsp;28734925</td>
                           </tr>
                           <tr>
                              <th>Name</th>
                              <td>:&nbsp;&nbsp;john doe</td>
                           </tr>
                           <tr>
                              <th>Contact No</th>
                              <td>:&nbsp;&nbsp;9988998899</td>
                           </tr>
                        </table>
                  </div>
               </div>
               
            </div>
            <!-- Page 1 end -->
            <!-- Page 2 start -->
            <div class="page page-header">
                
                <div class="para-content">
                    <center>
                        <br/>
                        <h2>Type of Report: Detailed Report</h2>
                        <h1 class="title primary">DISCLAIMER</h1>
                    </center>
                    <p>
                        Our recommendations in DNA Lifestyle report are based on the results of your Genetic Risk Assessment and other related information provided by you. 
                        This report does not take into account your existing health condition or any medication that have been prescribed to you. 
                        This report being neither a substitute to medical treatment nor physicians visit makes it necessary for you to consult your physician before adapting to its recommendations.
                    </p>
                    <p>
                        Any assertions or recommendations in the report as to an exercise regime or diet, whether specific or general, are based on the following assumptions.
                    </p>
                    <ul>
                        <li>
                            That you are in a good state of health and do not have any medical problems that you are aware of; That you have not had any recurring illness in the past 12months;
                        </li>
                        <li>
                            That no medical practitioner has ever advised you not to exercise;
                        </li>
                        <li>
                            That you are not on any prescribed medication that may affect your ability to exercise safely or your diet; That you do not have any food allergies; and
                        </li>
                        <li>
                            That there is no other reason why you should not follow the assertions or recommendations in the report.
                        </li>
                    </ul>
                    <p>
                        If you have any concerns at any time about whether or not these assumptions are correct in your particular circumstances, before acting, or not acting, on any of the assertions or recommendations, you must consult a medical practitioner.
                    </p>
                    <p>
                        Because scientific and medical information changes over time, and also a person’s risk of any particular phenotype, condition or trait is also based on other factors like environment, diet, lifestyle, genetic variants, your risk assertions and genetically tailored preventive recommendations for one or more of the conditions contained within this report may also change over time.
                    </p>
                    <p>
                        The pharmacogenomic panel here refers to your genetic predisposition to the drugs mentioned in the report. This report is for investigational purpose only. It is to be interpreted by a qualified and licensed medical practitioner only. It does not constitute medical advice, diagnosis, or treatment. The assay includes limited set of polymorphisms and may not report for mutations not included in the test panel. This report does not take into account factors like drug-drug interactions, drug food interaction. These assays are carried out by trained individuals and use standard equipment and laboratory designed protocols. Licensed medical practitioners are trained and qualified to make therapeutic decisions pertaining to medications and or dosage based on patient information and medical history, including the pharmacogenetic report.
                    </p>
                    <p>
                        You are at all times responsible for any actions you take, or do not take, as consequence of the assertions or recommendations in the report, and you will not hold DNA Lifestyle its officers, employees and representatives, harmless against all losses, costs and expenses in this regard, subject to what is set out below.
                    </p>
                    <p>
                        To the fullest extent permitted by law, neither DNA Lifestyle nor its officers, employees or representatives will be liable for any claim, proceedings, loss or damage of any kind arising out of or in connection with acting, or not acting, on the assertions or recommendations in the report. This is a comprehensive exclusion of liability that applies to all damage and loss, including, compensatory, direct, indirect or consequential damages, loss of data, income or profit, loss of or damage to property and claims of third parties, howsoever arising, whether in tort (including negligence), contract or otherwise.
                    </p>
                </div>
              
            </div>
            
             <!-- Page 2 end -->
            
            <!-- Page 3 start -->
            <div class="page page-header">
                <div class="para-content">
                     <center>
                        <h2>How to Read Your Report</h2>
                        <h1 class="title primary" >WHAT IS GENETICS?</h1>
                        <img src="images/pdf_report/img1.png" style="width: 100%;" >
                    </center>
                </div>
                
            </div>
            
             <!-- Page 3 end -->
             
              <!-- Page 4 start -->
             <div class="page page-header">
                <div class="para-content">
                     <center>
                        <h1 class="title primary">SCORE INTERPRETATIONS</h1>
                    </center>
                    
                    <table class="table-score-info">
                      <tr>
                        <th class="bg-secondary"></th>
                        <th>SCORE</th>
                        <th>Lastname</th>
                        <th>Savings</th>
                      </tr>
                      <tr>
                          <td class="bg-sucess"></td>
                        <td>0-2</td>
                        <td>Excellent / Protective</td>
                        <td>An \'excellent / protective’ score indicates a very favorable response or ability for a trait</td>
                      </tr>
                      <tr>
                          <td class="bg-sucess-light"></td>
                        <td>2.1-4</td>
                        <td>Good / Lower Risk</td>
                        <td>A \'good / lower risk’ score indicates a favorable response or ability for a trait</td>
                      </tr>
                      <tr>
                          <td class="bg-warning"></td>
                        <td>4.1-6</td>
                        <td>Typical</td>
                        <td>A \'typical’ score indicates a typical response or ability for a trait</td>
                      </tr>
                      <tr>
                          <td class="bg-danger-light"></td>
                        <td>6.1-8</td>
                        <td>Poor / Slightly Elevated</td>
                        <td>A \'poor / slightly elevated’ score indicates an unfavorable response or ability for a trait</td>
                      </tr>
                      <tr>
                          <td class="bg-danger"></td>
                        <td>8.1-10</td>
                        <td>Very Poor / Highly Elevated</td>
                        <td>A \'very poor / highly elevated’ score indicates a very unfavorable response or ability for a trait</td>
                      </tr>
                    </table>
                    
                    <center>
                        <h1 class="title primary">GENERAL GUIDELINES</h1>
                    <center>
                    <div>
                        <table class="table-score-info" style="padding:0px 50px;border:1px solid #ddd0;">
                          <tr>
                            <td style="border: 1px solid #ddd0;">Genetic risk or predisposition given in the report is based on statistically relevant genomics research studies, which should not be taken as a diagnosis of any health condition or overall wellness.</td>
                            <td style="border: 1px solid #ddd0;"> Traits in the report are not genetically interlinked; their genetic associations are independent of each other. Therefore, every trait score and interpretation are independent of each other.</td>
                          </tr>
                        </table>
                    </div>
                    <div>
                        <img src="images/pdf_report/img2.png" style="width: 70%;">
                    </div>
                    
                    <table class="table-score-info" style="width:100%;border:1px solid #ddd0;">
                      <tr>
                        <td style="border: 1px solid #ddd0;">This report provides information The information in the report may provide an Please consult with your doctor, or other
about genetic predispositions only and may not indicate current conditions or characteristics.</td>
                        <td style="border: 1px solid #ddd0;">understanding of one’s genetic risks and may help in making informed decisions regarding one’s wellness  and goals.</td>
                        <td style="border: 1px solid #ddd0;">qualified health care professional before making any dietary, fitness, health and wellness related changes.</td>
                      </tr>
                    </table>
                    </center>
                    
                </div>
                
               
            </div>
            <!-- Page 4 end -->
             <!-- Page 5 start -->
             <div class="page">
                    <center>
                        <img src="images/pdf_report/img3.png" style="width: 780px;">
                    </center>
               
            </div>
            <!-- Page 5 end -->
              <!-- Category Starts Here -->
             <!-- Page 6 start -->
             <div class="page">
                 <img src="images/pdf_report/corner1.png" style="">
                <div class="para-content">
                    <center>
                        <b>
                         <br/>
                        <h2>Category Summary</h2>
                        <h1 class="title primary">REGULATION OF EATINGS</h1>
                        <table class="table-score">
                          <tr>
                            <td class="danger"> 9.0 </td>
                            <td class="danger-light">7.0</td>
                            <td class="warning">5.9</td>
                          </tr>    
                            
                        <tr>
                        <td class="danger"> 
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator bg-danger"></span>
                        </td>
                        <td class="light">
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator  bg-danger-light"></span>
                            <span class="box-indicator"></span>
                        </td>
                        <td class="warning">
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator bg-warning"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="danger"> Satiety Response </td>
                        <td class="danger-light">Emotional Eating Dependance</td>
                        <td class="warning">Snacking Pattern</td>
                      </tr>
                      </table>
                      </b>
                    </center>
                </div>
                <div style="position: absolute;bottom: 0px;text-align: right; width: 100%;">
                    <img src="images/pdf_report/corner2.png" >
                </div>
            </div>
            <!-- Page 6 end -->
            
          
            
             <!-- Page 7 start -->
             <div class="page page-header">
                <div class="para-content">
                    <h1>Satiety Response</h1>
                    <center>
                        <div>
                            <img class="traits-img" src="images/pdf_report/safetyResponse.png" >
                        </div>
                    </center>
                    <h3 class="primary">What is Satiety Response?</h3>
                    <p>
                        Satiety means feeling of fullness or suppression of hunger for a period of time after a meal. 
                        Certain genetic variations can influence the ability to feel satiated after consumption of a meal, which can lead to overeating for individuals with a poor satiety response. 
                        Over eating can lead to an excessive calorie intake, thereby increasing the risk of weight gain.
                    </p>
                    <table class="table-score">
                    <tr>
                        <td class="danger">
                            
                        <table class="table-score">
                      <tr>
                        <td class="danger"> 9.0 </td>
                      </tr>    
                            
                        <tr>
                        <td class="danger"> 
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator bg-danger"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="danger"> Satiety Response </td>
                      </tr>
                      </table>
                            
                        </td>
                        <td  style="text-align: left;" >
                            <h3 class="primary" >Interpretation</h3>
                        <p>
                        As per your genetics, your Satiety Response is very poor. 
                        People with such a genotype tend to not reach the satiety point or a feeling of fullness after a meal, which can lead to excessive calorie intake.
                            
                        </p>
                        </td>
                    </tr>
                </table>
                
                
                <center>
                    <h3 class="primary">Gene Table</h3>
                </center>
                
                <div class="gene-table">
                    <button class="gene-table-btn1">Gene Name : FTO</button>
                    <button class="gene-table-btn2">Your Genotype : AT</button>
                    <p>
                        The FTO gene is one of the genes that has been associated with obesity risk. 
                        It is believed to influence satiety and hunger and regulate energy homeostasis.
                        Studies suggest that the FTO gene may play an important role in regulating food intake; 
                        variations of this gene can influence satiety, food choices, and increased energy consumption.
                    </p>
                </div>
                </div>
            </div>
            <!-- Page 7 end -->
            
            <!-- Page 8 start -->
            <div class="page page-header">
                <div class="para-content">
            
                <center>
                         <h3 class="primary">Do\'s and Don\'ts</h3>
                    </center>
                    <div class="row">
                        <div class="do col-5">
                            <h3>
                                Do\'s
                            </h3>
                            <p>
                                <ul>
                                    <li>Maintain intervals of 2.5-3 hours between each meal.</li>
                                    <li>Increase the protein and fiber content in your meals so that excessive intake of simple carbohydrates and fats is avoided.</li>
                                    <li>Maintain a good lifestyle, exercise regularly, and follow a healthy eating pattern.</li>
                                </ul>
                                
                            </p>
                        </div>
                        <div class="dont  col-5">
                            <h3>
                                Don\'ts
                            </h3>
                            <p>
                                <ul>
                                    <li>Avoid intake of excessive amounts of simple carbohydrates, deep fried foods, and junk foods.</li>
                                    <li>Avoid binging on empty calories, snacks with a high salt content, and high calorie meals.</li>
                                    <li>Avoid improper chewing of food and finishing meals very quickly.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page 8 end -->
            <!-- Category End Here -->
';

 
            $qry_phenotype = "select phenotype from `panel` where panel_info_id=1 group by `phenotype`";
			$res_phenotype = $conn->query($qry_phenotype);
			while($row_phenotype = $res_phenotype->fetch_assoc()) {
                
                $Traits=array();
                $qry_Traits = "select traits from `panel` where panel_info_id=1 && phenotype = '".$row_phenotype['phenotype']."' group by `Traits`";
    			$res_Traits = $conn->query($qry_Traits);
    			while($row_Traits = $res_Traits->fetch_assoc()) {
    			    array_push($Traits,$row_Traits['traits']);
    			}
         
        $html.='<!-- Category Starts Here -->
            <div class="page page-header">
                 <img src="images/pdf_report/corner1.png" style="">
                <div class="para-content">
                    <center>
                        <b>
                         <br/>
                        <h2>Category Summary</h2>
                        <h1 class="title primary">'.$row_phenotype['phenotype'].'</h1>';
                        
        for ($x = 0; $x < count($Traits); $x+=3) {
                               
        $html.='<table class="table-score">
                          <tr>';
                            if($x < count($Traits) ){ 
                            $html.='<td class="danger"> 9.0 </td>';
                            }if($x+1 < count($Traits) ){
                            $html.='<td class="danger-light">7.0</td>';
                            }if($x+2 < count($Traits) ){ 
                            $html.='<td class="warning">5.9</td>';
                            } 
                          $html.='</tr>    
                        <tr>';
                        if($x < count($Traits) ){ 
                        $html.='<td class="danger"> 
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator bg-danger"></span>
                        </td>';
                         }if($x+1 < count($Traits) ){ 
                        $html.='<td class="light">
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator  bg-danger-light"></span>
                            <span class="box-indicator"></span>
                        </td>';
                        }if($x+2 < count($Traits) ){ 
                        $html.='<td class="warning">
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator bg-warning"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                        </td>';
                       } 
                      $html.='</tr>
                      <tr>';
                        if($x < count($Traits) ){ 
                        $html.='<td class="danger">'.$Traits[$x].'</td>';
                        }if($x+1 < count($Traits) ){
                        $html.=' <td class="danger-light">'.$Traits[$x+1].'</td>';
                       }if($x+2 < count($Traits) ){
                        $html.='<td class="warning">'.$Traits[$x+2].'</td>';
                         } 
                      $html.='</tr>
                      </table>';
                      
                       }
                     $html.=' 
                      </b>
                    </center>
                </div>
                <div style="position: absolute;bottom: 0px;text-align: right; width: 100%;">
                    <img src="images/pdf_report/corner2.png" >
                </div>
            </div>
            <!-- Page 6 end -->';
              for ($x = 0; $x < count($Traits); $x+=1) { 
            
             $html.='<!-- Page 7 start -->
             <div class="page page-header">
                <div class="para-content">
                    <h1>'.$Traits[$x].'</h1>
                    <center>
                        <img src="images/pdf_report/safetyResponse.png" >
                    </center>
                    <h3 class="primary">What is '.$Traits[$x].'?</h3>
                    <p>
                        Satiety means feeling of fullness or suppression of hunger for a period of time after a meal. 
                        Certain genetic variations can influence the ability to feel satiated after consumption of a meal, which can lead to overeating for individuals with a poor satiety response. 
                        Over eating can lead to an excessive calorie intake, thereby increasing the risk of weight gain.
                    </p>
                    <table class="table-score">
                    <tr>
                        <td class="danger">
                            
                        <table class="table-score">
                      <tr>
                        <td class="danger"> 9.0 </td>
                      </tr>    
                            
                        <tr>
                        <td class="danger"> 
                            <span class="box-indicator"></span> 
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator"></span>
                            <span class="box-indicator bg-danger"></span>
                        </td>
                      </tr>
                      <tr>
                        <td class="danger">'. $Traits[$x].'</td>
                      </tr>
                      </table>
                            
                        </td>
                        <td  style="text-align: left;" >
                            <h3 class="primary" >Interpretation</h3>
                        <p>
                        As per your genetics, your Satiety Response is very poor. 
                        People with such a genotype tend to not reach the satiety point or a feeling of fullness after a meal, which can lead to excessive calorie intake.
                            
                        </p>
                        </td>
                    </tr>
                </table>
                
                
                <center>
                    <h3 class="primary">Gene Table</h3>
                </center>
                ';
                
                $qry_gene = "select gene, genotype, description from `panel` where panel_info_id=1 && phenotype = '".$row_phenotype['phenotype']."' group by `Traits`";
    			$res_gene = $conn->query($qry_gene);
    			while($row_gene = $res_gene->fetch_assoc()) {
                
                $html.='
                <div class="gene-table">
                    <button class="gene-table-btn1">Gene Name : '. $row_gene['gene'] .'</button>
                    <button class="gene-table-btn2">Your Genotype : '. $row_gene['genotype'].'</button>
                    <p>'. $row_gene['description'] .'</p>
                </div>';
                
                
                 } 
               $html.=' <br/>
                <br/>
                </div>
            </div>
            <!-- Page 7 end -->
            
            <!-- Page 8 start -->
            <div class="page page-header">
                <div class="para-content">
            
                <center>
                         <h3 class="primary">Do\'s and Don\'ts</h3>
                    </center>
                    <div class="row">
                        <div class="do col-5">
                            <h3>
                                Do\'s
                            </h3>
                            <p>
                                <ul>
                                    <li>Maintain intervals of 2.5-3 hours between each meal.</li>
                                    <li>Increase the protein and fiber content in your meals so that excessive intake of simple carbohydrates and fats is avoided.</li>
                                    <li>Maintain a good lifestyle, exercise regularly, and follow a healthy eating pattern.</li>
                                </ul>
                                
                            </p>
                        </div>
                        <div class="dont  col-5">
                            <h3>
                                Don\'ts
                            </h3>
                            <p>
                                <ul>
                                    <li>Avoid intake of excessive amounts of simple carbohydrates, deep fried foods, and junk foods.</li>
                                    <li>Avoid binging on empty calories, snacks with a high salt content, and high calorie meals.</li>
                                    <li>Avoid improper chewing of food and finishing meals very quickly.</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page 8 end -->';
          }
         $html.='<!-- Category End Here -->';
} 

            
            
$html .=' 
         </div>
      </div>

   </body>
</html>';
$document = new Dompdf();
//$html = file_get_contents("pdf_page.php");
$document->load_html($html);
$document->render();
/*$font = $document->getFontMetrics()->get_font("helvetica", "bold");
$document->getCanvas()->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));*/
$document->stream("Webslesson", array("Attachment"=>0));

?>