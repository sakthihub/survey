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

		$("input:radio").click(function() {
			if(this.value == "assistance"){
				$(".toggle").hide(100);
			}
			else{
				$(".toggle").show(100);
			}

   		});
	});
	
</script>
</head>
<body>
<div class="container">
  <div class="tam_content">
	  <form name="surveyForm" id="surveyForm" method="post" action="save.php"> 
	  <h2>gFjp  <span>B.</span> cA;fs; FLk;gk; thH;fpw tPLfs; gw;wpa Fzeyd;fs;</h2>	
	  <h4 style="font-family:Arial, Helvetica, sans-serif"><i>READ TO RESPONDENT: In this section I would like to ask you about the dwelling you currently live in.</i></h4>
	  <h5>B.1 vd;d khjphpahd tPL nJ?</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_b[house_type]" value="Pucca House" /> fhd;fpuPl; tPL</label><br>
			<label><input type="radio" name="part_b[house_type]" value="Semi-Pucca"/> Xl;L tPL</label><br>
			<label><input type="radio" name="part_b[house_type]" value="Kutcha House"/> Tiu tPL<br>
			<label><input type="radio" name="part_b[house_type]" value="Other"/> kw;wit (Fwpg;gplt[k;) <label><input name="house_type" type="text"></label><br>
	      </p>

	  
	  
	  <h5>B.2 vj;jid miwfs; ne;j tPl;oy; cs;sd?<br><span style="font-family:Arial, Helvetica, sans-serif">(INCLUDE KITCHEN AND BATHROOM IF THESE ARE SEPARATE ROOMS WITHIN THE DWELLING)</span></h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_b[know_no_of_rooms]" value=""/> vz;iz vGjt[k; </label><label><input style="width:300px;" name="part_b[no_of_rooms]" type="text" /></label><br>
			<label><input type="radio" name="part_b[know_no_of_rooms]" value=""/> bjupahJ</label><br>

	      </p>
	  
	  
	  
	  <h5>B.3 bghJthf vA;Bf czt[ rikf;fg;gLfpwJ?</h5>	
		<p>			
			<label><input type="radio" name="part_b[cooking_area]" value="In a separate room within the dwelling (kitchen)"/> tPl;odpYs;s jdp miw (rikay; miw)</label><br>
			<label><input type="radio" name="part_b[cooking_area]" value="In the dwelling, but not in a designated room (kitchen)"/> tPl;odpDs; , Mdhy; mjw;fhf totikf;fg;gl;l miw ny;iy</label><br>
			<label><input type="radio" name="part_b[cooking_area]" value="Outside the dwelling"/> tPl;ow;F btspBa</label><br>
			<label><input type="radio" name="part_b[cooking_area]" value="Other"/> kw;wit (Fwpg;gplt[k;) </label><label><input style="width:350px;" name="part_b[cooking_area_other]" type="text"/></label><br>
	      </p>
	  
	  
	   <h5>B.4	vt;tst[ fhykhf ne;j tPl;oy; cA;fs; FLk;gk; trpf;fpwJ?</h5>	
		<p>thH;ehs; KGtJk; :</p>	
		<p>		    
		    <label><input type="radio" name="part_b[living_in_this_house_life]" value="Yes"/> Mk;</label><br>
			<label><input type="radio" name="part_b[living_in_this_house_life]" value="No"/> ny;iy </label> <label class="left_align">vj;jid tUlA;fs;: <input name="part_b[living_in_this_house_years]" type="text" /></label><br>			
			<label><input type="radio" name="part_b[living_in_this_house_life]" value="Don't Know"/> bjupahJ</label><br>			
	      </p>
	  
	  
	  <h5>B.5	ne;j tPL cA;fs; FLk;gj;jpw;F brhe;jkhdjh?</h5>	
		<p>		    
		    <label><input type="radio" name="part_b[owned_by_your_family]" value="Yes"/> Mk;</label><br>
			<label><input type="radio" name="part_b[owned_by_your_family]" value="No"/> ny;iy </label> <label><input name="part_b[non_family_owner]" type="text"/></label><br>					
	      </p>
	  
	  
	  <h5>B.6	vt;tst[ fhykhf ne;j tPL cA;fSf;F brhe;jkhdJ ?</h5>	
		<p>thH;ehs; KGtJk; :</p>	
		<p>		    
		    <label><input type="radio" name="part_b[being_owner_for_life]" value="Yes"/> Mk;</label><br>
			<label><input type="radio" name="part_b[being_owner_for_life]" value="No"/> ny;iy </label> <label class="left_align">vj;jid tUlA;fs;: <input name="part_b[being_owner_for_yrs]" type="text"/></label><br>			
			<label><input type="radio" name="part_b[being_owner_for_life]" value="Don't Know"/> bjupahJ</label><br>			
	      </p>
	  

	<h5>B.7 cA;fs; tPl;il thliff;F tpLtjhf nUe;jhy;, vt;tst[ thlif (U) Bfl;gPu;fs;?</h5>	
		<p>		    
		    <label><input type="radio" name="part_b[rent_wish]" value="Yes"/> bjhifia vGjt[k; </label><label><input style="width:300px;" name="part_b[rent_wish_amount]" type="text"/></label><br>
			<label><input type="radio" name="part_b[rent_wish]" value="No"/> bjupahJ</label><br>

	      </p>
	  
	  
	  <h5>B.8	ePA;fs; jw;BghJ thGk; ne;j tPL cA;fSf;F brhe;jkhdJ ny;iy vdwhy;, mjpy; cA;fspd; cupik vd;d ?</h5>			
		<p>		    
		    <label><input type="radio" name="part_b[rights_on_this_house]" value="Rented"/> thlif</label><br>
			<label><input type="radio" name="part_b[rights_on_this_house]" value="Assistance"/> nytrkhf <span style="font-family:Arial, Helvetica, sans-serif;">(assistance)</span> </label> <label class="left_align"><span style="font-family:Arial, Helvetica, sans-serif;">B</span> 10 Bfs;tpf;F bry;yt[k; </label><br>			
			<label><input type="radio" name="part_b[rights_on_this_house]" value="Lease"/> Fj;jiff;F</label><br>
			<label><input type="radio" name="part_b[rights_on_this_house]" value="Other"/> kw;wit (Fwg;gplt[k;) </label> <label><input name="part_b[other_rights_on_this_house]" type="text" /></label><br>			
			<label><input type="radio" name="part_b[rights_on_this_house]" value="Don't Know"/> bjhpahJ</label><br>
	      </p>
	  

	<div class="toggle">
	<h5>B.9 ePA;fs; FoapUf;Fk; tPl;ow;F VBjDk; thlif brYj;JfpwPu;fs; vd;why; , xU khjj;jpwF vt;tst[ thlif bfhLf;fpwPu;fs;? (U) ?<br><span style="font-family:Arial, Helvetica, sans-serif">IF RESPONDENT PAYS NOT ON A MONTHLY BASIS, HELP THE RESPONDENT TO CALCULATE THE MONTHLY VALUE.</span></h5>	
		<p>		    
		    <label><input type="radio" name="part_b[know_rent_amount_pay]" value="Enter Amount"/> bjhifia vGjt[k; </label><label><input style="width:300px;" name="part_b[rent_amount_pay]" type="text"/></label><br>
			<label><input type="radio" name="part_b[know_rent_amount_pay]" value="Dont Know"/> bjupahJ</label><br>

	      </p>
	  
	  </div>
	  
	  <h5>B.10 nd;W ne;j tPl;il tpw;gjhf nUe;jhy;, vd;d kjpg;g[ nUf;Fk;? <br><span style="font-family:Arial, Helvetica, sans-serif">IF RESPONDENT ANSWERS �DON�T KNOW�, PROMPT FOR BEST ESTIMATE OR ESTIMATE FOR VALUE OF SIMILAR DWELLING NEARBY </span></h5>	
		<p>		    
		    <label><input type="radio" name="part_b[know_value_of_this_house]" value="Enter Amount"/> bjhifia vGjt[k; </label><label><input style="width:300px;" name="part_b[current_value_of_this_house]" type="text"/></label><br>
			<label><input type="radio" name="part_b[know_value_of_this_house]" value="Don't Know"/> bjupahJ</label><br>

	      </p>
	  
	  
	  <h5>B.11	cA;fs; tPL fl;lg;gl;oUf;Fk; epyk; ahUf;F brhe;jk;?</h5>			
		<p>		    
		    <label><input type="radio" name="part_b[land_owner_of_this_house]" value="Self owned"/> vdf;F brhe;jk;</label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="Village landowners"/> fpuhkj;jpd; epy cupikahsu;fs;</label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="State"/> khepy muR</label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="Landowners from outside the village"/> btspapy; cs;s epy cupikahsu;fs;</label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="Close relatives"/> beUA;fpa cwtpdu;fs;</label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="Distant Relatives"/> Jhuj;J brhe;jA;fs;</label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="Private Party who is not a landowner"/> <span style="font-family:Arial, Helvetica, sans-serif;">Private Party who is not a landowner</span></label><br>
			 <label><input type="radio" name="part_b[land_owner_of_this_house]" value="Other"/> kw;wit (Fwg;gplt[k;) </label><label><input style="width:300px;" name="part_b[other_land_owner_of_this_house]" type="text"/></label><br>
			<label><input type="radio" name="part_b[land_owner_of_this_house]" value="Don�t Know"/> bjupahJ</label><br>
	      </p>
	  
	  
	  
	   <h5>B.12	Rth; vd;d bghUl;fshy; fl;lg;gl;lJ? </h5>			
		<p>		    
		    <label><input type="radio" name="part_b[wall_built_with]" value="Concrete / Brick"/> rpbkz;l / brA;fy;</label><br>
			<label><input type="radio" name="part_b[wall_built_with]" value="Mud / Brick / Stone"/> kz;/ brA;fy;/fy;</label><br>
			<label><input type="radio" name="part_b[wall_built_with]" value="Mud / Wooden plank"/> kz;/ kuf;fl;il</label><br>
			<label><input type="radio" name="part_b[wall_built_with]" value="Tin"/> ml;il</label><br>
			<label><input type="radio" name="part_b[wall_built_with]" value="Thatch / Bamboo"/> Tiu / }A;fpy;</label><br>
			 <label><input type="radio" name="part_b[wall_built_with]" value="Other"/> kw;wit (Fwg;gplt[k;) </label><label><input style="width:300px;" name="part_b[wall_built_with_other]" type="text"/></label><br>
			<label><input type="radio" name="part_b[wall_built_with]" value="Don�t Know"/> bjupahJ</label><br>
	      </p>
	  
	  
	  <h5>B.13	Bky;jsk; vd;d bghUl;fshy; fl;lg;gl;lJ?</h5>			
		<p>		    
		    <label><input type="radio" name="part_b[roof_built_with]" value="Cement / RCC"/> rpbkz;l;</label><br>
			<label><input type="radio" name="part_b[roof_built_with]" value="Stone / Slab"/> fy; / rpyhg;</label><br>
			<label><input type="radio" name="part_b[roof_built_with]" value="Roofing tiles"/> XL</label><br>
			<label><input type="radio" name="part_b[roof_built_with]" value="Sheet / Tin"/> rPl;</label><br>
			<label><input type="radio" name="part_b[roof_built_with]" value="Thatch"/> Tiu</label><br>
			 <label><input type="radio" name="part_b[roof_built_with]" value="Other"/> kw;wit (Fwg;gplt[k;) </label><label><input style="width:300px;" name="part_b[roof_built_with_other]" type="text"/></label><br>
			<label><input type="radio" name="part_b[roof_built_with]" value="Don�t Know"/> bjupahJ</label><br>
	      </p>
	  
	  
	  <h5>B.14	jiu vd;d bghUl;fshy; MdJ?</h5>			
		<p>		    
		    <label><input type="radio" name="part_b[floor_built_with]" value="Tiles"/> ily;^;</label><br>
			<label><input type="radio" name="part_b[floor_built_with]" value="Cement"/> rpbkz;l;</label><br>
			<label><input type="radio" name="b1part_b[floor_built_with]_14" value="Stone"/> fy;</label><br>
			<label><input type="radio" name="part_b[floor_built_with]" value="Mud / earth"/> kz;</label><br>
			 <label><input type="radio" name="part_b[floor_built_with]" value="Other"/> kw;wit (Fwg;gplt[k;) </label><label><input style="width:300px;" name="part_b[floor_built_with_other]" type="text"/></label><br>
			<label><input type="radio" name="part_b[floor_built_with]" value="Don�t Know"/> bjupahJ</label><br>
	      </p>
	  
	  
	  <h5>B.15	rikg;gjw;F Kjd;ikahf gad;gLk; vhpbghUs; vd;d?</h5>			
		<p>		    
		    <label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Electricity"/> kpd;rhuk;</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="LPG"/> rpypz;lh;</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Biogas"/> rhz vhptha[</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Kerosene / Stowe"/> kz;bzz;bza;</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Firewood"/> tpwF</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Charcoal"/> epyf;fup</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Cow Dung Cake"/> rhz tul;o</label><br>			
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Other"/> kw;wit (Fwg;gplt[k;) </label><label><input style="width:300px;" name="part_b[primary_fuel_for_cooking_other]" type="text"/></label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_cooking]" value="Don't Know"/> bjupahJ</label><br>
	      </p>
	  
	  
	  <h5>B.16	tpsf;F Vw;Wtjw;F Kjd;ikahf gad;gLj;jg;gLk; vhpbghUs; vd;d?</h5>			
		<p>		    
		    <label><input type="radio" name="part_b[primary_fuel_for_light]" value="Electricity"/> kpd;rhuk;</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_light]" value="Generator"/> jilapy;yh kpd;rhu naf;fp <span style="font-family:Arial, Helvetica, sans-serif;">(Generator)</span></label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_light]" value="Car battery"/> fhu; Bgl;lhp</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_light]" value="Dry battery"/> cyu; kpd;fyk;</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_light]" value="Kerosene Lamps"/> kz;bz;bza; tpsf;F</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_light]" value="Candles"/> bkGFth;j;jp</label><br>
			<label><input type="radio" name="part_b[primary_fuel_for_light]" value="Solar"/> R{upa rf;jp</label><br>
			 <label><input type="radio" name="part_b[primary_fuel_for_light]" value="Other"/> kw;wit (Fwg;gplt[k;) </label><label><input style="width:300px;" name="part_b[primary_fuel_for_light_other]" type="text"/></label><br>
			 <label><input type="radio" name="part_b[primary_fuel_for_light]" value="Don�t Know"/> bjupahJ</label><br>	
	      </p>
	  </form>		
	</div>
    <div class="enter_btn">
            <a href="javascript:void(0);" class="start_survey" id="start_survey" onclick="$('#surveyForm').submit()"><p>Submit</p></a>
	  </div>
</div>
</body>
</html>
