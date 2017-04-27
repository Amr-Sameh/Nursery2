<?php

require_once("database.php"); 

class polls { 

var $_iPollId; 

var $_iAnswerId; 

var $_oConn; 

function polls($iPollId = '') {//class constructor uses poll ID as optional parameter
$this->_oConn =& DB::connect(DSN); // implement db object
if (DB::isError($this->_oConn) ) {//check database connection
catchExc($this->_oConn->getMessage());
}
// set unique identifier
if (is_int($iPollId)) {
$this->setPollId($iPollId);
}
	function setPollId($iPollId) { // set the _iPollId variable for the class
   if (is_int($iPollId)) {
        $this->_iPollId = $iPollId;
        }
    }
    function setAnswerId($iAnswerId) {  // set the _iAnswerId variable for the class
   if (is_int($iAnswerId)) {
     $this->_iAnswerId = $iAnswerId;
  }
}
function getPollsCount($iStatus=false) {  // get polls count for paging

// set sql filter

$iStatus ? $sFilter .= " AND status=1" : $sFilter .= "";

$sql = "SELECT
count(poll_id) AS poll_cnt
FROM
devdrive_polls
WHERE deleted=0".$sFilter;

   if (DB::isError($iCnt = $this->_oConn->getOne($sql))) {
      catchExc($iCnt->getMessage());
   return false;
   }

return $iCnt;
}
function getPolls($sSort, $iPage=0) {// get polls list

$sql = "SELECT
poll_id,
poll_vote_cnt,
poll_question,
status,
created_dt,
modified_dt

FROM
devdrive_polls

WHERE
deleted=0

ORDER BY
".$sSort."

LIMIT ".$iPage.", ".ROWCOUNT;

   if (DB::isError($rsTmp = $this->_oConn->query($sql))) {
      catchExc($rsTmp->getMessage());
   return false;
   }

   // loop result and build return array

$i = 0;

while ($aRow = $rsTmp->fetchRow(DB_FETCHMODE_ASSOC)) {
$return[$i]["Poll Id"] = $aRow["poll_id"];
$return[$i]["Vote Count"] = $aRow["poll_vote_cnt"];
$return[$i]["Question"] = $aRow["poll_question"];
$return[$i]["Status"] = $aRow["status"];
$return[$i]["Created Date"] = strtotime($aRow["created_dt"]);
$return[$i]["Modified Date"] = strtotime($aRow["modified_dt"]);
++$i;
   }

return $return;

}
function getActivePolls($iPage=0) {

$sql = "SELECT
poll_id,
poll_vote_cnt,
poll_question

FROM
devdrive_polls

WHERE
status=1

AND deleted=0

ORDER BY
created_dt desc

LIMIT ".$iPage.", 1";

   if (DB::isError($rsTmp = $this->_oConn->query($sql))) {
      catchExc($rsTmp->getMessage());
   return false;
   }

// check for results

if ($rsTmp->numRows() > 0) {
// assign result to array
$aRow = $rsTmp->fetchRow(DB_FETCHMODE_ASSOC);
$return["Poll Id"] = $aRow["poll_id"];
$return["Vote Count"] = $aRow["poll_vote_cnt"];
$return["Question"] = $aRow["poll_question"];
$return["Answers"] = $this->getPollAnswers($aRow["poll_id"]); //get answers for this poll
return $return;
   }

}
function getPoll() {// get a specific poll

$sql = "SELECT
poll_id,
poll_vote_cnt,
poll_question,
status,
created_dt,
modified_dt

FROM
devdrive_polls

WHERE
poll_id=".$this->_iPollId;

   if (DB::isError($rsTmp = $this->_oConn->query($sql))) {
      catchExc($rsTmp->getMessage());
   return false;
   }

// assign result to array
$aRow = $rsTmp->fetchRow(DB_FETCHMODE_ASSOC);

// build return array
$return["Poll Id"] = $aRow["poll_id"];
$return["Vote Count"] = $aRow["poll_vote_cnt"];
$return["Question"] = $aRow["poll_question"];
$return["Answers"] = $this->getPollAnswers($aRow["poll_id"]);
$return["Status"] = $aRow["status"];
$return["Created Date"] = strtotime($aRow["created_dt"]);
$return["Modified Date"] = strtotime($aRow["modified_dt"]);
return $return;

}
T

}