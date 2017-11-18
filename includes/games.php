<?php

include 'database.php';     
if($_GET['id']) {

$id = $_GET['id']; 
    
$sql = "SELECT * FROM profile WHERE profile_id= '$id' ";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result); 
$profileGender = $row['profile_gender'];
$profileStrong = $row['profile_strong'];
$profileWeak = $row['profile_weak'];
$profileLikes = $row['profile_likes'];
$profileDislikes = $row['profile_dislikes'];

$table ="";

    
if ( $profileStrong === "StrongPoint1" && $profileWeak === "WeakPoint1" && $profileLikes === "Likes1" && $profileDislikes === "Dislikes1" )  {
    
    $sql = "SELECT DISTINCT games.id, games.image 
        FROM games 
        LEFT JOIN game_tags ON games.id = game_tags.game_id WHERE game_tags.tag_id = 1 OR game_tags.tag_id = 3 OR game_tags.tag_id = 5 OR game_tags.tag_id = 7";
    $result = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_assoc($result);
    print_r(json_encode($row));
    
    $gameID = $row['id'];
    $imageSRC = $row['image'];
    
    $table = "
    <a href='game-uploads/game".$gameID."/game".$gameID.".php?id=".$gameID."&child_id=".$id."'><img class='games__img' src='".$imageSRC."'></a>
    ";
    
} elseif ( $profileStrong === "StrongPoint2" && $profileWeak === "WeakPoint2" && $profileLikes === "Likes2" && $profileDislikes === "Dislikes2" )  {
    
     $sql = "SELECT DISTINCT games.id, games.image 
        FROM games 
        LEFT JOIN game_tags ON games.id = game_tags.game_id WHERE game_tags.tag_id = 2 OR game_tags.tag_id = 4 OR game_tags.tag_id = 6 OR game_tags.tag_id = 8";
    $result = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_assoc($result);
    print_r(json_encode($row));
    
    $gameID = $row['id'];
    $imageSRC = $row['image'];
    
     $table = "
      <a href='game-uploads/game".$gameID."/game".$gameID.".php?id=".$gameID."&child_id=".$id."'><img class='games__img' src='".$imageSRC."'></a>
      ";
    
} elseif ( $profileStrong === "StrongPoint3" && $profileWeak === "WeakPoint3" && $profileLikes === "Likes3" && $profileDislikes === "Dislikes3" )  {
    $table = "
    <h1 class='games__h1'>This is all option 3</h1>
    <a href='game-uploads/game1/game1.html'><img class='games__img' src='img/Apps-Comix-icon.png'></a>
    <a href='game-uploads/game3.html'><img class='games__img' src='img/Apps-Google-Play-Games-B-icon.png'></a>";
} elseif ( $profileStrong === "StrongPoint4" && $profileWeak === "WeakPoint4" && $profileLikes === "Likes4" && $profileDislikes === "Dislikes4" )  {
    $table = "
    <h1 class='games__h1'>This is all option 4</h1>
    <a href='game-uploads/game1/game1.html'><img class='games__img' src='img/Apps-Comix-icon.png'></a>
    <a href='game-uploads/game4.html'><img class='games__img' src='img/Apps-Stopwatch-icon.png'></a>";
}
json_encode($table);    
}
?>
	
