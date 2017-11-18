<?php
$count = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], '../game-uploads/game2/'.$name)) {
                $count++;
            }
        }
    }
    header("Location: ../settings.php?upload=success");
} else {
    header("Location: ../settings.php?upload=error");
}
?>