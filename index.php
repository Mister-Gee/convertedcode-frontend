<?php
$page = "index";
define("TITLE", "Home | ConvertedCode");
include "includes/header.php";
?>
<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
        <a href="https://22bet.ng/registration/?tag=d_385933m_45453c_" target="_blank"><img
                src="./img/header/bet22.jpg"></a>
        <div class="text"><a href="https://22bet.ng/registration/?tag=d_385933m_45453c_" target="_blank"
                class="site-btn mobile-site-btn">Bet Now</a>
        </div>
    </div>

    <div class="mySlides fade">
        <img src="./img/header/banner1.JPG">
        <!-- <div class="text"></div> -->
    </div>

    <div class="mySlides fade">
        <img src="./img/header/banner2.JPG">
        <!-- <div class="text"></div> -->
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<!-- Hero Section Begin -->
<!-- <section class="hero spad set-bg"> -->
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
<!-- <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero__text">

                    <h2 style="font-size: 60px;">Welcome <br>To <br>Converted <span style="color: #f06e0c;">Codes</span>
                    </h2>
                    <a href="/login.php" class="site-btn normal-btn">Get Started</a>
                </div>
            </div>
        </div>
    </div> -->

</section>
<!-- Hero Section End -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">You are not Logged In!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Kindly click the button below to Register or Log In.
            </div>
            <div class="modal-footer">
                <a href="./register.php" class="btn btn--green">Register</a>
                <a href="./login.php" class="site-btn">Login</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter2Title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Conversion Unit Exhausted!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You are out of conversion unit, click on the button below to buy more
            </div>
            <div class="modal-footer">
                <a href="./dashboard.php#subscription" class="btn btn--green">Buy Conversion Unit</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter3Title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Maintainance!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You might experience non-converting problem on www.convertedcode.com, it's due to the overwhelming
                traffic, 2,000+ people are all converting at the same time, we never expected the traffic on the BETA
                VERSION since its not the final product.
                <br>
                So we would like to run some quick update to accomodate more conversions for the BETA VERSION.
                <br>
                Conversion will resume by 12pm today.

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['UserID'])) {
    $sql = "SELECT conversionUnit FROM users where id = $id";
    $query = $db->query($sql);
    $conversionData = mysqli_fetch_array($query);

?>
<span id="cvtdcd_id" style="display: none;"><?php echo $id ?></span>
<span id="cvtdcd_cu" style="display: none;"><?php echo $conversionData["conversionUnit"]; ?></span>
<?php
}
?>
<!-- Consultation Section Begin -->
<section class="consultation mt-5">
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
                        <!-- <button class="site-btn" style="color: white;" data-toggle="modal"
                                data-target="#exampleModalCenter3">Convert Code</button> -->
                        <?php
                        if (isset($_SESSION['UserID'])) {
                            if ($conversionData['conversionUnit'] > 0) {
                                echo '
                                <button class="site-btn" name="convertcode" style="color: white;" id="convert"><i
                                    class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="cbp">Convert
                                    Code</span></button>
                            ';
                            } else {
                                echo '
                            <button class="site-btn" style="color: white; background-color: grey;" data-toggle="modal"
                            data-target="#exampleModalCenter2">Convert Code</button>
                            ';
                            }
                        } else {
                            echo '
                            <button class="site-btn" style="color: white; background-color: grey;" data-toggle="modal"
                                data-target="#exampleModalCenter">Convert
                                Code</button>
                        ';
                        }
                        ?>

                        <div id="result">
                            <p id="error"></p>
                            <p id="games"></p>
                            <p><span id="response"></span><span id="status"></span></p>
                            <p id="cgames"></p>
                            <p id="bcode"></p>
                            <div id="successAlert" class="alert alert-success mt-3 hide alert-black" role="alert">
                            <b>Bet Code</b> copied to Clipboard
                            </div>
                            <details id="unavailable" class="hide">
                                <summary>Unavailale Games & Option</summary>
                                <div id="unavailable-content"> </div>
                            </details>
                        </div>
                        <div class="option-notice">
                            <div class="notice-header"><strong>Disclamer:</strong> Reasons your games might not be 100%
                                converted or convert all</div>
                            <ol>
                                <li>If options, teams, matches or leagues selected are not available in your destination
                                    bookies, it will be exempted from
                                    the final conversion.</li>
                                <!-- <li>If teams, matches or leagues are not available in your destination bookies, it will
                                    also be exempted from the final accumulation.</li> -->
                                <li>We can only convert what is available on your secondary bookie website (Teams &
                                    Option).</li>
                                <li>If your game is not converting, check your secondary bookie website to see if its
                                    available.</li>
                                <li>Always verify your Converted bookie code for abnormal odds, you can check with your
                                    primary code
                                    to fact check if you convert the correct option.</li>
                                <ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="consultation__text">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 smb">
                            <div class="consultation__text__item">
                                <div class="section-title">
                                    <span>Available Conversion Option</span>
                                </div>
                                <div class="option-table">
                                    <table class="table table-light table-hover  table-striped">
                                        <thead>
                                            <tr>
                                                <th>Option</th>
                                                <th>Bet9ja</th>
                                                <th>SportyBet</th>
                                                <th>Betking</th>
                                                <th>22Bet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="option-row">
                                                <td class="option-name">1X2</td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            <tr class="option-row">
                                                <td class="option-name">Double Chance</td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            <tr class="option-row">
                                                <td class="option-name">Over/Under</td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            <tr class="option-row">
                                                <td class="option-name">DNB</td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            <tr class="option-row">
                                                <td class="option-name">Handicap</td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    <i class="fa fa-check-circle option-check" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                            <tr class="option-row">
                                                <td colspan="4"> <a href="./available-options.php"
                                                        class="site-btn option-btn">View
                                                        All</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 smb-3 push-league">
                            <div class="consultation__video">
                                <div class="section-title">
                                    <span>Available Sports & Leagues</span>
                                    <div class="option-table smb-2">
                                        <table class="table table-dark table-hover  table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sports</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="option-row">
                                                    <td class="option-name">Football</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">#EURO2020</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">Copa America</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">EliteSerien(Norway)</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">Allsvenskan(Sweden)</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name" colspan="2"></td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">BasketBall</td>
                                                    <td>
                                                        Coming Soon
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">Hockey</td>
                                                    <td>
                                                        Coming Soon
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td colspan="2"> <a href="./available-leagues.php"
                                                            class="site-btn option-btn">View
                                                            All</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                    <p>The fastest and most reliable bet slip converter. This tool allows you to convert as many
                        betcodes from one betting platform to another.</p>
                    <!-- First, enter the betslip code you have, then select the platform where the code was generated
                        from the options available. Finally select the platform you want your code to be converter to.
                        In
                        a few moments your codes will be converted.-->
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-code"></i>
                    <h5>Free Bet Codes</h5>
                    <p>Find and enjoy the coolest and latest free bet codes. Just sign up to claim your reward.
                        Offer exists for all users!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-bar-chart"></i>
                    <h5>Match Reviews</h5>
                    <p>We breakdown each match by considering the stats of the team's previous matches, and provide you
                        the mostly likely outcome. This allows you to make the best possible decision before you place
                        your bet.</p>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-money"></i>
                    <h5>Bet Consultancy</h5>
                    <p>Through in-depth analysis of various sport matches and several tips that can improve your betting
                        skills, you can gain the maximum income possible through betting.</p>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-money"></i>
                    <h5>Punters Tips</h5>
                    <p>Saving your precious time by bringing together all the daily bet codes from your favourite Punter
                        (tipster) and Africa Finest tipsters. This page will save you the stress of navigating the
                        internet for daily best bet codes</p>
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
            $sql = "SELECT * FROM matchreview ORDER BY id DESC LIMIT 6";
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