<?php
    include "header.php";
?>
<form method="post" action="device_process.php" name="device_info">
    디바이스 아이디<input type="text" name="did">
    센서 종류<input type="text" name="type">
    설치장소<input type="text" name="locate">
    <input type="submit" value="su">
</form>
<?php
    include "footer.php";
?>