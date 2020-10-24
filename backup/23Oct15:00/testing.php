<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;



$document = new Dompdf();
$html = file_get_contents("pdf_page.php");
$document->load_html($html);
$document->render();
/*$font = $document->getFontMetrics()->get_font("helvetica", "bold");
$document->getCanvas()->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0,0,0));*/
$document->stream("Webslesson", array("Attachment"=>0));

?>