<?php
session_start();
$id=$_SESSION['ID'];
if(!isset($_SESSION['ID'])){
	$url = 'index.php';
    header( "Location: $url" );
	//$id=$_SESSION['ID'];
}
$content = trim($_POST['Content']);
$topic = trim($_POST['Topic']);
$replyby = trim($_POST['ReplyBy']);
date_default_timezone_set('Asia/Dhaka');
$date = date('Y-m-d H:i:s');
require_once('mysqli_connect2.php');
$query = "INSERT INTO forum_reply (Content, Date, Topic, ReplyBy) VALUES (?,?,?,?)";
$stmt = mysqli_prepare($dbc, $query);
mysqli_stmt_bind_param($stmt, "ssss", $content, $date, $topic, $replyby);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($dbc);

echo "=>".$content."<br><br>Replied by: ".$replyby."<br>".$date."<br><br><br>";


?>