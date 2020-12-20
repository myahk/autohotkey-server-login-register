<?php
require_once('includes/config.php');

$no = $_POST["id"];

if($_SESSION['userLevel'] == 1)
{
	// use exec() because no results are returned
	try {
		$sql = "DELETE FROM members WHERE memberID=$no";
		//$sql = "DELETE FROM members WHERE memberID=6";
		// use exec() because no results are returned
		$db->exec($sql);
		//echo "Record deleted successfully";
		}
	catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}

}
// <meta http-equiv='refresh' content='0;url=memberpage.php'>
?>
<meta http-equiv='refresh' content='0;url=memberpage.php'>