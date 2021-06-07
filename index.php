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

                    <h2 style="font-size: 60px;">Welcome <br>To <br>Converted <span style="color: #f06e0c;">Codes</span>
                    </h2>
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
                        <button class="site-btn" name="convertcode" style="color: white; background-color: grey;"
                            id="convert" disabled><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span
                                class="cbp">Convert
                                Code</span></button>
                        <div id="result">
                            <p id="error"></p>
                            <p id="games"></p>
                            <p><span id="response"></span><span id="status"></span></p>
                            <p id="cgames"></p>
                            <p id="bcode"></p>
                            <details id="unavailable" class="hide">
                                <summary>Unavailale Games & Option</summary>
                                <div id="unavailable-content"> </div>
                            </details>
                        </div>
                        <div class="option-notice">
                            <div class="notice-header"><strong>Disclamer:</strong> Reasons your games might not be 100%
                                converted</div>
                            <ol>
                                <li>If options are not available in your destination bookies, it will be exempted from
                                    the final accumulation.</li>
                                <li>If teams, matches or leagues are not available in your destination bookies, it will
                                    also be exempted from the final accumulation.</li>
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
                                                <td colspan="4"> <a href="./available-options.php"
                                                        class="site-btn option-btn">View
                                                        All</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 smb-3">
                            <div class="consultation__video">
                                <div class="section-title">
                                    <span>Available Sports & Leagues</span>
                                    <div class="option-table smb-2">
                                        <table class="table table-dark table-hover  table-striped">
                                            <thead>
                                                <tr>
                                                    <th>League/Sports</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="option-row">
                                                    <td class="option-name">EPL</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">La Liga Satander</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">Seria A</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">Bundesliga</td>
                                                    <td>
                                                        <i class="fa fa-check-circle option-check"
                                                            aria-hidden="true"></i>
                                                    </td>
                                                </tr>
                                                <tr class="option-row">
                                                    <td class="option-name">French Ligue 1</td>
                                                    <td>
                                                        <i class="fa fa-times-circle option-times"
                                                            aria-hidden="true"></i>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chooseus__item">
                    <i class="fa fa-money"></i>
                    <h5>Bet Consultancy</h5>
                    <p>Through in-depth analysis of various sport matches and several tips that can improve your betting
                        skills, you can gain the maximum income possible through betting.</p>
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