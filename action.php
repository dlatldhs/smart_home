<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smart_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // 쿼리 실행
    $hype = $_POST['hype'];
    if ($hype == 'room') {
        // echo "this is room!";
        
        // 쿼리문 작성
        $sql = "
            INSERT INTO `user_room` (`room_id`, `room_name`, `info`, `locate`, `rt`) VALUES (NULL, '".$_POST['user_room_name']."', '".$_POST['user_room_info']."', '".$_POST['locate']."', current_timestamp());
        ";
        $result = mysqli_query($conn, $sql);
        
        if ( $result ) {
            echo "good";
        } else {
            echo "bad";
        }
    } else if ($hype == 'update') {
        $r_id = $_POST['r_id'];
        $r_name = $_POST['r_name'];$r_info = $_POST['r_info'];$r_locate = $_POST['r_locate'];
        $r_rt = $_POST['r_rt'];

        $sql = "UPDATE user_room SET room_name='".$r_name."',info = '".$r_info."',locate='".$r_locate."' WHERE room_id=".$r_id.";";
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        if ( $result ) {
            echo "good";
            header("Location: update.php");
        } else {
            echo "bad";
            header("Location: error.php");
        }
    }
?>