<?php
session_start();
require 'config.php'; 

// Xử lý Logic Đăng Ký
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    // 1. Kiểm tra xác nhận mật khẩu
    if ($password !== $confirm_pass) {
        $msg = "Mật khẩu xác nhận không khớp!";
    } else {
        // 2. Kiểm tra username đã tồn tại chưa?
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        
        if ($stmt->get_result()->num_rows > 0) {
            $msg = "Tài khoản này đã có người dùng!";
        } else {
            // 3. MÃ HÓA MẬT KHẨU (Bước quan trọng nhất)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 0; // Mặc định là user thường (0), Admin là (1)

            // 4. Lưu vào Database
            $insert = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
            $insert->bind_param("ssi", $username, $hashed_password, $role);
            
            if ($insert->execute()) {
                // Đăng ký xong -> Chuyển hướng về trang login để đăng nhập
                echo "<script>alert('Đăng ký thành công! Hãy đăng nhập.'); window.location.href='login.php';</script>";
                exit();
            } else {
                $msg = "Lỗi hệ thống: " . $conn->error;
            }
        }
    }
}
?>

<?php 
$ten_css = '<link rel="stylesheet" href="css/login.css">'; // Dùng chung CSS với trang Login cho đẹp
include 'header.php'; 
?>

<div class="login-wrapper">
    <section class="login">
        <div class="tieu-de-login">
            <h3>Đăng Ký Tài Khoản Mới</h3>
            <p>Tham gia cộng đồng PluginTown</p>
            
            <?php if($msg): ?>
                <p style="color: red; background: #ffe6e6; padding: 10px; border-radius: 4px; text-align: center;">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo $msg; ?>
                </p>
            <?php endif; ?>
        </div>

        <form class="thong-tin" action="" method="post">
            <div class="input-login">
                <input type="text" name="username" placeholder="Tên đăng nhập" required 
                       value="<?php if(isset($username)) echo htmlspecialchars($username); ?>">
            </div>
            
            <div class="input-login">
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>

            <div class="input-login">
                <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
            </div>
            
            <div class="button-login">
                <button type="submit">Đăng Ký Ngay</button>
            </div>
        </form>

        <div class="forgot-password" style="text-align: center; margin-top: 20px;">
            Đã có tài khoản? <a href="login.php" style="font-weight: bold;">Đăng nhập tại đây</a>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>