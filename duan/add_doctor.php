<?php
// session_start();

// // Kiểm tra người dùng đã đăng nhập chưa
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php"); // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
//     exit;
// }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hopital";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi người dùng gửi form thêm bác sĩ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Thêm bác sĩ vào cơ sở dữ liệu
    $sql = "INSERT INTO doctors (name, specialty, phone, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $specialty, $phone, $email);

    if ($stmt->execute()) {
        // Sau khi thêm bác sĩ, chuyển hướng về trang quản lý bác sĩ
        header("Location: doctors.php");
        exit;
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();

}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bác sĩ</title>
</head>
<body>
    <h1>Thêm bác sĩ mới</h1>
    <form method="POST" action="">
        <label for="name">Tên bác sĩ:</label>
        <input type="text" name="name" required><br>

        <label for="specialty">Chuyên môn:</label>
        <input type="text" name="specialty" required><br>

        <label for="phone">SĐT:</label>
        <input type="text" name="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Thêm bác sĩ</button>
    </form>
</body>
</html>
