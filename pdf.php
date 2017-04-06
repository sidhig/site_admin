<?
require('html2fpdf.php');
$pdf=new HTML2FPDF();
$pdf->AddPage();
$fp = fopen("site_induction_form.php","r");
$strContent = fread($fp, filesize("test_side.php"));
fclose($fp);
$pdf->WriteHTML($strContent);
$pdf->Output("sample.pdf");
echo "PDF file is generated successfully!";
?>