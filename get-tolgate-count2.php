<?php
include 'admin/database.php';
session_start();
$sources=$_GET['q'];
$destination=$_GET['r'];

$tolgate_query="SELECT * FROM `tolgate_list` WHERE `sources`='$destination' AND `destination`='$sources'";
$tolgate_res=mysqli_query($con,$tolgate_query);
$tolgate_row=mysqli_fetch_assoc($tolgate_res);

?>

<span id="txtHint3">
										<input type="text" id="tolgate_number" class="form-control" disabled="" name="number-of-tolgate" value="<?php echo $tolgate_row['no_of_tolgate']; ?>">

										<input type="hidden" id="tolgate_number" class="form-control" name="number-of-tolgate" value="<?php echo $tolgate_row['no_of_tolgate']; ?>">

									</span>	

