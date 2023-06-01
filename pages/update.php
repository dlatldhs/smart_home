<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/delete.css">
    <title>Document</title>
</head>
<body>
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
            ?><fieldset class="Fembed"><?php
            // 쿼리 실행
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0 ) {
                echo "<table border='1' width='1300' height='500' class='po-tb'>";
                echo "<th>room_id</th><th>room_name</th><th>info</th><th>위치</th><th>rt</th><th>업뎃하기</td>";
                // 콤보 박스 시작 태그 출력
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['room_id'] . "</td>";
                    echo "<td>" . $row['room_name'] . "</td>";
                    echo "<td>" . $row['info'] . "</td>";
                    echo "<td>" . $row['locate'] . "</td>";
                    echo "<td>" . $row['rt'] . "</td>";
                    echo "<td class='po-btn'><a href=./update2.php?id=".$row['room_id'].">업데이트 하기</a></td>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?></fieldset><?php
            // DB 연결 종료
            mysqli_close($conn);
        ?>
    </form>
</body>
</html>