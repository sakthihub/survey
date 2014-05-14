<?php
include "config.php";

define("db_link", mysql_connect($hostname,$username,$password));
mysql_select_db($database_name);
/********************************************
Write the query, call it, and find the number of fields
/********************************************/
$select = "SELECT * FROM part_a1";				
$export = mysql_query($select);
$count = mysql_num_fields($export);
/********************************************
Extract field names and write them to the $header
variable
/********************************************/
$header="";
for ($i = 0; $i < $count; $i++) {
	$header .= mysql_field_name($export, $i)."\t";
}

$header = str_replace("id", "Id", $header);
$header = str_replace("interview_details_id", "Details Id", $header);
$header = str_replace("single_multiple_caste", "Caste", $header);
$header = str_replace("family_caste_1", "Caste Code 1", $header);
$header = str_replace("family_caste_2", "Caste Code 2", $header);
$header = str_replace("family_religion_1", "Religion Code 1", $header);
$header = str_replace("family_religion_2", "Religion Code 2", $header);
$header = str_replace("family_religion_others", "Religion Other", $header);
$header = str_replace("family_religion", "Religion", $header);
$header = str_replace("partner_living_in_this_village_life", "Family head's Partner living in this village for Life?", $header);
$header = str_replace("partner_living_in_this_village_years", "Family head's Partner living in this village for Years?", $header);
$header = str_replace("living_in_this_village_life", "Family head living in this village for Life?", $header);
$header = str_replace("living_in_this_village_years", "Family head living in this village for Years?", $header);
$header = str_replace("family_occupation", "Family Occupation", $header);
$header = str_replace("family_relocation_in_next_1yr", "Family relocation in next One year", $header);
$header = str_replace("seasonal_relocation_for_occupation_last_1yr", "Relocated for seasonal Occupation in last One year?", $header);
$header = str_replace("family_members_relocated_to", "Family Members Re-located to?", $header);
$header = str_replace("security_on_relocation", "Is your house and belongings safe on Re-location?", $header);
$header = str_replace("govt_benefit_card", "Do you have Govt. benefit Card?", $header);
/********************************************
Extract all data, format it, and assign to the $data
variable
/********************************************/
$data ="";
while($row = mysql_fetch_row($export)) {
	$line = '';
	foreach($row as $value) {											
		if ((!isset($value)) OR ($value == "")) {
			$value = "\t";
		} else {
			$value = str_replace('"', '""', $value);
			$value = '"' . $value . '"' . "\t";
		}
		$line .= $value;
	}
	$data .= trim($line)."\n";
}
$data = str_replace("\r", "", $data);
/********************************************
Set the default message for zero records
/********************************************/
if ($data == "") {
	$data = "\n(0) Records Found!\n";						
}
/********************************************
Set the automatic downloadn section
/********************************************/
$export_file = "Survey Part - A1 - ".  date("Y-m-d", time()).".xls";
    ob_end_clean();
    ini_set('zlib.output_compression','Off');
    
    header('Pragma: public');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');  // Date in the past    
    header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate'); // HTTP/1.1 
    header('Cache-Control: pre-check=0, post-check=0, max-age=0'); // HTTP/1.1
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Content-Transfer-Encoding: none');
    header('Content-Type: application/vnd.ms-excel;'); // This should work for IE & Opera
    header('Content-type: application/x-msexcel'); // This should work for the rest
    header('Content-Disposition: attachment; filename="' . basename($export_file) . '"');
  
print "$header\n$data";
?>