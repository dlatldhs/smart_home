<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/graph.css">
    <style>
		body {
			margin: 0 0 0 0;
			/* background-color: rgb(36, 154, 227); */
			background: url("../images/background4.jpg")center center fixed no-repeat;
			background-size:cover;
			background-color: rgba(0,0,0,.1);
			/* backdrop-filter: blur(5px); */
			width:  100%;
			height: 100%;
		}
	</style>
</head>
<body>
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
                
                $sql = "SELECT * FROM USER_ROOM WHERE IS_USING=1;";
                $result = mysqli_query($conn, $sql);
                if ( $result ) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $using_room_id = $row['room_id'];
                    }
                    if ($using_room_id) {
                        // 쿼리문 작성
                        $sql = "SELECT * FROM air_status WHERE ROOM_ID=".$using_room_id.";";
                
                        // 쿼리 실행
                        $result = mysqli_query($conn, $sql);
                
                        // 콤보 박스 시작 태그 출력
                        while ($row = mysqli_fetch_assoc($result)) {
                            $air_id = $row['air_id'];
                            $air_status = $row['air_status'];
                        }
                        // DB 연결 종료
                        mysqli_close($conn);
                        ?>
                        <div class="graphcenter">
                            <div class="graph">
                                <?php
                                    // 그래프
                                    include "donut2.php";
                                    include "dots2.php";
                                ?>
                            </div>
                        </div>
                        <?php

                    }else {
                        echo "<h1 style='color: white; text-align: center;' >room id가 없습니다...지정해주세요.</h1>";
                    }
                } else {
                    echo "else 문";
                }
            ?>
        </form>
</body>
</html>