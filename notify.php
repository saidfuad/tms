<?php
session_start();
$user = $_SESSION["username"];
$log = $_SESSION["admin"];
if ($log != "log"){
	header ("Location: login.php");
}

$namekey = $_REQUEST['key'];
include "sql.php";

$notmsg = "Administrator assigned you to be a leader. Go to TASK to know your task.";
$sub = "notification";
$SQL = "INSERT INTO messaging (to_receiver, from_sender, opened, mail_subject, message) VALUES ('$namekey', '$user', 0,' $sub', '$notmsg')";
mysqli_query($conn, $SQL);

$SQL = "INSERT INTO sent_items (to_receiver, from_sender, opened, mail_subject, message) VALUES ('$namekey', '$user', 0,' $sub', '$notmsg')";
mysqli_query($conn, $SQL);


mysqli_close($conn);
print "<script>location.href = 'group_task.php'</script>";
?>