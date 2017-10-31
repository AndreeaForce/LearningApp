
<?php

include 'database.php';

if($_GET['id']) {

$id = $_GET['id']; 
    
$sql = "SELECT * FROM profile WHERE profile_id= '$id' ";

if($sql === false) {
    echo "Error description: ". mysqli_error($conn);
}

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result); 
$profileGender = $row['profile_gender'];
$profileStrong = $row['profile_strong'];
$profileWeak = $row['profile_weak'];
$profileLikes = $row['profile_likes'];
$profileDislikes = $row['profile_dislikes'];

$table ="";
 
if ( $profileStrong === "StrongPoint1" && $profileWeak === "WeakPoint1" && $profileLikes === "Likes1" && $profileDislikes === "Dislikes1" )  {
    $table = "
    <h1 class='games__h1'>This is all option 1</h1>
    <a href='game1/game1.html'><img class='games__img' src='img/Apps-Comix-icon.png'></a>
    <a href='game2.html'><img class='games__img' src='img/Apps-Corebird-icon.png'></a>";
} elseif ( $profileStrong === "StrongPoint2" && $profileWeak === "WeakPoint2" && $profileLikes === "Likes2" && $profileDislikes === "Dislikes2" )  {
    $table = "
    <h1 class='games__h1'>This is all option 2</h1>
    <a href='game1/game1.html'><img class='games__img' src='img/Apps-Comix-icon.png'></a>
    <a href='game3.html'><img class='games__img' src='img/Apps-Ide-Web-icon.png'></a>";
} elseif ( $profileStrong === "StrongPoint3" && $profileWeak === "WeakPoint3" && $profileLikes === "Likes3" && $profileDislikes === "Dislikes3" )  {
    $table = "
    <h1 class='games__h1'>This is all option 3</h1>
    <a href='game1/game1.html'><img class='games__img' src='img/Apps-Comix-icon.png'></a>
    <a href='game3.html'><img class='games__img' src='img/Apps-Google-Play-Games-B-icon.png'></a>";
} elseif ( $profileStrong === "StrongPoint4" && $profileWeak === "WeakPoint4" && $profileLikes === "Likes4" && $profileDislikes === "Dislikes4" )  {
    $table = "
    <h1 class='games__h1'>This is all option 4</h1>
    <a href='game1/game1.html'><img class='games__img' src='img/Apps-Comix-icon.png'></a>
    <a href='game1/game4.html'><img class='games__img' src='img/Apps-Stopwatch-icon.png'></a>";
}
json_encode($table);    
}
?>
	
