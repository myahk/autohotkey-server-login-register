<?php
require_once('includes/config.php');

//로그인하지 않았으면 로그인 페이지로 이동
if(!$user->is_logged_in())
{
	header("Location: index.php");
	
}
	
?>