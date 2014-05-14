<?php 
class common_functions
{

/****** Sorting function by date ******/
	function sortArrayByDate($dates_array,$seperator)
	{
		foreach($dates_array as $akey=>$date)
		{
			$keyarr[]=$akey;
			$timearray = explode($seperator, $date);
			$new_dates[] = mktime(0,0,0,$timearray[1], $timearray[0], $timearray[2]);
		}
		
		arsort($new_dates);
		array_flip($new_dates);
		foreach($new_dates as $akey=>$temp)
		{
		$numkeyarr[$akey]=$dates_array[$akey];
		}
		
		return $numkeyarr;
	}

/* URL FUNCTIONS ENDS HERE */	

/***** function to Convert Query String to Array *******/

	function QueryStrToArray($encoded)
	{
	
	$finalArr=array();
		if($encoded)
		{
			$qryArr=split("&",$this->QRYSTR_DECRYPT($_SERVER['QUERY_STRING']));
			if($this->QRYSTR_DECRYPT($_SERVER['QUERY_STRING']))
			{
				foreach($qryArr as $item)
				{
					$Qarr=split("=",$item);
					if(count($Qarr)==2)
					$finalArr[$Qarr[0]]=$Qarr[1];
				}
				
				return $finalArr;
			}
		}
		else
		{
		
		$qryArr=split("&",$_SERVER['QUERY_STRING']);
		
			if($_SERVER['QUERY_STRING']!="")
			{
			
				foreach($qryArr as $item)
				{
					$Qarr=split("=",$item);
					if(count($Qarr)==2)
					$finalArr[$Qarr[0]]=$Qarr[1];
				}
				
				return $finalArr;
			}
			else
			{
				return $_POST;
			}
		}
	}	

/***** Query string builder (Array to Query string) *******/

	function queryString_builder($url, $qstrArr=array()) 
	{
		foreach($qstrArr as $key=>$value)
		{
			$this->add_querystring_var($url, $key, $value);
		}
	}

  	function add_querystring_var($url, $key, $value) 
  	{
	  $url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
	  $url = substr($url, 0, -1);
	  if (strpos($url, '?') === false) 
	  {
		return ($url . '?' . $key . '=' . $value);
	  } 
	  else 
	  {
		return ($url . '&' . $key . '=' . $value);
	  }
  	}
	  
  	function remove_querystring_var($url, $key) 
  	{
	  $url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
	  $url = substr($url, 0, -1);
	  return ($url);
  	}
	
/* URL FUNCTIONS ENDS HERE */	
	 
/* ENCRYPTION FUNCTIONS STARTS HERE */	
  
/***** Query string Encryptor *******/
	function QRYSTR_ENCRYPT($str)
	{
		return $this->base64Encode($this->SimpleXor($str,base64_decode(ENCRYPT_PASS)));
	}
	
/***** Query string Decryptor *******/
	function QRYSTR_DECRYPT($str)
	{
	 	$str = str_replace("%20","",$str);
	 	$str = str_replace(" ","",$str);
		return $this->SimpleXor($this->base64Decode($str),base64_decode(ENCRYPT_PASS));
	}
	
	/* Base 64 encoding function **
	** PHP does it natively but just for consistency and ease of maintenance, let's declare our own function **/	
	function base64Encode($plain) 
	{
	  // Initialise output variable
	  $output = "";
	  
	  // Do encoding
	  $output = base64_encode($plain);
	  
	  // Return the result
	  return $output;
	}
	
	/* Base 64 decoding function **
	** PHP does it natively but just for consistency and ease of maintenance, let's declare our own function **/	
	function base64Decode($scrambled) 
	{
	  // Initialise output variable
	  $output = "";
	  
	  // Fix plus to space conversion issue
	  
	  // Do encoding
	  $output = base64_decode($scrambled);
	  
	  // Return the result
	  return $output;
	}
	
/***** XOR encryptor using key *******/
	function simpleXor($InString, $Key) 
	{
	  // Initialise key array
	  $KeyList = array();
	  // Initialise out variable
	  $output = "";
	  
	  // Convert $Key into array of ASCII values
	  for($i = 0; $i < strlen($Key); $i++){
		$KeyList[$i] = ord(substr($Key, $i, 1));
	  }
	
	  // Step through string a character at a time
	  for($i = 0; $i < strlen($InString); $i++) {
		// Get ASCII code from string, get ASCII code from key (loop through with MOD), XOR the two, get the character from the result
		// % is MOD (modulus), ^ is XOR
		$output.= chr(ord(substr($InString, $i, 1)) ^ ($KeyList[$i % strlen($Key)]));
	  }
	
	  // Return the result
	  return $output;
	}
	
/***** ascii code to character converter *******/
	function codeToNum($acode=0)
	{
		return "&#".$acode.";";
	}
	
/***** character to ascii code converter *******/
	function charToCode($str="")
	{
		$pattern=array("'","$","�","%","#","@");
		foreach($pattern as $eachpat)
		{
			switch($eachpat)
			{
				case "$";
				$str=str_replace($eachpat,$this->codeToNum(36),$str);
				break;
				case "%";
				$str=str_replace($eachpat,$this->codeToNum(37),$str);
				break;
				case "'";
				$str=str_replace($eachpat,$this->codeToNum(39),$str);
				break;
				case "�";
				$str=str_replace($eachpat,$this->codeToNum(163),$str);
				break;
				case "@";
				$str=str_replace($eachpat,$this->codeToNum(64),$str);
				break;
			}
		}
		return $str;
	}
	
/***** url encoder *******/
	function urlEncode($url)
	{
		return str_replace(" ","%20",$url);
	}
	
/* ENCRYPTION FUNCTIONS ENDS HERE */	

	/****** SQL injection filter ******/
	function escapeStr($strToEscape="")
	{
		$characters="~`!@#$%^&*()_-+=?/,.';:|";
		for($i=0;$i<strlen($characters);$i++)
		{
			$strToEscape=str_replace($characters[$i],"",$strToEscape);
		}

		$comm[]="/script";
		$comm[]="sysobjects";
		$comm[]="WAITFOR DELAY";
		$comm[]="SHUTDOWN";
		$comm[]="XTYPE";
		$comm[]="PING";
		$comm[]="insert into";
		$comm[]="delete from";
		$comm[]="drop table";
		$comm[]="drop database";
		$comm[]="exec(";
		$comm[]="declare";
		$comm[]="cast(";
		$comm[]="varchar";
		$comm[]="@@";
		$comm[]="--";
		$comm[]="update";
		$comm[]="call ";
		//echo count($comm);
		for($i=0;$i<count($comm);$i++)
		{
			$strToEscape=(function_exists("str_ireplace")) ? str_ireplace($comm[$i],"",$strToEscape) : preg_replace($comm[$i],"",$strToEscape);
		}
		$strToEscape=str_replace(" ","",$strToEscape);
	 	$strToEscape = str_replace("%20","",$strToEscape);
	 	$strToEscape = mysql_real_escape_string($strToEscape);
		$strToEscape=preg_replace("|<\?php(.*)?>|U","",$strToEscape); 
		return($strToEscape);
	}
	
	/****** Browser redirection ******/
	function redirect($url) 
	{
	   if (!headers_sent())
		   header('Location: '.$url);
	   else {
		   echo '<script type="text/javascript">';
		   echo 'window.location.href="'.$url.'";';
		   echo '</script>';
		   echo '<noscript>';
		   echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		   echo '</noscript>';
   		}
	}

	/* File size conversion */
	 function formatbytes($file, $type)  
	 {  
	 
			 if(!file_exists($file))
			 return false;
		 
			switch($type)
			{  
			   case "KB":  
			   $filesize = filesize($file) * .0009765625; // bytes to KB  
			   break;  
			   case "MB":  
			   $filesize = (filesize($file) * .0009765625) * .0009765625; // bytes to MB  
			   break;  
			   case "GB":  
			   $filesize = ((filesize($file) * .0009765625) * .0009765625) * .0009765625; // bytes to GB  
			   break;  
			 }  
			  if($filesize <= 0){return false;}  
			  else{return round($filesize, 2).' '.$type;}  
	  }  

	function Email_send($messageStr,$subjectStr,$recipientStr,$fromaddress)
	{	
			// Additional headers
//		$recipients = $recipientStr;
//		$headers['From'] = 'donotreply@breigadegroup.com';
// 		$headers['Reply-To'] = $fromaddress;
//		$headers['Return-Path'] = 'donotreply@breigadegroup.com';
//		$headers['To'] = $recipientStr;

                $recipients = $recipientStr;
		$headers['From'] = $fromaddress;
		$headers['To'] = $recipientStr;
		
		$smtpinfo["host"] = "localhost";
		$smtpinfo["port"] = "25";
		$smtpinfo["auth"] = false;
		$smtpinfo["username"] = "";
		$smtpinfo["password"] = "";
		$headers['Subject'] = $subjectStr;
		$headers["Content-Type"] = "text/html; charset=ISO-2022-JP";
		$mail_object =& Mail::factory('smtp',$smtpinfo);
		$mailval=$mail_object->send($recipients, $headers, $messageStr);
				if(is_bool($mailval))
				{
					if($mailval==true)
					 {
						return true;
					 }
					else
					 {
						return false;
					 }
				}
				else
				{
						return false;
				}
		unset($mail_object);
	}
	  
}
?>