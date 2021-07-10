
<?php

?>

<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				
				<!--toggle button end-->
				<!--logo -->
				<div class="logo">
					<a href="dashboard.php">
						<h1>Welcome</h1>
						<span>Tolgate</span>
					</a>
				</div>
				<!--//logo-->
				<!--search-box-->

			</div>
			<div class="header-right">
				
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.png" alt=""> </span> 
									<div class="user-name">
										<p><?php echo $user_detail_row['first_name']; ?></p>
										<span>User</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="payment-history.php"><i class="fa fa-cog"></i> Travel History</a> </li> 
								<li> <a href="vechile-details.php"><i class="fa fa-cog"></i> Vehicle Details</a> </li> 
								<li> <a href="profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
								<li> <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>