<?php
session_start();
require '../includes/config.php'; // Kết nối CSDL

$error = ""; // Biến lưu thông báo lỗi

// --- PHẦN 1: XỬ LÝ LOGIC PHP ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // 1. Kiểm tra username trong database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // 2. Kiểm tra mật khẩu
        if (password_verify($password, $row['password'])) {

            // Lưu session chung
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = (int)$row['role']; // 1 = admin, 0 = user

            // PHÂN LUỒNG THEO ROLE
            if ($row['role'] == 1) {
                // ADMIN
                $_SESSION['admin'] = true;
                header("Location: ../admin/add_post.php");
            } else {
                // USER
                header("Location: ../pages/home.php");
            }
            exit();

        } else {
            $error = "Mật khẩu không chính xác!";
        }
    } else {
        $error = "Tài khoản không tồn tại!";
    }
}
?>

<?php
// --- PHẦN 2: GIAO DIỆN ---
$ten_css = '<link rel="stylesheet" href="../css/login.css">';
include '../includes/header.php';
?>

<div class="login-wrapper">
    <section class="login">
        <div class="tieu-de-login">
            <h3>Login To Your Account</h3>
            <p>Sign in your PluginTown account</p>

            <?php if ($error): ?>
                <p style="color: red; background: #ffe6e6; padding: 10px; border-radius: 4px; text-align: center;">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>
        </div>

        <form class="thong-tin" action="" method="post">
            <div class="input-login">
                <input type="text" name="username" placeholder="Username or email address"
                       required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>
            <div class="input-login">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="button-login">
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="forgot-password">
            <a href="#">Lost or forgotten your password?</a>
            <a href="register.php">Create an account</a>
        </div>
    </section>
</div>

<?php
include '../includes/footer.php';
?>
