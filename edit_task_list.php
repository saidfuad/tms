<?php
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: login.php");
}

function quote_smart($value, $handle) {
	include "sql.php";
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   if (!is_numeric($value)) {
      // $value = "'" . mysql_real_escape_string($value, $handle) . "'";
	  $value = mysqli_real_escape_string($conn, $value);
   }
   return $value;
}

$msg = "";

if (isset($_POST['cancel'])) {
	print("<script>location.href = 'task_list.php'</script>");
}
else if (isset($_POST['change'])) {
include "sql.php";

	$task = $_POST['tasknem'];
	$des = $_POST['des'];
		
	//unwanted HTML (scripting attacks)
	$task = htmlspecialchars($task);
	
		
	//function
	$task = quote_smart($task, $conn);
	
	
	$SQL = "UPDATE task_list SET ds = '$des' WHERE taskname = '$task'";
	$result = mysqli_query($conn, $SQL);
	if($result){
		mysqli_close($conn);
		$msg = "Changes has been saved.";
	}
	else{
		mysqli_close($conn);
		$msg = "Error saving acccount.";
	}
	print("<div style='top:260; left:550; position:absolute; z-index:1;'>");
	print("<form name='ok_form' method='post' action='task_list.php'>");
	print("<input name = 'ok' type = 'submit' value = 'OK'>");
	print("</div>");
}
else{
	$taskkey = $_REQUEST['key'];
	include "sql.php";

	$SQL = "SELECT * FROM task_list WHERE taskname = '$taskkey'";
	$result = mysqli_query($conn, $SQL);
	while ($db_field = mysqli_fetch_assoc($result)) {
		$task = $db_field['taskname'];
		$des = $db_field['ds'];
	}
	mysqli_close($conn);
	
	print("<div style='top:150; left:250; position:absolute; z-index:1;'>");
	print("<font face='Broadway' size = '6'>Edit user:</font>");
	print("</div>");
	print("<div style='top:220; left:350; position:absolute; z-index:1;'>");
	print("<form name='edit_form' method='post' action='edit_task_list.php'>");
	print("<table border = '0' >");
	print("<tr><td><b>Task:</b></td>");
	print("<td><input name = 'tasknem' type = 'text' value = '$task' readonly = 'true'></td>");
	print("</tr>");
	print("<tr><td><b>Description:</b></td>");
	print("<td><textarea name = 'des'>$des</textarea>");
	print("</tr>");
	print("<tr>");
	print("<td align = 'right'><input name = 'reset' type = 'reset' value = 'reset'></td>");
	print("<td><input name = 'cancel' type = 'submit' value = 'CANCEL'>");
	print("<input name = 'change' type = 'submit' value = 'CHANGE'></td>");
	print("</tr>");
	print("</table>");
	print("</form>");
	print("</div>");
}


?>

<html>
<head>
<title>ADMIN(edit_task)
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

<div style="top:200; left:300; position:absolute; z-index:1;">
<font face="Cooper Black" size = "5" color = "blue"><?php print $msg; ?></font>
</div>

</body>
</html>