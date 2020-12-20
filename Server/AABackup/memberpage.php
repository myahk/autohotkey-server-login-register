<?php
require_once('includes/config.php');

//로그인하지 않았으면 로그인 페이지로 이동
if(!$user->is_logged_in())
{
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<title>접속페이지</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  

		<style>
		body
		{
		margin:0;
		padding:0;
		background-color:#f1f1f1;
		}
		.box
		{
		width:1280px;
		padding:20px;
		background-color:#fff;
		border:1px solid #ccc;
		border-radius:5px;
		margin-top:25px;
		box-sizing:border-box;
		}
		</style>
	</head>
	<body>
		<?php
		require("layout/header.php");
		?>

		<div class="container box">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<form role="form" method="post" action="" autocomplete="off" accept-charset="UTF-8" >
						<h2>관리자 : <?php echo $_SESSION["username"]; ?>님 접속을 환영합니다.</h2>
						<!-- <h4>사용기한 은 [<?php echo $_SESSION['endUseDateTime']; ?>] 입니다.<h4> -->
						<h4>사용자 인증번호 등록하기 :  <a href="register.php">등록</a></h4>
						<p></p>
						<h4><a href="logout.php">로그아웃</a></h4>
						<p></p>
                        <hr>
						<?php
						//check for any errors
						if(isset($error))
						{
							foreach($error as $error)
							{
								echo '<p class="bg-danger">'.$error.'</p>';
							}
						}						
						?>
					</form>
				</div>
			</div>


<?php 
if($_SESSION['userLevel'] == 1)
{
	//db연결
	//$sth = $dbh->prepare("SELECT joindatetime, password, username, memberID, email ,endUseDateTime, userLevel, active FROM members");
	//$sth->execute();

	/* Exercise PDOStatement::fetch styles */
    //$result = $sth->fetch(PDO::FETCH_ASSOC);
    $stmt = $db->query("SELECT joindatetime, password, username, memberID, email ,endUseDateTime, userLevel, active FROM members");
   
   // 출력할 테이블 컬럼명 텍스트 입력
		echo "
		<html>
		<head><title>사용자 리스트</title></head>
		<body>
		<center>
		<H3>사용자 리스트</H3>
		<table width='1180' border='1'>
		<tr>
		<td width='5%' align='center'>번호</td>
		<td width='5%' align='center'>ID</td>
		<td width='10%' align='center'>가입일자</td>
		<td width='10%' align='center'>사용가능기간</td>
		<td width='25%' align='center'>인증번호</td>
		<td width='10%' align='center'>사용자</td>
		<td width='5%' align='center'>사용</td>
		<td width='5%' align='center'>삭제</td>
		</tr>
		  ";
		  /*
		  echo "
		<html>
		<head><title>사용자 리스트</title></head>
		<body>
		<center>
		<H3>사용자 리스트</H3>
		<table width='1280' border='1'>
		<tr>
		<td width='5%' align='center'>번호</td>
		<td width='20%' align='center'>가입일자</td>
		<td width='20%' align='center'>사용가능기간</td>
		<td width='15%' align='center'>아이디</td>
		<td width='15%' align='center'>이메일</td>
		<td width='5%' align='center'>등급</td>
		<td width='5%' align='center'>활성</td>
		<td width='5%' align='center'>사용</td>
		<td width='5%' align='center'>수정</td>
		<td width='5%' align='center'>삭제</td>
		</tr>
  		";
   		*/
   // 쿼리의 결과값이 있는 동안 반복을 통한 출력
        $count = 1;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			if(!$row['userLevel'] == 1)
			{
				echo("
				<tr>
				<td align='center'>$count</td>
				<td align='center'>$row[memberID]</td>
				<td align='center'>$row[joindatetime]</td>
				");
				echo'<td align="center"><input type="text" id="'.$row['memberID'].'" class="form-control Datepicker text-center" style="font-size:12pt;" value="'.$row['endUseDateTime'].'"></td>';
				if($row['userLevel'] == 1)
					{
						echo"<td align='center'>관리자계정</td>";
						echo"<td align='center'>관리자</td>";
					}
					else
					{
						//$username = iconv("euckr", "utf8", $row['username']);
						//$email = iconv("euckr", "utf8", $row['email']);
						// echo"<td align='center'>$username</td>";
						// echo"<td align='center'>$email</td>";
						echo"<td align='center'>$row[username]</td>";
						echo"<td align='center'>$row[email]</td>";
					}
					//echo "<td align='center'>$row[userLevel]</td>"; //유저등급 확인 (변경은 다음에...)
					//echo "<td align='center'>$row[active]</td>";

					if($row['userLevel'] != 1)
					{
						if($row['active']==1)
						{
							echo"<td align='center'><a href=Deactive.php?no=$row[memberID]>활성</a></td>";
						}
						else
						{
							echo"<td align='center'><a href=active.php?no=$row[memberID]>비활성</a></td>";
						}
					}
					else
					{
						echo"<td align='center'>관리자</td>";
					}
				
					//echo "<td align='center'><a href=modify.php?no=$row[memberID]&time=$row[endUseDateTime]&>수정</a></td>"; //  수정버튼
					//echo "<td align='center'><a href=delete.php?no=$row[memberID]>삭제</a></td>";
					echo"<td align='center'><button type='button' name='delete' class='btn btn-danger btn-xs delete' id=$row[memberID]>X</button></td>";
					++$count;
				}
			}
		} 
/*
echo("
		  <tr>
		  <td align='center'>$row[memberID]</td>
		  <td align='center'>$row[joindatetime]</td>
		  <td align='center'>$row[endUseDateTime]</td>
		  <td align='center'>$row[username]</td>
		  <td align='center'>$row[email]</td>
		  <td align='center'>$row[userLevel]</td>
		  <td align='center'>$row[active]</td>
		  <td align='center'><a href=active.php?no=$row[memberID]>활성</a></td>
		  <td align='center'><a href=modify.php?no=$row[memberID]>수정</a></td>
		  <td align='center'><a href=delete.php?no=$row[memberID]>삭제</a></td>
		  </tr>
		   ");
*/

if($_SESSION['userLevel'] != 1)
{
	echo "
	<html>
	<head><title>사용자 관리</title></head>
	<body>
	<center>
	
	";
} 
// <h2>사용가능 기간은 echo$_SESSION['endUseDateTime'] 까지 입니다./h2>
 ?>
		<?php
		require("layout/footer.php");
		?>

		
        
<script type="text/javascript" language="javascript" >

// <div id="alert_message"></div>

$(function() {
	$(".Datepicker").datepicker({
		prevText: '이전 달',
		nextText: '다음 달',
		monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		//monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], 
		monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		showMonthAfterYear: true,
		//yearSuffix: '년',
		dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        //minDate: "dateToday",
      
      //closeText: 'Clear',
	  onClose: function(dateText, inst) {
        var id = $(this).attr('id');
		var dateID = dateText;
		//var time = $(this).attr('value');
		 //new Date(dateText);
		
		$.ajax({
     		url:"update.php",
     		method:"POST",
     		data:{id:id, dateID:dateID},
			 //success: function (result) {
             //       alert('success');
             //   },
			error: function(){
    				alert('수정 실패');
				}
    		});
			//$('#alert_message').html('');
		//alert(id);
		//alert(dateID);
		location.reload();
		}  
	});
});

  

$(document).on('click', '.update', function(){
   //var id = $(this).attr("id");
   var id = this.id;
   //var time = $('.time2').attr('value')
   var time = $('.time').attr('value');
   //var time = $("div[name='time']").val();
   alert(id);
   alert(time);
   if(confirm("수정 하시겠습니까?"))
   {
    $.ajax({
     url:"update.php",
     method:"POST",
     data:{id:id, time:time},
    });
	location.reload();
   }
});

/*
function update_data(id, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, value:value},
   });
  } 
});  

$(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var value = $(this).text();
   if(confirm("수정 하시겠습니까?"))
   {
	update_data(id, value);
   }
  });
*/

$(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("삭제하시겠습니까?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
    });
	//table.ajax.reload();
   }
   location.reload();
  });

</script>      
	</body>
</html>