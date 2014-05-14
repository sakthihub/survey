<?php

/**
 * A Database Query Abstraction Object used in conjunction with mysqlQuery to provide a concise and
 * complete API for mysql only. The mysqlQuery object is instantiated whenever an SQL statement is
 * submitted to the database. It should be instantiated by mysqlDb and never directly.
 *
 * @author Paul Hooker <paul@spookmedia.com>
 * @version $Revision: 1.1 $ 
 * @access public
 * @copyright Spook Media Ltd
 * @package Spook Base Classes
 *
 * $Id: mysqlQuery.class.php,v 1.1 2006/02/23 18:39:28 phooker Exp $
*/
class mysqlQuery
{

	/** 
	 * Query Statement
	 *
	 * @var string
	 * @access private
	 */
	 var $query 			= "";
	
	/** 
	 * Query Handle 
	 *
	 * @qh resource
	 * @access private
	 */
	var $qh	   			= "";

	/** 
	 * Query Statement
	 *
	 * @query string
	 * @access public
	 */
	var $rowa 			= "";

	/** 
	 * Query Statement
	 *
	 * @query string
	 * @access public
	 */
	var $verboseBool 	= false;
	
	
	/**
	 * Database Resource ID
	 * 
	 * @dbLink
	 */
	
	var $dbLink			= "";
	
	/** 
	 * Query Statement
	 *
	 * @query string
	 * @access public
	 */	
	var $cleanrowBool	= true;

	/**
	 * Report Variable
	 */	
	var $reportVarStr = "";
	
	

	function mysqlQuery($dblink,$reportVarStr="",$verbose=false,$cleanresult=1)
	{

		if(isset($GLOBALS[$reportVarStr]) && gettype($GLOBALS[$reportVarStr]) == "object" && get_class($GLOBALS[$reportVarStr]) == "report" && $verbose)
		{
			// a report object has been supplied
			$this->reportVarStr = $reportVarStr;
			$this->verboseBool = true;
		}
		
		$this->dbLink = $dblink;
		$this->cleanrowBool = $cleanresult;
		
		// constructor methods always return the object.
	}


	function executeQuery($qstat)
	{	
		if(!$qstat)
		{
			$this->logError("Unable to perform query empty statement");
			return false;
		}			

		if(!is_resource($this->dbLink))
		{
			$this->logError("The database resource id is invalid");
			return false;
		}
	
		$this->query = $qstat;		
		
		// truncate the query if too long.
		
		$this->logStatement((strlen($qstat) > 800) ? substr($qstat,0,255) : $qstat);

		$this->qh = mysql_query($this->query,$this->dbLink);
		
		if($this->qh === false)
		{
			$this->logError("Unable to perform query $qstat :" . mysql_error($this->dbLink));			
			return false;
		}
		else
		{
			return true;	
		}
	}
	
	function executeQuery2($qstat)
	{	
		if(!$qstat)
		{
			$this->logError("Unable to perform query empty statement");
			return false;
		}			

		if(!is_resource($this->dbLink))
		{
			$this->logError("The database resource id is invalid");
			return false;
		}
	
		$this->query = $qstat;		
		
		// truncate the query if too long.
		
		$this->logStatement((strlen($qstat) > 800) ? substr($qstat,0,255) : $qstat);
	
		$this->qh = mysql_query($this->query,$this->dbLink);
		
		if($this->qh === false)
		{
			$this->logError("Unable to perform query $qstat :" . mysql_error($this->dbLink));			
			return false;
		}
		else
		{
			return $this->qh;	
		}
	}


	function nextRecord()
	{	
		if($this->rowa = @mysql_fetch_assoc($this->qh))
		{
			if($this->rowa)
			{
				/*if($this->cleanrowBool)
				{
					return($this->rowa);
					//return(array_map("stripslashes",$this->rowa));
				}
				else
				{
					return($this->rowa);
				}*/
				return($this->rowa);
			}
		}

		return false;
	}

	function queryCount()
	{
		if(!is_resource($this->qh))
		{
			$this->logError("queryCount: the query " . $this->query . " has failed");
			return false;
		}
		
		return(mysql_num_rows($this->qh));
	}


	function queryDestroy()
	{
		$this->_mysqlQuery();
	}

	function _mysqlQuery()
	{
		@mysql_free_result($this->qh);
		unset($this->qh);
	}
	

	function logError($msg)
	{
		if($this->reportVarStr)
		{
			// we have a report object therefore use it.
			$GLOBALS[$this->reportVarStr]->logError($msg);
		}
	}
	
	function logStatement($stat)
	{
		if($this->reportVarStr && $this->verboseBool)
		{
			$GLOBALS[$this->reportVarStr]->logDebug($stat);
		}
	}

}



?>