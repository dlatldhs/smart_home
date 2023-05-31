<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create.css">
    <title>Document</title>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <form method="post" action="action.php" name="user_room_input">
        <fieldset class="Fembed">
            <input type="hidden" name="hype" value="room">
            설치 장소 이름<input type="text" name="user_room_name">
            설치 장소 정보<input type="text" name="user_room_info">
            설치 장소 위치<input type="text" name="locate">
            <input type="submit" value="su" class="submit-btn" >
        </fieldset>
    </form>
</body>
</html>