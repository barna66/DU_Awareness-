<?php
session_start();
$id=$_SESSION['ID'];
if(!isset($_SESSION['ID'])){
	$url = 'index.php';
    header( "Location: $url" );
	//$id=$_SESSION['ID'];
}
$tID=$_GET['tid'] ;
require_once('mysqli_connect2.php');
$query= "SELECT ID,Subject,Content,Date,TopicBy FROM forum_topic WHERE ID=".$tID;
$results =@mysqli_query($dbc, $query);
$row = mysqli_fetch_array($results);

$query2= "SELECT ID,Content,Date,Topic,ReplyBy FROM forum_reply WHERE Topic=".$tID;
$results2 =@mysqli_query($dbc, $query2);
?>
<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Acidus" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>DU Awareness</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="css/animate.css" rel="stylesheet">
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
		<style>
		.header{
			background: #87CEFA;
		}
		#logo{
			font-family: "Broadway", Times, serif;
			font-size: 2.5em;
			font-weight: bold;
			
		}
		#blah{
			position: relative;
			left: 100px;
			font-size: 1.5em;
		}
		</style>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>

		<script type="text/javascript">
		
		function check() {
			var data = new FormData();
			data.append('Content', document.getElementById("reply").value);
			data.append('Topic', '<?php echo $tID; ?>');
			data.append('ReplyBy', '<?php echo $id; ?>');
			xhttp= new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					document.getElementById("showMessage").innerHTML="<span style='color:black;font-size: 1.5em'>"+xhttp.responseText+"</span>";
				}
			};
			xhttp.open("POST","reply.php",true);
			//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send(data);
		}
		
		</script>
        <!--========== HEADER ==========-->
        <header class="header">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="navbar-logo">
                            <a class="navbar-logo-wrap" href="index.php">
                                <div id="logo">DU Awareness</div>
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="navbar-nav navbar-nav-right">
								<!-- Home -->
                                <li class="nav-item">
										<a class="nav-item-child" href=#>
											<?php echo $id; ?>
										</a>
                                </li>
                                <!-- End Home -->
                                <!-- Home -->
                                <li class="nav-item">
                                    <a class="nav-item-child" href="home.php">
                                        Home
                                    </a>
                                </li>
                                <!-- End Home -->

                                <!-- About -->
                                <li class="nav-item">
                                    <a class="nav-item-child" href="about.php">
                                        About
                                    </a>
                                </li>
                                <!-- End About -->

                                <!-- Work -->
                                <li class="nav-item">
                                    <a class="nav-item-child" href="report.php">
                                        Send A Report
                                    </a>
                                </li>
                                <!-- End Work -->
								
                                <!-- Contact -->
                                <li class="nav-item">
                                    <a class="nav-item-child" href="contact.php">
                                        Contact
                                    </a>
                                </li>
                                <!-- End Contact -->
								
								<!-- Forum -->
                                <li class="nav-item">
                                    <a class="nav-item-child active" href="forum.php">
                                        Forum
                                    </a>
                                </li>
                                <!-- End Forum -->
								
								<!-- Login -->
                                <li class="nav-item">
                                    <a class="nav-item-child" href="logout.php">
                                        Logout
                                    </a>
                                </li>
                                <!-- End Login -->
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== PAGE LAYOUT ==========-->
		<hr style="border-color:grey;">
		<div id="blah">
		<b style='font-size: 2em'>Topic:  <?php echo $row['Subject']."<br>";?></b>
		<?php echo $row['Content']."<br><br>Created by: ".$row['TopicBy']."<br>".$row['Date'];?>
		<br><br>
		<b>Replies:<br></b>
		<?php 
		if (mysqli_num_rows($results2)!=0)
		{
			while($row2 = mysqli_fetch_array($results2))
			{
				echo "=>".$row2['Content']."<br><br>Replied by: ".$row2['ReplyBy']."<br>".$row2['Date']."<br><br><br>";
			}
		}
		?>
		<p id="showMessage"> </p>
		<br><br>
		<b>Reply:<br></b>
		<textarea id="reply" rows="3" style="width:500px;"></textarea><br>
		<input type = "button" onclick="check()" value= "reply!"/>
		</div>
		<hr style="border-color:grey;">
        
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="footer">
            <!-- Links -->
            <div class="section-seperator">
                <div class="content-md container">
                    <div class="row">
                        <div class="col-sm-2 sm-margin-b-30">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="#">Home</a></li>
                                <li class="footer-list-item"><a href="#">About</a></li>
                                <li class="footer-list-item"><a href="#">Work</a></li>
                                <li class="footer-list-item"><a href="#">Contact</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="col-sm-2 sm-margin-b-30">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="#">Twitter</a></li>
                                <li class="footer-list-item"><a href="#">Facebook</a></li>
                                <li class="footer-list-item"><a href="#">Instagram</a></li>
                                <li class="footer-list-item"><a href="#">YouTube</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="col-sm-3">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="#">Subscribe to Our Newsletter</a></li>
                                <li class="footer-list-item"><a href="#">Privacy Policy</a></li>
                                <li class="footer-list-item"><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
            <!-- End Links -->

            <!-- Copyright -->
            
            <!-- End Copyright -->
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="vendor/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
        <script src="vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
        <script src="js/components/swiper.min.js" type="text/javascript"></script>
        <script src="js/components/masonry.min.js" type="text/javascript"></script>

    </body>
    <!-- END BODY -->
</html>