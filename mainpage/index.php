<?php
include '../admin/database.php';
$sql_query="SELECT * FROM `tolgate_list` GROUP BY `sources`";
$sql_res=mysqli_query($con,$sql_query);

if(isset($_POST['search'])){

$sources=$_POST['sources'];
$destination=$_POST['destination'];

$tolgate_list="SELECT * FROM `tolgate_list` WHERE `sources`='$sources' AND `destination`='$destination'";
$tolgate_list_res=mysqli_query($con,$tolgate_list);

$tolgate_list_row=mysqli_fetch_assoc($tolgate_list_res);

$overall_tolgate="SELECT * FROM `tolgate_detail` WHERE `tolgate_list_id`='".$tolgate_list_row['id']."' LIMIT ".$tolgate_list_row['no_of_tolgate']." ";
$overall_tolgate_res=mysqli_query($con,$overall_tolgate);

}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>E-PASS GENERATION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Vagabond Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	  <!-- grid hover -->
    <link href="css/hover.css" type="text/css" rel="stylesheet" media="all">
	<!-- Testimonials-Css -->
	<link href="css/mislider.css" rel="stylesheet" type="text/css" />
	<link href="css/mislider-custom.css" rel="stylesheet" type="text/css" />
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
	<!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>
    <!-- banner -->
    <div class="banner">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
                <h1>
                    <a class="navbar-brand text-white" href="index.html">
                      Tollgate Management System
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center">
                       
                      
						<li class="nav-item  mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="../">Login</a>
                        </li>
                     
                        <li class="nav-item mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="../admin/">Admin</a>
                        </li>
                    </ul>
                </div>
			</nav>
        </header>
        <!-- //header -->
        <div class="container">
            <!-- banner-text -->
            <div class="banner-text">
                <div class="slider-info">
                    <h3>MAKE YOUR PERFECT JOURNEY</h3>
				</div>
            </div>
            <form method="POST">
			<div class="banner-top pb-5">
                <div class="row slider-bottom">
                    <div class="col-md-3 slider-bottom-lft">
						<h4>Search Now</h4>
						<p class="text-white mt-2">Search here to know the toll gate details for destination</p>
					</div>
					 <div class="col-md-9 n-right-w3ls">
						<div class="row">
							<div class="col-md-4 form-group news-rt">
								<select name="sources" id="selector1" class="form-control" required="" onchange="get_target(this.value);" onblur="get_tolgate_count();">
									<option value="" selected disabled="">
										Select Your Sources Location
									</option>
									<?php
										while ($sql_row=mysqli_fetch_assoc($sql_res)) {
										?>
										<option value="<?php echo $sql_row['sources']; ?>"><?php echo $sql_row['sources']; ?></option>
										<?php	
										}
										?>
								</select>
								
							</div>
							<div class="col-md-4 form-group news-lt">
								<span id="txtHint">
								<select name="destination" id="selector2" class="form-control" required="" onchange="get_tolgate_count()">
									<option value="" selected disabled="">Select Your Target Location</option>
									</select>
									</span>
							</div>
							<div class="col-md-4 form-group news-last">
								<div class="sbm-it">
									<div class="form-group">
										<input class="form-control submit text-uppercase" name="search" type="submit" value="Search">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            </form>
        </div>
    </div>
	 <!-- //banner-text -->
	
    <!-- //stats -->
	 <!-- services -->
	<!-- //testimonials -->

<!-- video and events -->
<?php
if(isset($overall_tolgate_res->num_rows)){
?>
	<div class="video-choose-agile py-lg-5">
		<div class="container py-5">
			<div class="title-section pb-sm-5 pb-3">
				<h3 class="heading-agileinfo text-center pb-4">Tolgate <span>List</span></h3>
			</div>
			<div class="row">
				<?php
				$date=date('d');
				$days=date('M');

				while ($overall_tolgate_row=mysqli_fetch_assoc($overall_tolgate_res)) {
					//print_r($overall_tolgate_row);
				?>
				<div class="col-lg-4 col-sm-12 events">
					<div class="events-w3ls">
						<div class="d-flex">
							<div class="col-sm-2 col-3 events-up p-2 text-center">
								<h5 class="text-white font-weight-bold"><?php echo $date; ?>
									<span class="border-top font-weight-light pt-2 mt-2"><?php echo $days; ?></span>
								</h5>
							</div>
							<div class="col-sm-10 col-9 events-right">
								<h4 class="text-dark"><?php echo $overall_tolgate_row['tolgate_name']; ?> </h4>
								<ul class="list-unstyled">
									<li>
									<i class="fas fa-map-marker mr-2">&nbsp;&nbsp;<?php echo $overall_tolgate_row['tolgate_address']; ?></i></li>

									<li>
										
								</ul>
							</div>
						</div>
					</div>
					<div class="d-flex my-4">
						
						<div class="col-sm-10 col-9 events-right">
							<h4 class="text-dark">Car Fare </h4>
							<ul class="list-unstyled">
								<li class="my-2">
									<i class="far fa-clock mr-2"></i>&nbsp;&nbsp;<?php echo $overall_tolgate_row['car']; ?>&nbsp;&nbsp;Rs</li>
								
							</ul>
						</div>
					</div>
					<div class="d-flex my-4">
						
						<div class="col-sm-10 col-9 events-right">
							<h4 class="text-dark">Bus Fare </h4>
							<ul class="list-unstyled">
								<li class="my-2">
									<i class="far fa-clock mr-2"></i>&nbsp;&nbsp;<?php echo $overall_tolgate_row['car']; ?>&nbsp;&nbsp;Rs</li>
								
							</ul>
						</div>
					</div>
					<div class="d-flex my-4">
						
						<div class="col-sm-10 col-9 events-right">
							<h4 class="text-dark">Truck Fare </h4>
							<ul class="list-unstyled">
								<li class="my-2">
									<i class="far fa-clock mr-2"></i>&nbsp;&nbsp;<?php echo $overall_tolgate_row['car']; ?>&nbsp;&nbsp;Rs</li>
								
							</ul>
						</div>
					</div>
					
					<div class="d-flex my-4">
						
						<div class="col-sm-10 col-9 events-right">
							<h4 class="text-dark">Upto 3 Axile Fare </h4>
							<ul class="list-unstyled">
								<li class="my-2">
									<i class="far fa-clock mr-2"></i>&nbsp;&nbsp;<?php echo $overall_tolgate_row['Upto_3_Axle_Vehicle']; ?>&nbsp;&nbsp;Rs</li>
								
							</ul>
						</div>
					</div>
					
					<div class="d-flex my-4">
						
						<div class="col-sm-10 col-9 events-right">
							<h4 class="text-dark">Above 3 Axile Fare </h4>
							<ul class="list-unstyled">
								<li class="my-2">
									<i class="far fa-clock mr-2"></i>&nbsp;&nbsp;<?php echo $overall_tolgate_row['above_3_axle_vehile']; ?>&nbsp;&nbsp;Rs</li>
								
							</ul>
						</div>
					</div>
				</div>
				<?php	
				}
				?>
				
				
			</div>
		</div>
	</div>
	<?php
	}
	?>
	<!-- //video and events -->
<!--footer-->
	<footer>
		<div class="container py-md-4 mt-md-3">
			<div class="row footer-top-w3layouts-agile py-5">
				<div class="col-md-4 footer-grid">
					<div class="footer-title">
						<h3>About Us</h3>
					</div>
					<div class="footer-text">
						<p>We generate e pass for crossing tolls on highways for various vehicles</p>
					</div>
				</div>
				<div class="col-md-4 footer-grid">
					<div class="footer-title">
						<h3>Contact Us</h3>
					</div>
					<div class="contact-info">
					<h4>Location :</h4>
					<p>M-BLOCK 305, VIT UNIVERSITY,VELLORE.</p>
					<div class="phone">
						<h4>Phone :</h4>
						<p>Phone : +121 098 8907 9987</p>
						<p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
					</div>
				</div>
				</div>
				<div class="col-md-4 footer-grid">
					<div class="footer-title">
						<h3>Recent Posts</h3>
					</div>
					<div class="footer-list">
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g1.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g2.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g3.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g4.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g5.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g6.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g7.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g9.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="flickr-grid">
							<a href="#" data-toggle="modal" data-target="#myModal">
								<img src="images/g8.jpg" class="img-fluid" alt=" ">
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		</div>
	</footer>
	<!---->
	<div class="copyright py-3">
		<div class="container">
			<div class="copyrighttop">
				<ul>
					<li>
						<h4>Follow us on:</h4>
					</li>
					<li>
						<a class="facebook" href="#">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li>
						<a class="facebook" href="#">
							<i class="fab fa-twitter"></i>
						</a>
					</li>
					<li>
						<a class="facebook" href="#">
							<i class="fab fa-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a class="facebook" href="#">
							<i class="fab fa-pinterest-p"></i>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
<!-- //footer -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Toll plaza</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		 <div class="agileits-w3layouts-info">
			<img src="images/g6.jpg" class="img-fluid" alt="" />
			<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- //Modal -->

<!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!-- testimonial-plugin -->
	<script src="js/mislider.js"></script>
	<script>
		jQuery(function ($) {
			var slider = $('.mis-stage').miSlider({
				//  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
				stageHeight: 320,
				//  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
				slidesOnStage: false,
				//  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
				slidePosition: 'center',
				//  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
				slideStart: 'mid',
				//  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
				slideScaling: 150,
				//  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
				offsetV: -5,
				//  Center slide contents vertically - Boolean. Default: false
				centerV: true,
				//  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
				navButtonsOpacity: 1,
			});
		});
	</script>
	<!-- //testimonial-plugin -->
	<script src="js/counter.js"></script>
    <!-- //stats -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>

</html>
<style type="text/css">
	select.form-control:not([size]):not([multiple]){
		height: calc(2.25rem + 16px);
	}
	.n-right-w3ls .form-group .form-control{
	color: #f3f3f3;
    background-color: #91c5bb;
	}
	.mt-md-3, .my-md-3{
	margin-top: 0rem !important;
	}
	.slider-info h3{
	color: #b70707;
	}
</style>

<script type="text/javascript">
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
</script>
