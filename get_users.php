<?php
// เชื่อมต่อฐานข้อมูล MySQL
$mysqli = new mysqli("localhost", "root", "", "databsehtml");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// ดึงข้อมูลผู้ใช้ทั้งหมด
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

// สร้างรายการผู้ใช้เป็น HTML
$userListHTML = "";
while ($row = $result->fetch_assoc()) {
    $userListHTML .= "<li class='my-3'>{$row['username']} : {$row['email']}</li>";
}

// ปิดการเชื่อมต่อ
$mysqli->close();

// ส่งรายการผู้ใช้กลับไปยังหน้าเว็บ
echo $userListHTML;
?>
