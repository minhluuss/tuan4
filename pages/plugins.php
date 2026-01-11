<?php
session_start();
require '../includes/config.php'; // Kết nối Database
$ten_css = '<link rel="stylesheet" href="../css/plugins.css">';
require '../includes/header.php';
?>
<div class="section-title">
    <h2 class="title">WORDPRESS PLUGINS</h2>
    <p class="title1">Compelling, Dynamic, Robust WordPress Plugins For Smart Website</p>
    <P class="title2">Expertly Created by PluginTown</P>
</div>
<section class="main-container">
    <div class="can-giua">
        <h3>Our Featured WordPress Plugins</h3>
        <div class="post-grid">

            <?php
            // 1. Câu lệnh lấy bài viết (Mới nhất lên đầu)
            $sql = "SELECT * FROM posts WHERE type = 'plugin' ORDER BY id DESC";
            $result = $conn->query($sql);

            // 2. Kiểm tra xem có bài nào không
            if ($result->num_rows > 0) {

                // 3. VÒNG LẶP (Máy in chạy liên tục từng dòng dữ liệu)
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <div class="card">

                        <div class="card-img">
                            <?php if ($row['image'] != ""): ?>
                                <img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x180?text=No+Image" alt="No Image">
                            <?php endif; ?>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="detail.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h3>

                            <p class="card-excerpt">
                                <?php
                                // Cắt chữ nếu dài quá 100 ký tự
                                echo substr($row['excerpt'], 0, 100) . '...';
                                ?>
                            </p>

                            <a href="lesson_page.php?id=<?php echo $row['id']; ?>" class="read-more">
                                Learn more <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                } // Kết thúc vòng lặp while
            } else {
                echo "<p style='text-align:center'>Chưa có bài viết nào.</p>";
            }
            ?>

        </div>
    </div>
</section>

<section class="main-container2">
    <div class="can-giua">
        <h3>Our Featured WordPress Plugins</h3>
        <div class="post-grid">

            <?php
            // 1. Câu lệnh lấy bài viết (Mới nhất lên đầu)
            $sql = "SELECT * FROM posts WHERE type = 'plugin' ORDER BY id DESC";
            $result = $conn->query($sql);

            // 2. Kiểm tra xem có bài nào không
            if ($result->num_rows > 0) {

                // 3. VÒNG LẶP (Máy in chạy liên tục từng dòng dữ liệu)
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <div class="card">

                        <div class="card-img">
                            <?php if ($row['image'] != ""): ?>
                                <img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x180?text=No+Image" alt="No Image">
                            <?php endif; ?>

                        </div>

                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="detail.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h3>

                            <p class="card-excerpt">
                                <?php
                                // Cắt chữ nếu dài quá 100 ký tự
                                echo mb_substr($row['excerpt'], 0, 100) . '...';
                                ?>

                            </p>
                            <a href="lesson_page.php?id=<?php echo $row['id']; ?>" class="read-more">
                                Learn more <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                } // Kết thúc vòng lặp while
            } else {
                echo "<p style='text-align:center'>Chưa có bài viết nào.</p>";
            }
            ?>

        </div>
        <div class="ho-tro">
            <div class="can-giua2">
                <p>14 day money back guarantee</p>
                <p>Expert customer support</p>
                <p>Safe and secure payments</p>
            </div>
        </div>
    </div>
</section>
<?php require '../includes/footer.php'; ?>