<?php
session_start();
$user = $_SESSION["username"];
$log = $_SESSION["admin"];
if ($log != "log"){
	header ("Location: login.php");
}
?>

<html>
<head>
<title>Task List(ADMIN)
</title>
</head>
<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image001.jpg" style='margin:0'>

<div style="top:20; left:270; position:absolute; z-index:1;">
<h1>Task Management System</h1>
</div>

<div style="top:150; left:20; position:absolute; z-index:1;">

<table>
<tr><td>
<a href = "admin.php"><img border = "none" src = "images/home.gif"></img></a>
</td></tr>

<tr><td>
<a href = "manage_user.php"><img border = "none" src = "images/manage.gif"></img></a>
</td></tr>

<tr><td>
<a href = "group_task.php"><img border = "none" src = "images/grouptask.gif"></img></a>
</td></tr>

<tr><td>
<a href = "messages.php"><img border = "none" src = "images/messages.gif"></img></a>
</td></tr>

<tr><td>
<a href = "about_login.php"><img border = "none" src = "images/about.gif"></img></a>
</td></tr>

<tr><td>
<a href = "index.php"><img border = "none" src = "images/logout.gif"></img></a>
</td></tr>
</table>
<div style="top:0; left:170; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>
</div>

</div>

<div style="top:150; left:250; position:absolute; z-index:1;">
<font face="Broadway" size = "6">Tasks:</font>
</div>

<div style="top:210px; left:250px; width:500px; height:320px; position:absolute; overflow:auto; z-index:1">
<table border = "2" width = "100%">
<tr>
	<th>Task</th>
	<th>Description</th>
	<th>Action</th>
</tr>
<?php
include "sql.php";

$SQL = "SELECT * FROM task_list ORDER BY taskname ASC";
$result = mysqli_query($conn, $SQL);
while ($db_field = mysqli_fetch_assoc($result)) {
	$a = $db_field['taskname'];
	$b = $db_field['ds'];
	print("<tr><td align = 'center'><b>$a</b></td>");
	if($b ==""){
		print("<td align = 'center'><b><font color = 'red'>no description</font></b></td>");
	}
	else{
		print("<td align = 'center'>$b</td>");
	}
	print("<td align = 'center' width = '70px'><a href = 'delete_task_list.php?key=".$a."'><img src = 'images/delete.jpg' border = '0' alt = 'add group task'></img></a>");
	print("<a href = 'edit_task_list.php?key=".$a."'><img src = 'images/edit.jpg' border = '0' alt = 'add group task'></img></a></td></tr>");
}
mysqli_close($conn);

?>
</table>
</div>


<div style="top:150; left:800; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>

<div style="top:50; left:10; position:absolute; z-index:1;">
<a href = "add_user.php"><img src = "images/adduser.gif" border = "0"></img></a>
</div>

<div style="top:100; left:10; position:absolute; z-index:1;">
<a href = "add_group.php"><img src = "images/addgroup.gif" border = "0"></img></a>
</div>

<div style="top:150; left:10; position:absolute; z-index:1;">
<a href = "add_task_list.php"><img src = "images/addtask.gif" border = "0"></img></a>
</div>

<div style="top:200; left:10; position:absolute; z-index:1;">
<a href = "view_group.php"><img src = "images/viewgroup.gif" border = "0"></img></a>
</div>

<div style="top:250; left:10; position:absolute; z-index:1;">
<a href = "task_list.php"><img src = "images/viewtask.gif" border = "0"></img></a>
</div>
</div>


</body>
</html>