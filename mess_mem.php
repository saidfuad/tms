<?php
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['member'];
if ($log != "log"){
	header ("Location: login.php");
}
?>

<html>
<head>
<title>Message(Member)
</title>
</head>
<body link="#0066FF" vlink="#6633CC" bgcolor="#FFFFCC" background="images/image001.jpg" style='margin:0'>

<div style="top:20; left:270; position:absolute; z-index:1;">
<h1>Task Management System</h1>
</div>

<div style="top:150; left:20; position:absolute; z-index:1;">

<table>
<tr><td>
<a href = "member.php"><img border = "none" src = "images/home.gif"></img></a>
</td></tr>

<tr><td>
<a href = "task_mem.php"><img border = "none" src = "images/task.gif"></img></a>
</td></tr>

<tr><td>
<a href = "mess_mem.php"><img border = "none" src = "images/messages.gif"></img></a>
</td></tr>

<tr><td>
<a href = "about_mem.php"><img border = "none" src = "images/about.gif"></img></a>
</td>

<tr><td>
<a href = "index.php"><img border = "none" src = "images/logout.gif"></img></a>
</td></tr>

</table>

<div style="top:0; left:170; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>
</div>

</div>

<div style="top:150; left:250; position:absolute; z-index:1;">
<font face="Broadway" size = "6">Message:</font>
</div>

<?php
include 'sql.php';

$SQL = "SELECT count( * ) as total_record  FROM messaging WHERE to_receiver = '$user'";
$result = mysql_query($SQL);
while ($db_field = mysql_fetch_assoc($result)) {
	$a = $db_field['total_record'];
}

$SQL = "SELECT count( * ) as total_record  FROM sent_items WHERE from_sender = '$user'";
$result = mysql_query($SQL);
while ($db_field = mysql_fetch_assoc($result)) {
	$b = $db_field['total_record'];
}
?>

<div style="top:240px; left:270px; width:500px; height:320px; position:absolute; overflow:auto; z-index:1">
<?php print $a; ?> <b>Inbox</b><br>
<?php print $b; ?> <b>Sent Items</b><br>
</div>

<div style="top:150; left:800; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>

<div style="top:50; left:10; position:absolute; z-index:1;">
<a href = "com_mes_mem.php"><img src = "images/compose.gif" border = "0"></img></a>
</div>

<div style="top:100; left:10; position:absolute; z-index:1;">
<a href = "inboxm.php"><img src = "images/inbox.gif" border = "0"></img></a>
</div>

<div style="top:150; left:10; position:absolute; z-index:1;">
<a href = "sent_itemsm.php"><img src = "images/sentitems.gif" border = "0"></img></a>
</div>

</div>

<div style="top:150; left:800; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>

<div style="top:50; left:10; position:absolute; z-index:1;">
<a href = "com_mes_mem.php"><img src = "images/compose.gif" border = "0"></img></a>
</div>


</body>
</html>