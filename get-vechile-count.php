<?php
include 'admin/database.php';
session_start();
$get_target_location=$_GET['q'];
print_r($_SESSION);
?>

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
								