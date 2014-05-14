function validateEmail(strValue) {
	var objRegExp = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
	return objRegExp.test(strValue);
}

function numeric(event) {
	if ((event.keyCode >= 48 && event.keyCode <= 57)
			|| (event.keyCode >= 96 && event.keyCode <= 105)
			|| (event.keyCode == 8) || (event.keyCode == 9)
			|| (event.keyCode == 12) || (event.keyCode == 27)
			|| (event.keyCode == 37) || (event.keyCode == 39)
			|| (event.keyCode == 46)) {
		return true;
	} else {
		event.preventDefault();
		return false;
	}
}

function is_int(value){
   return !isNaN(parseInt(value));
}

function phonenumber(inputtxt)  
{  
  if(is_int(inputtxt))
  {
        if(inputtxt.length < 10) 
             return false; 
  }
  else 
  {
        return false;   
  }        
    return true;
}  

function contactval() 
{    
	if ($('#full-name').val() == ''	|| $('#full-name').val() == 'NAME') {
		alert('Please enter your Full Name');
		$('#full-name').focus();
		return false;
	}
      
      if ($('#mobile').val() == '' || $('#mobile').val() == 'CONTACT NO') {
		alert('Please enter Contact number');
		$('#mobile').focus();
		return false;
	}
        else if(!phonenumber($('#mobile').val()))
        {
                alert('Please enter valid Contact number (minimum 10 digit )');
		$('#mobile').focus();
		return false;
        }
       
        if ($('#email').val() == '' || $('#email').val() == 'EMAIL') {
		alert('Please enter your Email address');
		$('#email').focus();
		return false;
	} else {
		rs = validateEmail($('#email').val());
		if (rs == false) {
			alert('Please enter Valid Email address');
			$('#email').focus();
			return false;
		}
	}
//        if ($('#contact-no').val() == '' || $('#contact-no').val() == 'Mobile Number') {
//		alert('Please enter Contact number');
//		$('#contact-no').focus();
//		return false;
//	}
        
        
//         if ($('#project').val() == '') {
//		alert('Please choose the Project');
//		$('#project').focus();
//		return false;
//	}
              
        if ($('#queries').val() == '' || $('#queries').val() == 'QUERIES') {
		alert('Please enter your Message');
		$('#queries').focus();
	return false;
        }
        
       
	return true;

}

function getHTTPObject() {
	try {
		req = new XMLHttpRequest();
	} catch (err1) {
		try {
			req = new ActiveXObject("Msxml12.XMLHTTP");
		} catch (err2) {
			try {
				req = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (err3) {
				req = false;
			}
		}
	}
	return req;
}
