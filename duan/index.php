<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bệnh viện</title>
    <!-- <link rel="stylesheet" href="quanly.css"> -->
    <style>
        
a {
    text-decoration: none;
    color: black;
}
ul {
    list-style-type: none;
    padding: 0; /* Tùy chọn, giúp loại bỏ khoảng cách lề mặc định */
}
ul li {
    display: inline-block;  /* Xếp các phần tử <li> thành hàng ngang */
    margin-right: 30px;      /* Khoảng cách giữa các phần tử */
    width: 200px;
    height: 100px;
    margin-right: 100px;
    border: 2px solid #333;
    border-radius: 8px;
    background-color: #f0f0f0;
    text-align: center;
    line-height: 100px; /* Căn giữa nội dung theo chiều dọc */
    font-size: 16px;
    color: #333;
    cursor: pointer; 
}
ul li:hover {
    background-color: #007bff;
    color: white;
    transform: scale(1.1);
    transition: transform 0.3s ease, background-color 0.3s ease;
}


.image-container img {
    width: 1500px;
    height: 250px;
    
}
.image-container h1{
    color: red;
    position: absolute;
    left: 500px;
    top: 100px;
    opacity: 0.9;
}

.container{
    border: 2px solid white;
    padding-left: 100px;
    margin-left: 70px;
    margin-top: 70px;
}

footer{
    position: absolute;
    bottom: 0;
    background-color: #007bff;
    width: 1500px;
    height: 40px;
}
    </style>
</head>
<body>

    <div class="image-container">
        <h1>Trang Quản Lý Bệnh Viện - Admin</h1>
        <img src="https://tse2.mm.bing.net/th?id=OIP.Fm-wNM_pdcJjjhS3TAiU5QHaC8&pid=Api&P=0&h=180" alt="Ảnh mẫu">
        
    </div>


    <div class="container">
        
        <ul>
            <li><a href="doctors.php">Quản lý bác sĩ</a></li>
            <li><a href="patients.php">Quản lý bệnh nhân</a></li>
            <li><a href="services.php">Quản lý dịch vụ khám</a></li>
            <li><a href="appointments.php">Quản lý lịch hẹn</a></li>
        </ul>
    </div>
    <footer>
        <p>thông tin liên hệ sdt: 0987654323 Email: benhvien@gmail.com.vn</p>
    </footer>
</body>

</html>

<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập và có phải là admin không
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");  // Nếu không phải admin, chuyển hướng về trang đăng nhập
    exit;
}

echo "<form action='logout.php' method='POST'>
        <button type='submit'>Đăng Xuất</button>
      </form>";
?>


