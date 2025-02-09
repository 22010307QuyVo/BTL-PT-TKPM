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

// Lấy danh sách bệnh nhân từ cơ sở dữ liệu
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bệnh nhân</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Quản lý bệnh nhân</h1>
        <a href="add_patient.php">Thêm bệnh nhân mới</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên bệnh nhân</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra nếu có bệnh nhân trong cơ sở dữ liệu và hiển thị
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>
                                <a href='edit_patient.php?id=" . $row['id'] . "'>Sửa</a> |
                                <a href='delete_patient.php?id=" . $row['id'] . "'>Xóa</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Không có bệnh nhân nào trong hệ thống.</td></tr>";
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
