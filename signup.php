<?php
if(isset($_POST['submit']))
{

$name=$_POST['name'];
$email=$_POST['email'];
$user=$_POST['user'];
$mobilenumber=$_POST['mobilenumber'];
$address=$_POST['address'];
$password=$_POST['password'];
$dbc=mysqli_connect('localhost','root','','sadhiya') or die('error connecting to MySql server.');
$query="INSERT INTO signup VALUES ('$name', '$email', '$user', '$mobilenumber','$address', '$password')";

$result=mysqli_query($dbc, $query) or ('Error quering database.');
header('Location: Signin.html');
}
?>
