
<?php
session_start();

include('database.php');

if(isset($_GET['delete_id']))
{
$delete_id=$_GET['delete_id'];
$overall_id=$_GET['id'];
$overall_limit=$_GET['limit'];
$url='id='.$overall_id.'&limit='.$overall_limit;
$delete_query="DELETE FROM `tolgate_detail` WHERE `id`='$delete_id'";
$delete_query_res=mysqli_query($con,$delete_query);
if($delete_query_res){
echo "<script>alert('Deleted Sucessfully');</script>";
echo "<script>window.location='add-tolgate_detail.php?$url';</script>";
}else{
echo "<script>alert('sorry Some Problem is Accure');</script>";
echo "<script>window.location='add-tolgate_detail.php?$url';</script>";
}
}
?>