<?php
require_once('includes/config.php');

$memberID = $_GET["no"];

if($_SESSION['userLevel'] == 1)
{
	// $stmt = $pdo -> prepare("SELECT * FROM girl_group WHERE name = :name");


	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
	$stmt = $db->prepare("UPDATE members SET active = :newActive WHERE memberID = :NewmemberID");
	$stmt->bindParam(':NewmemberID', $memberID, PDO::PARAM_INT);   
	$stmt->bindParam(':newActive', $a = 0, PDO::PARAM_INT);   
	$stmt->execute(); 	
	
	
	// $stmt->execute(array(
	// 	':memberID' => $memberID,
	// 	':newActive' => False,
	// 	':newActiveToken' => NULL,
	// ));

	//if the row was updated redirect the user
	if($stmt->rowCount() == 1)
	{
		//redirect to index page
		
	}
	else
	{
		echo "계정을 비활성화하지 못했습니다.";
	}
}

// $sql = "UPDATE movies SET filmName = :filmName, 
//             filmDescription = :filmDescription, 
//             filmImage = :filmImage,  
//             filmPrice = :filmPrice,  
//             filmReview = :filmReview  
//             WHERE filmID = :filmID";
// $stmt = $pdo->prepare($sql);                                  
// $stmt->bindParam(':filmName', $_POST['filmName'], PDO::PARAM_STR);       
// $stmt->bindParam(':filmDescription', $_POST['$filmDescription'], PDO::PARAM_STR);    
// $stmt->bindParam(':filmImage', $_POST['filmImage'], PDO::PARAM_STR);
// // use PARAM_STR although a number  
// $stmt->bindParam(':filmPrice', $_POST['filmPrice'], PDO::PARAM_STR); 
// $stmt->bindParam(':filmReview', $_POST['filmReview'], PDO::PARAM_STR);   
// $stmt->bindParam(':filmID', $_POST['filmID'], PDO::PARAM_INT);   
// $stmt->execute(); 

// $no = $_POST["id"];
// $no = $_GET["no"];

// if($_SESSION['userLevel'] == 1)
// {
// 	// use exec() because no results are returned
// 	try {
// 		// $sql = "DELETE FROM members WHERE memberID=$no";
// 		$sql = "UPDATE FROM members Set active = :NewActive WHERE memberID=$no";
// 		//$sql = "DELETE FROM members WHERE memberID=6";
// 		// use exec() because no results are returned
// 		$stmt = $pdo->prepare($sql);      
// 		$stmt->bindParam(':NewActive', FALSE, PDO::PARAM_INT);  
// 		$db->exec($sql);
// 		//echo "Record deleted successfully";
// 		}
// 	catch(PDOException $e)
// 		{
// 		echo $sql . "<br>" . $e->getMessage();
// 		}

// }

// if($_SESSION['userLevel'] == 1)
// {
// 	// $stmt = $pdo -> prepare("SELECT * FROM girl_group WHERE name = :name");


// 	//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
// 	$stmt = $db->prepare("UPDATE members SET active = :newActive, activeToken = :newActiveToken WHERE memberID = :memberID");
// 	$stmt->execute(array(
// 		':memberID' => $memberID,
// 		':newActive' => False,
// 		':newActiveToken' => NULL,
// 	));

// 	//if the row was updated redirect the user
// 	if($stmt->rowCount() == 1)
// 	{
// 		//redirect to index page
		
// 	}
// 	else
// 	{
// 		echo "계정을 비활성화하지 못했습니다.";
// 	}
// }
?>
<meta http-equiv='refresh' content='0;url=memberpage.php'>

