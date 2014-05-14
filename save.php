<?php 
include "includes/config.php"; 

if(isset($_POST['part_a1']))
{
    $partA1Post = $_POST['part_a1'];
    $partAarray = array(
        "interview_details_id" => $GLOBALS['DO']->dbMaxEntry("part_a1",'interview_details_id')+1,
        "single_multiple_caste" => $partA1Post['caste'],
        "family_caste_1" => (!empty($partA1Post['single_caste_code_1'])) ? $partA1Post['single_caste_code_1'] : $partA1Post['multi_caste_code_1'],
        "family_caste_2" => (!empty($partA1Post['multi_caste_code_2'])) ? $partA1Post['multi_caste_code_2'] : "",
        "family_religion" => $partA1Post['religion'],
        "family_religion_1" => (!empty($partA1Post['religion_1'])) ? $partA1Post['religion_1'] : "",
        "family_religion_2" => (!empty($partA1Post['religion_2'])) ? $partA1Post['religion_2'] : "",
        "family_religion_others" => (!empty($partA1Post['religion_other'])) ? $partA1Post['religion_other'] : "",
        "living_in_this_village_life" => $partA1Post['living_in_this_village_life'],
        "living_in_this_village_years" => $partA1Post['noOfYears'],
        "partner_living_in_this_village_life" => $partA1Post['living_in_this_village_life'],
        "partner_living_in_this_village_life" => $partA1Post['partner_noOfYears'],
        "family_occupation" => $partA1Post['family_occupation'],
        "family_relocation_in_next_1yr" => $partA1Post['family_relocation_in_next_1yr'],
        "seasonal_relocation_for_occupation_last_1yr" => $partA1Post['seasonal_relocation_for_occupation_last_1yr'],
        "family_members_relocated_to" => $partA1Post['family_members_relocated_to'],
        "security_on_relocation" => $partA1Post['security_on_relocation'],
        "govt_benefit_card" => $partA1Post['govt_benefit_card'],
    );
    $GLOBALS['DO']->dbArrayInsert("part_a1",$partAarray);
}
if(isset($_POST['part_b']))
{
    $partBPost = $_POST['part_b'];
    $partBarray = array(
        "interview_details_id" => $GLOBALS['DO']->dbMaxEntry("part_b",'interview_details_id')+1,
        "house_type" => $partBPost['house_type'],
        "know_no_of_rooms" => $partBPost['know_no_of_rooms'],
        "no_of_rooms" => (!empty($partBPost['no_of_rooms'])) ? $partBPost['no_of_rooms'] : "",
        "cooking_area" => $partBPost['cooking_area'],
        "cooking_area_other" => (!empty($partBPost['cooking_area_other'])) ? $partBPost['cooking_area_other'] : "",
        "living_in_this_house_life" => $partBPost['living_in_this_house_life'],
        "living_in_this_house_years" => (!empty($partBPost['living_in_this_house_years'])) ? $partBPost['living_in_this_house_years'] : "",
        "owned_by_your_family" => $partBPost['owned_by_your_family'],
        "non_family_owner" => (!empty($partBPost['non_family_owner'])) ? $partBPost['non_family_owner'] : "",
        "being_owner_for_life" => $partBPost['being_owner_for_life'],
        "being_owner_for_yrs" => (!empty($partBPost['being_owner_for_yrs'])) ? $partBPost['being_owner_for_yrs'] : "",
        "rent_wish" => $partBPost['rent_wish'],
        "rent_wish_amount" => (!empty($partBPost['rent_wish_amount'])) ? $partBPost['rent_wish_amount'] : "",
        "rights_on_this_house" => $partBPost['rights_on_this_house'],
        "other_rights_on_this_house" => (!empty($partBPost['other_rights_on_this_house'])) ? $partBPost['other_rights_on_this_house'] : "",
        "know_rent_amount_pay" => $partBPost['know_rent_amount_pay'],
        "rent_amount_pay" => (!empty($partBPost['rent_amount_pay'])) ? $partBPost['rent_amount_pay'] : "",
        "know_value_of_this_house" => $partBPost['know_value_of_this_house'],
        "current_value_of_this_house" => (!empty($partBPost['current_value_of_this_house'])) ? $partBPost['current_value_of_this_house'] : "",
        "land_owner_of_this_house" => $partBPost['land_owner_of_this_house'],
        "other_land_owner_of_this_house" => (!empty($partBPost['other_land_owner_of_this_house'])) ? $partBPost['other_land_owner_of_this_house'] : "",
        "wall_built_with" => $partBPost['wall_built_with'],
        "wall_built_with_other" => (!empty($partBPost['wall_built_with_other'])) ? $partBPost['wall_built_with_other'] : "",
        "roof_built_with" => $partBPost['roof_built_with'],
        "roof_built_with_other" => (!empty($partBPost['roof_built_with_other'])) ? $partBPost['roof_built_with_other'] : "",
        "floor_built_with" => $partBPost['floor_built_with'],
        "floor_built_with_other" => (!empty($partBPost['floor_built_with_other'])) ? $partBPost['floor_built_with_other'] : "",
        "primary_fuel_for_cooking" => $partBPost['primary_fuel_for_cooking'],
        "primary_fuel_for_cooking_other" => (!empty($partBPost['primary_fuel_for_cooking_other'])) ? $partBPost['primary_fuel_for_cooking_other'] : "",
        "primary_fuel_for_light" => $partBPost['primary_fuel_for_light'],
        "primary_fuel_for_light_other" => (!empty($partBPost['primary_fuel_for_light_other'])) ? $partBPost['primary_fuel_for_light_other'] : "",
    );
    $GLOBALS['DO']->dbArrayInsert("part_b",$partBarray);
}
if(isset($_POST['interview_details']))
{
    $partIntPost = $_POST['interview_details'];
    $partIntarray = array(
        "onriam" => (!empty($partIntPost['onriam'])) ? $partIntPost['onriam'] : "",
        "ooratchi" => (!empty($partIntPost['ooratchi'])) ? $partIntPost['ooratchi'] : "",
        "gramam" => (!empty($partIntPost['gramam'])) ? $partIntPost['gramam'] : "",
        "gramam_id" => (!empty($partIntPost['gramam_id'])) ? $partIntPost['gramam_id'] : "",
        "kudumba_id" => (!empty($partIntPost['kudumba_id'])) ? $partIntPost['kudumba_id'] : "",
        "family_type" => (!empty($partIntPost['family_type'])) ? $partIntPost['family_type'] : "",
        "family_not_in_basic_study" => (!empty($partIntPost['family_not_in_basic_study'])) ? $partIntPost['family_not_in_basic_study'] : "",
        "family_not_in_basic_study_other" => (!empty($partIntPost['family_not_in_basic_study_other'])) ? $partIntPost['family_not_in_basic_study_other'] : "",
        "bathilalipavar_name" => (!empty($partIntPost['bathilalipavar_name'])) ? $partIntPost['bathilalipavar_name'] : "",
        "bathilalipavar_id" => (!empty($partIntPost['bathilalipavar_id'])) ? $partIntPost['bathilalipavar_id'] : "",
        "bathilali_husb_wife" => (!empty($partIntPost['bathilali_husb_wife'])) ? $partIntPost['bathilali_husb_wife'] : "",
        "bathilali_father_name" => (!empty($partIntPost['bathilali_father_name'])) ? $partIntPost['bathilali_father_name'] : "",
        "bathilali_husb_wife" => (!empty($partIntPost['bathilali_husb_wife'])) ? $partIntPost['bathilali_husb_wife'] : "",
        "1st_contact_day" => (!empty($partIntPost['1st_contact_day'])) ? $partIntPost['1st_contact_day'] : "",
        "1st_contact_month" => (!empty($partIntPost['1st_contact_month'])) ? $partIntPost['1st_contact_month'] : "",
        "1st_contact_year" => (!empty($partIntPost['1st_contact_year'])) ? $partIntPost['1st_contact_year'] : "",
        "1st_contact_interviewer" => (!empty($partIntPost['1st_contact_interviewer'])) ? $partIntPost['1st_contact_interviewer'] : "",
        "1st_contact_outcome" => (!empty($partIntPost['1st_contact_outcome'])) ? $partIntPost['1st_contact_outcome'] : "",
        "2nd_contact_day" => (!empty($partIntPost['2nd_contact_day'])) ? $partIntPost['2nd_contact_day'] : "",
        "2nd_contact_month" => (!empty($partIntPost['2nd_contact_month'])) ? $partIntPost['2nd_contact_month'] : "",
        "2nd_contact_year" => (!empty($partIntPost['2nd_contact_year'])) ? $partIntPost['2nd_contact_year'] : "",
        "2nd_contact_interviewer" => (!empty($partIntPost['2nd_contact_interviewer'])) ? $partIntPost['2nd_contact_interviewer'] : "",
        "2nd_contact_outcome" => (!empty($partIntPost['2nd_contact_outcome'])) ? $partIntPost['2nd_contact_outcome'] : "",
        "3rd_contact_day" => (!empty($partIntPost['3rd_contact_day'])) ? $partIntPost['3rd_contact_day'] : "",
        "3rd_contact_month" => (!empty($partIntPost['3rd_contact_month'])) ? $partIntPost['3rd_contact_month'] : "",
        "3rd_contact_year" => (!empty($partIntPost['3rd_contact_year'])) ? $partIntPost['3rd_contact_year'] : "",
        "3rd_contact_interviewer" => (!empty($partIntPost['3rd_contact_interviewer'])) ? $partIntPost['3rd_contact_interviewer'] : "",
        "3rd_contact_outcome" => (!empty($partIntPost['final_contact_outcome'])) ? $partIntPost['final_contact_outcome'] : "",
        "final_contact_day" => (!empty($partIntPost['final_contact_day'])) ? $partIntPost['final_contact_day'] : "",
        "final_contact_month" => (!empty($partIntPost['final_contact_month'])) ? $partIntPost['final_contact_month'] : "",
        "final_contact_year" => (!empty($partIntPost['final_contact_year'])) ? $partIntPost['final_contact_year'] : "",
        "final_contact_interviewer" => (!empty($partIntPost['final_contact_interviewer'])) ? $partIntPost['final_contact_interviewer'] : "",
        "final_contact_outcome" => (!empty($partIntPost['final_contact_outcome'])) ? $partIntPost['final_contact_outcome'] : "",
        "1st_interview_time" => (!empty($partIntPost['1st_interview_time'])) ? $partIntPost['1st_interview_time'] : "",
        "2nd_interview_time" => (!empty($partIntPost['2nd_interview_time'])) ? $partIntPost['2nd_interview_time'] : "",
        "3rd_interview_time" => (!empty($partIntPost['3rd_interview_time'])) ? $partIntPost['3rd_interview_time'] : "",
        "interview_conducted" => (!empty($partIntPost['interview_conducted'])) ? $partIntPost['interview_conducted'] : "",
        "interview_date" => (!empty($partIntPost['interview_date'])) ? $partIntPost['interview_date'] : "",
        "interview_by" => (!empty($partIntPost['interview_by'])) ? $partIntPost['interview_by'] : "",
        "interview_notes" => (!empty($partIntPost['interview_notes'])) ? $partIntPost['interview_notes'] : "",
        "interview_correction_conducted" => (!empty($partIntPost['interview_correction_conducted'])) ? $partIntPost['interview_correction_conducted'] : "",
        "interview_correction_date" => (!empty($partIntPost['interview_correction_date'])) ? $partIntPost['interview_correction_date'] : "",
        "interview_correction_by" => (!empty($partIntPost['interview_correction_by'])) ? $partIntPost['interview_correction_by'] : "",
        "interview_correction_notes" => (!empty($partIntPost['interview_correction_notes'])) ? $partIntPost['interview_correction_notes'] : "",
        "household_agreed_to_interview" => (!empty($partIntPost['household_agreed_to_interview'])) ? $partIntPost['household_agreed_to_interview'] : "",
        
    );
    $GLOBALS['DO']->dbArrayInsert("interview_details",$partIntarray);
}

   
    //$GLOBALS['CF']->redirect("report.php");
?>
