<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hopital";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra khi người dùng gửi form đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $_POST['username'];
    $password_input = $_POST['password'];

    // Truy vấn để kiểm tra tài khoản
    $sql = "SELECT id, name, role FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username_input, $password_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Đăng nhập thành công
        $user = $result->fetch_assoc();
        
        if ($user['role'] == 'admin') {
            // Lưu thông tin admin vào session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            // Chuyển hướng đến trang quản lý khám bệnh
            header("Location: index.php");
            exit;
        } else {
            $error = "Chỉ admin mới có quyền truy cập!";
        }
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác!";
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
    <title>Đăng Nhập</title>

</head>
<body>
<img src="https://img4.thuthuatphanmem.vn/uploads/2021/01/10/hinh-anh-bac-si-kiem-tra-benh-an-dien-tu_021527623.jpg" alt="Hình ảnh trên mạng" style="width: 100%; height: auto;">

    <h1>Đăng Nhập</h1>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="POST" action="">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" required><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
