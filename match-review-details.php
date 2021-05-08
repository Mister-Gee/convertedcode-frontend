<?php
$page = "matchReview";
require_once 'core/init.php';

if (isset($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $sql = "SELECT * FROM matchreview WHERE id = $id";
    $query = $db->query($sql);
    while ($review = mysqli_fetch_assoc($query)) {
        define("TITLE", $review['title'] . " | ConvertedCodes");
        include "includes/header.php"
?>

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="blog__details__hero ">
            <img src="<?php echo $review['image_dir'] ?>" alt="<?php echo $review['title'] ?>" width="100%">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7 text-center">

                    <div class="blog__hero__text">
                        <h2><?php echo $review['title'] ?></h2>
                        <ul>
                            <li> <?php echo $review['author'] ?></li>
                            <li><?php echo $review['date_time'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
                <div class="blog__details__text">
                    <div class="blog__details__text__item">

                        <p><?php echo $review['content'] ?></p>
                    </div>

                </div>

            </div>
            <div class="col-lg-8">

                <div class="blog__details__text">


                </div>
                <div class="blog__details__tag">
                    <p><i class="fa fa-tag"></i> Tag:</p>
                    <a href="#">Football</a>
                    <a href="#">Tottenham</a>
                    <a href="#">Arsenal</a>
                </div>
                <div class="blog__details__btns">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="?id=<?php echo $review['id'] - 1 ?>" class="blog__details__btn__item">
                                <h6 class="title"><i class="fa fa-angle-left"></i> Previous posts</h6>

                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="?id=<?php echo $review['id'] + 1 ?>"
                                class="blog__details__btn__item blog__details__btn__prev">
                                <h6 class="title">Next posts <i class="fa fa-angle-right"></i></h6>


                            </a>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
                ?>
                <div class="blog__details__comment">
                    <h3>Leave a comment</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <input type="text" placeholder="Name">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <input type="text" placeholder="Email">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <input type="text" placeholder="Website">
                            </div>
                        </div>
                        <textarea placeholder="Comment"></textarea>
                        <button type="submit" class="site-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->


<?php
        include "includes/footer.php"
        ?>