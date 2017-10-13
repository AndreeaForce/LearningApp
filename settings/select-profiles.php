<?php

if (isset($_POST['profileId'])) {
    include '../includes/database.php';
    
    $sql = "SELECT * FROM profile WHERE profile_id= '".$_POST['profileId']."'  LIMIT 1";

    if($sql === false) {
        echo "Error description: ". mysqli_error($conn);
    }
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); // {profile_id: "105", profile_name: "Piscot", .....
    $image = $row['profile_avatar'];
    $image_src = "images/".$image;
    
    echo json_encode($row); // Întoarce un șir JSON pentru valoarea (value) dată.
    }
?>