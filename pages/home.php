<?php
session_start();
require '../includes/config.php'; // Kết nối Database
$ten_css = '<link rel="stylesheet" href="../css/home.css">';
require '../includes/header.php'; // Gọi thanh menu
?>

<section id="gioi-thieu-trang">
    <div class="gioi-thieu">
        <h2>Fast tracked WordPress plugin tutorials and lessons</h2>
        <p>
            In the previous part of this series we wrote the base class
            that we can then.
        </p>

        <span class="bat-dau">
            Start here:
            <a href="">Affiliate Marketing,</a>
            <a href="">Business,</a>
            <a href="">Social Media,</a>
            <a href="">SEO</a>
        </span>
    </div>
</section>

<section id="bai-noi-bat">
    <div class="khung-bai-noi-bat">
        <div class="khung-bai-nb-trai">
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
                        <h2>NEWEST LESSON</h2>
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
                        LIMIT 2 OFFSET 1";
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
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="khu-vuc-nut">
                <a href="list_lesson.php" class="nut-xem-them">Browse all lessons</a>
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
        </div>
    </div>
</section>

<section id="featured">
    <div class="khung-featured">
        <h2 class="tieu-de-featured">Our Featured WordPress Plugins</h2>
        <div class="noi-dung-featured">
            <?php
            $sql = "SELECT * FROM posts 
                        WHERE type = 'plugin' 
                        ORDER BY id DESC 
                        LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="featured-item">
                        <div class="card-img">
                            <?php if (!empty($row['image'])): ?>
                                <img src="../uploads/<?php echo $row['image']; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="item-content">
                            <h3 class="card-title">
                                <a href="detail.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h3>
                            <p class="card-content line-3">
                                <?php echo strip_tags($row['content']); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <div class=" khu-vuc-nut">
            <a href="#" class="nut-xem-them">Browse all featured plugins</a>
        </div>
    </div>
</section>

<section id="featured-story">
    <div class="khung-featured">
        <h2 class="tieu-de-featured">Our Featured WordPress Story</h2>
        <div class="noi-dung-featured">
            <?php
            $sql = "SELECT * FROM posts 
                        WHERE type = 'plugin' 
                        ORDER BY id DESC 
                        LIMIT 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="featured-item">
                        <div class="card-img">
                            <?php if (!empty($row['image'])): ?>
                                <img src="../uploads/<?php echo $row['image']; ?>">
                            <?php endif; ?>
                        </div>
                        <div class="item-content">
                            <h3 class="card-title">
                                <a href="detail.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                            </h3>
                            <p class="card-content line-3">
                                <?php echo strip_tags($row['content']); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <div class=" khu-vuc-nut">
            <a href="#" class="nut-xem-them">Browse all featured plugins</a>
        </div>
    </div>
</section>

<section id="start-here">
    <div class="khung-start-here">
        <div class="nd-start-here">
            <h2>Start Here...</h2>
            <div class="start-ds-item">
                <a href="" class="start-item">
                    <div class="logo-item">
                        <img src="../images/ecommerce.png" alt="">
                    </div>
                    <p>Ecommerce</p>
                </a>
                <a href="" class="start-item">
                    <div class="logo-item">
                        <img src="../images/blogging.png" alt="">
                    </div>
                    <p>Blogging</p>
                </a>
                <a href="" class="start-item">
                    <div class="logo-item">
                        <img src="../images/seo.png" alt="">
                    </div>
                    <p>SEO</p>
                </a>
                <a href="" class="start-item">
                    <div class="logo-item">
                        <img src="../images/marketing.png" alt="">
                    </div>
                    <p>Marketing</p>
                </a>
                <a href="" class="start-item">
                    <div class="logo-item">
                        <img src="../images/builders.png" alt="">
                    </div>
                    <p>Builders</p>
                </a>
                <a href="" class="start-item">
                    <div class="logo-item">
                        <img src="../images/security.png" alt="">
                    </div>
                    <p>Security</p>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
include '../includes/footer.php';
?>