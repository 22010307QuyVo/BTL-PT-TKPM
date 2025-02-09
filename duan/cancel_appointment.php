<?php
// session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hopital";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$id = $_GET['id']; // Lấy ID lịch hẹn từ URL

// Cập nhật trạng thái lịch hẹn thành "Hủy"
$sql = "UPDATE appointments SET status = 'Hủy' WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: appointments.php");
    exit;
} else {
    echo "Lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
