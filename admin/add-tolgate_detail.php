<?php
session_start();

if($_SESSION)
{
if(isset($_GET['id']) && isset($_GET['limit'])){

$overall_id=$_GET['id'];
$overall_limit=$_GET['limit'];

$name=$_SESSION['mysession'];

include('database.php');

$totalcount=' ';


$query="SELECT * FROM `admin` WHERE `username`='$name';";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);

$list_tolgate_query="SELECT * FROM `tolgate_detail` WHERE `tolgate_list_id`='$overall_id' LIMIT $overall_limit";

$list_tolgate_res=mysqli_query($con,$list_tolgate_query);


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
									<h3>Add Tolgate Places</h3>
									<br>
									<form method="POST">
									<table border="1">
										<tr>
										<th>
											Tolgate S.no
										</th>
										<th>
											Tolgate Name
										</th>
										<th>
											Tolgate Address
										</th>
										<th>
										Action	
										</th>
										
										</tr>
										<?php
										$url=$_SERVER['QUERY_STRING'];
										$i=1;
										while ( $list_tolgate_row = mysqli_fetch_assoc($list_tolgate_res)) {
										?>
										<tr>
										<td>
										<?php
										echo $i;
										?>	
										</td>
										<td>
										<?php
										echo $list_tolgate_row['tolgate_name'];
										?>	
										</td>
										<td>
										<?php
										echo $list_tolgate_row['tolgate_address'];

										?>		
										</td>
										<td>
											<a href="edit-overall-tolgate.php?id=<?php echo $list_tolgate_row['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>&nbsp;&nbsp;&nbsp;<a href="delete-tolgate-list.php?delete_id=<?php echo $list_tolgate_row['id'].'&'. $url; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
										</td>	
										</tr>
										<?php
										$i++;
										}
										$k=$i-1;
										$l=$k+1;
										
										for ($j=0; $j <($overall_limit-$k) ; $j++)
										{ 
										?>
										<form method="POST">
										<tr>
											<td>
											<?php
											echo $l;
											?>	
											</td>
											<td>
												<input type="text" name="tolgate_name" placeholder="**Tolgate Name**" required="">
											</td>
											<td>
												<input type="text" name="tolgate_address" placeholder="**Tolgate Address**" required="">
											</td>
											<td>

												<input type="submit" name="add_tolgate" value="Add">
											</td>
										</tr>
										</form>
										<?php
										$l++;
										}
										?>
										
										
									</table>
									</form>
								</center>
								<br>
								<br>
								<br>
								<br>
								<br>
								
								
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
			</script>
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</html>
<?php


}
else
{
	echo "<script>alert('sorry you are not login please login');</script>";
	echo "<script>window.location='index.php';</script>";
	

}
}else{
	echo "<script>alert('sorry you are not login please login');</script>";
	echo "<script>window.location='index.php';</script>";	
}
?>
<?php
if(isset($_POST['add_tolgate'])){
$tolgate_name=$_POST['tolgate_name'];
$tolgate_name=str_replace("'", '',$tolgate_name);
$tolgate_address=$_POST['tolgate_address'];
$tolgate_address=str_replace("'", '',$tolgate_address);
$url=$_SERVER['QUERY_STRING'];
$insert_tolgate_query="INSERT INTO `tolgate_detail`( `tolgate_name`, `tolgate_address`, `tolgate_list_id`) VALUES ('$tolgate_name','$tolgate_address','$overall_id')";
$insert_tolgate_res=mysqli_query($con,$insert_tolgate_query);
if($insert_tolgate_res){
echo "<script>window.location='add-tolgate_detail.php?$url';</script>";
}else{
echo "<script>alert('Sorry Some Problem is Accure');    window.location='add-tolgate_detail.php?$url';
    </script>";
}
}
?>
