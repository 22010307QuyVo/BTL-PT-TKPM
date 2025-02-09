<?php
// session_start(); // Khởi động session

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php"); // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
//     exit;
// }

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

// Lấy danh sách dịch vụ từ cơ sở dữ liệu
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Dịch Vụ Khám</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Quản Lý Dịch Vụ Khám</h1>
        <a href="add_service.php">Thêm Dịch Vụ Mới</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Mô Tả</th>
                    <th>Giá</th>
            
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra nếu có dịch vụ trong cơ sở dữ liệu và hiển thị
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['price'] . " VND</td>";
                        
                        echo "<td>
                                <a href='edit_service.php?id=" . $row['id'] . "'>Sửa</a> |
                                <a href='delete_service.php?id=" . $row['id'] . "'>Xóa</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Không có dịch vụ nào trong hệ thống.</td></tr>";
                }

                echo "<form action='index.php' method='POST'>
                <button type='submit'>Trang Chủ</button>
                </form>";
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close(); // Đóng kết nối
?>
