<?php
// เชื่อมต่อฐานข้อมูล MySQL
$mysqli = new mysqli("localhost", "root", "", "databsehtml");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// รับข้อมูลจากฟอร์ม
$username = $_POST['username'];
$email = $_POST['email'];

// เพิ่มข้อมูลใหม่ลงในฐานข้อมูล
$sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
$result = $mysqli->query($sql);

// ปิดการเชื่อมต่อ
$mysqli->close();
?>
