<?php
$con=mysqli_connect("localhost","root","","tesst");
if(!$con)
{
	die("could not connect to database".mysql_error());
}
if(isset($_POST['submit']))
{
	$name=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
}
$sql="insert into details(name,password,email)values('$name','$password','$email')";
if (mysqli_query($con,$sql)) 
{
	echo "new record inserted successfully";
	echo"<script>window.open('tt.html','_self')</script>"; 
}
else{
	echo"error".mysqli_error($con);

}
?>