<?php include "header.php"; ?>
<form method='post' action='view.php'>

    <?php
        // DB 연결
        // 데이터베이스 연결
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "smart_home";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // 쿼리문 작성
        $sql = "SELECT * FROM USER_ROOM";

        // 쿼리 실행
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0 ) {
            echo "<table border='1' width='500'>";
            echo "<th>room_id</th><th>room_name</th><th>info</th><th>locate</th><th>rt</th><th>제거하기</td>";
            // 콤보 박스 시작 태그 출력
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['room_id'] . "</td>";
                echo "<td>" . $row['room_name'] . "</td>";
                echo "<td>" . $row['info'] . "</td>";
                echo "<td>" . $row['locate'] . "</td>";
                echo "<td>" . $row['rt'] . "</td>";
                echo "<td><a href=./delete2.php?id=".$row['room_id'].">제거^^</a></td>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        // DB 연결 종료
        mysqli_close($conn);
    ?>
</form>
<?php
    include "footer.php";
?>

