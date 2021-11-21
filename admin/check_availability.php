<?php 
require_once("includes/config.php");
// code for empid availablity
if(!empty($_POST["empcode"])) {
	$empid=$_POST["empcode"];
	
$sql ="SELECT EmpId FROM tblemployees WHERE EmpId=:empid";
$query= $dbh->prepare($sql);
$query-> bindParam(':empid',$empid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
echo "<span style='color:red'> معرف الموظف موجود بالفعل .</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'> معرف الموظف متاح للتسجيل .</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}

// code for emailid availablity
if(!empty($_POST["emailid"])) {
$empid= $_POST["emailid"];
$sql ="SELECT EmailId FROM tblemployees WHERE EmailId=:emailid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':emailid',$empid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'>معرف البريد الإلكتروني موجود بالفعل.</span>";
 echo "<script>$('#add').prop('disabled',true);</script>";
} else{
	
echo "<span style='color:green'>معرف البريد الإلكتروني متاح للتسجيل.</span>";
echo "<script>$('#add').prop('disabled',false);</script>";
}
}




?>
