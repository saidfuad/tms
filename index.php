<?php
session_start();
session_destroy();
?>

<html>
<head>
<title>Home
</title>
</head>
<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image001.jpg" style='margin:0'>

<div style="top:20; left:270; position:absolute; z-index:1;">
<h1>Task Management System</h1>
</div>

<div style="top:150; left:20; position:absolute; z-index:1;">

<table>
<tr><td>
<a href = "index.php"><img border = "none" src = "images/home.gif"></img></a>
</td></tr>

<tr><td>
<a href = "about.php"><img border = "none" src = "images/about.gif"></img></a>
</td></tr>
</table>
<div style="top:0; left:170; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>
</div>

</div>


<div style="top:220; left:370; position:absolute; z-index:1;">
<form name='login_form' method='post' action='login.php'>
	<b>
	<font face = "times new roman" size = "3">
	<div style="top:0; left:0; width:250px; position:absolute; z-index:1;">
	Username:<input name = 'uname' type = 'text' value = ''>
	</div>
	<div style="top:30; left:0; width:250px; position:absolute; z-index:1;">
	Password:<input name = 'pword' type = 'password' value = ''>
	</div>
	<div style="top:70; left:165; position:absolute; z-index:1;">
	<input name = 'login' type = 'submit' value = 'Login'>
	</div>
	</font>
	</b>
</form>
</div>

<div style="top:150; left:800; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>



<!-- o register contact admin ,signup disabled for security reason -->

</div>



</body>
</html>