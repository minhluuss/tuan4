<?php
session_start();
require '../includes/config.php'; // Kết nối Database
$ten_css = '<link rel="stylesheet" href="../css/lesson_page.css">';
require '../includes/header.php'; // Gọi thanh menu
?>

<section class="detail">
    <div class="detail-container">
        <?php
        // Lấy ID từ URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $post_id = (int)$_GET['id'];

            // Truy vấn lấy chi tiết bài viết
            $sql = "SELECT * FROM posts WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Kiểm tra xem bài viết có tồn tại không
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <h1 class="detail-title"><?php echo $row['title']; ?></h1>
                
                <?php if($row['image'] != ""): ?>
                    <div class="detail-image">
                        <img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                    </div>
                <?php endif; ?>

                <div class="detail-content">
                    <?php echo nl2br($row['content']); ?>
                </div>
        <?php
            } else {
                echo "<p>Bài viết không tồn tại.</p>";
            }
        } else {
            echo "<p>ID bài viết không hợp lệ.</p>";
        }
        ?>
    </div>
</section>

<?php require '../includes/footer.php'; ?>