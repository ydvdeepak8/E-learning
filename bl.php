<?php
$con=mysqli_connect("localhost","root","","tesst");
if(!$con)
{
	die("could not connect to database".mysql_error());
}



if(isset($_POST['submit']))
{
	$username=$_POST['name'];
	$password=$_POST['password'];

$sql="select*from details where name='$username' and password='$password'";
$que1=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($que1);
if (mysqli_num_rows($que1)>0) 
{
	echo "<script>alert('Login Successfull')</script>";
	echo"<script>window.open('signup.html','_self')</script>"; 


}
else{
	echo"<script>alert('invalid Username or Password')</script>";
	echo"<script>window.open('login.html','_self')</script>";
}
}
?>