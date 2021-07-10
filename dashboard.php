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
						<h3 class="title1">APPLY EPASS :</h3>
						<div class="form-three widget-shadow">
							<form class="form-horizontal" method="POST">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-4 control-label">Select Your Sources Location</label>
									<div class="col-sm-7">
										<?php
										$sql_query="SELECT * FROM `tolgate_list` GROUP BY `sources`";
										$sql_res=mysqli_query($con,$sql_query);
										?>
										<select name="sources" id="selector1" class="form-control1" required="" onchange="get_target(this.value);" onblur="get_tolgate_count();">
										<option value="" selected disabled="">------------>  Select Your Sources Location <-----------</option>
										<?php
										while ($sql_row=mysqli_fetch_assoc($sql_res)) {
										?>
										<option value="<?php echo $sql_row['sources']; ?>"><?php echo $sql_row['sources']; ?></option>
										<?php	
										}
										?>
									</select>
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-4 control-label">Select Your Destination Location</label>
									<div class="col-sm-7">
										<span id="txtHint">
										<select name="destination" id="selector2" class="form-control1" required="" onchange="get_tolgate_count2()">
									<option value="" selected disabled="">------------>  Select Your Target Location <-----------</option>
									</select>
									</span>
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label">Select Your Vehicle Type</label>
									<div class="col-sm-7">
										<select  class="form-control1" name="type-of-vechile" required="" onchange="myfuction2(this.value);">
											<option value="">------------>  Select Your Vehicle Type <-----------</option>
											<option value="Car">Car</option>
											<option value="Bus">Bus</option>
											<option value="Truck">Truck</option>
											<option value="Upto 3 Axle Vehicle">Upto 3 Axle Vehicle</option>
											<option value="Above 3 Axle Vehicle">Above 3 Axle Vehicle</option>
										</select>
									</div>
								</div>
								<span id="vechile_list_id">
								<div class="form-group">
									<label class="col-sm-4 control-label">Select Your Vehicle Number</label>
									<div class="col-sm-7">
										<?php
		$select_vechile_query="SELECT * FROM `vehicle_details2` WHERE `user_id`='".$user_detail_row['id']."'";
		$select_vechile_res=mysqli_query($con,$select_vechile_query);
		?>
		<select  class="form-control1" name="vehicle_number" required="">
		<option value="">------------>  Select Your Vehicle Number <-----------</option>
		<?php
		if($select_vechile_res->num_rows){
			while ($select_vechile_row=mysqli_fetch_assoc($select_vechile_res)) {
			?>
			<option value="<?php echo $select_vechile_row['vehicle_number']; ?>"><?php echo $select_vechile_row['vehicle_number']; ?></option>
			<?php	
			}
		
		}else{
		?>
		<option value="">Your Not Added Any Vehicle</option>
		<?php
		}
		?>


											
										</select>
									</div>
								</div>
								</span>

								<div class="form-group">
									<label class="col-sm-4 control-label">Select Your Travel Date</label>
									<div class="col-sm-7">
										<input type="text" id="datepicker" class="form-control" required="" name="journey_date">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label">No of Tolgate</label>
									<div class="col-sm-7">
									<span id="txtHint3">
										<input type="text" id="tolgate_number" class="form-control" disabled="" name="number-of-tolgate">

										<input type="hidden" id="tolgate_number" class="form-control" name="number-of-tolgate">

									</span>	
									</div>
								</div>

								<div class="form-group">
									<center>
										<input type="hidden" name="user_id" value="<?php echo $user_detail_row['id']; ?>">
										<input type="submit" name="pay" value="Click To Pay"  class="btn btn-primary">
									</center>
								</div>
								<br>
								<br>
								<br>
							</form>
						</div>
					</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		<!--footer-->
		
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
			function get_target(value) {
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            	}
        	};
        xmlhttp.open("GET", "get-target-location.php?q=" + value, true);
        xmlhttp.send();
			}

			function get_tolgate_count(){
				 e = document.getElementById("selector2");
				var value = e.options[e.selectedIndex].value;
				f = document.getElementById("selector1");
				var value2 = f.options[f.selectedIndex].value;
				if(value){
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            	}
        	};
        xmlhttp.open("GET", "get-tolgate-count.php?q=" + value+'&r='+value2, true);
        xmlhttp.send();
    }else{
    document.getElementById('tolgate_number').value='';
    }
				
			}


			function get_tolgate_count2(){
				 e = document.getElementById("selector2");
				var value = e.options[e.selectedIndex].value;
				f = document.getElementById("selector1");
				var value2 = f.options[f.selectedIndex].value;
				if(value){
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint3").innerHTML = this.responseText;
            	}
        	};
        xmlhttp.open("GET", "get-tolgate-count2.php?q=" + value+'&r='+value2, true);
        xmlhttp.send();
    }else{
    document.getElementById('tolgate_number').value='';
    }
				
			}



			function myfuction2(value) {
				var a=value;
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vechile_list_id").innerHTML = this.responseText;
            	}
        	};
        xmlhttp.open("GET", "get-tolgate-count.php?q=" + a+'&r='+<?php echo $user_detail_row['id']; ?>, true);
        xmlhttp.send();

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
$sources=$_POST['sources'];
$destination=$_POST['destination'];
$type_of_vechile=$_POST['type-of-vechile'];
$journey_date=$_POST['journey_date'];
$vehicle_number=$_POST['vehicle_number'];
$number_of_tolgate=$_POST['number-of-tolgate'];
$user_id=$_POST['user_id'];

$insert_query="INSERT INTO `travel_history`(`sources_location`, `destination_location`, `type_of_vechile`, `journey_date`, `no_of_tolgate`, `user_id`,`vehicle_number`) VALUES ('$sources','$destination','$type_of_vechile','$journey_date','$number_of_tolgate','$user_id','$vehicle_number')";

$insert_res=mysqli_query($con,$insert_query);
if($insert_res){
echo "<script>window.location ='payment.php';</script>";	
}else{
echo "<script>alert('Sorry Your User name or password is wrong');</script>";
}
}
?>