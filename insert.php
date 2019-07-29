<html>
<body>
<?php
$con = mysql_connect("localhost","root","","tms");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("tms", $con);

 
$sql="INSERT INTO user_profile (`email`, `username`, `password`, 'groups','position',`fname`, `lname`, )
VALUES
('$eadd', '$unem', '$pword', '$groups','$position','$fnem', '$lnem', )";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
header('location:file_uploading/index.php');
 
mysql_close($con)
?>
</body>
</html>
 