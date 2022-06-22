<?php 
require_once("includes/config.php");
// Check Availabilty for user mobile number
if(!empty($_POST["mobnumber"])) {
	$mnumber= $_POST["mobnumber"];

		$result =mysqli_query($con,"select id from tblpatients where MobileNumber='$mnumber'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Số điện thoại đã tồn tại. Vui lòng thử với một số điện thoại khác hoặc nhấp vào đây <a href='registered-user-testing.php'>Registered Users</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Có sẵn số điện thoại để đăng ký.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


// Check Availabilty for Phlebotomist employee id
if(!empty($_POST["employeeid"])) {
	$empid= $_POST["employeeid"];

		$result =mysqli_query($con,"select id from tblphlebotomist where EmpID='$empid'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> ID Kỹ thuật viên đã tồn tại. Vui lòng thử với một ID kỹ thuật viên khác.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> ID kỹ thuật viên có sẵn để đăng ký.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
