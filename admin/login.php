<?php

include('database.php');

if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query2="SELECT * FROM `admin` WHERE `username`='$email' and `password`='$password';";
	$res2=mysqli_query($con,$query2);
	if($res2->num_rows)
	{
		session_start();
		$_SESSION['mysession']=$email;
		header('location:all-classifieds.php');

	}
	else
	{
		echo "<script>alert('Sorry Your User name or password is wrong');
		window.location = 'index.php';
		</script>";
	}


}
?>
<a href="<a href="https://www.w3schools.com">Visit W3Schools.com!</a>">home</a>