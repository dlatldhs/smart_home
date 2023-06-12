<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/delete.css">
    <title>Document</title>
    <style>
		body {
			margin: 0 0 0 0;
			/* background-color: rgb(36, 154, 227); */
			background: url("../images/background9.jpg")center center fixed no-repeat;
			background-size:cover;
			background-color: rgba(0,0,0,.1);
			/* backdrop-filter: blur(5px); */
			width:  100%;
			height: 100%;
		}
	</style>
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
                echo "<table border='1' width='1300' height='500' class='po-tb' >";
                echo "<th>room_id</th><th>room_name</th><th>info</th><th>위치</th><th>저장시간</th><th>사용중인가용?</td><td>사용 및 해제하기</td>";
                // 콤보 박스 시작 태그 출력
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['room_id'] . "</td>";
                    echo "<td>" . $row['room_name'] . "</td>";
                    echo "<td>" . $row['info'] . "</td>";
                    echo "<td>" . $row['locate'] . "</td>";
                    echo "<td>" . $row['rt'] . "</td>";
                    $is_using = $row['is_using'];
                    if ( $is_using ) {
                        echo "<td>사용중</td>";
                        echo "<td class='po-btn' ><a href=./using2.php?id=".$row['room_id']."&is_using=1>사용해제 하기</a></td>";
                    } else {
                        echo "<td>사용안함</td>";
                        echo "<td class='po-btn' ><a href=./using2.php?id=".$row['room_id']."&is_using=0>사용 하기</a></td>";
                    }
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