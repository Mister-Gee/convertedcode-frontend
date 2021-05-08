<?php
$page = "matchReview";
define("TITLE", "Match Review | ConvertedCode");
include "includes/header.php"
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Match Reviews</h2>
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Match Reviews</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM matchreview ORDER BY id DESC LIMIT 9";
            $query = $db->query($sql);
            while ($matchreview = mysqli_fetch_assoc($query)) {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="<?php echo $matchreview["image_dir"]; ?>" alt="<?php echo $matchreview["title"]; ?>">
                    </div>
                    <div class="blog__item__text">
                        <h5><a
                                href="match-review-details.php?id=<?php echo $matchreview["id"]; ?>"><?php echo $matchreview["title"]; ?></a>
                        </h5>
                        <ul>
                            <li> <?php echo $matchreview["author"]; ?></li>
                            <li><?php echo $matchreview["date_time"]; ?></li>
                            <?php
                                if (isset($_SESSION['UserID']) && $_SESSION['UserID'] < 5) {

                                ?>
                            <li>
                                <form method="POST" action="includes/del-mr.inc.php">
                                    <input type="hidden" value="<?php echo $matchreview["id"]; ?>" name="id">
                                    <input type="submit" class="site-btn post-del mt-2" value="Delete" name="del-mr">
                                </form>
                            </li>
                            <?php  } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <?php } ?>
            <div class="col-lg-12 text-center">
                <div class="load__more">
                    <a href="#" class="primary-btn">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->


<?php
include "includes/footer.php"
?>