<?php
$page = "index";
define("TITLE", "Home | ConvertedCode");
include "includes/header.php";
?>
<!-- Hero Section Begin -->
<section class="hero spad set-bg">
    <?php
    if (isset($_GET['login'])) {
        if ($_GET['login'] == "success") {
            echo "<div class='alert alert-success alert-dismissible fade show home-alert-box' role='alert'>
                 <p> Login Successful!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero__text">

                    <h2 style="font-size: 60px;">Welcome <br>To <br>Converted Codes</h2>
                    <a href="#" class="site-btn normal-btn">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Hero Section End -->

<!-- Consultation Section Begin -->
<section class="consultation">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="consultation__form">
                    <div class="section-title">
                        <span>Convert your</span>
                        <h2>Booking Code</h2>
                    </div>
                    <div class="form">
                        <label for="code">Booking Code:</label>
                        <input type="text" placeholder="Enter Booking Code here" name="code" id="code">
                        <label for="cf">Convert From:</label>
                        <select name="cf" id="cf">
                            <!-- <option value="1xBet">1xBet</option> -->
                            <option value="22Bet">22Bet</option>
                            <option value="Bet9ja">Bet9ja</option>
                            <option value="Betking">Betking</option>
                            <option value="Sportybet">Sportybet</option>
                        </select>
                        <label for="ct">Convert To:</label>
                        <select name="ct" id="ct">
                            <!-- <option value="1xBet">1xBet</option> -->
                            <option value="22Bet">22Bet</option>
                            <option value="Bet9ja">Bet9ja</option>
                            <option value="Betking">Betking</option>
                            <option value="Sportybet">Sportybet</option>
                        </select>
                        <button class="site-btn" name="convertcode" style="color: white;" id="convert"><i
                                class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="cbp">Convert
                                Code</span></button>
                        <div id="result">
                            <p id="error"></p>
                            <p id="games"></p>
                            <p><span id="response"></span> <span id="status"></span></p>
                            <p id="cgames"></p>
                            <p id="bcode"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="consultation__text">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="consultation__text__item">
                                <div class="section-title">
                                    <span>Welcome to ConvertedCode</span>
                                    <h2>Convert your booking codes to the booking code of your choice <b>CODE</b></h2>
                                </div>
                                <p>Lorem ipsum Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum delectus
                                    nemo nihil, dolores natus dolorum. Voluptate, veritatis? Aperiam ullam neque
                                    adipisci quaerat repellat cum ut? Amet impedit repellendus
                                    nihil quaerat.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="consultation__video">
                                <a href="https://t.co/EobQYwHxWY" class=""><img src="img/affliate.jpg"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Consultation Section End -->

<!-- Chooseus Section Begin -->
<section class="chooseus spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <span>Why choose us?</span>
                    <h2>Offer for you</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-exchange"></i>
                    <h5>Bet Code Conversions </h5>
                    <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-code"></i>
                    <h5>Free Bet Codes</h5>
                    <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-bar-chart"></i>
                    <h5>Match Reviews</h5>
                    <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-money"></i>
                    <h5>Reliable Tips</h5>
                    <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Chooseus Section End -->



<!-- Latest News Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-6">
                <div class="section-title">
                    <span>Latest</span>
                    <h2>Match Reviews</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="latest__btn">
                    <a href="match-review.php" class="primary-btn">View all Match Reviews</a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM matchreview ORDER BY id DESC LIMIT 9";
            $query = $db->query($sql);
            while ($matchreview = mysqli_fetch_assoc($query)) {
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item__pic">
                    <img src="<?php echo $matchreview["image_dir"]; ?>" alt="<?php echo $matchreview["title"]; ?>">
                </div>
                <div class="latest__item">
                    <h5><a
                            href="match-review-details.php?id=<?php echo $matchreview["id"]; ?>"><?php echo $matchreview["title"]; ?></a>
                    </h5>
                    <p><?php echo substr($matchreview["content"], 0, 60); ?>...</p>
                    <ul>
                        <li><?php echo $matchreview["author"]; ?></li>
                        <li><?php echo $matchreview["date_time"]; ?></li>
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Latest News End -->

<?php
include "includes/footer.php"
?>