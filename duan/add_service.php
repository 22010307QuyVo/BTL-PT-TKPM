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

// Xử lý khi người dùng gửi form thêm dịch vụ
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Thêm dịch vụ vào cơ sở dữ liệu
    $sql = "INSERT INTO services (name, description, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $name, $description, $price);

    if ($stmt->execute()) {
        // Sau khi thêm dịch vụ, chuyển hướng về trang quản lý dịch vụ
        header("Location: services.php");
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
    <title>Thêm Dịch Vụ Khám</title>
</head>
<body>
    <h1>Thêm Dịch Vụ Khám Mới</h1>
    <form method="POST" action="">
        <label for="name">Tên Dịch Vụ:</label>
        <input type="text" name="name" required><br>

        <label for="description">Mô Tả:</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Giá Dịch Vụ:</label>
        <input type="number" name="price" step="0.01" required><br>

        <button type="submit">Thêm Dịch Vụ</button>
    </form>
</body>
</html>
