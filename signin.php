<?php
$dbc=mysqli_connect('localhost','root','','sadhiya') or die('error connecting to MySql server.');
$username= $_POST['username'];
$password= $_POST['password'];
$query= "SELECT * from signin where username='$username'";
$result = mysqli_query($dbc,$query) or die ('error querying database.');
$row = mysqli_fetch_array($result);
if($row['username']== $username && $row['password']==$password)
    header('location: home.html');
else{
echo"error you have entered a wrong username or password"."<br>";
}
echo"<br/>";
mysqli_close($dbc);
?>
