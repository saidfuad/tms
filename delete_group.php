<?php
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: login.php");
}

$groupkey = $_REQUEST['key'];
include "sql.php";

$SQL = "UPDATE info SET groups = '' WHERE groups = '$groupkey'";
mysqli_query($conn, $SQL);
	
$SQL = "DELETE FROM group_title WHERE group_name = '$groupkey'";
mysqli_query($conn, $SQL);

mysqli_close($conn);
print "<script>location.href = 'view_group.php'</script>";
?>