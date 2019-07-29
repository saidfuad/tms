<?php
session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: login.php");
}

$ctrl = $_REQUEST['key'];
include "sql.php";

$SQL = "DELETE FROM sent_items WHERE ctrl_no = '$ctrl'";
mysqli_query($conn, $SQL);
mysqli_close($conn);

print "<script>location.href = 'sent_items.php'</script>";
?>