<?php include "header.php"; ?>

    <?php
        // DB 연결
        // 데이터베이스 연결
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "smart_home";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT * FROM `user_room` WHERE `IS_USING` = 1;";
        $result = mysqli_query($conn, $sql);
        if ( $result ) {
            while ($row = mysqli_fetch_assoc($result)) {
                $room_id = $row['room_id'];
            }
            if ($room_id) {
                $sql = "UPDATE `user_room` SET `is_using` = '0' WHERE `user_room`.`room_id` = ".$room_id.";"; 
                $result = mysqli_query($conn, $sql);
            }
        }

        // 쿼리문 작성
        $get_id =  $_GET['id'];
        $use = $_GET['is_using'];
        if ($use == 1) {
            $sql = "UPDATE `user_room` SET `is_using` = '0' WHERE `user_room`.`room_id` = ".$get_id.";"; 
        } else {
            $sql = "UPDATE `user_room` SET `is_using` = '1' WHERE `user_room`.`room_id` = ".$get_id.";"; 
        }
        $result = mysqli_query($conn, $sql);
        if ( $result ) {
            echo "good...!";
            header("Location: using.php");
        } else {
            echo "bad";
        }
    ?>