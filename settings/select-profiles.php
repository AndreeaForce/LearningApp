<?php

if (isset($_POST['profileId'])) {
    include '../includes/database.php';
    
    $sql = "SELECT * FROM profile WHERE profile_id= '".$_POST['profileId']."'  LIMIT 1";

    if($sql === false) {
        echo "Error description: ". mysqli_error($conn);
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $image = $row['profile_avatar'];
    $image_src = "images/".$image;
    }
    echo json_encode($row);

?>