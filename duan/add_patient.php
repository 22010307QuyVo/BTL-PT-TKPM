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

// Xử lý khi người dùng gửi form thêm bệnh nhân
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Thêm bệnh nhân vào cơ sở dữ liệu
    $sql = "INSERT INTO patients (name, dob, gender, phone, email, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $dob, $gender, $phone, $email, $address);

    if ($stmt->execute()) {
        // Sau khi thêm bệnh nhân, chuyển hướng về trang quản lý bệnh nhân
        header("Location: patients.php");
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
    <title>Thêm bệnh nhân</title>
</head>
<body>
    <h1>Thêm bệnh nhân mới</h1>
    <form method="POST" action="">
        <label for="name">Tên bệnh nhân:</label>
        <input type="text" name="name" required><br>

        <label for="dob">Ngày sinh:</label>
        <input type="date" name="dob" required><br>

        <label for="gender">Giới tính:</label>
        <select name="gender" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>

        <label for="phone">SĐT:</label>
        <input type="text" name="phone" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email"><br>

        <label for="address">Địa chỉ:</label>
        <textarea name="address"></textarea><br>

        <button type="submit">Thêm bệnh nhân</button>
    </form>
</body>
</html>
