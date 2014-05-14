<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<title>BASELINE QUESTIONNAIRE 2009</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script language="javascript" src="js/jquery-1.9.1.min.js"></script>
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
		
	
		<h2>gFjp : <span>J - </span> Brkpg;g[</h2>		
		
		<h5>J.1 cA;fs; FLk;gj;jpy; VnjDk; BBrkpg;g[ cs;sjh? (tA;fpapy;, Tl;Lwtpy;, tPl;oy;...... vidad)....</h5>
		  <p>		    
		    <label><input type="radio" name="part_j[savings]" value="Yes"/> Mk; </label><br>
			<label><input type="radio" name="part_j[savings]" value="No"/> ny;iy </label><br>	
					
	      </p>
              <form name="surveyForm" id="surveyForm" method="post" action="save.php">
	  <h5>J.2 FLk;gj;jpd; Brkpg;g[ vA;F cs;sJ? <span style="font-family:Arial, Helvetica, sans-serif;">(MULTIPLE ANSWERS POSSIBLE)</span></h5>
	  	<p style="font-family:Arial, Helvetica, sans-serif">IF RESPONDENT ANSWERS �DON�T KNOW�, PROMPT FOR BEST ESTIMATE OR ESTIMATE FOR VALUE OF SIMILAR DWELLING NEARBY</p>
		  <p>		    
		   <label>bjhifia vGjt[k; <input name="part_j[savings_location]" type="text"/></label><br>
	      <br>
		</p>

		
		<h5>J.3 ne;j Brkpg;gpd; bkhj;j bjhif vd;d?</h5>

		  <p>		    
		   <label>bjhif <input name="part_j[total_savings]" type="text"/></label><br>
		</p>

		
		<h5>J.4 rpy FLk;gA;fs; Fwpg;gpl;l fhuz';fs;, epfH;r;rpfSf;fhf Brkpg;ghh;fs;. mJ Bghy ePA;fs; VBjDk; fhuz';fSf;fhf Brkpf;fpwPh;fsh?</h5>		

		  <p>		    
		    <label><input type="radio" name="part_j[savings_for_specific_reason]" value="Yes"/> Mk; </label><br>
			<label><input type="radio" name="part_j[savings_for_specific_reason]" value="No"/> ny;iy </label><label class="left_align"><span style="font-family:Arial, Helvetica, sans-serif;">K</span>.1 Bfs;tpf;F bry;yt[k;<br>	
					
	     </label></p>

		
		<h5>J.5 vd;d fhuzA;fSf;fhf?</h5>		
		
		  <p>		    
		   <label>1. <input name="part_j[savings_reason_1]" type="text" style="width:500px;"/> </label><br>
			<label>2. <input name="part_j[savings_reason_2]" type="text" style="width:500px;"/> </label><br>	
		</p>
	    
		
	</form>	
	</div>
    
    <div class="enter_btn">
            <a href="javascript:void(0);" class="start_survey" id="start_survey" onclick="$('#surveyForm').submit()"><p>Submit</p></a>
	  </div>
</div>
</body>
</html>
