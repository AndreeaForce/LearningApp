<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    session_start();
}
if (isset($_SESSION['u_id'])) {
    
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "1234";
    $dbName = "loginsystem";
    
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $table = '<div class="profiles-add slide">
                            <a ><i class="flaticon-cross" aria-hidden="true"></i></a>
                        </div>';
    $msg = [];
    
    $sql = "select * from profile where user_id='" . $_SESSION['u_id'] . "'";
    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0) {
        //output data of each row
        while($row = mysqli_fetch_array($result)) {
            $image = $row['profile_avatar'];
            $image_src = "images/".$image;
            $profileId = $row['profile_id'];
            $profileName = $row["profile_name"];
            $table .='
                <div data-id="'.$profileId.'" class="table table-avatar slide">
                        <div class="profile-avatar">
                            
                            <span class="profile-name">'.$profileName .'</span>
                            <div class="action-btns">
                                <a id="'. $profileId .'" class=" button--edit-profile"><img src="img/edit1.png" class="" aria-hidden="true"></a>
     
                                <a id="'. $profileId .'" class="button--delete-profile"><img src="img/delete1.png" class="" aria-hidden="true"></a>
     
                             </div>
                             <div class="overlay"></div>
                             <img class="profiles-min__img" src="'. $image_src .'" >
                        </div>     
                    </div>    
            ';   
            
        }
    }
 
    $msg['success'] = 1;
    $msg['data'] = $table;
    
} else {
    $msg['error'] = 0;
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    echo json_encode($msg);
}

?>