<form method='post' action='view.php'>

    <?php
    include "header.php";
        // DB 연결
        // 데이터베이스 연결
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "smart_home";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // 쿼리문 작성
        $sql = "SELECT * FROM air_status";

        // 쿼리 실행
        $result = mysqli_query($conn, $sql);

        // 콤보 박스 시작 태그 출력
        while ($row = mysqli_fetch_assoc($result)) {
            $air_id = $row['air_id'];
            $air_status = $row['air_status'];
            $room_id =  $row['room_id'];
            // echo "humidity_id: $humi_id | humidity_val: $humi_val | room_id: $room_id<br>";
        }
        // DB 연결 종료
        mysqli_close($conn);
        include "donut2.php";
        include "dots2.php";
    ?>
</form>
<?php
    include "footer.php";
?>

