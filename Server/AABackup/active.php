<?php
require_once('includes/config.php');

$memberID = $_GET["no"];

if($_SESSION['userLevel'] == 1)
{
	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE members SET active = :newActive, activeToken = :newActiveToken WHERE memberID = :memberID");
	$stmt->execute(array(
		':memberID' => $memberID,
		':newActive' => TRUE,
		':newActiveToken' => NULL,
	));

	//if the row was updated redirect the user
	if($stmt->rowCount() == 1)
	{
		//redirect to index page
		
	}
	else
	{
		echo "계정을 활성화하지 못했습니다.";
	}
}
?>
<meta http-equiv='refresh' content='0;url=memberpage.php'>