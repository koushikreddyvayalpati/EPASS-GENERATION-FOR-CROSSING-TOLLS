<?php
include 'admin/database.php';
session_start();
unset($_SESSION['mysession2']);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tollgate Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push" background="tolgate.jpg">
	<div class="main-content">
		<!--left-fixed -navigation-->
		
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">OTP Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Enter The OTP ! </h4>
					</div>
					<div class="login-body">
						<form method="POST">
							<input type="text" class="user" name="otp" placeholder="Enter your OTP" required="">
							
							<input type="submit" name="login" value="Sign In">
							</form>
							<form method="POST">
							<input type="submit" name="resend" value="Resend OTP">
							<div class="forgot-grid">
								<span style="float: right;"><a href="mainpage/index.php"><label class="checkbox">Back to Home</label></a></span>
								
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!--footer-->
		<?php
		include 'footer.php';
		?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php
if(isset($_POST['login'])){
$otp=$_POST['otp'];	
$email=$_SESSION['otp-session'];
$login_query="SELECT * FROM `users` WHERE `e_mail`='$email' AND `otp`='$otp'";
$login_res=mysqli_query($con,$login_query);
$login_row=mysqli_fetch_assoc($login_res);
if($login_res->num_rows){
$update_query="UPDATE `users` SET `verify`='true' WHERE `e_mail`='$email'";
$update_res=mysqli_query($con,$update_query);
if($update_res){
$_SESSION['mysession2']=$email;
echo "<script>window.location ='dashboard.php';</script>";
}else{
echo "<script>alert('Some Problem is Accure');</script>";
}		
}else{
	echo "<script>alert('Sorry Your User Otp Is Invalid');</script>";
}
}

if(isset($_POST['resend'])){

$a=$_SESSION['otp-session'];

$login_query="SELECT * FROM `users` WHERE `e_mail`='$a'";
$login_res=mysqli_query($con,$login_query);
$login_row=mysqli_fetch_assoc($login_res);
$b=$login_row['otp'];

$url="http://inplanttrainingchennai.in/student-projects/mail-shopping/mail4.php?a=".$a.'&b='.$b;

$ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
echo "<script>alert('Please Check The Mail');</script>";
}

?>

<style type="text/css">
	@media only screen and (max-width: 1010px) and (min-width: 240px){
		.cbp-spmenu-push div#page-wrapper{
		padding: 4.5em 1em 2em ;
		}
		.login-page{
		width: 92%;
		}
	}
</style>