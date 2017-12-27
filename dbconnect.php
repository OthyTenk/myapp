<?php
//connect to mysql database
//$con = mysqli_connect("localhost", "root", "", "myapp") or die("Error " . mysqli_error($con));
$con = mysqli_connect("localhost", "root", "", "myapp");

if (mysqli_connect_error()) {
  echo "ӨС-тай холбогдоход алдаа гарлаа: " . mysqli_connect_error();
}


function check_s($str){
  //removes backslashes
  $str = stripslashes($str);
  //escapes special characters in a string
  return $pwd = mysqli_real_escape_string($str);
}

?>
