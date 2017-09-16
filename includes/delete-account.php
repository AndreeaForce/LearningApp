<?php
session_start();

//include_once ($_SERVER['DOCUMENT_ROOT']."header.php");
include_once ($_SERVER['DOCUMENT_ROOT']."includes/database.php");

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM loginsystem WHERE id='$id'";
    die("Failed".mysqli_error()) or $result = mysqli_query($sql);
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
