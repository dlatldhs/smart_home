<?php
    include "header.php";
?>
<form method="post" action="action.php" name="user_room_input">
    <input type="hidden" name="hype" value="room">
    설치 장소 이름<input type="text" name="user_room_name">
    설치 장소 정보<input type="text" name="user_room_info">
    설치 장소 위치<input type="text" name="locate">
    <input type="submit" value="su">
</form>
<?php
    include "footer.php";
?>