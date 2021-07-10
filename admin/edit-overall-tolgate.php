<?php
session_start();

if($_SESSION)
{
if(isset($_GET['id'])){
$overall_id=$_GET['id'];
$name=$_SESSION['mysession'];

include('database.php');

$totalcount=' ';


$query="SELECT * FROM `admin` WHERE `username`='$name';";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);

$row_select_query="SELECT * FROM `tolgate_detail` WHERE `id`='$overall_id'";
$row_select_res=mysqli_query($con,$row_select_query);
$row_select_row=mysqli_fetch_assoc($row_select_res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
	<div class="total-ads main-grid-border">
		<div class="container">
			
			
			<div class="ads-grid">
				<div class="side-bar col-md-3" style="    border-left: 2px solid #0dab4c;
    border-right: 2px solid #0dab4c;
    border-top: 2px solid #0dab4c;
    border-bottom: 2px solid #0dab4c;">
					
				<?php
				include 'side-menu.php';
				?>

							
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
									<h3>Tolgate Details</h3>
									<br>
									<form method="POST">
									<table>
										<tr>
										<th>
											Tolgate Name
										</th>
										<td>
											<input type="text" name="tolgate_name" placeholder="Tolgate Name" required="" value="<?php echo $row_select_row['tolgate_name']; ?>" class="text-box-adjeshment">
										</td>
										</tr>
										<tr>
										<th>
											Tolgate Address
										</th>
										<td>
											<input type="text" name="tolgate_address" placeholder="Tolgate Address" required="" value="<?php echo $row_select_row['tolgate_address']; ?>" class="text-box-adjeshment">
										</td>
										</tr>
										<tr>
										<th>
											Bus Fare
										</th>
										<td>
											<input type="text" name="bus_fare" placeholder="Enter the Amount" required="" value="<?php echo $row_select_row['bus_fare']; ?>" class="text-box-adjeshment" onkeypress="return isNumberKeyq(event);">
										</td>
										</tr>
										<tr>
										<th>
											Truck Fare
										</th>
										<td>
											<input type="text" name="truck" placeholder="Enter the Amount" required="" value="<?php echo $row_select_row['truck']; ?>" class="text-box-adjeshment" onkeypress="return isNumberKeyq(event);">
										</td>
										</tr>
										<tr>
										<th>
											Upto 3 Axle Vehicle Fare
										</th>
										<td>
											<input type="text" name="Upto_3_Axle_Vehicle" placeholder="Enter the Amount" required="" value="<?php echo $row_select_row['Upto_3_Axle_Vehicle']; ?>" class="text-box-adjeshment" onkeypress="return isNumberKeyq(event);">
										</td>
										</tr>
										<tr>
										<th>
											Car Fare
										</th>
										<td>
											<input type="text" name="car" placeholder="Enter the Amount" required="" value="<?php echo $row_select_row['car']; ?>" class="text-box-adjeshment" onkeypress="return isNumberKeyq(event);">
										</td>
										</tr>
										<tr>
										<th>
											Above 3 Axle Vehile
										</th>
										<td>
											<input type="text" name="above_3_axle_vehile" placeholder="Enter the Amount" required="" value="<?php echo $row_select_row['above_3_axle_vehile']; ?>" class="text-box-adjeshment" onkeypress="return isNumberKeyq(event);">
										</td>
										</tr>
										
										<tr>
											<td colspan="2" class="text-align-center">
											<input type="submit" name="updated-tolgate">
											</td>
										</tr>
									</table>
									</form>
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
									td, th{
										    padding: 9px;
										}
										.text-align-center{
											text-align: center;
										}
										.text-box-adjeshment{
										width: 165%;
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
		<?php

		include('footer.php');


		?>
        <!--footer section end-->
</body>
		<!-- Navigation-JavaScript -->
			<script src="js/classie.js"></script>
			<script src="js/main.js"></script>
		<!-- //Navigation-JavaScript -->
		<!-- here stars scrolling icon -->
			<script type="text/javascript">
				$(document).ready(function() {				
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
if(isset($_POST['updated-tolgate']))
{
$tolgate_name=$_POST['tolgate_name'];
$tolgate_name=str_replace("'", '', $tolgate_name);
$tolgate_address=$_POST['tolgate_address'];
$tolgate_address=str_replace("'", '', $tolgate_address);
$bus_fare=$_POST['bus_fare'];
$bus_fare=str_replace("'", '', $bus_fare);
$truck=$_POST['truck'];
$truck=str_replace("'", '', $truck);
$Upto_3_Axle_Vehicle=$_POST['Upto_3_Axle_Vehicle'];
$Upto_3_Axle_Vehicle=str_replace("'", '', $Upto_3_Axle_Vehicle);
$car=$_POST['car'];
$car=str_replace("'", '', $car);
$above_3_axle_vehile=$_POST['above_3_axle_vehile'];
$above_3_axle_vehile=str_replace("'", '', $above_3_axle_vehile);
$url_overall=$_SERVER['QUERY_STRING'];
$insert_query="UPDATE `tolgate_detail` SET `tolgate_name`='$tolgate_name',`tolgate_address`='$tolgate_address',`bus_fare`='$bus_fare',`truck`='$truck',`Upto_3_Axle_Vehicle`='$Upto_3_Axle_Vehicle',`car`='$car',`above_3_axle_vehile`='$above_3_axle_vehile' WHERE `id`='$overall_id'";

$insert_query_res=mysqli_query($con,$insert_query);
if($insert_query_res){
echo "<script>alert('Updated Sucessfully');</script>";
echo "<script>window.location='edit-overall-tolgate.php?$url_overall';</script>";
}else{
echo "<script>alert('sorry Some Problem is Accure');</script>";
echo "<script>window.location='edit-overall-tolgate.php?$url_overall';</script>";
}
}

}
else
{
	echo "<script>alert('sorry you are not login please login');</script>";
	echo "<script>window.location='index.php';</script>";
	

}
}else
{
	echo "<script>alert('Your Not A Valid User');</script>";
	echo "<script>window.location='index.php';</script>";
	

}
?>
<script type="text/javascript">
    
function isNumberKeyq(evt)
        {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            console.log(charCode);
            if ( charCode > 31 && (charCode < 48 || charCode > 57)  && charCode != 37 &&  charCode != 43 && charCode != 46 && charCode != 35 && charCode != 36)
                return false;
            return true;
        }
</script>