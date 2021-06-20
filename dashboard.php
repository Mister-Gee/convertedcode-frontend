<?php
$page = "user";
define("TITLE", "Dashboard | ConvertedCode");
include "includes/header.php";
if (isset($_SESSION['UserID'])) {
    $id = $_SESSION['UserID'];
    $status = $_SESSION['isAdmin'];
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option spad set-bg" data-setbg="img/breadcrumb-bg.jpg">

    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <?php
                        if (isset($_GET['login'])) {
                            if ($_GET['login'] == "success") {
                                echo "<div class='alert alert-success alert-dismissible fade show home-alert-box dasboard-alert' role='alert'>
                        <p> Login Successful!</p>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
                            }
                        }
                        ?>
                    <h2>Dashboard</h2>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Dashboard</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<?php
    $sql = "SELECT conversionUnit, conversionPlan FROM users where id = $id";
    $query = $db->query($sql);
    $conversionData = mysqli_fetch_array($query);

    ?>
<!-- Form Sections -->
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
                <a href="#subscription" class="btn btn--green">Buy Conversion Unit</a>
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
<section class="consultation mt-5 push-league">
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
                        <?php
                            if ($conversionData["conversionUnit"] > 0) {
                                $btn = '                        <button class="site-btn" style="color: white;" data-toggle="modal"
                                data-target="#exampleModalCenter3">Convert Code</button>';
                            ?>
                        <button class="site-btn" name="convertcode" style="color: white;" id="convert"><i
                                class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="cbp">Convert
                                Code</span></button>

                        <?php
                            } else {

                            ?>
                        <button class="site-btn" style="color: white; background-color: grey;" data-toggle="modal"
                            data-target="#exampleModalCenter2">Convert Code</button>
                        <?php
                            }
                            ?>
                        <div id="result">
                            <p id="error"></p>
                            <p id="games"></p>
                            <p><span id="response"></span> <span id="status"></span></p>
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
                        <div class="col-lg-6 col-md-6">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-2">Current Subscription</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">You are currently subscribed to the
                                        <b><?php echo $conversionData["conversionPlan"] ?></b> plan
                                    </h6>
                                    <p class="card-text"><b>Conversion Unit(s):</b>
                                        <span id="cvtdcd_id" style="display: none;"><?php echo $id ?></span>
                                        <span id="cvtdcd_cu"><?php echo $conversionData["conversionUnit"]; ?></span>
                                    </p>
                                    <a href="#subscription" class="card-link mt-2">Upgrade</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card mt-sm-5">
                                <div class="card-body">
                                    <h4 class="card-title">Conversion History</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">Previous codes converted
                                    </h6>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <!-- <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    if ($status == 'true') {
    ?>
<div class="bg-contact2">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form class="contact2-form validate-form" method="POST" action="includes/post-mr.inc.php"
                enctype="multipart/form-data">
                <span class="contact2-form-title" id="matchreview">
                    Post Match Review
                </span>
                <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> All fields are required!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                            } elseif ($_GET['error'] == "sqlerror") {
                                echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Server Error!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                            } elseif ($_GET['error'] == "invalidImg") {
                                echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Invalid Image type!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                            } elseif ($_GET['error'] == "uploadError") {
                                echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Upload Error!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                            } elseif ($_GET['error'] == "imgTooBig") {
                                echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                   <p> Image size too big!</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
              </div>";
                            }
                        } elseif (isset($_GET['post'])) {
                            if ($_GET['post'] == "success") {
                                echo "<div class='alert alert-success alert-dismissible alert-box fade show' role='alert'>
              <p> <strong>Well Done</strong> Post successful</p>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
          </div>";
                            }
                        }


                        ?>
                <div class="wrap-input2 validate-input" data-validate="Title is required">
                    <input class="input2" type="text" name="title">
                    <span class="focus-input2" data-placeholder="TITLE"></span>
                </div>

                <div class="wrap-input2 validate-input">
                    <input class="input2" type="file" name="img">
                    <span class="focus-input2" data-placeholder="IMAGE"></span>
                </div>

                <div class="wrap-input2 validate-input" data-validate="Content is required">
                    <textarea class="input2" name="content"></textarea>
                    <span class="focus-input2" data-placeholder="Content"></span>
                </div>
                <input type="hidden" value="<?php echo $name ?>" name="author">
                <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <input class="site-btn" type="submit" value="Post" name="post-mr">

                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="bg-contact2">
        <div class="container-contact2">
            <div class="wrap-contact2">
                <form class="contact2-form validate-form" method="POST" action="includes/post-bc.inc.php">
                    <span class="contact2-form-title" id="betcode">
                        Post Bet Codes
                    </span>
                    <?php
                            if (isset($_GET['error1'])) {
                                if ($_GET['error1'] == "emptyfields") {
                                    echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> All fields are required!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                                } elseif ($_GET['error1'] == "sqlerror") {
                                    echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Server Error!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                                }
                            } elseif (isset($_GET['post1'])) {
                                if ($_GET['post1'] == "success") {
                                    echo "<div class='alert alert-success alert-dismissible alert-box fade show' role='alert'>
              <p> <strong>Well Done</strong> Post successful</p>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
          </div>";
                                }
                            }


                            ?>
                    <div class="wrap-input2 validate-input" data-validate="Punter is required">
                        <input class="input2" type="text" name="punter">
                        <span class="focus-input2" data-placeholder="PUNTER"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Bet Code is required">
                        <input class="input2" type="text" name="betcode">
                        <span class="focus-input2" data-placeholder="BET CODE"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Bookie is required">
                        <input class="input2" type="text" name="bookie">
                        <span class="focus-input2" data-placeholder="BOOKIE"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Odds is required">
                        <input class="input2" type="text" name="odds">
                        <span class="focus-input2" data-placeholder="ODDS"></span>
                    </div>

                    <div class="container-contact2-form-btn">
                        <div class="wrap-contact2-form-btn">
                            <div class="contact2-form-bgbtn"></div>
                            <input class="site-btn" type="submit" value="Post" name="post-bc">

                        </div>
                    </div>

                </form>
            </div>
        </div>
        <?php
        }
            ?>

        <!-- Pricing Section Begin -->
        <section class="pricing spad" id="subscription">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item">
                            <div class="pricing__item__title">
                                <p>Daily</p>
                                <h3>Subscription</h3>
                            </div>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 100</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 24 Hours</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 6 Units of Conversion</h6>

                                </li>
                                <!-- <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> Access to Punters Code</h6>

                                </li> -->
                            </ul>
                            <a href="#" class="site-btn">Subscribe</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item">
                            <div class="pricing__item__title">
                                <p>Monthly</p>
                                <h3>Subscription</h3>
                            </div>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 1000</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 30 Days</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 60 Units of Conversion</h6>

                                </li>
                            </ul>
                            <a href="#" class="site-btn">Subscribe</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item">
                            <div class="pricing__item__title">
                                <p>Premium</p>
                                <h3>Subscription</h3>
                            </div>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 3,000</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 30 Days</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i>220 Units of Conversion</h6>

                                </li>
                            </ul>
                            <a href="#" class="site-btn">Subscribe</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="pricing__item">
                        <div class="pricing__item__title">
                            <p>Weekend</p>
                            <h3>Subscription</h3>
                        </div>
                        <ul>
                            <li>
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 250</h6>

                            </li>
                            <li>
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i> Saturday - Sunday</h6>

                            </li>
                            <li>
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i>20 Units of Conversion</h6>

                            </li>
                        </ul>
                        <a href="#" class="site-btn">Subscribe</a>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- Pricing Section End -->

    <?php
    } else {
        header("Location: index.php");
        exit();
    }
    include "includes/footer.php";
        ?>