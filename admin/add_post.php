<?php
session_start();
require '../includes/config.php';

// 1. CHẶN CỬA: Chỉ Admin (role = 1) mới được vào
if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
    echo "<script>alert('Bạn không có quyền!'); window.location.href='../home.php';</script>";
    exit();
}

$msg = "";

// 2. XỬ LÝ KHI BẤM LƯU
if (isset($_POST['btn_save'])) {
    $title = $_POST['title'];
    $excerpt = $_POST['excerpt']; // Mô tả ngắn
    $content = $_POST['content']; // Nội dung
    $type = $_POST['type'];       // lesson hoặc plugin

    // Xử lý Upload ảnh
    $image = "";
    // Kiểm tra xem có chọn ảnh không
    if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $target_dir = "../uploads/";
        // Đổi tên file theo thời gian để tránh trùng (vd: 17823_anh.jpg)
        $filename = time() . "_" . basename($_FILES["image"]["name"]); 
        $target_file = $target_dir . $filename;
        
        // Di chuyển file từ bộ nhớ tạm vào thư mục uploads
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $filename;
        } else {
            $msg = "Lỗi upload ảnh! Kiểm tra lại thư mục uploads.";
        }
    }

    // Lưu vào Database
    // (Lưu ý: Nếu không up ảnh thì cột image sẽ rỗng)
    $sql = "INSERT INTO posts (title, excerpt, content, type, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $title, $excerpt, $content, $type, $image);
    
    if ($stmt->execute()) {
        $msg = "<span style='color:green'>Thêm bài viết thành công!</span>";
    } else {
        $msg = "Lỗi Database: " . $conn->error;
    }
}
?>
<?php
// --- PHẦN 2: GIAO DIỆN ---
$ten_css = '<link rel="stylesheet" href="../css/login.css">';
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Bài Mới</title>
    <link rel="stylesheet" href="../style.css"> 
    <style>
        body { background: #f4f6f9; font-family: Arial, sans-serif; padding: 20px; }
        .form-container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        
        label { font-weight: bold; display: block; margin-top: 15px; margin-bottom: 5px; }
        input[type="text"], textarea, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 150px; resize: vertical; }
        
        .btn-submit { background: #28a745; color: white; border: none; padding: 12px 25px; margin-top: 20px; border-radius: 4px; cursor: pointer; font-size: 16px; width: 100%; }
        .btn-submit:hover { background: #218838; }
        .btn-back { display: inline-block; margin-top: 10px; text-decoration: none; color: #666; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Viết Bài Mới</h2>
    
    <?php if($msg) echo "<p style='text-align:center; font-weight:bold;'>$msg</p>"; ?>

    <form method="POST" enctype="multipart/form-data">
        
        <label>Tiêu đề bài viết:</label>
        <input type="text" name="title" required placeholder="Ví dụ: Hướng dẫn cài Plugin A...">

        <div style="display: flex; gap: 20px;">
            <div style="flex: 1;">
                <label>Loại nội dung:</label>
                <select name="type">
                    <option value="lesson">Bài học (Lesson)</option>
                    <option value="plugin">Sản phẩm (Plugin)</option>
                </select>
            </div>
            <div style="flex: 1;">
                <label>Ảnh đại diện:</label>
                <input type="file" name="image" accept="image/*">
            </div>
        </div>

        <label>Mô tả ngắn (Hiện ở trang chủ):</label>
        <textarea name="excerpt" style="height: 80px;" placeholder="Đoạn tóm tắt giới thiệu..."></textarea>

        <label>Nội dung chi tiết:</label>
        <textarea name="content" placeholder="Nội dung đầy đủ của bài viết..."></textarea>

        <button type="submit" name="btn_save" class="btn-submit">Lưu Bài Viết</button>
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="../pages/home.php" class="btn-back">← Quay lại trang chủ</a>
        </div>
    </form>
</div>

</body>
</html>