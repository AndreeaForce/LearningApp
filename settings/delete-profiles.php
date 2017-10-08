<?php

if (isset($_POST['profileId'])) {
    include '../includes/database.php';
    $msg = [];
    
    $sql = "DELETE FROM profile WHERE profile_id= '".$_POST['profileId']."'  LIMIT 1";
    
    if($sql === false) {
        echo "Error description: ". mysqli_error($conn);
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $msg['success'] = 1;
}
echo json_encode($row);

