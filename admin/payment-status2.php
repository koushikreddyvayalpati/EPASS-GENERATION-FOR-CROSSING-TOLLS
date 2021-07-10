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

$list_tolgate_query="SELECT * FROM `users`";
$list_tolgate_res=mysqli_query($con,$list_tolgate_query);


if(isset($_POST['search'])){
$search_content=$_POST['search_content'];
$serach_query="SELECT * FROM `travel_history` WHERE `id`='$search_content'";
$serach_res=mysqli_query($con,$serach_query);
$serach_row=mysqli_fetch_assoc($serach_res);
}

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
									<form method="POST">
									<input type="text" name="search_content" required="" onkeypress="return isNumberKeyq(event);">
									<input type="submit" name="search">
									</form>
									<br>
									<br>
									<?php
									if(isset($search_content)){
									?>
									<table>
										<tr>
										<th>
											Source Place
										</th>
										<td>
											<input type="text" name="source_place"  required="" disabled="" value="<?php echo $serach_row['sources_location']; ?>">
										</td>
										</tr>
										<tr>
										<th>
											Destination Place
										</th>
										<td>
											<input type="text" name="destination_place" required="" disabled="" value="<?php echo $serach_row['destination_location']; ?>">
										</td>
										</tr>
										<tr>
										<th>
											No Of Tolgate
										</th>
										<td>
											<input type="text" name="no-of-tolgate"  required="" disabled="" value="<?php echo $serach_row['no_of_tolgate']; ?>">
										</td>
										</tr>
										<tr>
										<th>
											Type of Vechile
										</th>
										<td>
											<input type="text" name="no-of-tolgate"  required="" disabled="" value="<?php echo $serach_row['type_of_vechile']; ?>">
										</td>
										</tr>
										<tr>
										<th>
											Total Amount
										</th>
										<td>
											<input type="text" name="no-of-tolgate"  required="" disabled="" value="<?php echo $serach_row['amount']; ?>">
										</td>
										</tr>
										<tr>
										<th>
											Payment Status
										</th>
										<td>
											<?php
											if($serach_row['paid_status']=='Paid'){
											$check="Paid";
											}else{
											$check="Not Paid";	
											}
											?>
											<input type="text" name="no-of-tolgate"  required="" disabled="" value="<?php echo $check; ?>">
										</td>
										</tr>
										
									</table>
									<?php
									}
									?>
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
				function isNumberKeyq(evt)
        		{
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            console.log(charCode);
            if ( charCode > 31 && (charCode < 48 || charCode > 57)  && charCode != 37 &&  charCode != 43  && charCode != 35 && charCode != 36)
                return false;
            return true;
        		}
			</script>
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</html>
<?php
if(isset($_GET['delete_id']))
{
$delete_id=$_GET['delete_id'];
$delete_query="DELETE FROM `users` WHERE `id`='$delete_id'";
$delete_query_res=mysqli_query($con,$delete_query);
if($delete_query_res){
echo "<script>alert('Deleted Sucessfully');</script>";
echo "<script>window.location='overall-user.php';</script>";
}else{
echo "<script>alert('sorry Some Problem is Accure');</script>";
echo "<script>window.location='overall-user.php';</script>";
}
}

}
else
{
	echo "<script>alert('sorry you are not login please login');</script>";
	echo "<script>window.location='index.php';</script>";
	

}
?>