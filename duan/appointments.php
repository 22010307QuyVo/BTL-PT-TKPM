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

// Lấy danh sách lịch hẹn từ cơ sở dữ liệu
$sql = "SELECT appointments.id, doctors.name AS doctor_name, patients.name AS patient_name, appointment_date, status 
        FROM appointments
        JOIN doctors ON appointments.doctor_id = doctors.id
        JOIN patients ON appointments.patient_id = patients.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Lịch Hẹn</title>
</head>
<body>
    <h1>Quản Lý Lịch Hẹn Khám</h1>
    <a href="add_appointment.php">Tạo Lịch Hẹn Mới</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bác Sĩ</th>
                <th>Bệnh Nhân</th>
                <th>Ngày Lịch Hẹn</th>
                <th>Trạng Thái</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['doctor_name'] . "</td>";
                    echo "<td>" . $row['patient_name'] . "</td>";
                    echo "<td>" . $row['appointment_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>
                            <a href='confirm_appointment.php?id=" . $row['id'] . "'>Xác Nhận</a> |
                            <a href='cancel_appointment.php?id=" . $row['id'] . "'>Hủy</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có lịch hẹn nào trong hệ thống.</td></tr>";
            }

            echo "<form action='index.php' method='POST'>
                <button type='submit'>Trang Chủ</button>
                </form>";
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close(); // Đóng kết nối
?>
