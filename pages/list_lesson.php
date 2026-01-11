<?php
session_start();
require '../includes/config.php'; // Kết nối Database
$ten_css = '<link rel="stylesheet" href="../css/list_lesson.css">';
require '../includes/header.php'; // Gọi thanh menu
?>

<div class="main-container">

    <div class="section-title">
        <h2 class="les">LESSONS</h2>
        <a href="">PluginTown/Lessons</a>
    </div>

    <div class="khung-list-lesson">
        <div class="khung-trai">
            <div class="bai-tren">
                <?php
                $sql = "SELECT * FROM posts 
                        WHERE type = 'lesson' 
                        ORDER BY id DESC 
                        LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <div class="noi-dung-">
                        <h2 class="newest">NEWEST LESSON</h2>
                        <div class="noi-dung-tren">
                            <h3 class="card-title">
                                <a href="detail.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h3>
                            <span class="card-excerpt">Located in
                                <?php echo $row['excerpt']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="noi-dung-duoi">

                        <div class="card-img">
                            <?php if (!empty($row['image'])): ?>
                                <img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x180?text=No+Image">
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <p class="card-content line-3">
                                <?php echo strip_tags($row['content']); ?>
                            </p>
                        </div>

                    </div>
                    <?php
                } else {
                    echo "<p>Chưa có bài viết</p>";
                }
                ?>
            </div>
            <div class="bai-duoi">
                <div class="post-grid">
                    <?php
                    $sql = "SELECT * FROM posts 
                            WHERE type = 'lesson' 
                            ORDER BY id DESC 
                            LIMIT 100 OFFSET 1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="card">
                                <div class="card-img">
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="../uploads/<?php echo $row['image']; ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="card-body">
                                    <span class="card-excerpt">Located in
                                        <?php echo $row['excerpt']; ?>
                                    </span>
                                    <h3 class="card-title">
                                        <a href="detail.php?id=<?php echo $row['id']; ?>">
                                            <?php echo $row['title']; ?>
                                        </a>
                                    </h3>
                                    <p class="card-content line-3">
                                        <?php echo strip_tags($row['content']); ?>
                                    </p>
                                    <a href="lesson_page.php?id=<?php echo $row['id']; ?>" class="read-more">
                                        Read more <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
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

</div>

<?php require '../includes/footer.php'; ?>