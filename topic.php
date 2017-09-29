
<?php
session_start();
$id=$_SESSION['ID'];
if(!isset($_SESSION['ID'])){
	$url = 'index.php';
    header( "Location: $url" );
	//$id=$_SESSION['ID'];
}
if(isset($_POST['submit']))
{
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);	
	date_default_timezone_set('Asia/Dhaka');
	$date = date('Y-m-d H:i:s');
    require_once('mysqli_connect2.php');
	$query = "INSERT INTO forum_topic (Subject,Content, Date, TopicBy) VALUES (?,?,?,?)";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, "ssss", $subject,$message, $date, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($dbc);
	$url = 'forum.php';
    header( "Location: $url" );
    
}
 
?>
