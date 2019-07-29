<?php
session_start();
$user = $_SESSION["username"];
$log = $_SESSION["admin"];
if ($log != "log"){
	header ("Location: login.php");
}

$taskkey = $_REQUEST['key'];
$tsk = $_REQUEST['key'];
include "sql.php";

$SQL = "DROP TABLE $tsk";
mysqli_query($conn, $SQL);

$SQL = "DELETE FROM task_list WHERE taskname = '$taskkey'";
mysqli_query($conn, $SQL);


$SQL = "SELECT * FROM info WHERE group_task = '$taskkey'";
$result = mysqli_query($conn, $SQL);
while ($db_field = mysqli_fetch_assoc($result)) {
	$grp = $db_field['groups'];
	$SQL = "UPDATE info SET individ_task = '' WHERE groups = '$grp'";
	mysqli_query($conn, $SQL);
	
	$SQL = "UPDATE info SET task_status_indi = '' WHERE groups = '$grp'";
	mysqli_query($conn, $SQL);
}


$SQL = "SELECT * FROM info WHERE group_task = '$taskkey'";
$result = mysqli_query($conn, $SQL);
while ($db_field = mysqli_fetch_assoc($result)) {
	$unem = $db_field['username'];
	$SQL = "UPDATE info SET group_task = '' WHERE username = '$unem'";
	mysqli_query($conn, $SQL);
}

mysqli_close($conn);
print "<script>location.href = 'task_list.php'</script>";
?>