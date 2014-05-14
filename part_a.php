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
  <div class="tam_content">
  		 <form name="surveyForm" id="surveyForm" method="post" action="save.php"> 
		
		<h2>gFjp  <span>A</span>1.   FLk;gj;jpy; bghJthd Fzeyd;fs;:</h2>		
		<h4>gjpyhspf;F thrpf;ft[k; : cA;fs; FLk;g Fzeyd;fis Bfl;f tpUg;ggLfpBwd;:</h4>
		<h5>A1.1	FLk;g jiytupd; Ihjp vd;d?</h5>
		
		  <p>
		    <label>
		      <input type="radio" name="part_a1[caste]" value="Everybody in the household is of the same caste"/>
		      FLk;g cWg;gpdu;fs; midtUk; xBu Ihjp</label>
		    <br>
			<label class="left_align">Ihjp FwpaPL 1:<input name="part_a1[single_caste_code_1]" type="text"/></label>
			<br><br>
		    <label>
		      <input type="radio" name="part_a1[caste]" value="Inter-caste marriage"/>
		      IhjpfSf;fpilBaahd (fyg;g[) jpUkzk;</label><br>
			  <label class="left_align">Ihjp FwpaPL 1:<input name="part_a1[multi_caste_code_1]" type="text"/></label>
			  <label>Ihjp FwpaPL 2:<input name="part_a1[multi_caste_code_2]" type="text"/></label>
		    <br>
	      </p>
	  
		
	<h5>A1.2	cA;fs; FLk;gj;jpd; kjk; vd;d?</h5>	
		
		
		  <p>
		    <label>
		      <input type="radio" name="part_a1[religion]" value="Hindu"/>
		      ne;J</label>
		    <br>
		    <label><input type="radio" name="part_a1[religion]" value="Muslim"/> K^;ypk;</label><br>
			<label><input type="radio" name="part_a1[religion]" value="Christian"/> fpU&;Jth;</label><br>
			<label><input type="radio" name="part_a1[religion]" value="Sikh"/> rPf;fpah;</label><br>
			<label><input type="radio" name="part_a1[religion]" value="Interreligious marriage"/> kjA;fSf;fpilBaahd (fyg;g[) jpUkzk;</label><br>
			
			
			  <label class="left_align">kj FwpaPL 1:<input name="part_a1[religion_1]" type="text"/></label>
			  <label>kj FwpaPL 2:<input name="part_a1[religion_2]" type="text"/></label>
		    <br>
			<label><input type="radio" name="part_a1[religion]" value="Others"/> kw;wit (Fwpg;gplt[k;)</label>
			<label><input name="part_a1[religion_other]" type="text"/></label>
	      </p>
	  

		<h5>A1.3	FLk;g jiytu; ne;j fpuhkj;jpy; vj;jid Mz;Lfshf nUf;fpwhu;fs;</h5>	
		<p>thH;ehs; KGtJk; :</p>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[living_in_this_village_life]" value="Yes" /> Mk;</label><br>
			<label><input type="radio" name="part_a1[living_in_this_village_life]" value="No"/> ny;iy </label> <label class="left_align">vj;jid tUlA;fs;: <input name="part_a1[noOfYears]" type="text"/></label><br>
			<label><input type="radio" name="part_a1[living_in_this_village_life]" value="Don't Know"/> bjupahJ</label><br>			
	      </p>
	  
	  
	  
	  <h5>A1.4	FLk;g jiytupd; Jiz ne;j fpuhkj;jpy; vj;jid Mz;Lfshf nUf;fpwhu;fs;</h5>	
		<p>thH;ehs; KGtJk; :</p>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[partner_living_in_this_village_life]" value="Yes"/> Mk;</label><br>
			<label><input type="radio" name="part_a1[partner_living_in_this_village_life]" value="No"/> ny;iy </label> <label class="left_align">vj;jid tUlA;fs;: <input name="part_a1[partner_noOfYears]" type="text"/></label><br>
			<label><input type="radio" name="part_a1[partner_living_in_this_village_life]" value="Not applicable"/> bghUe;jhJ (FLk;g jiytUf;F jpUkzk; Mftpy;iy)</label><br>
			<label><input type="radio" name="part_a1[partner_living_in_this_village_life]" value="Others"/> bjupahJ</label><br>			
	      </p>
	  
	  
	  
	  <h5>A1.5	cA;fs; FLk;gj;jpd; Kjd;ik tUkhdk; bfhLf;Fk; bjhHpy; vd;d?</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[family_occupation]" value="Agricultural labourers"/> tptrhaTyp</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Construction workers/skilled labourers"/> fl;olbjhHpyhspfs;</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Unskilled labour"/> gaw;rpaw;w bjhHpyhspfs;</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Farmers, fishers, hunters"/> gz;iz bjhHpyhspfs;, kPdth;fs;, Btl;ilahLgth;fs;</label><br>			
			<label><input type="radio" name="part_a1[family_occupation]" value="Self-employed, business"/> Ra Btiy bra;gth;,tpahghuk;</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Professional, technical, managerial, executive, and teachers"/> bfsuhkhd Btiy, bjhHpw;El;gk;, eph;thfk;, Executive kw;Wk; MrPhpah;fs;</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Government Employee"/> muR mYtyh;</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Dairy"/> ghy;gz;iz</label><br>
			<label><input type="radio" name="part_a1[family_occupation]" value="Other"/> kw;wit</label><br>
	      </p>
	  
	  
	  <h5>A1.6	cA;fs; FLk;gk;; mLj;j 1 tUlj;jpw;Fs; ne;j fpuhkj;ij tpl;L btspBa bry;y / BtW nlj;jpw;F FoBaw jpl;lk; cs;sjh?</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="Yes, certainly, we already have plans to move away"/> Mk; epr;irakhf, ehA;fs; Vw;fdBt btspBaw jpl;lk; Bghl;Ls;Bshk;</label><br>
			<label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="Yes, it is very likely"/> Mk; , kpft[k; tha;g;g[s;sJ</label><br>
			<label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="Somewhat likely"/> xust[ tha;g;g[s;sJ</label><br>
			<label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="Unlikely"/> tha;g;g[ ny;iy</label><br>			
			<label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="Very unlikely"/> kpft[k; tha;g;g[ Fiwt[</label><br>
			<label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="We will for sure not move away"/> ehA;fs; epr;rakhf btspBaw khl;Blhk;</label><br>
			<label><input type="radio" name="part_a1[family_relocation_in_next_1yr]" value="Don't Know"/> bjupahJ</label><br>
	      </p>
	  
	  
	  
	   <h5>A1.7	fle;j Mz;oy; cA;fs; FLk;g cWg;gpdu;fspy; ahBuDk; ( gUtfhyj;jpw;F Vw;w BtiyfSf;F) Fobgau;e;Js;sduh?</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[seasonal_relocation_for_occupation_last_1yr]" value="Yes, all household members"/> Mk;, midj;J cWg;gpdu;fSk;</label><br>
			<label><input type="radio" name="part_a1[seasonal_relocation_for_occupation_last_1yr]" value="Yes, some household members"/> Mk;, rpy FLk;g cWg;gpdu;fs;</label><br>
			<label><input type="radio" name="part_a1[seasonal_relocation_for_occupation_last_1yr]" value="No, none"/> ahUk; ny;iy</label> A 1.8 Bfs;tpf;F bry;yt[k;<br>

	      </p>
	 
	  
	  <h5>A1.8	FLk;g cWg;gpdu;fs; vA;Bf Fobgau;e;jdu;?</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[family_members_relocated_to]" value="Urban areas in another state or abroad"/> kw;bwhU khepyk; my;yJ bspehl;od; efu;g[w gFjpfspy;</label><br>
			<label><input type="radio" name="part_a1[family_members_relocated_to]" value="Urban areas in TamilNadu"/> jkpH;ehl;od; efu;g[wA;fspy;</label><br>
			<label><input type="radio" name="part_a1[family_members_relocated_to]" value="Rural areas"/> fpuhk gFjpapy;</label><br>
			<label><input type="radio" name="part_a1[family_members_relocated_to]" value="Don't Know"/> bjupahJ</label><br>

	      </p>
	  
	  
	  
	  <h5>A1.9	ePA;fs; gpd;tUk; mwpf;ifia Vw;fpwPu;fsh? midj;J / rpy FLk;g cWg;gpdu;fs; nlk; bgau;e;J brd;w fhyj;jpy; vA;fsJ nUg;gplk; kw;Wk; clikfSf;fhd ghJfhg;g[ Fiwthf nUf;fpd;wd.</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[security_on_relocation]" value="Strongly disagree"/> fLikahf kWf;fpBwd;</label><br>
			<label><input type="radio" name="part_a1[security_on_relocation]" value="Disagree"/> kWf;fpBwd;</label><br>
			<label><input type="radio" name="part_a1[security_on_relocation]" value="Neutral"/> eLepiy</label><br>
			<label><input type="radio" name="part_a1[security_on_relocation]" value="Agree"/> Vw;fpBwd;</label><br>
			<label><input type="radio" name="part_a1[security_on_relocation]" value="Strongly agree"/> fLikahf Vw;fpBwd;</label><br>
	      </p>
	  
	  
	  <h5>A1.10	cA;fs; FLk;gj;jpw;F murhA;f rYif bgw ml;ilia brhe;jkhf itj;Js;sPu;fsh?</h5>	
		
		  <p>		    
		    <label><input type="radio" name="part_a1[govt_benefit_card]" value="Yes, Antyodaya card"/> Mk;, md;djBah ml;il</label><br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="Yes, BPL card"/> Mk;, tWik Bfhl;ow;F fPH; cs;sjw;fhd ml;il</label><br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="Yes, ration card"/> Mk;, FLk;g ml;il<br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="No"/> ny;iy<br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="RSBY"/> <span style="font-family:Arial, Helvetica, sans-serif">RSBY</span><br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="UID"/> Mjhu; ml;il<br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="RGJAY"/> <span style="font-family:Arial, Helvetica, sans-serif">RGJAY</span><br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="Chief Minister's Comprehensive Health Insurance Scheme (CMCHI)"/> Kjyikr;rupd tpupthd kUj;Jt fhg;gPl;L jpl;lk; <span style="font-family:Arial, Helvetica, sans-serif">(CMCHI)</span><br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="MG NREGA Card"/> <span style="font-family:Arial, Helvetica, sans-serif;">MG NREGA</span> ml;il</label><br>
			<label><input type="radio" name="part_a1[govt_benefit_card]" value="Dont Know"/> bjupahJ</label><br>
	      </p>
              </form> 
	</div>
	<div class="enter_btn">
            <a href="javascript:void(0);" class="start_survey" id="start_survey" onclick="$('#surveyForm').submit()"><p>Submit</p></a>
	  </div>
	 
</div>
</body>
</html>
