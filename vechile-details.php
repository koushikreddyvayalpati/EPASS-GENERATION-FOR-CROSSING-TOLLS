<?php
include 'admin/database.php';
session_start();
if($_SESSION){
$username=$_SESSION['mysession2'];
$user_detail_query="SELECT * FROM `users` WHERE `e_mail`='$username'";
$user_detail_res=mysqli_query($con,$user_detail_query);
$user_detail_row=mysqli_fetch_assoc($user_detail_res);
$user_detail_row_id=$user_detail_row['id'];

$overall_vehicle_query="SELECT * FROM `vehicle_details2` WHERE `user_id`='$user_detail_row_id'";
$overall_vehicle_res=mysqli_query($con,$overall_vehicle_query);

if(isset($_GET['id'])){
	$get_id=$_GET['id'];
	$delete_query="DELETE FROM `vehicle_details2` WHERE `id`='$get_id'";
	$delete_res=mysqli_query($con,$delete_query);
	if($delete_res){
		echo "<script>alert('Delete Sucessfully');
	window.location='vechile-details.php';
	</script>";
	}
	else{
		echo "<script>alert('Some Problem Accure');
	window.location='vechile-details.php';
	</script>";
	}
}

if(isset($_POST['update'])){
$vechile_name=$_POST['vechile_name'];
$vechile_name=str_replace("'", '', $vechile_name);
$vechile_number=$_POST['vechile_number'];
$vechile_number=str_replace("'", '', $vechile_number);
$type_of_vechile=$_POST['type-of-vechile'];
$insert_query="INSERT INTO `vehicle_details2`(`vehicle_name`, `vehicle_number`, `user_id`,`type-of-vechile`) VALUES ('$vechile_name','$vechile_number','$user_detail_row_id','$type_of_vechile')";
$insert_res=mysqli_query($con,$insert_query);
if($insert_res){
	echo "<script>alert('Update Sucessfully');
	window.location='vechile-details.php';
	</script>";
}else{
	echo "<script>alert('Vechile Number Already Exists');
	window.location='vechile-details.php';
	</script>";
}
}

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
						<h3 class="title1">Your Vehicle Details :</h3>
				
							<input type="button"  data-toggle="modal" data-target="#GSCCModal" class="btn btn-primary" value="Add New">
				
						<div class="form-three widget-shadow">
							<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>S.no</th> 
									<th>Vehicle Category</th> 
									<th>Vehicle Name</th> 
									<th>Vehicle Number</th> 
									<th>Edit</th> 
									<th>Delete</th> 
								</tr> 
							</thead> 
							<tbody>
							<?php
							$i=1;
							while ($overall_vehicle_row=mysqli_fetch_assoc($overall_vehicle_res)) {
							?>
							<tr>
								<td>
									<?php
									echo $i;
									?>
								</td>
								<td>
									<?php
									echo $overall_vehicle_row['type-of-vechile'];
									?>
								</td>
								<td>
									<?php
									echo $overall_vehicle_row['vehicle_name'];
									?>
								</td>
								<td>
									<?php
									echo $overall_vehicle_row['vehicle_number'];
									?>
								</td>
								<td>
								<a href="vechile-edit.php?id=<?php echo $overall_vehicle_row['id']; ?>">	<input type="button" name=""  class="btn btn-primary" value="Edit"></a>
									
								</td>
								<td>
									<a href="?id=<?php echo $overall_vehicle_row['id']; ?>"><input type="button" name="delete"  class="btn btn-danger" value="Delete" ></a>
									
								</td>
							</tr>
							<?php
							$i++;
							}
							?> 
								
							</tbody> 
						</table>
							

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
		.modal-footer{
		text-align: center;
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
$number_of_tolgate=$_POST['number-of-tolgate'];
$user_id=$_POST['user_id'];

$insert_query="INSERT INTO `travel_history`(`sources_location`, `destination_location`, `type_of_vechile`, `journey_date`, `no_of_tolgate`, `user_id`) VALUES ('$sources','$destination','$type_of_vechile','$journey_date','$number_of_tolgate','$user_id')";
$insert_res=mysqli_query($con,$insert_query);
if($insert_res){
echo "<script>window.location ='payment.php';</script>";	
}else{
echo "<script>alert('Sorry Your User name or password is wrong');</script>";
}
}
?>



<div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form method="POST">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
        <h4 class="modal-title" id="myModalLabel">Add New</h4>
      </div>
      <div class="modal-body">
      	<center>
      		<table>
      				<tr>
      				<td>
      								Select Your Vehicle Type
      				</td>
      				<td>
						
									
										<select  class="form-control1" name="type-of-vechile" required="">
											<option value="">Select Your Vehicle Type </option>
											<option value="Car">Car</option>
											<option value="Bus">Bus</option>
											<option value="Truck">Truck</option>
											<option value="Upto 3 Axle Vehicle">Upto 3 Axle Vehicle</option>
											<option value="Above 3 Axle Vehicle">Above 3 Axle Vehicle</option>
										</select>
				</td>					
      			</tr>
      			<tr>
      				<td>
      					<span>
        					Vehicle Name
        				</span>
      				</td>	
      				<td>
      					<span>
        		<input type="text" name="vechile_name" style="margin-bottom: 1em;" required="">
        				</span>
      				</td>		
      			</tr>
      		
      			<tr>
      				<td>
      					<span>
        					Vehicle Number
        				</span>
      				</td>	
      				<td>
      					<span>
        		<input type="text" name="vechile_number" required="">
        				</span>
      				</td>		
      			</tr>
      		</table>
       
        
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
      </div>
    </div>
  </div>
  </form>
</div>


<style type="text/css">
	@media only screen and (max-width: 1010px) and (min-width: 240px){
		.cbp-spmenu-push div#page-wrapper{
		padding: 4.5em 1em 2em ;
		}
	}
	td, th{
		 padding: 11px;
	}
</style>