<?php
session_start();
require '../includes/config.php';
$ten_css = '<link rel="stylesheet" href="../css/search.css">';
require '../includes/header.php'; // Đã tự động nhúng style.css rồi
?>
<div class="layout-wrapper">

<div class="main-container">

    <?php
    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $search_term = "%" . $keyword . "%";

        $sql = "SELECT * FROM posts WHERE title LIKE ? OR excerpt LIKE ? OR type LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $search_term, $search_term, $search_term);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<h2 class='page-title'>Kết quả tìm kiếm: \"<em>" . htmlspecialchars($keyword) . "</em>\"</h2>";

        // Mở lưới
        echo '<div class="post-grid">';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $img_path = !empty($row['image']) ? "../uploads/" . $row['image'] : "https://via.placeholder.com/300x180?text=No+Image";
                ?>
                <div class="card">
                    <div class="card-img">
                        <img src="<?php echo $img_path; ?>" alt="<?php echo $row['title']; ?>">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                        </h3>
                        <p class="card-excerpt">
                            <?php echo substr($row['excerpt'], 0, 100) . '...'; ?>
                        </p>
                        <a href="list_lesson.php?id=<?php echo $row['id']; ?>"
                            style="color:#007bff; text-decoration:none; font-weight:bold;">Xem chi tiết &rarr;</a>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<p style='grid-column: 1/-1; text-align: center; color: red; font-size: 18px;'>Không tìm thấy bài viết nào.</p>";
        }
        echo '</div>'; // Đóng .post-grid
    
    } else {
        echo "<h2 class='page-title'>Nhập từ khóa để tìm kiếm...</h2>";
    }
    ?>

</div>

<div class="khung-phai">

    <div class="phai-card must-have">
        <img src="../images/background-ban-hoc-1.jpg" alt="">
        <h4>3 <strong>WORDPRESS</strong> PLUGINS EVERY BLOG</h4>
        <h2>"must have"</h2>
        <a href="" class="btn">Learn Now</a>
    </div>

    <div class="phai-card free-membership">
        <h4>FREE MEMBERSHIP</h4>
        <h2>Private Vault Of<br>Video Courses</h2>
        <p>Grow and Prosper Using<br>WordPress The Smart Way!</p>
        <a href="" class="btn">Join Our Academy</a>
        <img src="../images/background-ban-hoc-2.jpg" alt="">
    </div>

    <div class="phai-card resources">
        <h2>RESOURCES</h2>
        <p>Recommended WordPress Resources, Services, and Tools</p>
        <a href="" class="btn">Browse Resources</a>
    </div>

    <div class="phai-card featured-plugin">
        <h2>FEATURED PLUGINS</h2>

        <?php
        $sql = "SELECT * FROM posts 
            WHERE type = 'plugin' 
            ORDER BY id DESC 
            LIMIT 2";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $plugins = [];
            while ($row = $result->fetch_assoc()) {
                $plugins[] = $row;
            }
            ?>
            <!-- MÔ TẢ -->
            <div class="featured-plugin-desc">
                <h4>
                    <?= strip_tags($plugins[0]['title']); ?>
                </h4>
                <p>
                    <?= strip_tags($plugins[0]['excerpt'] ?? $plugins[0]['content']); ?>
                </p>
                <a href="#" class="learn-more">Learn more</a>
            </div>

            <!-- ẢNH -->
            <div class="featured-plugin-images">
                <?php foreach ($plugins as $plugin): ?>
                    <?php if (!empty($plugin['image'])): ?>
                        <div class="plugin-img-box">
                            <img src="../uploads/<?= $plugin['image']; ?>" alt="">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        <?php } else { ?>
            <p>Chưa có plugin nào.</p>
        <?php } ?>

        <a href="#" class="btn">Browse all plugins</a>
    </div>



    <div class="phai-card popular-lessons">
        <h2>POPULAR LESSONS</h2>
        <ul>
            <li><a href="">Top Ten Ways To Make Money From Wordpress</a></li>
            <li><a href="">20 Must Have Wordpress Plugins For Marketing</a></li>
            <li><a href="">Newest Trending Wordpress Themes For 2022</a></li>
            <li><a href="">5 Best Email Marketing Your Wordpress Site</a></li>
            <li><a href="">Best Social Media Strategies For Your Wordpress Site</a></li>
        </ul>
    </div>
</div>

</div>
<?php include '../includes/footer.php'; ?>