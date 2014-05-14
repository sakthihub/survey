<?php


/**
 * A reporting module that centralises all programming output collecting messages and offering a range
 * of display techniques.
 *
 *
 * 
 * @author Paul Hooker <paul@spookmedia.com>
 * @version $Revision: 1.1 $ 
 * @access public
 * @copyright Spook Media Ltd
 * @package Spook Base Classes
 * $Id: report.class.php,v 1.1 2006/02/23 18:39:28 phooker Exp $
*/

DEFINE("LOG_EMAIL"	, 4);
DEFINE("LOG_FILE"	, 2);
DEFINE("LOG_SCREEN"	, 0);
DEFINE("LOG_ALL" , 1);
DEFINE("LOG_NONE" , 0);

class report
{
	/** 
	 * Configuration of the messaging for debug messages defaults to LOG_NONE
	 *
	 * @var integer
	 * @access private
	 * @see setDebug()
	 */	
	var $debugConf;
	
	/** 
	 * Configuration of the messaging for warning messages defaults to LOG_NONE
	 *
	 * @var integer
	 * @access private
	 * @see setWarning()
	 */	

	var $warningConf;
	
	/** 
	 * Configuration of the messaging for error messages defaults to LOG_EMAIL
	 *
	 * @var integer
	 * @access private
	 * @see setError()
	 */	
	var $errorConf;
	
	/** 
	 * Configuration of the messaging for messages defaults to LOG_EMAIL
	 *
	 * @var integer
	 * @access private
	 * &see setError()
	 */		
	var $messageConf;
	
	// email configurations
	
	
	/** 
	 * Email address log emails will appear to be sent from. Defaults to report@$_SERVER['HTTP_HOST']
	 *
	 * @var string
	 * @access public
	 */
	var $emailSender;
	
	/** 
	 * Email address log emails will be delivered to. Defaults to apacher server admin $_SERVER['SERVER_ADMIN']
	 *
	 * @var string
	 * @access public
	 */	
	var $emailRecipient;

	/** 
	 * Email subject log emails will be titled as. Defaults to "Report Email"
	 *
	 * @var integer
	 * @access public
	 */	
	 
	var $emailSubject;

	/** 
	 * Email subject log emails will be titled as. Defaults to "Report Email"
	 *
	 * @var bool
	 * @access public
	 */		
	var $fileError;
	
	/** 
	 * batchEmail defines whether or not email messages should be delivered individually or in a batch.
	 * If the software is in production use this should be set to false 
	 *
	 * @var bool
	 * @access public
	 */		
	var $batchEmail;

	/** 
	 * The watchlist is an associative array indexed by the name of the variable. The value associated
	 * with each index is the string to be displayed on output of the array. All variables should be referenced
	 * in the outmost scope.
	 *
	 * @var array
	 * @access private
	 * @see LogWatch() registerWatch() removeWatch()
	 */		
	var $watchList		= array();


	/** 
	 * The screenReport is an array that messages to be displayed to the screen are pushed into.
	 *
	 * @var array
	 * @access private
	 * @see toScreen() displayHtmlWindow() displayJavascript()
	 */
	var $screenReport	= array();
	

	/** 
	 * The emailReport is array that messages to be emailed are pushed into when the batchemail variable is set to true.
	 *
	 * @var array
	 * @access private
	 * @see toEmail() dispatchEmail()
	 */
	var $emailReport	= array();

	/**
	 * The start time which the report has been called
	 * @access private
	 */
	 var $timeStartInt;


	/** 
	 * The dd variable is the directory divider variable.
	 *
	 * @var string
	 * @access private
	 * @see report()
	 */		
	 var $dd;
	 
	/** 
	 * $the lr variable is the line return variable.
	 *
	 * @var array
	 * @access private
	 * @see report()
	 */			 
	 var $lr;


	/**
	
	 */
	 var $logFile;



	/** 
	 * Constructor method of class. Automatically configures the directory symbol and line return specific to platform. 
	 *
	 */
	function report()
	{

		if(PHP_OS == "WINNT" || PHP_OS == "WIN32")
		{
			# set windowesque specifics
			$this->dd = '\\';
			$this->lr = "\r\n";		
		}
		else
		{
			$this->dd = "/";
			$this->lr = "\n";		
		}

		// set the default configuration
		
		$this->timeStartInt		= $this->getMicroTime();
		$this->debugConf		= constant("LOG_NONE"); 
		$this->warningConf		= constant("LOG_NONE");
		$this->errorConf		= constant("LOG_ALL");
		$this->messageConf		= constant("LOG_NONE");
		$this->emailSender		= (isset($_SERVER['HTTP_HOST'])) ? "report@" . $_SERVER['HTTP_HOST'] : "info@brigade.com";
		$this->emailRecipient	= (isset($_SERVER['SERVER_ADMIN'])) ? $_SERVER['SERVER_ADMIN'] : "info@brigade.com";
		$this->emailSubject		= "Report Email";
		$this->fileError		= false;
		$this->batchEmail		= false;
		$this->logFile			= (isset($_SERVER['HTTP_HOST'])) ? "/tmp/" . $_SERVER['HTTP_HOST'] . ".log" : "/tmp/website.log";
	}

	/** 
	 * Destructor method of class. Currently performs no tasks .
	 *
	 * @access private
	 */	
	function _report()
	{
		
	}
	
	/** 
	 * Method sets the messaging formats used when addDebug() is called. 
	 * The set uses bitwise operations using the following | & and LOG_EMAIL LOG_FILE LOG_ALL LOG_NONE.
	 * As an example to setup a set that logs to everything but screen you would use LOG_EMAIL | LOG_FILE
	 *
	 * @param string $newSet  New log set
	 * @return
	 * @access public
	 * @see setWarning() setEmail() setMessage() setError()
	 */
	 
	
	function setLogFile($fileStr="")
	{
		// logfiles	
		$this->logFile = $fileStr;
	} 
	 
	function setDebug($newSet)
	{
		// e.g LOG_EMAIL | LOG_FILE
	
		$this->debugConf 		= $newSet;
	}

	/** 
	 * Method sets the messaging formats used when addWarning() is called. 
	 * The set uses bitwise operations using the following | & and LOG_EMAIL LOG_FILE LOG_ALL LOG_NONE.
	 * As an example to setup a set that logs to everything but screen you would use LOG_EMAIL | LOG_FILE
	 *
	 * @param string $newSet  New log set
	 * @return
	 * @access public
	 * @see setWarning() setEmail() setMessage() setError()
	 */	
	function setWarning($newSet)
	{
		// e.g LOG_EMAIL | LOG_FILE
	
		$this->warningConf		= $newSet;
	}

	/** 
	 * Method sets the messaging formats used when addErro() is called. 
	 * The set uses bitwise operations using the following | & and LOG_EMAIL LOG_FILE LOG_ALL LOG_NONE.
	 * As an example to setup a set that logs to everything but screen you would use LOG_EMAIL | LOG_FILE
	 *
	 * @param string $newSet  New log set
	 * @return
	 * @access public
	 * @see setWarning() setEmail() setMessage() setError()
	 */	
	function setError($newSet)
	{
		// e.g LOG_EMAIL | LOG_FILE

		$this->errorConf		= $newSet;
	}

	/** 
	 * Method sets the messaging formats used when addMessage() is called. 
	 * The set uses bitwise operations using the following | & and LOG_EMAIL LOG_FILE LOG_ALL LOG_NONE.
	 * As an example to setup a set that logs to everything but screen you would use LOG_EMAIL | LOG_FILE
	 *
	 * @param string $newSet  New log set
	 * @return
	 * @access public
	 * @see setWarning() setEmail() setMessage() setError()
	 */	
	function setMessage($newSet)
	{
		$this->messageConf	= $newSet;
	}
	
	
	/**
	* Method reports an error message in the forms defined for that message type. 
	* 
	* @param string $msg Message to be associated with the error
	* @access public
	* @see logError() logDebug() logMessage() logWarning()
	*/
	function logError($msg="")
	{
		if($msg)
		{
			$this->addLog("err",$msg,$this->errorConf);
		}
	}

	/**
	* Method reports an error message in the forms defined for that message type. 
	* 
	* @param string $msg Message to be associated with the debug
	* @access public
	* @see logError() logDebug() logMessage() logWarning()
	*/
	function logDebug($msg="")
	{
		if($msg)
		{
			$this->addLog("dbg",$msg,$this->debugConf);
		}
	}

	/**
	* Method reports an error message in the forms defined for that message type. 
	* 
	* @param string $msg Message to be associated with the error
	* @access public
	* @see logError() logDebug() logMessage() logWarning() logWatch()
	*/
	function logMessage($msg="")
	{
		if($msg)
		{
			$this->addLog("msg",$msg,$this->messageConf);
		}
	}
	
	/**
	* Method reports an error message in the forms defined for that message type. 
	* 
	* @param string $msg Message to be associated with the warning
	* @access public
	* @see logError() logDebug() logMessage() logWarning() logWatch()
	*/	
	function logWarning($msg="")
	{
		if($msg)
		{
			$this->addLog("wrn",$msg,$this->warningConf);
		}
	}


	/**
	* Method requests the variables registerd in watch to be viewed and logged in the set
	* defined by debug set.
	* 
	* @access public
	* @see logError() logDebug() logMessage() logWarning() logWatch()
	*/	
	function logWatch()
	{
		reset($this->watchList);
		while(list($variable,$title) = each($this->watchList))
		{
			$this->logDebug("$title :: " . $$variable);	
		}
	}



	/**
	* Method requests the variables registerd in watch to be viewed and logged in the set
	* defined by debug.
	* 
	* @access private
	* @see logError() logDebug() logMessage() logWarning() logWatch()
	*/	
	function addLog($type,$msg,$set=0)
	{
		# generic function called by all 4 functions

		if(!$set)
		{
			return;
		}
		
		$msg = $this->reportStamp($type) . $msg;
		
		
			
		if(LOG_EMAIL & $set)
		{
			$this->toEmail($msg);
		}	
		
		if(LOG_SCREEN & $set)
		{
			$this->toScreen($msg);
		}
		
		if(LOG_FILE & $set)
		{
			$this->toFile($msg);
		}	
	}




	/**
	* Method requests the variables registerd in watch to be viewed and logged in the set
	* defined by debug.
	* 
	* @access public
	* @see logError() logDebug() logMessage() logWarning() logWatch()
	*/	
	function toFile($msg)
	{
	

		// 
		
		//if($this->file_active)
		//{
			//error_log($msg . $this->lr,3,$this->logFile);
		//}		
		
	}


	/**
	* Method requests the variables registerd in watch to be viewed and logged in the set
	* defined by debug.
	* @param string $msg The message to be emailed
	* 
	* @access private
	* @see toEmail() toFile() toScreen()
	*/	
	function toEmail($msg)
	{
		if($this->batchEmail)
		{
			// the message should be aggregate to the array for sending when dispatchEmail called
			array_push($this->emailReport,$msg);			
		}
		else
		{
			$headers = "";
			$headers .= "From: " . $this->emailSender . $this->lr;
			$headers .= "X-Sender: " . $this->emailSender . $this->lr;
			$headers .= "X-Mailer: report Class (PHP) " . $this->lr;
			$headers .= "X-Priority: 1" . $this->lr;
			$headers .= "Return-Path: " . $this->emailSender . $this->lr;

			$msg .= $this->lr . $this->lr;
			$msg .= "Time			: " . date("F j, Y, g:i a") . $this->lr;
			$msg .= "Server Name    : " . $_SERVER['SERVER_NAME'] . $this->lr;
			$msg .= "Script Filename: " . $_SERVER['SCRIPT_FILENAME'] . $this->lr;
			$msg .= "Remote Address : " . $_SERVER['REMOTE_ADDR'] . $this->lr;
			$msg .= "Query String   : " . $_SERVER['QUERY_STRING'] . $this->lr;

			mail($this->emailRecipient,$this->emailSubject,wordwrap($msg,75,$this->lr,1),$headers);
		}
	}


	function toScreen($msg="")
	{
		array_push($this->screenReport,$msg);	
	}


	/** 
	 * Method creates a timestamp string that is appended to the front of all messages. 
	 *
	 * @param string $variableName the name of the variable to add to the watch.
	 * @param string $titleStr the name that the variable will be displayed as ( optional defaults to variable "variable name" )
	 * @return string standard formatted log timestamp.
	 * @access public
	 * @see logWatch() removeWatch() registerWatch()
	 */	
	function registerWatch($variableName="",$titleStr="")
	{
		// add a watch that will be displayed whenever addView
	
		if(!$variableName)
		{
			return;
		}
	
		if(!$titleStr)
		{
			$titleStr = "variable::$variableName";
		}
	
		if(!isset($this->watchList[$variablename]))
		{
			$this->watchList[$variablename] = $titlestr;
		}	
	}
	
	
	/** 
	 * Method removes a varialbe added by registerWatch 
	 *
	 * @param string $variableName the name of the variable to remove from the watch.
	 * @return 
	 * @access publicc
	 * @see logWatch() removeWatch() registerWatch()
	 */		
	function removeWatch($variableName="")
	{
		// remove a watch
		if(isset($this->watchList[$variablename]))
		{
			unset($this->watchList[$variablename]);
		}	
	}


	/** 
	 * Method creates a timestamp string that is appended to the front of all messages. 
	 *
	 * @param string $type the type of mesage
	 * @return string standard formatted log timestamp.
	 * @access private
	 * @see addLog()
	 */		
	function reportStamp($type)
	{
		# returns the logstamp that is prefixed to files and screen additions.
		return("[" . $type . ": " . date("d-m-Y H:i:s") . "]");
	}



	/** 
	 * Method creates a timestamp string that is appended to the front of all messages. 
	 *
	 * @param string $type the type of mesage
	 * @return string standard formatted log timestamp.
	 * @access private
	 * @see addLog()
	 */	
	 	
	function dispatchEmail()
	{

		// set batchmail to false to allow email message to be sent.

		$this->batchEmail = false;

		if(!count($this->emailReport))
		{
			// there are no message in the array
			$this->toEmail("There have been no messages reported");
		}
		else
		{
			// set the batchemail to false
			$this->toEmail(join("",$this->emailReport));
		}
	}
	
	function displayHtml()
	{
		if(!count($this->screenReport))
		{
			array_push($this->screenReport,"There have been no messages reported");
		}

		return("<table cellpadding=4 cellspacing=0 border=0><tr><td>"
		. join("</td><tr><tr><td>",$this->screenReport)
		. "</td></tr></table>");
		
	}
	
	function displayHtmlWindow()
	{
		$rStr = "";
		$colStr = "#eeeeee";
		
		if(!count($this->screenReport))
		{
			array_push($this->screenReport,"There have been no messages reported");
		}	
	
		$executionTimeInt = sprintf("%.4f",$this->getMicroTime() - $this->timeStartInt);
	
		$ii = count($this->screenReport);
		for($i = 0; $i < $ii; $i++)
		{
			if($colStr == "#eeeeee") { $colStr = "#cccccc"; } else { $colStr = "#eeeeee"; }
			list($timestr,$msg) = split("]",$this->screenReport[$i]);
			$rStr .= "_report_win.document.write(\"<tr bgcolor=$colStr><td>$timestr]</td><td>" . addslashes($msg) . "</td></tr>\");\n";
		}
		
	
		// time to format the elements
 		// . join("</td></tr><tr bgcolor=#eeeeee><td>",$this->screenReport)	
	
		return("<SCRIPT language=javascript>"
		. "var title = \"Report Console\";\n"
	    . "_report_win = window.open(\"\",\"something\",\"width=680,height=600,resizable,scrollbars=yes\");\n"
	    . "_report_win.document.write(\"<HTML><TITLE>Report Message Console</TITLE><BODY bgcolor=#ffffff>\");\n"
    	. "_report_win.document.write(\"<table border=0 width=100%>\");\n"
    	. "_report_win.document.write(\"<tr bgcolor=#cccccc><th colspan=2>Report Message Console</th></tr>\");\n"
 		. $rStr
    	. "_report_win.document.write(\"<tr bgcolor=#cccccc><td>Execution Time</td><td>$executionTimeInt seconds</td></tr>\");\n"
    	. "_report_win.document.write(\"</table>\");\n"
    	. "_report_win.document.write(\"</BODY></HTML>\");\n"
    	. "_report_win.document.close();"
    	. "this.focus();"
	    . "</SCRIPT>");			
	}
	
	// support methods
	
	function getMicroTime()
	{
		list($usec, $sec) = explode(" ",microtime()); 
    	return ((float)$usec + (float)$sec);
	}
	
	
/* Created by Sakthi */
	
	function log_Error($msg="")
	{
		if($msg)
		{
			$this->add_Log("err",$msg);
		}
	}

	function add_Log($type="", $msg="")
	{
		$msg = $this->reportStamp($type) . $msg;

		if($msg)
		{
			file_put_contents($this->logFile ,$msg . $this->lr,FILE_APPEND);
		}
	}


	
}?>
