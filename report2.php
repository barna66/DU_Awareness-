
<?php
 
if(isset($_POST['submit']))
{
	require("PHPMailer/PHPMailerAutoload.php");
    $description = trim($_POST['description']);
	$area = trim($_POST['area']);
	$image = $_FILES['image']['name'];
	$dest = "photos/".basename($_FILES['image']['name']);
    require_once('mysqli_connect2.php');
	$query = "INSERT INTO reports (file_name,description, area) VALUES (?,?,?)";
	$stmt = mysqli_prepare($dbc, $query);
	mysqli_stmt_bind_param($stmt, "sss", $image, $description, $area);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	move_uploaded_file($_FILES['image']['tmp_name'],$dest);
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "	the.aurors17@gmail.com";
	$mail->Password = "aurors2017";
	$mail->SetFrom("the.aurors17@gmail.com");
	$mail->AddAttachment("photos/".$image);
	$mail->Subject = "New Report in AURORS";
	$mail->Body = "Area:".$area."<br><br><br>Description:<br>".$description;
	$mail->AddAddress("barnadu66@gmail.com");
	$query2= "SELECT Name,Email,Area FROM authority_demo Where Area=".$area;
	$results2 =@mysqli_query($dbc, $query2);
	if (mysqli_num_rows($results2)!=0)
	{
		while($row = mysqli_fetch_array($results2)) {
			$mail->AddCC($row['Email']);
		}
	}
	mysqli_close($dbc);

	 if(!$mail->Send()) {
		echo "error sending mail";
	 }
    echo "<script> alert('Report has been sent'); window.location.replace('home.php')</script>";
}
 
?>
