<?php
include 'admin/database.php';
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
<body class="cbp-spmenu-push" background="wed.jpg">
	<div class="main-content">
		<!--left-fixed -navigation-->
		
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">SignUp Here</h3>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
					<form method="POST">
					<div class="sign-u">
						<div class="sign-up1">
							<h4>First Name* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="text"  required name="first_name" onkeypress="return isNumberKeyq2(event);">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Last Name* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="text" required name="last_name" onkeypress="return isNumberKeyq2(event);">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Email Address* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="email" required name="e_mail">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Phone* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="text" required name="phone" onkeypress="return isNumberKeyq(event);">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<h6>Login Information :</h6>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Password* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="password" required name="password" id="password-first">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirm Password* :</h4>
						</div>
						<div class="sign-up2">
							
								<input type="password" required id="re-enter-password" onblur="checkpassword(this.value)">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
						
							<input type="submit" value="Submit" name="sign-up">

							<input type="button" value="cancel" name="Cancel" onclick="index();">
						
						<div class="clearfix"> </div>
					</div>
				</form>
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
			function checkpassword(password) {
				var password1=document.getElementById('password-first').value;
				if(password1 != password){
					alert('Re Enter Password is Not Match');
					document.getElementById('re-enter-password').value='';
				}
			}
			function isNumberKeyq(evt)
        	{
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            console.log(charCode);
            if ( charCode > 31 && (charCode < 48 || charCode > 57)  && charCode != 37 &&  charCode != 43 && charCode != 46 && charCode != 35 && charCode != 36)
                return false;
            return true;
        	}
        	function isNumberKeyq2(evt)
        	{
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            console.log(charCode);
            if ( charCode > 31 && (charCode < 48 || charCode > 57)  && charCode != 37 &&  charCode != 43 && charCode != 46 && charCode != 35 && charCode != 36)
                return true;
            return false;
        	}
        	
        	function index() {
        		window.location='index.php';
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
if(isset($_POST['sign-up'])){
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$e_mail=$_POST['e_mail'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$otp=rand();
	$verify='false';
	$sign_up_query="INSERT INTO `users`(`first_name`, `last_name`, `e_mail`, `phone`, `password`,`otp`,`verify`) VALUES ('$first_name','$last_name','$e_mail','$phone','$password','$otp','$verify')";
	$sign_up_res=mysqli_query($con,$sign_up_query);
	if($sign_up_res){

	$a=$e_mail;
	$b=$otp;
	$url="http://inplanttrainingchennai.in/student-projects/mail-shopping/mail4.php?a=".$a.'&b='.$b;
	$ch = curl_init();
  	curl_setopt($ch, CURLOPT_URL,$url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  	$response = curl_exec($ch);	

		echo "<script>alert('Registration Sucessfully Please Login');</script>";
	}else{
		echo "<script>alert('Your Details Are Aleady Exits');</script>";
	}
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
		.sign-up-row{
		width: 100%;
		}
		.sub_home input[type="button"]{
		margin: 0.5em 0 0 1.8em;
		}
		.sub_home input[type="submit"]{
		margin: 0.5em 0 0 0.6em;
		}
	}
</style>