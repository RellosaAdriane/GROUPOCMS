<?php
include('dbcon.php');
if (isset($_POST['delete_content'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM school_year where school_year_id='$id[$i]'");
}
header("location: school_year.php");
}
?>