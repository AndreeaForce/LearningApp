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
    $table = "";
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
                <table class="table table-avatar slide">
                        <tbody id="userData">
                            <tr>
                           
                                <td>
                                    <div class="profile-avatar">
                                        <img class="profiles-min__img" src="'. $image_src .'" >
                                        <div class="overlay"></div>
                                    </div>
                                </td>
                         
                                <td class="profile-name__td--absolute">'. $profileName .'</td>
                     
                                <td class="profile-edit__td--absolute">
                                    <a id="'. $profileId .'" class=" button--edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    
                                     <a id="'. $profileId .'" class="button--delete-profile"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                  
                                </td>
                           </tr>
                        </tbody>
                    </table>    
            ';   
            json_encode($row);
        }
    }
 
    $msg['success'] = 1;
    
} else {
    $msg['error'] = 0;
}

echo json_encode($msg);

?>