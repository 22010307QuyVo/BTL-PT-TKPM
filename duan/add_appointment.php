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

// Lấy danh sách bác sĩ và bệnh nhân để hiển thị trong form
$doctors_sql = "SELECT * FROM doctors";
$doctors_result = $conn->query($doctors_sql);

$patients_sql = "SELECT * FROM patients";
$patients_result = $conn->query($patients_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = $_POST['doctor_id'];
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];

    // Thêm lịch hẹn vào cơ sở dữ liệu
    $sql = "INSERT INTO appointments (doctor_id, patient_id, appointment_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $doctor_id, $patient_id, $appointment_date);

    if ($stmt->execute()) {
        // Sau khi thêm lịch hẹn, chuyển hướng về trang quản lý lịch hẹn
        header("Location: appointments.php");
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
    <title>Tạo Lịch Hẹn</title>
</head>
<body>
    <h1>Tạo Lịch Hẹn Khám</h1>
    <form method="POST" action="">
        <label for="doctor_id">Chọn Bác Sĩ:</label>
        <select name="doctor_id" required>
            <?php
            while ($doctor = $doctors_result->fetch_assoc()) {
                echo "<option value='" . $doctor['id'] . "'>" . $doctor['name'] . "</option>";
            }
            ?>
        </select><br>

        <label for="patient_id">Chọn Bệnh Nhân:</label>
        <select name="patient_id" required>
            <?php
            while ($patient = $patients_result->fetch_assoc()) {
                echo "<option value='" . $patient['id'] . "'>" . $patient['name'] . "</option>";
            }
            ?>
        </select><br>

        <label for="appointment_date">Chọn Ngày và Giờ:</label>
        <input type="datetime-local" name="appointment_date" required><br>

        <button type="submit">Tạo Lịch Hẹn</button>
    </form>
</body>
</html>
