<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>BASELINE QUESTIONNAIRE 2009</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script language="jscript" src="js/jquery-1.9.1.min.js"></script>
<script>
	$(document).ready(function(){
		$(".tam_content h5").each(function () {
      var el = $(this),
            text = el.html(),
            first = text.slice(0, 1),
            rest = text.slice(1);
      el.html("<span class='firstletter'>" + first + "</span>" + rest);
});

		//alert(header.charAt(0));
	});
	
</script>
</head>
<body>
<div class="container">
  <div class="eng_content">
		<h2>FOLLOW-UP HOUSEHOLD QUESTIONNAIRE 2014 � FINISH TN EVALUATION</h2>
		
		<p><i>INTERVIEWER:</i> Use the household list to find the household. Copy the village code from the village list in 1d and the household ID from the household list in 1d below. Use the household member list to identify the household member code/ID for the respondent. This household member list is also used to fill in the household roster XXX. Do this before the interview starts to save time for the respondent.</p>
		<p>Enter the GPS coordinates in 1.5 below and the code of the water sample in 1.6. Do this at the end of the interview. Do not forget to fill in the observations at the end of the survey. Observe the toilet of the household in case they have one, observe the general environment (k.1-K.5) and answer the questions on the water source in the household (K.5). This should be the main drinking water source so could be the vessel in which water is collected or a pump, etc..
Make sure you respect the time of the respondent. If needed stop the interview and continue at a later time or other day. Do not forget to get the consent of the respondent. Without the consent, do not continue.</p>
                <form name="surveyForm" id="surveyForm" method="post" action="save.php">
	<table width="100%" border="0">
  <tr>
    <td colspan="3" bgcolor="#68264D"><p style="color:#FFFFFF; font-size:15px;"><i>INTERVIEWER: Questions 1-4 should be filled in based on the household list</i></p></td>
    </tr>
  <tr class="even">
    <td width="6%">1a</td>
    <td width="41%" style="font-family:Conv_Ismail">Xd;wpak;</td>
    <td width="53%">
      
        <input type="text" name="interview_details[onriam]"/>
        
       </td>
  </tr>
  <tr class="odd">
    <td>1b</td>
    <td style="font-family:Conv_Ismail">Cuhl;rp</td>
    <td>
      <label>
        <input type="text" name="interview_details[ooratchi]"/>
        </label>
        </td>
  </tr>
  <tr class="even">
    <td>1c</td>
    <td style="font-family:Conv_Ismail">fpuhkk;</td>
    <td>
      <label>
        <input type="text" name="interview_details[gramam]"/>
        </label>
       </td>
  </tr>
  <tr class="odd">
    <td>1d</td>
    <td style="font-family:Conv_Ismail">fpuhk milahs vz;</td>
    <td>
      <label>
        <input type="text" name="interview_details[gramam_id]"/>
        </label>
   </td>
  </tr>
  <tr class="even">
    <td>1e</td>
    <td style="font-family:Conv_Ismail">FLk;g milahs vz;</td>
    <td>
      <label>
        <input name="interview_details[kudumba_id]" type="text" maxlength="7"/>
        </label>
   </td>
  </tr>
  <tr class="odd">
    <td>2a</td>
    <td style="font-family:Conv_Ismail">FLk;gj;jpd; tif</td>
    <td>
      <p style="font-family:Conv_Ismail">
        <label>
          <input type="radio" name="interview_details[family_type]" value="Same household as at baseline"/>
          mog;gil Ma;tpy; cs;s mBj FLk;gk;</label>
        <br>
        <label>
          <input type="radio" name="interview_details[family_type]" value="Replacement for baseline household"/>
          mog;gil Ma;tpy; cs;s FLk;gj;jpw;F khw;whf</label>
        <br>
        <label>
          <input type="radio" name="interview_details[family_type]" value="New household"/>
         g[jpa FLk;gk;</label>
        <br>
       
      </p>
   </td>
  </tr>
  <tr class="odd">
    <td>2b</td>
    <td style="font-family:Conv_Ismail">mog;gil Ma;tpy; ny;yhj FLk;gk; vdpy;, Vd;?</td>
    <td>
		  <p style="font-family:Conv_Ismail">
			<label><input type="radio" name="interview_details[family_not_in_basic_study]" value="Migrated permanently"/> epue;jukhf Fobgau;e;jdu;</label><br>			
			<label><input type="radio" name="interview_details[family_not_in_basic_study]" value="Migrated temporarily"/> jw;fhypfkhf Fobgau;e;jdu</label><br>			
			<label><input type="radio" name="interview_details[family_not_in_basic_study]" value="Could not be found"/> fz;lwpa Koatpy;iy</label><br>			
			<label><input type="radio" name="interview_details[family_not_in_basic_study]" value="Not available after several contact attempts"/> gyKiw bjhlu;g[f;F gpwFk; fpilf;ftpy;iy</label><br>			
			<label><input type="radio" name="interview_details[family_not_in_basic_study]" value="Refused the interview"/> gjpy; Tw kWj;jhu;</label><br>			
			<label>kw;wit ( Fwpg;gplt[k;) </label><br><input type="text" name="interview_details[family_not_in_basic_study_other]"/>			
	      </p>
	  </td>
  </tr>
  <tr class="even">
    <td>3a</td>
    <td style="font-family:Conv_Ismail">gjpyspg;gtupd; bgah;</td>
    <td>
      <label>
        <input type="text" name="interview_details[bathilalipavar_name]"/>
        </label>
    </td>
  </tr>
  <tr class="odd">
    <td>3b</td>
    <td style="font-family:Conv_Ismail">gjpyspg;gtupd; milahs vz;</td>
    <td>
      <label>
        <input type="text" name="interview_details[bathilalipavar_id]"/>
        </label>
    </td>
  </tr>
  <tr class="even">
    <td>4a</td>
    <td style="font-family:Conv_Ismail">gjpyhspapd; Jiztd; / Jiztpapd; bgah;</td>
    <td>
      <label>
        <input type="text" name="interview_details[bathilali_husb_wife]"/>
        </label>
    </td>
  </tr>
  <tr class="odd">
    <td>4b</td>
    <td style="font-family:Conv_Ismail">gjpyhspapd; mg;ghtpd; bgah;</td>
    <td>
      <label>
        <input type="text" name="interview_details[bathilali_father_name]"/>
        </label>
    </td>
  </tr>
</table>
<br>
<table width="100%" border="0">
  
  <tr bgcolor="#68264D" style="color:#FFFFFF; font-family:Conv_Ismail;">
    <td colspan="7" valign="top">&nbsp;</td>
    <td width="12%" valign="top" style="font-family:Conv_Ismail">Beu;fhdy;</td>
    <td width="8%" valign="top">ehs;</td>
    <td width="11%" valign="top">khjk;</td>
    <td width="11%" valign="top">tUlk;</td>
    <td width="18%" valign="top">Beu;fhdy; bra;gthpd; bgah;</td>
    <td width="33%" valign="top"><span style="font-family:Arial, Helvetica, sans-serif;">Outcome</span><br>1. Beu;fhdy; Koe;jJ<br>2. KGikaw;w Beu;fhdy;<br>3. gjpyhyp kWj;jhu;<br>4. gjpyhyp fpilf;ftpy;iy</td>
  </tr>
  <tr class="odd">
    <td colspan="7" valign="top">7a</td>
    <td style="font-family:Conv_Ismail">Kjy; Kiw bjhlh;g[ bfhs;Sjy;</td>
    <td valign="top"><label>
      <input type="text" name="interview_details[1st_contact_day]" style="width:40px;"/>
    </label></td>
    <td valign="top"><input type="text" name="interview_details[1st_contact_month]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[1st_contact_year]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[1st_contact_interviewer]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[1st_contact_outcome]" style="width:100px;"/></td>
  </tr>
  <tr class="odd">
    <td colspan="7" valign="top">7b</td>
    <td style="font-family:Conv_Ismail">nuz;lhk; Kiw bjhlh;g[ bfhs;Sjy;</td>
    <td valign="top"><label>
      <input type="text" name="interview_details[2nd_contact_day]" style="width:40px;"/>
    </label></td>
    <td valign="top"><input type="text" name="interview_details[2nd_contact_month]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[2nd_contact_year]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[2nd_contact_interviewer]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[2nd_contact_outcome]" style="width:100px;"/></td>
  </tr>
  <tr class="odd">
    <td colspan="7" valign="top">7c</td>
    <td style="font-family:Conv_Ismail">}d;whk; Kiw bjhlh;g[ bfhs;Sjy;</td>
    <td valign="top"><label>
      <input type="text" name="interview_details[3rd_contact_day]" style="width:40px;"/>
    </label></td>
    <td valign="top"><input type="text" name="interview_details[3rd_contact_month]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[3rd_contact_year]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[3rd_contact_interviewer]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[3rd_contact_outcome]" style="width:100px;"/></td>
  </tr>
  <tr class="odd">
    <td colspan="7" valign="top">7d</td>
    <td style="font-family:Conv_Ismail">nWjp Kiw bjhlh;g[ bfhs;Sk; Bjjp</td>
    <td valign="top"><label>
      <input type="text" name="interview_details[final_contact_day]" style="width:40px;"/>
    </label></td>
    <td valign="top"><input type="text" name="interview_details[final_contact_month]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[final_contact_year]" style="width:40px;"/></td>
    <td valign="top"><input type="text" name="interview_details[final_contact_interviewer]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[final_contact_outcome]" style="width:100px;"/></td>
  </tr>
</table>

<br>
<table width="100%" border="0">
  <tr bgcolor="#68264D" style="color:#FFFFFF; font-family:Conv_Ismail;">
    <td style="font-family:Arial, Helvetica, sans-serif;">INTERVIEW</td>
    <td>Kjy; Kiw bjhlh;g[ bfhs;Sjy;</td>
    <td>nuz;lhk; Kiw bjhlh;g[ bfhs;Sjy;</td>
    <td>}d;whk; Kiw bjhlh;g[ bfhs;Sjy;</td>
  </tr>
  <tr style="font-family:Conv_Ismail;" class="odd">
    <td>Muk;g Beuk;<span style="font-family:Arial, Helvetica, sans-serif;">(hrs:min) - use 24hr system</span></td>
    <td><input type="text" name="interview_details[1st_interview_time]" style="width:100px;"/></td>
    <td><input type="text" name="interview_details[2nd_interview_time]" style="width:100px;"/></td>
    <td><input type="text" name="interview_details[3rd_interview_time]" style="width:100px;"/></td>
  </tr>
</table>

<br>
<table width="100%" border="0">
  <tr bgcolor="#68264D" style="color:#FFFFFF;">
    <td width="27%" style="font-family:Conv_Ismail;">rhp ghh;j;jy;</td>
    <td width="22%">Conducted</td>
    <td width="20%">Date</td>
    <td width="17%">By (NAME)</td>
    <td width="14%">Notes</td>
  </tr>
  <tr class="odd">
    <td style="font-family:Conv_Ismail;">FLk;gj;jhuplk; tpdhf;fs; Bfl;fg;gl;ljh, bfhLf;fg;gl;l FLk;gkh kw;Wk; gupR tHA;fg;gl;ljh vd;W rupghh;f;ft[k;</td>
    <td valign="top"><p>		    
		    <label><input type="radio" name="interview_details[interview_conducted]" value="Y"/> Y</label>
			<label><input type="radio" name="interview_details[interview_conducted]" value="N"/> N</label>			
        </p></td>
    <td valign="top"><input type="text" name="interview_details[interview_date]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[interview_by]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[interview_notes]" style="width:100px;"/></td>
  </tr>
  <tr class="odd">
    <td style="font-family:Conv_Ismail;">gjpt[ bra;ag;gl;l tpdhf;fspy; jpUj;jk;</td>
    <td valign="top"><p>		    
		    <label><input type="radio" name="interview_details[interview_correction_conducted]" value="Y"/> Y</label>
			<label><input type="radio" name="interview_details[interview_correction_conducted]" value="N"/> N</label>			
        </p></td>
    <td valign="top"><input type="text" name="interview_details[interview_correction_date]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[interview_correction_by]" style="width:100px;"/></td>
    <td valign="top"><input type="text" name="interview_details[interview_correction_notes]" style="width:100px;"/></td>
  </tr>
</table>
<br>
<table width="100%" border="0">
  <tr>
    <td colspan="2" bgcolor="#68264D" style="color:#FFFFFF;">Household agreed to interview (consent given)</td>
    </tr>
  <tr class="odd">
    <td width="9%" align="center">8</td>
    <td width="91%"><p>		    
		    <label><input type="radio" name="interview_details[household_agreed_to_interview]" value="Y"/> Y</label>
			<label><input type="radio" name="interview_details[household_agreed_to_interview]" value="N"/> N</label>			
        </p></td>
  </tr>
</table>


</form>
  </div>
	<div class="enter_btn">
            <a href="javascript:void(0);" class="start_survey" id="start_survey" onclick="$('#surveyForm').submit()"><p>Submit</p></a>
	  </div>
</div>
</body>
</html>
