<?php
session_start();
require '../includes/config.php';
$ten_css = '<link rel="stylesheet" href="../css/search.css">';
require '../includes/header.php'; // Đã tự động nhúng style.css rồi
?>

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

<?php include '../includes/footer.php'; ?>