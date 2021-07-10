<?php
session_start();

if($_SESSION)
{
$name=$_SESSION['mysession'];

include('../database.php');

$query="SELECT * FROM `user` WHERE `email`='$name';";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($res);


$billtable="SELECT * FROM ".$row['referances'];
$res2=mysqli_query($con,$billtable);

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
<link rel="stylesheet" href="css/menu_sideslide.css" type="text/css" media="all"><!--
 Navigation-CSS -->


<!-- meta tags -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->

<!-- js -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->

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
	<header>
		<div class="w3ls-header"><!--header-one--> 
			
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><?php  echo $row['name'];  ?></a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="../main-page.php" aria-expanded="false">Back </a>
					</li>
				</ul>
			</div>
			
			<div class="clearfix"> </div> 
		</div>

	</header>
	<!-- //header -->
	<!-- breadcrumbs -->
	
	<!-- //breadcrumbs -->
	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">
			
			
			<div class="ads-grid">
				<div class="side-bar col-md-3" style="border-left: 2px solid black;border-right:  2px solid black;border-top: 2px solid black;border-bottom:  2px solid black;">
					
				<div class="user-profile" >
                        
                        
                        <ul style="list-style-type: none">
                           <li ><a href="profile.php">Add Bill</a></li>
                        </ul>
                     </div>						
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
								<p style="float: right">
								<a id="btnAdd" class="btn btn-info btn-lg" onclick="adddays();"><i class="fa fa-plus" aria-hidden="true"></i>Add bill</a></p>
								<br>
								<br>
								<br>
								<form method="POST">

								<script type="text/javascript">
									function adddays()
									{
										var a=document.getElementsByName('name[]').length;
										a++;

										document.getElementById('TextBoxContainer').innerHTML +="<div id='"+a+"'><span>&nbsp;&nbsp;&nbsp;"+a+"&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='name[]'>&nbsp;&nbsp;&nbsp;&nbsp;<input type='date' name='date[]'>&nbsp;&nbsp;&nbsp;<input type='text' name='amount[]'>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' max='"+a+"'  onclick='remove(this.max);' value='Remove'></div>";
									}
									function remove(max)
									{
										var element = document.getElementById(max);
                                         element.parentNode.removeChild(element);
									}
								</script>
								<div> S.no &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Due date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount
									</div>
								<?php
								$i=1;

								while($row2=mysqli_fetch_assoc($res2))
								{
									?>
									<div id="<?php echo $i; ?>">
									<?php echo '<span>&nbsp;&nbsp;&nbsp;'.$i.'&nbsp;&nbsp;&nbsp;&nbsp;'?><input type="text" name="name[]" value="<?php echo $row2['Name']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" value="<?php  echo $row2['duedate']; ?>" name=date[];>&nbsp;&nbsp;&nbsp;<input type="text" value="<?php  echo $row2['amount']; ?>" name=amount[];>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' max='<?php echo $i;   ?>'  onclick='remove(this.max);' value='Remove'>
									</div>


									<?php
									$i++;
								}
								?>
								<div id="TextBoxContainer" style="margin-bottom: 21px;">
								</div>

								<input style="    background: #960992;
    border: bisque;" type="submit" name='updatetable' value='Update'>

								</form>
							<div class="clearfix"></div>
							
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
			
			<!-- start-smoth-scrolling -->
			
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</html>
<?php

}
else
{
	//echo "<script>alert('sorry you are not login please login');</script>";
	//echo "<script>window.location='index.php';</script>";
	header('location:index.php');

}
?>
<?php

if(isset($_POST['updatetable']))
{	
$resaon=$_POST['name'];
$duedate=$_POST['date'];
$amount=$_POST['amount'];
$tablename=$row['referances'];

$query2="TRUNCATE TABLE ".$tablename;
mysqli_query($con,$query2);
$i=0;
foreach ($resaon as $value) {
	$query3="INSERT INTO ".$tablename."(`Name`, `duedate`, `amount`) VALUES ('$value','$duedate[$i]','$amount[$i]')";
	mysqli_query($con,$query3);
	$i++;
}
echo "<script>
window.location = 'profile.php';
</script>";
}


?>
<style type="text/css">
	a
	{
	font-size: 13px;
	font-weight: bold;
	text-transform: capitalize;
	}
</style>