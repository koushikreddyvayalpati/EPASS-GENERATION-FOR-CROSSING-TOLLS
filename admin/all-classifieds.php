<?php
session_start();

if($_SESSION)
{
$name=$_SESSION['mysession'];

include('database.php');

$totalcount=' ';


$query="SELECT * FROM `admin` WHERE `username`='$name';";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);

$query5="SELECT * FROM `user`";
$res2=mysqli_query($con,$query5);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<body style="background-color:powderblue">
<title>Admin</title>
<link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="css/bootstrap-select.css"><!-- bootstrap-select-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="css/menu_sideslide.css" type="text/css" media="all"><!-- Navigation-CSS -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-select.js"></script>

<!-- language-select -->
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link href="css/jquery.uls.css" rel="stylesheet"/>
<link href="css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="js/jquery.uls.data.js"></script>
<script src="js/jquery.uls.data.utils.js"></script>
<script src="js/jquery.uls.lcd.js"></script>
<script src="js/jquery.uls.languagefilter.js"></script>
<script src="js/jquery.uls.regionfilter.js"></script>
<script src="js/jquery.uls.core.js"></script>
<script src="js/tabs.js"></script>	
<script type="text/javascript">
$(document).ready(function () {    
var elem=$('#container ul');      
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});						
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});									
		}
	});
});
</script>
<!-- //switcher-grid and list alignment -->
</head>
<body>
<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="all-classifieds.php">
						<h1>WELCOME ADMIN</h1>
					</a>
				</div>
	<!-- Navigation -->
		<div class="agiletopbar">
			<div class="wthreenavigation">
				
			
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- //Navigation -->
	<!-- header -->
	<?php
	include 'header.php';
	?>
	<!-- //header -->
	<!-- breadcrumbs -->
	
	<!-- //breadcrumbs -->
	<!-- Products -->
<?php
				include 'side-menu.php';
				?>
	<div class="total-ads main-grid-border">
		<div class="container">
			
			
			<div class="ads-grid">
				<div class="side-bar col-md-3" style="    border-left: 2px solid #B6D0E2;
    border-right: 2px solid #B6D0E2;
    border-top: 2px solid #B6D0E2;
    border-bottom: 2px solid #B6D0E2;
background-color:powderblue";>
					
				

							
							<!---->
							<script type="text/javascript" src="js/jquery-ui.js"></script>
							
				
				
				</div>
				<div class="agileinfo-ads-display col-md-9">
					<div class="wrapper">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
							<div id="container">

								<center>
									<h1>Welcome To Tolgate Admin Managment System</h1>
									<br>
									<br>
									<img src="images/usd.jpg">
								</center>
								
								
								<div class="clearfix"></div>
								<style type="text/css">
									@media only screen and (max-width: 640px) and (min-width: 320px){

                                   .box{

                                   	    width: 21em !important;
                                       margin: 0 -30px 0 !important;
                                   }

									}

										@media only screen and (max-width: 900px) and (min-width: 400px){

                                   .box{

                                   	       width: 24.8em !important;
                                       margin: 0 -30px 0 !important;
                                   }

									}
								</style>
						
						</div>
							</div>
						</div>				
					  </div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<!-- // Products -->
	<!--footer section start-->		
		
        <!--footer section end-->
</body>
		<!-- Navigation-JavaScript -->
			<script src="js/classie.js"></script>
			<script src="js/main.js"></script>
		<!-- //Navigation-JavaScript -->
		<!-- here stars scrolling icon -->
			<script type="text/javascript">
				$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/
										
					$().UItoTop({ easingType: 'easeOutQuart' });
										
					});
			</script>
			<!-- start-smoth-scrolling -->
			<script type="text/javascript" src="js/move-top.js"></script>
			<script type="text/javascript" src="js/easing.js"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
			</script>
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</html>
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query66="select * from user where id='$id';";
	$res77=mysqli_query($con,$query66);
	$row5=mysqli_fetch_assoc($res77);

	$usename2=$row5['referances'];

	$query67="drop table $usename2";
	$query68="delete from user where id='$id';";
	mysqli_query($con,$query67);
	mysqli_query($con,$query68);
	echo "<script>alert('deleted sucessfully');</script>";
	echo "<script>window.location='all-classifieds.php';</script>";


}


}
else
{
	echo "<script>alert('sorry you are not login please login');</script>";
	echo "<script>window.location='index.php';</script>";
	

}
?>