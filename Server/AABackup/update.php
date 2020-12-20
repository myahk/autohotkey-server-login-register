<?php
require_once('includes/config.php');

//$memberID = $_GET["id"];
//$date = $_GET["date"];
$memberID = $_POST["id"];
$dateID = $_POST["dateID"];

//echo "$memberID, $date";
//echo "$no ,$dget";
//echo "$no ,$dget";
//echo "$no";

if($_SESSION['userLevel'] == 1)
{
	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE members SET endUseDateTime = :newendUseDateTime WHERE memberID = :memberID");
	$stmt->execute(array(
		':memberID' => $memberID,
        ':newendUseDateTime' => $dateID,
        //':newendUseDateTime' => date("Y-m-d", $dget),
    ));
}

// <meta http-equiv='refresh' content='0;url=memberpage.php'>
?>
