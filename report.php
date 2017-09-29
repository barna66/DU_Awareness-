<?php
session_start();
$id=$_SESSION['ID'];
if(!isset($_SESSION['ID'])){
	$url = 'index.php';
    header( "Location: $url" );
	//$id=$_SESSION['ID'];
}
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
   
		b{
			font-size: 2.5em;
			font-weight: bold;
			font-style: italic;
		}
		form{
			position: relative;
			left: 200px;
		}
		.bText{
			font-size: 1.5em;
			font-weight: bold;
		}
		
		input[type=submit] {
			color:grey;
			border-radius: 25px;
			border: 2px solid black;
			padding: 10px 25px;
			text-align: center;
			display: inline-block;
			font-size: 1.5em;
			font-weight: bold;
			margin: 4px 2px;
		}
		.header{
			background: #87CEFA;
		}
		.footer{
			background: #87CEFA;
		}
		#logo{
			font-family: "Broadway", Times, serif;
			font-size: 2.5em;
			font-weight: bold;
			
		}
		label{
    display: inline-block;
    float: left;
    clear: left;
    width: 150px;
    text-align: left;
}
		</style>
    </head>
    <!-- END HEAD -->
	<!-- BODY -->
    <body>
		<script type="text/javascript">
		
		function check() {
			xhttp= new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					document.getElementById("showMessage").innerHTML=xhttp.responseText;
				}
			};
			var txt = document.getElementById("inputText").value;
			if(txt == null || txt.indexOf(' ') >=0 )
				alert("invaid input");
			
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
                                 <div id="logo">Awareness</div>
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
                                    <a class="nav-item-child active" href="report.php">
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
                                    <a class="nav-item-child" href="forum.php">
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
<hr style="border-color:black;">
        <!--========== PAGE LAYOUT ==========-->

		<!-- SignUp Form -->
		<form action="report2.php" method="post" enctype="multipart/form-data">
			<br>
			<b>Send a Report</b>
			<br><br>
			<p class="bText"><label>Upload Image</label>
			<input type="file" name="image" accept="image/*"/>
			</p>
			<p class="bText"><label>Description</label>
			<textarea name="description"  placeholder="Description" rows="10" style="width:500px;" required></textarea>
			</p>
			<p class="bText" id="area"><label>Area</label>
			<select name="area">
				<option>Area*</option>
				<option>Curzon Hall</option>
				<option>Doyel Chattar</option>
				<option>TSC</option>						
			</select>
			</p>
			<p>
			<input type="submit" name="submit" value="Submit" />
			</p>

		</form>
		<br><br><br><br><br><br>
		<!-- SignUp Form -->
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

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
        <script src="js/components/swiper.min.js" type="text/javascript"></script>
    <p id="showMessage"> </p>
    </body>
    <!-- END BODY -->
</html>