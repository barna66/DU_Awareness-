
<?php
 
if(isset($_POST['submit']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$address = trim($_POST['address']);
	$password = trim($_POST['password']);
    require_once('mysqli_connect2.php');
	$query = "INSERT INTO users (Name, Password, Email, Phone, Address) VALUES (?,?,?,?,?)";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, "sssss", $name, $password, $email, $phone, $address);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($dbc);
	$url = 'login.php';
    header( "Location: $url" );
    
}
 
?>
