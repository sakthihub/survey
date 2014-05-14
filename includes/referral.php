<?php 
session_start();
include "config.php";

/***** function to Convert String to Array *******/
	function StrToArray($Qstr)
	{
	$finalArr=array();
		
		$qryArr=split("&",$Qstr);
		
			if(!empty($Qstr))
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
        
if(empty($_SESSION["Referral"]))
{
		$refurl=(!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "";
	
		$_SESSION["ipaddr"]=$_SERVER['REMOTE_ADDR'];
		$_SESSION["create_ts"]= date("Y-m-d H:i:s",time());
		
		$_SESSION["Keyword"]=(!empty($_REQUEST["Keyword"])) ? $_REQUEST["Keyword"] : "";
		$_SESSION["Referral"]=(!empty($_REQUEST["referral"])) ? $_REQUEST["referral"] : "";
		$_SESSION["Referral"]=(!empty($_REQUEST["partner"])) ? $_REQUEST["partner"] : "";
		$_SESSION["Campaign"]=(!empty($_REQUEST["Campaign"])) ? $_REQUEST["Campaign"] : "";
		$_SESSION["Addwords"]=(!empty($_REQUEST["ads_group"])) ? $_REQUEST["ads_group"] : "";
		// Google analytics parameters
	
		$_SESSION["Addwords"]=(!empty($_REQUEST["utm_medium"])) ? $_REQUEST["utm_medium"] : $_SESSION["Addwords"];
		$_SESSION["Referral"]=(!empty($_REQUEST["utm_source"])) ? $_REQUEST["utm_source"] : $_SESSION["Referral"];
		$_SESSION["Campaign"]=(!empty($_REQUEST["utm_campaign"])) ? $_REQUEST["utm_campaign"] : $_SESSION["Campaign"];
		$_SESSION["Keyword"]=(!empty($_REQUEST["utm_term"])) ? $_REQUEST["utm_term"] : $_SESSION["Keyword"];
		
		$urlarr=explode("?",$refurl);
		$patharr=explode("/",$urlarr[0]);
		if(empty($_SESSION["Keyword"]) and !empty($urlarr[1]))
		{
			$Qstrarr = StrToArray($urlarr[1]);
			foreach($Qstrarr as $key=>$value)
			{
				if(($key == "p" or $key == "q" or $key == "MT" or $key == "query") and count($Qstrarr)>1)
				$_SESSION["Keyword"]=$value;
			}
			$_SESSION["Referral"]=$patharr[2];
		}
		$_SESSION["Referral"]=(!empty($_SESSION["Referral"])) ? $_SESSION["Referral"] : "www.brigademeadows.com";
		$_SESSION["refid"] = $GLOBALS['DO']->dbArrayInsert("referral",$_SESSION);
}
?>