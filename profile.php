<?php
include 'admin/database.php';
session_start();
if($_SESSION){
$username=$_SESSION['mysession2'];
$user_detail_query="SELECT * FROM `users` WHERE `e_mail`='$username'";
$user_detail_res=mysqli_query($con,$user_detail_query);
$user_detail_row=mysqli_fetch_assoc($user_detail_res);


?>
<!DOCTYPE HTML>
<html>
<head>
<body style="background-color:grey">

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
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<?php
		include 'header.php';
		?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<br>
			
				<div class="row">
						<h3 class="title1">APPLY EPASS:</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="POST">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-4 control-label">First Name</label>
									<div class="col-sm-7">
										<input type="text"  required name="first_name" class="form-control" value="<?php echo $user_detail_row['first_name']; ?>">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-4 control-label">Last Name</label>
									<div class="col-sm-7">

										<input type="text" required name="last_name" class="form-control" value="<?php echo $user_detail_row['last_name']; ?>">
						
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label"> E - mail </label>
									<div class="col-sm-7">
									<input type="email" required name="e_mail" class="form-control" value="<?php echo $user_detail_row['e_mail']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label"> Phone </label>
									<div class="col-sm-7">
										<input type="text" required name="phone" onkeypress="return isNumberKeyq(event);" class="form-control" value="<?php echo $user_detail_row['phone']; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label"> Password </label>
									<div class="col-sm-7">
									<input type="password" required name="password" id="password-first" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label"> Re Enter  Password </label>
									<div class="col-sm-7">
									<input type="password" required id="re-enter-password" onblur="checkpassword(this.value)" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<center>
									<input type="submit" name="pay" value="Update"  class="btn btn-primary">
									</center>
								</div>

								
							</form>
						</div>
					</div>
				
				<div class="clearfix"> </div>
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
			
			function checkpassword(password) {
				var password1=document.getElementById('password-first').value;
				if(password1 != password){
					alert('Re Enter Password is Not Match');
					document.getElementById('re-enter-password').value='';
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
}else{
echo "<script>window.location ='index.php';</script>";		
}
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
    	dateFormat: "dd-M-yy",
    	minDate: 0,
    	maxDate: 30,
    });
  } );
  </script>
<?php
if(isset($_POST['pay'])){
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$e_mail=$_POST['e_mail'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];

$insert_query="UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`e_mail`='$e_mail',`phone`='$phone',`password`='$password' WHERE `id`=".$user_detail_row['id'];
$insert_res=mysqli_query($con,$insert_query);
if($insert_res){
echo "<script>alert('Updated Sucessfully');</script>";	
}else{
echo "<script>alert('Sorry Your User name or password is wrong');</script>";
}
}
?>
<style type="text/css">
	@media only screen and (max-width: 1010px) and (min-width: 240px){
		.cbp-spmenu-push div#page-wrapper{
		padding: 4.5em 1em 2em ;
		}
	}
</style>