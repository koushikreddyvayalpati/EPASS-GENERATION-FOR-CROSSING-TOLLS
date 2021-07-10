<?php
include 'admin/database.php';
session_start();
$get_target_location=$_GET['q'];
$target_query="SELECT * FROM `tolgate_list` WHERE `sources`='$get_target_location' GROUP BY `destination`";
$target_res=mysqli_query($con,$target_query);
?>
<select name="destination" class="form-control1" id="selector2" required="" onchange="get_tolgate_count2()">
										<option value="" selected disabled="">------------>  Select Your Target Location <-----------</option>
										<?php
										while ($target_row=mysqli_fetch_assoc($target_res)) {
										?>
										<option value="<?php echo $target_row['destination']; ?>"><?php echo $target_row['destination']; ?></option>
										<?php	
										}
										?>
									</select>
<?php
?>