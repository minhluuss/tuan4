<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PluginTown</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">

    <?php if (isset($ten_css)) {
        echo $ten_css;
    } ?>
</head>

<body>

    <header class="dau-trang">
        <div class="khung-dau-trang">

            <!-- LOGO -->
            <div class="header-logo">
                <a href="../pages/home.php">
                    <img src="../images/logoHome-Page.png" class="logo">
                    <span class="logo-text">
                        <strong>plugin</strong>town
                    </span>
                </a>
            </div>

            <!-- TÌM KIẾM -->
            <form class="o-tim-kiem" action="search.html" method="get">
                <input type="text" name="q" placeholder="Tìm plugin, bài học...">
                <button type="submit">🔍</button>
            </form>

            <!-- MENU -->
            <nav class="menu-chinh">
                <?php
                if (isset($_SESSION['username']) && $_SESSION['role'] == 1) {
                    echo '<a href="../admin/add_post.php">Add</a>';
                }
                ?>
                <a href="../pages/list_lesson.php">Lessons</a>
                <a href="../pages/plugins.php">Plugins</a>
                <a href="../pages/resources.php">Resources</a>
                <a href="../pages/academy.php">Academy</a>
                <a href="../pages/login.php">Login</a>
            </nav>

        </div>
    </header>