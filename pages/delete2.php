<?php
// echo $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smart_home";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 쿼리문 작성
    $sql = "DELETE FROM USER_ROOM WHERE ROOM_ID=".$_GET['id'].";";

    // 쿼리 실행
    $result = mysqli_query($conn, $sql);
    
    header("Location: delete.php");
?>