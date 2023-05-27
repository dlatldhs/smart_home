<?php
// 데이터베이스 연결
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_home";

$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// GET 방식으로 받은 값 저장
$humidity = $_GET['humidity'];
$air_val = $_GET['air'];

$sql = "SELECT * FROM USER_ROOM WHERE IS_USING=1;";
$result = mysqli_query($conn, $sql);

if ( $result ) {

  while ($row = mysqli_fetch_assoc($result)) {
    $using_room_id = $row['room_id'];
  }
  if ($using_room_id) {
    if ( $humidity && $air_val ) {
      // 습도 값을 삽입하는 준비된 문장 사용
      $stmt = $conn->prepare("INSERT INTO humidity (humidity_val, room_id, rt) VALUES (?, ?, current_timestamp())");
      $stmt->bind_param("di", $humidity, $using_room_id);
      $stmt->execute();
  
      // 공기 상태 값을 삽입하는 준비된 문장 사용
      $stmt = $conn->prepare("INSERT INTO air_status (air_status, room_id, rt) VALUES (?, ?, current_timestamp())");
      $stmt->bind_param("di", $air_val, $using_room_id);
      $stmt->execute();
      
      echo "good...!";
    }
  }
  else {
    echo "방을 등록해주세요";
  }
} else {
  echo "no data";
}
// 데이터베이스 연결 종료
$conn->close();
?>
