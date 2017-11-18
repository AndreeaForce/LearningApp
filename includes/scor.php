<?php
$msg = [];

if (isset($_POST['sendScor'])) {
include 'database.php';

$score = mysqli_real_escape_string($conn, $_POST["sendScor"]);
$childID = $_POST['childID'];
$gameID = $_POST['gameID'];


$sql = "INSERT INTO score (profile_id, game_id, score) VALUES ('$childID', '$gameID', '$score');";

$result = mysqli_query($conn, $sql);

//Error check query 
if(!$result) {
     echo("Error description: " . mysqli_error($conn));
}

    $msg['success'] = 1;

echo json_encode($msg);
}
?>