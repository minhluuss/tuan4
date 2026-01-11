<?php
session_start();
require '../includes/config.php'; // Kết nối Database
$ten_css = '<link rel="stylesheet" href="../css/lesson_page.css">';
require '../includes/header.php'; // Gọi thanh menu
?>

<div class="main-container">
    <div class="khung-list-lesson">
        <div class="khung-trai">
            <div class="khung-trai-tren">
                <div class="khung-trai-mot">
                    <div class="section-title">
                        <div class="duong-dan">
                            <a href="home.php">PluginTown/ </a>
                            <a href="lesson_list.php">Lessons/ </a>
                            <a href="">Ecommecre</a>
                        </div>
                    </div>
                    <div class="tieu-de-bai-e">
                        <h2>Creating a Custom Database for WordPress</h2>
                        <p>Last update March 18th, 2022, Posted by <a href="">Publication Team</a> </p>
                    </div>
                    <div class="img-e">
                        <img src="../images/LessonsPageim1.png" alt="">
                    </div>
                    <div class="mo-ta-e">
                        <p>
                            Are you looking for the best WordPress database plugins for your site?<br>
                        </p>
                        <p>
                            WordPress database plugins can help you clean up your database to improve
                            website performance, assist with website migrations, and more. <br>
                        </p>
                        <p>
                            In this article, we've hand picked some of the <span>best database plugins</span> for your
                            WordPress site.
                        </p>
                        <h2>Why Use a WordPress Database Plugin?</h2>
                        <p>
                            WordPress stores a lot of information in your database, from comments, to
                            posts, user information, plugin data, and more. <br>
                        </p>
                        <p>
                            Over time your database can become cluttered, which can slow down your
                            website and even cause WordPress errors. WordPress database plugins can
                            help optimize and clean up your database to make sure your site is as fast
                            as possible.
                        </p>
                        <p>
                            Other WordPress database plugins can help you store and display data,
                            backup your database to keep your site safe, and more.
                        </p>
                        <h1>Header 1</h1>
                        <h2>Header 2</h2>
                        <h3>Header 3</h3>
                        <h4>Header 4</h4>
                        <h5>Header 5</h5>
                        <h6>Header 6</h6>
                        <h6>Bold</h6>
                        <h6 class="chu-nghieng">Italic</h6>

                        <ul class="ds bullet">
                            <li>
                                <p>Bullet Point 1</p>
                            </li>
                            <li>
                                <p>Bullet Point 2</p>
                            </li>
                            <li>
                                <p>Bullet Point 3</p>
                            </li>
                        </ul>
                        <ul class="ds number">
                            <li>
                                <p>Number Point 1</p>
                            </li>
                            <li>
                                <p>Number Point 2</p>
                            </li>
                            <li>
                                <p>Number Point 3</p>
                            </li>
                        </ul>
                        <div class="img-e">
                            <img src="../images/LessonsPageim2.png" alt="">
                        </div>
                        <div class="note">
                            <p>Note: the user account the API keys are associated with must have the
                                capabilities in order for the API to work. Typically this means the user
                                have the Administrator role. See our documentation on <span>roles and capab</span>
                                more information.
                            </p>
                        </div>
                        <a href="" class="link">Link</a>
                        <p class="gach-giua">Strike</p>
                        <div class="code">
                            <pre>
                        {
                            "code": "rest_forbidden",
                            "message": "Sorry, you are not allowed to do that.",
                            "data": {
                                "status": 403
                            }
                        }
                        </pre>
                        </div>
                        <p>Over time your database can become cluttered, which can slow down your
                            website and even cause WordPress errors. WordPress database plugins can
                            help optimize and clean up your database to make sure your site is as fast
                            as possible.
                        </p>

                        <div class="social-media-share">
                            <p>Did you like this and find it helpful? Share it...</p>
                            <div class="social-media-share-item">
                                <a href="#" class="fb"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="tw"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="pt"><i class="fa-brands fa-pinterest-p"></i></a>
                                <a href="#" class="ig"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="plus"><i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="related-lessons">
                            <h3>Related Lessons</h3>

                            <div class="related-list">
                                <?php
                                $sql = "SELECT * 
                            FROM posts 
                            WHERE type = 'plugin' 
                            ORDER BY id DESC 
                            LIMIT 3";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="related-item">
                                            <img src="../uploads/<?= $row['image']; ?>" alt="">
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="khung-trai-duoi">
                <div class="author box">
                    <div class="img-a">
                        <img src="../images/logo2.png" alt="">
                    </div>
                    <div class="mota-a">
                        <h3>About the <span>Publication team</span></h3>
                        <p>
                            The Publication Team is a group of WordPress professionals that love and use
                            WordPress
                            Plugins evrery day.
                        </p>
                    </div>
                </div>
                <div class="youtube box">
                    <div class="img-a">
                        <img src="../images/youtube.png" alt="">
                    </div>
                    <div class="mota-a">
                        <p>Over-The-Shoulder Video Tutorials</p>
                        <p>Check out our YouTube channel in which we teach you how to
                            grow your WordPress site using plugins.
                        </p>
                        <a href="">Check out our YouTube channel and subscribe</a>
                    </div>
                </div>
                <div class="comment">
                    <h2>Comment</h2>
                    <div class="comment-nd">
                        <p>no comment </p>
                    </div>
                </div>
                <div class="leave-comment">
                    <h2>Leave a comment</h2>
                    <div class="body-leave-comment">
                        <div class="thong-tin-comment">
                            <div class="input-comment name">
                                <input type="text" name="name" placeholder="Name (required)">
                            </div>
                            <div class="input-comment">
                                <input type="text" name="email" placeholder="Email (required)">
                            </div>
                        </div>
                        <div class="noi-dung-comment">
                            <input type="text" name="comment" placeholder="Add a comment">
                        </div>
                        <div class="notify">
                            <div class="notify-trai">
                                <select name="notify" id="">
                                    <option value="0">Don't notify me</option>
                                    <option value="1">Notify me of replies </option>
                                </select>
                                <span>Notify me of new replies via email.</span>
                            </div>
                            <div class="notify-phai">
                                <button class="btn"><a href="">Post comment</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--khung phải-->
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
                <img src="../images/background-ban-hoc-3.jpg" alt="">
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