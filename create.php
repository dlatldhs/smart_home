<?php
    include "header.php";
?>
<<<<<<< HEAD
<form method="post" action="action.php" name="user_room_input">
    <input type="hidden" name="hype" value="room">
    설치 장소 이름<input type="text" name="user_room_name">
    설치 장소 정보<input type="text" name="user_room_info">
    설치 장소 위치<input type="text" name="locate">
=======
<form method="post" action="device_process.php" name="device_info">
    디바이스 아이디<input type="text" name="did">
    센서 종류<input type="text" name="type">
    설치장소<input type="text" name="locate">
>>>>>>> a9e520a756c62d9c8af604b2d0dd172ee1036928
    <input type="submit" value="su">
</form>
<?php
    include "footer.php";
?>