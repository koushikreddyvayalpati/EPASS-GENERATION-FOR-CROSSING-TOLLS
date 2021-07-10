<?php
include '../admin/database.php';
session_start();
$get_target_location=$_GET['q'];

$select_query="SELECT * FROM `travel_history` WHERE `id`='$get_target_location'";
$select_res=mysqli_query($con,$select_query);
$select_row=mysqli_fetch_assoc($select_res);

$sources_location=$select_row['sources_location'];
$destination_location=$select_row['destination_location'];

$overall_togate_id="SELECT * FROM `tolgate_list` WHERE `sources`='$sources_location' AND `destination`='$destination_location'";
$overall_togate_id_res=mysqli_query($con,$overall_togate_id);
$overall_togate_id_row=mysqli_fetch_assoc($overall_togate_id_res);
$overall_togate_id_row_id=$overall_togate_id_row['id'];

$overall_togate_id_row_list_count=$overall_togate_id_row['no_of_tolgate'];

$overall_togate_list_id=$overall_togate_id_row['id'];

$check_tolgate_count="SELECT * FROM `travel_distances` WHERE `payment_id`='$get_target_location'";
$check_tolgate_count_res=mysqli_query($con,$check_tolgate_count);
$count_total_row=$check_tolgate_count_res->num_rows;



if($overall_togate_id_row_list_count>$count_total_row){
$count_total_row=$count_total_row+1;

$travel_id_query="SELECT * FROM `tolgate_detail` WHERE `tolgate_list_id`='$overall_togate_list_id' LIMIT $count_total_row " ;

$travel_id_res=mysqli_query($con,$travel_id_query);

while ($travel_id_row=mysqli_fetch_assoc($travel_id_res)) {
	$tolgate_name=$travel_id_row['tolgate_name'];
}

$insert_tolgate_query="INSERT INTO `travel_distances`(`tolgate_name`, `tolgate_id`, `payment_id`) VALUES ('$tolgate_name','$overall_togate_list_id','$get_target_location')";
$insert_tolgate_res=mysqli_query($con,$insert_tolgate_query);

echo "Your Are Travelled".$tolgate_name;
}
else{
echo "Your Are Travelled All Tolgate";	
}

?>