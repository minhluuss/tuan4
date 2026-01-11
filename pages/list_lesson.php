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

        </div>
    </div>

</div>

<?php require '../includes/footer.php'; ?>