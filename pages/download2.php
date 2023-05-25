<?php
    // $_GET['did'];
    include "db.php";
    $servername = "localhost";
    $conn = new mysqli($servername, $db_id, $db_pw, $db_tb);
    // 쿼리문 작성
    $room_num = $_GET['room_num'];
    // $sql = "SELECT * FROM sensor WHERE did='".$_GET['did']."' ORDER BY num desc limit 7;";
    $sql = "
    SELECT *
    FROM (SELECT * FROM AIR_STATUS WHERE ROOM_ID=".$room_num." ORDER BY AIR_ID DESC LIMIT 7) AS subquery
    ORDER BY AIR_ID ASC;
    ";

    // 쿼리 실행
    $result = mysqli_query($conn, $sql);
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $dataset['label'][$i] = $row['rt'];
        $dataset['air_status'][$i] = $row['air_status'];
        $i++;
    }

    echo json_encode($dataset);
?>