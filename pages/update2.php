<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/delete.css">
</head>
<body>
<?php include "header.php"; ?>

<?php
    // DB 연결
    // 데이터베이스 연결
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smart_home";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // 쿼리문 작성
    // echo $_GET['id'];
    
    $sql = "SELECT * FROM USER_ROOM WHERE ROOM_ID=".$_GET['id'].";";
    $result = mysqli_query($conn, $sql);
    ?>
        <?php
        echo"<form method='post' action='action.php'>";
        echo "<fieldset class='Fembed'>";
        echo "<input type='hidden' value='update' name='hype'>";
        echo "<table border='1' width='1300' height='500' class='po-tb'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>방 번호</td><td><input type='text' value='" . $row['room_id'] . "' readonly name='r_id' /></td></tr>";
            echo "<tr><td>방 이름</td><td><input type='text' value='" . $row['room_name'] . "' name='r_name' /></td></tr>";
            echo "<tr><td>INFO</td><td><input type='text' value='" . $row['info'] . "' name='r_info' /></td></tr>";
            echo "<tr><td>locate</td><td><input type='text' value='" . $row['locate'] . "' name='r_locate' /></td></tr>";
            echo "<tr><td>시간!</td><td><input type='text' value='" . $row['rt'] . "' readonly name='r_rt' /></td></tr>";
        }
        echo "<tr><input type='submit' value='변경' class='update-btn'></tr>";
        echo "</table>";
        // DB 연결 종료
        echo "</fieldset>";
        mysqli_close($conn);
        echo "</form>";
        ?>
</body>
</html>