<?php
include 'admin/database.php';
session_start();

if($_SESSION){

$username=$_SESSION['mysession2'];
$user_detail_query="SELECT * FROM `users` WHERE `e_mail`='$username'";
$user_detail_res=mysqli_query($con,$user_detail_query);
$user_detail_row=mysqli_fetch_assoc($user_detail_res);

$journey_detail="SELECT * FROM `travel_history` WHERE `user_id`='".$user_detail_row['id']."' ORDER BY id DESC LIMIT 1";
$journey_res=mysqli_query($con,$journey_detail);
$journey_row=mysqli_fetch_assoc($journey_res);

$sources=$journey_row['sources_location'];
$destination=$journey_row['destination_location'];
$tolgate_list="SELECT * FROM `tolgate_list` WHERE `sources`='$sources' AND `destination`='$destination'";
$tolgate_list_res=mysqli_query($con,$tolgate_list);

$tolgate_list_row=mysqli_fetch_assoc($tolgate_list_res);


if($journey_row['type_of_vechile']=='Car'){
$select_vechile='car';
}else if($journey_row['type_of_vechile']=='Bus'){
$select_vechile='bus_fare';
}else if($journey_row['type_of_vechile']=='Truck'){
$select_vechile='truck';
}else if($journey_row['type_of_vechile']=='Upto 3 Axle Vehicle'){
$select_vechile='Upto_3_Axle_Vehicle';
}if($journey_row['type_of_vechile']=='Above 3 Axle Vehicle'){
$select_vechile='above_3_axle_vehile';
}

$overall_tolgate="SELECT `tolgate_name`,`tolgate_address`,`".$select_vechile."` FROM `tolgate_detail` WHERE `tolgate_list_id`='".$tolgate_list_row['id']."' LIMIT ".$tolgate_list_row['no_of_tolgate']." ";


$overall_tolgate_res=mysqli_query($con,$overall_tolgate);

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
						<h3 class="title1">Book Your Trip :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="POST">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-4 control-label">Select Your Sources Location</label>
									<div class="col-sm-7">
										<input type="text" name="sources" value="<?php echo $journey_row['sources_location']; ?>" disabled="" class="form-control">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-4 control-label">Select Your Destination Location</label>
									<div class="col-sm-7">
										<span id="txtHint">
										<input type="text" name="destination" value="<?php echo $journey_row['destination_location']; ?>" disabled="" class="form-control">
									</span>
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label">Select Your Vehicle</label>
									<div class="col-sm-7">
										<input type="text" name="type_of_vechile" value="<?php echo $journey_row['type_of_vechile']; ?>" disabled="" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label">Select Your Travel Date</label>
									<div class="col-sm-7">
										<input type="text" name="journey_date" value="<?php echo $journey_row['journey_date']; ?>" disabled="" class="form-control">
									</div>
								</div>
								<br>


						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>S.no</th> 
									<th>Tolgate Name</th> 
									<th>Tolgate Address</th> 
									<th>Vechile Type</th> 
									<th>Amount</th> 
								</tr> 
							</thead> 
							<tbody> 
								<?php  
								$i=1;
								$j=0;
								$overall_amount=0;
								while ($overall_tolgate_row=mysqli_fetch_array($overall_tolgate_res)) {
									$overall_amount=$overall_tolgate_row['2']+$j;

								?>
								<tr> 
									<th scope="row"><?php echo $i; ?></th> 
									<td><?php echo $overall_tolgate_row['tolgate_name']; ?></td> 
									<td><?php echo $overall_tolgate_row['tolgate_address']; ?></td> 
									<td><?php echo $journey_row['type_of_vechile']; ?></td> 
									<td><?php echo $overall_tolgate_row['2']; ?></td> 
								</tr> 
								<?php
								$i++;
								$j=$overall_amount;
								}
								?>
								<tr>
									<td colspan="4" style="text-align: right;">
									<b>	Total Fare </b>
									</td>
									<td>
										<?php echo $overall_amount; ?>
									</td>
								</tr>
							</tbody> 
						</table>

						<div class="form-group">
									<label class="col-sm-4 control-label">Select Your Payment GateWay</label>
									<div class="col-sm-7">
										<select  class="form-control1" name="payment-method" required="" onchange='change_cared(this.value)';>
											<option value="">------------>  Select Your Payment GateWay <-----------</option>
									<option value="Credit-card">Credit card</option>
									<option value="Debit-card">Debit card</option>
									<option value="Paytm">Paytm</option>
									<option value="freecharge">Freecharge</option>
									<option value="ola-money">ola Money</option>
									<option value="Airtel-Payment-Bank">Airtel Payment Bank</option>
										</select>
									</div>
								</div>
					<div class="form-group">
					<center>
						<div class="col-sm-5">
						</div>
						<div class="col-sm-5">
							<div id="change-payment-id"></div>
						</div>

					</center>	
					</div>
					<div class="form-group">
						<center>
							<input type="hidden" name="user_id" value="<?php echo $journey_row['user_id']; ?>">
							<input type="hidden" name="amount" value="<?php echo $overall_amount; ?>">
							<input type="submit" name="pay" value="Click To Finish"  class="btn btn-primary">
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
	<style type="text/css">
		.widget-shadow{
		overflow-x: auto;
		}
	</style>
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
			function isNumberKeyq(evt)
        	{
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            console.log(charCode);
            if ( charCode > 31 && (charCode < 48 || charCode > 57)  && charCode != 37 &&  charCode != 43 && charCode != 45 && charCode != 35 && charCode != 36)
                return false;
            return true;
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

<?php
if(isset($_POST['pay'])){
$payment_method=$_POST['payment-method'];
$user_id=$_POST['user_id'];
$amount=$_POST['amount'];
$insert_query="UPDATE `travel_history` SET `amount`='$amount',`paid_status`='Paid',`type_of_payment`='$payment_method',`user_id`='$user_id',`no_of_tolgate`=".$tolgate_list_row['no_of_tolgate']." WHERE `id`=".$journey_row['id']."";
$insert_res=mysqli_query($con,$insert_query);
if($insert_res){
echo "<script>window.location ='payment-sucess.php';</script>";	
}else{
echo "<script>alert('Sorry Your User name or password is wrong');</script>";
}
}
?>

<script type="text/javascript">
		function change_cared(value){

			if(value=='Credit-card'){
			document.getElementById('change-payment-id').innerHTML='<div class="form-group">	<label for="DoctorSpecialization">Credit Card Number	</label>	<input type="text" name="card-number" class="form-control" placeholder="1234-5678-1111-3333" required onkeypress="return isNumberKeyq(event);"></div><div class="form-group"><label for="DoctorSpecialization">	Expiry Date From <input type="text" name="" class="form-control" placeholder="xx" required onkeypress="return isNumberKeyq(event);">	</label>&nbsp;&nbsp;	<label for="DoctorSpecialization">	Expiry Date  To <input type="text" name="" class="form-control" placeholder="xx" required onkeypress="return isNumberKeyq(event);">	</label>&nbsp;&nbsp;	<label for="DoctorSpecialization">	Cvv <input type="text" name="" class="form-control" placeholder="xxx" required onkeypress="return isNumberKeyq(event);">	</label></div><div class="form-group">	<label for="DoctorSpecialization">	Name On the Card	</label>	<input type="text" name="" class="form-control" placeholder="ABCD" required></div>';
		}
		else if(value=='Debit-card'){
		document.getElementById('change-payment-id').innerHTML='<div class="form-group">	<label for="DoctorSpecialization"> Debit Card Number	</label>	<input type="text" name="card-number" class="form-control" placeholder="1234-5678-1111-3333" required onkeypress="return isNumberKeyq(event);"></div><div class="form-group"><label for="DoctorSpecialization">	Expiry Date From <input type="text" name="" class="form-control" placeholder="xx" required onkeypress="return isNumberKeyq(event);">	</label>&nbsp;&nbsp;	<label for="DoctorSpecialization">	Expiry Date  To <input type="text" name="" class="form-control" placeholder="xx" required onkeypress="return isNumberKeyq(event);">	</label>&nbsp;&nbsp;	<label for="DoctorSpecialization">	Cvv <input type="text" name="" class="form-control" placeholder="xxx" required onkeypress="return isNumberKeyq(event);">	</label></div><div class="form-group">	<label for="DoctorSpecialization">	Name On the Card	</label>	<input type="text" name="" class="form-control" placeholder="ABCD" required></div>';	
	}else if(value=='Paytm'){
		document.getElementById('change-payment-id').innerHTML='<img src="images/paytm.jpg" style="max-width: 40%;"><input type="hidden" name="card-number" value="">';
		}
		else if(value=='freecharge'){
		document.getElementById('change-payment-id').innerHTML='<img src="images/freecharge.png" style="max-width: 61%;"> <input type="hidden" name="card-number" value="">';
		}
		else if(value=='ola-money'){
		document.getElementById('change-payment-id').innerHTML='<img src="images/ola-money.jpg" style="max-width: 82%;"> <input type="hidden" name="card-number" value="">';
		}
		else if(value=='Airtel-Payment-Bank'){
		document.getElementById('change-payment-id').innerHTML='<img src="images/airtel.jpg" > <input type="hidden" name="card-number" value="">';
		}
	}
	</script>