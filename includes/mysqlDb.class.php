<?php

/**
 * A Database Abstraction Object used in conjunction with mysqlQuery to provide a concise and complete API for mysql only.
 * When instantiated the object creates a connection to the database and maintains that connection instantiating calls mysqlQuery for
 * each SQL request.
 * 
 * @author Paul Hooker <paul@spookmedia.com>
 * @version $Revision: 1.1 $ 
 * @access public
 * @copyright Spook Media Ltd
 * @package Spook Base Classes
 * $Id: mysqlDb.class.php,v 1.1 2006/02/23 18:39:28 phooker Exp $
*/

class mysqlDb
{

	/** 
	 * Database server name defaults to localhost.
	 *
	 * @var string
	 * @access private
	 */	
	var $dbhost 	= "";
	
	/** 
	 * Database user name.
	 *
	 * @var string
	 * @access private
	 */	
	var $dbuser 	= "";

	/** 
	 * Database User name defaults to localhost.
	 *
	 * @var string
	 * @access private
	 */	
	var $dbpass 	= "";

	/** 
	 * Database User name defaults to localhost.
	 *
	 * @var string
	 * @access private
	 */	
	var $dbname 	= "";

	/** 
	 * Database Port defaults to 3306 accepts either a port number or a socket file /tmp/mysql.sock;
	 *
	 * @var string
	 * @access private
	 */	
	var $dbport 	= 3306;
	
	/** 
	 * Verbose flag defaults to false. If set will include database statements in debug.
	 *
	 * @var bool
	 * @access private
	 */		
	var $verboseBool 	= false;
	
	/** 
	 * Clean row flag defaults to false. If set will clean data returned by select statements.
	 *
	 * @var bool
	 * @access private
	 * @see 
	 */		
	var $cleanresult 	= false;

	/** 
	 * Database Connection Resource ID. Variable is set on successful instantiation of class. In addtion 
	 *
	 * @var string
	 * @access private
	 * @see mysqlDb() _mysqlDb()
	 */	
	var $dblink = "";
	
	/**
	 * Last sql statement supplied to dbExecute
	 * 
	 * @var string
	 * @access private
	 * @see dbExecute()
	 */
	 var $laststat = "";
	
	var $serverVersionInt	= "";
	
	var $clientVersionInt	= "";
	
	/**
	 * Database Connected 
	 */
	var $dbConnectedBool = false;

	/**
	 * Report Handle
	 */	
	var $rh = "";
	var $xh = "";
	var $reportVarStr = "";

	/** 
	 * Constructor method of class. Creates database connection, if unsuccessful returns a PEAR Error object.
	 *
	 * @param string $dbhost database host
	 * @param string $dbuser database username
	 * @param string $dbpass database password
	 * @param string $dbname database name
	 * @param string $dbhost database port
	 * @return Boolean
	 * @access public
	 */
	function mysqlDb($dbhost="",$dbuser="",$dbpass="",$dbname="",$dbport=3306,$reportVarStr="",$verbose="")
	{
		// first disable magic quotes runtime this is assumed to become legacy soon.
		ini_set("magic_quotes_runtime","Off");
		
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
		$this->dbport = $dbport;	
	
	
	
		if(gettype($GLOBALS[$reportVarStr]) == "object" && get_class($GLOBALS[$reportVarStr]) == "report" && $verbose)
		{
			// a report object has been supplied
			$this->reportVarStr = $reportVarStr;
			$this->verboseBool = true;
		}
	
		
		$this->dblink = @mysql_connect($this->dbhost,$this->dbuser,$this->dbpass,0,65536);
	
		if(!is_resource($this->dblink))
		{
			$this->logError("Unable to make database connection: " . $this->dbhost . " user:" . $this->dbuser . " password: " . $this->dbpass);
		}
		else
		{
			// obtain the client and host versions.
			
			$this->serverVersionInt = preg_replace("/\.([0-9]+)-(.*)$/","\\1",mysql_get_server_info());
			$this->clientVersionInt = preg_replace("/\.([0-9]+)$/","\\1",mysql_get_client_info());

			if(!@mysql_select_db($this->dbname, $this->dblink))
			{		
				$this->logError("Unable to access database " . $this->dbname . " : " . mysql_error($this->dblink));
			}
			else
			{
				$this->dbConnectedBool = true;
			}
		}
	}

	/** 
	 * Destructor method of class. Performs garbage collection and closes the database connection if open.
	 *
	 * @access private
	 */
	function _mysqlDb()
	{
		if($this->dblink)
		{
        	if(!mysql_close($this->dblink))
        	{
        		$this->logMessage("Unable to close mysql db connection may not be open.");
        		return false;
        	}
        }
		$this->dbConnectedBool = false;        
        unset($this->$dblink);
	}

	function isConnected()
	{
		return($this->dbConnectedBool);
	}

	/** 
	 * Method instantiates a dbQuery object executing the sql statement. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $stat  Sql statement to be executed by the database.
	 * @return mixed
	 * @access private
	 */
	function dbQuery($stat)
	{
		$qobj = "";	
		$qobj = new mysqlQuery($this->dblink,$this->reportVarStr,$this->verboseBool,$this->cleanresult);

		if($this->serverVersionInt < 4)
		{
			// versions prior to mysql 4.0 do not support the SQL_CALC_FOUNDROWS command.
			$stat = str_replace("SQL_CALC_FOUND_ROWS","",$stat);
		}

		if($qobj->executeQuery($stat) === false)
		{
			return(false);	
		}
		else
		{
			$this->laststat = $stat;
			return($qobj);			
		}
	}


	/** 
	 * Method instantiates a dbQuery object executing the sql statement. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $stat  Sql statement to be executed by the database.
	 * @return mixed 
	 * @access public
	 * @see dbQuery()
	 */
	function dbExecute($stat)
	{
		if(!$stat)
		{
			$this->logError("dbExecute: statement empty");
			return false;
		}
						
		$xh = $this->dbQuery($stat,$this->dblink,$this->reportVarStr,$this->verboseBool);		

		if($xh === false)
		{
			// the query has returned an error return it.
			return($xh);
		}
		elseif(preg_match("/^insert/",$stat) && mysql_insert_id($this->dblink))
		{
                    
			// statement is an insert statement return id of inserted row.			
			// if their is no autoincrement field this will return 0
			return(mysql_insert_id($this->dblink));
		}
		elseif(preg_match("/^(update|delete)/",$stat))
		{	
			return(mysql_affected_rows($this->dblink));
		}
		else
		{
			// the execution has occured successfully
			return true;
		}		
	}

	function dbreturnQuery($stat)
	{
		if(!$stat)
		{
			$this->logError("dbExecute: statement empty");
			return false;
		}
		$qobj = "";	
		$qobj = new mysqlQuery($this->dblink,$this->reportVarStr,$this->verboseBool,$this->cleanresult);
		$this->xh="";	
		$this->xh = $qobj->executeQuery2($stat);		

		if($this->xh === false)
		{
			// the query has returned an error return it.
			return($this->xh);
		}
		elseif(preg_match("/^insert/",$stat) && mysql_insert_id($this->dblink))
		{
			// statement is an insert statement return id of inserted row.			
			// if their is no autoincrement field this will return 0
			return(mysql_insert_id($this->dblink));
		}
		elseif(preg_match("/^(update|delete)/",$stat))
		{	
			return(mysql_affected_rows($this->dblink));
		}
		else
		{
			// the execution has occured successfully
			return $this->xh;
		}		
	}



	function nextRow()
	{	
		if($rowa = @mysql_fetch_assoc($this->xh))
		{
			if($rowa)
			{
				return($rowa);
			}
		}

		return false;
	}


	/** 
	 * Method builds an update query from the supplied paramters, and then runs the query. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 * Field values preceeded by ^|^ will not be quoted ( useful for SQL functions NOW, DATE ).
	 *
	 * @param string $table database table name update occurs on
	 * @param array $update_a associative array containing fields values indexed by fieldnames.
	 * @param string $updateid the value identifying the row to update
	 * @param string $idfield 
	 * @return mixed returns number of updated rows on success or false on
	 * failure of statement to execute
	 * @access public
	 */
	function dbArrayUpdate($table,$update_a,$updateid,$idfield="unid",$escapeBool=true)
	{
		# function updates from $update_a

		if(!is_array($update_a) || !count($update_a))
		{
			$this->logError("dbArrayUpdate: update array is empty ");
			return false;
		}
		
		$ufields = "";
				
		reset($update_a);
		while(list ($key, $value) = each($update_a))
		{ 	
			
			if(strpos($value,"^|^") === false)
			{ 
					$vStr = ($escapeBool) ? '"' . $this->escapeStr($value) .'"' : "\"$value\"";	
					$ufields = $ufields . ("`$key` = " . $vStr . " , ");
			}
			else
			{
			
				$ufields = $ufields . ("`$key` = " . trim(substr($value,3)) . " , ");
			}			
			
		}

		$ufields = substr($ufields, 0, strlen($ufields)-2);

	 	$ustat = "update `$table` set $ufields where `$idfield` = \"" . $this->escapeStr($updateid) . "\"";
	 	
	 	return($this->dbExecute($ustat));
	}




	/** 
	 * Method builds an insert query. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 * Field values preceeded by ^|^ will not be quoted ( useful for SQL functions NOW, DATE ).
	 *
	 * @param string $table database table name insert should be made into
	 * @param array $insert_a associative array containing fields values indexed by fieldnames.
	 * @param string $extraStr extra string to be placed at end of query.
	 * @param bool $escapeBool if set to false values will not be escaped before
	 * placing in the database ( used for binary uploads ).
	 * @return mixed 
	 * @access public
	 */
	function dbArrayInsert($table,$insert_a=array(),$extraStr="",$escapeBool=true)
	{
	
		if(!is_array($insert_a) || !count($insert_a))
		{
			$this->logError("Insert array is empty ");
			return false;
		}

		if(!$table)
		{
			$this->logError("Insert table is empty ");
			return false;
		}	
	
		$insertstat = "insert into `$table`  ";
		$kstr = "(";
		$vstr = "(";		

		reset($insert_a);
		while(list ($key, $value) = each($insert_a))
		{
			$kstr = $kstr . "`$key` ,";

			
			if(strpos($value,"^|^") === false)
			{
				
				$vstr .= ($escapeBool) ? '"' . $this->escapeStr($value) .'" ,' : "\"$value\" ,";		
			}
			else
			{
				// field value is preceded by ^|^ therefore value is not encapsulated by quotes
				$vstr = $vstr . (trim(substr($value,3)) . " ,");
			}
		}

		$kstr = substr($kstr, 0, strlen($kstr)-1);
		$vstr = substr($vstr, 0, strlen($vstr)-1);

		$insertstat .=   $kstr . ") values " . $vstr . ") $extraStr";

		return($this->dbExecute($insertstat));
	}
	



	function dbArraysInsert($table,$keys,$values,$mode="strict")
	{
		$assocarr = array();
		
		// if called with a forth parameter the values array will be striped if the number of values is greater than the keys

		
		if($mode != "strict")
		{
			if(count($values) > count($keys))
			{
				// make the value array the same size as the keys.
				$values = array_splice($values,0,count($keys));
			}
			elseif(count($values) < count($keys))
			{
				// append empty values to increase numnber of fields
				$values = array_merge($values,array_fill(count($values)+1,(count($keys)-count($values)),""));
			}
		}
		
		if((count($keys) === count($values)) && (count($keys) > 0 && count($values) > 0) ) 
		{ 
			$keys = array_values($keys); 
			$values = array_values($values); 
			for (@$i = 0; $i < count($values); $i++) 
			{ 
				@$assocarr[$keys[$i]] =& $this->escapeStr($values[$i]); 
			} 
			return($this->dbArrayInsert($table,$assocarr)); 
		} 
		else 
		{ 
			$GLOBALS['RO']->logError("error for insert into $table columns are " . count($keys) . " and values are " . count($values));
			return false; 
		} 
	}


	/** 
	 * Method deletes rows identified matching the $deleteid field in the column $idfield ( or unid by default ).
	 * If sucessful the method will return true, or PEAR Error failure.
	 * It is advisable to use this only on unique field names.
	 *
	 * @param string $table database table name deletion will be made from.
	 * @param string $deleteid the value identifying the row to be deleted.
	 * @param string $idfield column name to be replaced (optional)
	 * @return mixed 
	 * @access public
	 */
	function dbDelete($table,$deleteid,$idfield="unid")
	{
		# function deletes unid in table $table
		
		if(!$table || !$deleteid)
		{
			$this->logError("table or deleteid is empty");
			return false;
		}		
		
		$deletestat = "delete from `$table` where `$idfield`='" . mysql_escape_string($deleteid) . "'";
		
		return($this->dbExecute($deletestat));
	}


	/**
	* Method takes an sql statement and returns the first row returned by that statement.
	*
	* @param string $stat sql statement
	* @see dbGetRow()
	* @return mixed 
	* @access public	 
	*/

	function dbQueryOne($stat,$binaryBool=false)
	{
		if(!isset($stat) || !$stat)
		{
			$this->logError("Query is empty");
			return false;
		}

		$qobj = new mysqlQuery($this->dblink,$this->reportVarStr,$this->verboseBool,!$binaryBool);
		$qobj->executeQuery($stat);
		
		if($qobj === false)
		{
			return($qobj);
		}
		else
		{
			# check that a row has been returned
			
			if(!$qobj->queryCount())
			{
				// the get row request has not returned a row
				//return new PEAR_Error("Query returned no rows");							
				return false;
			}
			else
			{
				$rowa = $qobj->nextRecord();
				$qobj->_mysqlQuery();
			}			
			unset($qobj);
			return($rowa);
		}

	
	}



	/** 
	 * Method returns the first row in table $table matching $rowid in column $idfield.
	 * If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $table database table name insert should be made into
	 * @param string $rowid value to match $idfield or unid to 
	 * @param string $idfield name of database column rowid is compared against.
	 * @return mixed
	 * @access public
	 * @see dbQueryOne()
	 */
	function dbGetRow($table,$rowid,$idfield="unid")
	{
		if(!$table || !$rowid)
		{
			$this->logError("Query returned no rows");							
			return false;
		}
		
		return $this->dbQueryOne("select * from `$table` where `$idfield`='" . mysql_escape_string($rowid) . "'");	
	}
	

	/** 
	 * Method builds a query. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $table database table name insert should be made into
	 * @param array $in associative array containing fields values indexed by fieldnames.
	 * @return object 
	 * @access public
	 */	
	 
	function dbMaxEntry($table,$maxfield,$clause="")
	{
		// method returns a singular row
	
	
		if($clause=="")
		{
		
		}

		$qobj = new mysqlQuery($this->dblink,$this->reportVarStr,$this->verboseBool);
		$qobj->executeQuery("select max(`$maxfield`) as maxval from `$table` $clause");
		
		if($qobj === false)
		{
			return($qobj);
		}
		else
		{
			$maxArr = $qobj->nextRecord();
			unset($qobj);
			return($maxArr['maxval']);
		}
	}

	/**
     * Method takes a select statement and key field and value field returning
     * details in an associative array.
	 */
	
	function dbArray($statementStr="",$keyFieldStr="",$valueFieldStr="")
	{
		$listArr = array();
		
		$qobj=$this->dbQuery($statementStr);

		if($qobj)
		{
		while($rowArr = $qobj->nextRecord())
		{
			if($keyFieldStr)
			{
				if($valueFieldStr)
				{
					$listArr[$rowArr[$keyFieldStr]] = $rowArr[$valueFieldStr];
				}
				else
				{
					$listArr[$rowArr[$keyFieldStr]] = $rowArr;	
				}
			}
			else
			{
				array_push($listArr,$rowArr);	
			}
		}
		$qobj->queryDestroy();
		unset($qobj);	
		}
	
		return($listArr);
	}
	

	/** 
	 * Method builds a query. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $table database table name insert should be made into
	 * @param array $insert_a associative array containing fields values indexed by fieldnames.
	 * @return object 
	 * @access public
	 */
	function dbMinEntry($table,$minfield,$where="")
	{

		$qobj = new mysqlQuery($this->dblink,$this->reportVarStr,$this->verboseBool);
		$qobj->executeQuery("select min($field) from $tablename $where");
		
		if($qobj === false)
		{
			return($qobj);
		}
		else
		{
			list($maxval) = $qobj->nextRecord();
			$qobj->queryDestroy();
			unset($qobj);
			return($maxval);
		}
	}	
		
	
	
	/** 
	 * Method builds a query. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $table database table name insert should be made into
	 * @param array $insert_a associative array containing fields values indexed by fieldnames.
	 * @return object 
	 * @access public
	 */	
	function dbRowCount($tableStr,$whereStr="")
	{
		$countInt = 0;
		$qstr = "select count(*) as rcount from $tableStr $whereStr";
		
		$resultArr = $this->dbQueryOne($qstr);

		$countInt = (!empty($resultArr)) ? $resultArr['rcount'] : 0;		
	
		return($countInt);
	}
	
	/**
	 * Method utilises SQL_CALC_FOUNDROWS system
	 */
	function dbRowsFound()
	{
		$GLOBALS['RO']->logDebug("dbRowsFound");
		if($this->serverVersionInt > 4)	
		{
			// 	we can use this information 
			$resultArr = $this->dbQueryOne("SELECT FOUND_ROWS() AS num_rows");
		}
		else
		{
			// we assume that this applies to the query stored in $this->laststat
			// replace everything to the left of from with select count(*)
			// replace everything to the right of LIMIT with nothing.
						
			$matchArr = array();
			
			
			// remove everything to the left of from.
			$this->laststat = preg_replace("/ from /"," from ",$this->laststat);
			$this->laststat = preg_replace("/ limit /"," limit ",$this->laststat);

			$queryStr = substr($this->laststat,strpos($this->laststat,"from"));
			
			if(strpos($queryStr,"limit"))
			{
				$queryStr = substr($queryStr,0,strpos($queryStr,"limit"));
			}
			
			
			$foundstat = "select count(*) as num_rows " . $queryStr;
			$resultArr = $this->dbQueryOne($foundstat);
			
			if($resultArr === false)
			{
				$GLOBALS['RO']->logError("dbRowsFound: query not suitable for interpretation with mysql3x");
			}
			
		}
		
		
		return(!empty($resultArr['num_rows']) ? $resultArr['num_rows'] : 0);
	}
	

	/** 
	 * Method builds a query. If sucessful returns the mysqlQuery object, If failure return a PEAR Error object.
	 *
	 * @param string $table database table name insert should be made into
	 * @param array $insert_a associative array containing fields values indexed by fieldnames.
	 * @return object 
	 * @access public
	 */	
	function dbContentCopy($srctable,$desttable,$clear=0)
	{
		# quick sanity check make sure src and destination aren't the same table
		
		if($srctable == $desttable)
		{
			$this->dbError("db_contentcopy: unable to copy table content source and destination are the same $srctable");
			return false;
		}
	
		if($clear)
		{
			$this->dbExecute("delete from `$desttable`");
		}
		
		# now copy the table over
	
		return($this->dbExecute("INSERT INTO `$desttable` SELECT * FROM `$srctable`"));
	}


	/**
	 * Method creates a new table based on the table name return true on success
	 * @param string $tableStr
	 * @param array $columnArr
	 * @access public
	 */
	
	function dbCreateTable($tableStr)
	{

	}
	
	
	function getDbDate($phpformat="")
	{
		if($phpformat)
		{
			return(date($phpformat));
		}
		else
		{
			return(date("Y-m-d"));
		}
	}


	/** 
	 * Method sets the verbose flag, all subsequent sql statements will be recorded.
	 *
	 * @param bool $newvalue
	 * @access public
	 */
	function setVerbose($val=false)
	{
		$this->verboseBool = $val;
	}


	/**
	 * Method is an alias for mysql_escape_string. This method should be called whenever
	 * content that has not been escape is used within a select query.
	 * 
	 * @param string $strToEscape the string element to escape.
	 * @access public
	 */

	function escapeStr($strToEscape="")
	{
		return((function_exists("mysql_real_escape_string")) ? mysql_real_escape_string($strToEscape,$this->dblink) : mysql_escape_string($strToEscape));
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
	
	function dateToSQL($dateStr,$formatStr="")
	{
		// formats a data into sql format yyyy-yy-yy
	
		$sqlDateStr = "";
		
		if(!$dateStr) { return($dateStr); }

		// first rationalise the date
		
		$dateStr = str_replace("/","-",$dateStr);
		$dateStr = str_replace("\\","-",$dateStr);
		$dateStr = str_replace(".","-",$dateStr);
		$dateStr = trim($dateStr);
		
		$dateArr = split("-",$dateStr);
			
			
		switch($formatStr)
		{
			case "mm/dd/yyyy";
			
			$sqlDateStr = sprintf("%04d-%02d-%02d",$dateArr[2] , $dateArr[0] , $dateArr[1]);
			
			break;
			case "dd/mm/yyyy";

			$sqlDateStr = sprintf("%04d-%02d-%02d", $dateArr[2] , $dateArr[1] , $dateArr[0]);

			break;

			default:
			
			$this->logError("mysqlDb: dateToSQL could not match date format string $formatStr");		
			
			break;
		}
		
		return($sqlDateStr);
	}
	

	function sqlToDate($dateStr,$formatStr="")
	{
		// formats a data into sql format yyyy-yy-yy
	
		$sqlDateStr = "";
		
		if(!$dateStr) { return($dateStr); }

		list($yearInt,$monthInt,$dayInt) = split("-",$dateStr);

		switch($formatStr)
		{
			case "mm/dd/yyyy";
			
			$sqlDateStr = sprintf("%02d-%02d-%04d",$monthInt,$dayInt,$yearInt);
			
			break;
			case "dd/mm/yyyy";

			$sqlDateStr = sprintf("%02d-%02d-%04d",$dayInt,$monthInt,$yearInt);

			break;

			default; 	
			
			$this->logError("mysqlDb: sqlToDate could not match date format string $formatStr");		
			
			break;
		}

		
		return($sqlDateStr);
	}	
	
	
	
}

?>
