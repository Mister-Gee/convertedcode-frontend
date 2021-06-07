<?php
$page = "user";
define("TITLE", "Dashboard | ConvertedCode");
include "includes/header.php";
if (isset($_SESSION['UserID'])) {
?>
s
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

<!-- Form Sections -->
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
                            <details id="unavailable" class="hide">
                                <summary>Unavailale Games & Option</summary>
                                <div id="unavailable-content"> </div>
                            </details>
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
                                        <b>Premium </b> plan
                                    </h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Upgrade</a>
                                    <a href="#" class="card-link">Cancel Subscription</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Conversion History</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Cras justo odio</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

        <!-- Pricing Section Begin -->
        <section class="pricing spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item">
                            <div class="pricing__item__title">
                                <p>Basic</p>
                                <h3>Subscription</h3>
                            </div>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 250</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 30 Days</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 20 Conversions</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> Access to Punters Code</h6>

                                </li>
                            </ul>
                            <a href="#" class="site-btn">Subscribe</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item">
                            <div class="pricing__item__title">
                                <p>Weekly</p>
                                <h3>Subscription</h3>
                            </div>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 350</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 7 Days</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> Unlimited Access</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> Unlimited Conversion</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-times" style="color: red;"></i>Bet Consultancy</h6>

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
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 1,000</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> 30 Days</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> Unlimited Access</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i> Unlimited Conversion</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-check" style="color: #2f970c;"></i>Bet Consultancy</h6>

                                </li>
                                <li>
                                    <h6><i class="fa fa-times" style="color: red;"></i>Bet Consultancy</h6>

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
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i> &#8358 200</h6>

                            </li>
                            <li>
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i> Friday - Sunday</h6>

                            </li>
                            <li>
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i> Unlimited Access</h6>

                            </li>
                            <li>
                                <h6><i class="fa fa-check" style="color: #2f970c;"></i> Unlimited Conversion</h6>

                            </li>
                            <li>
                                <h6><i class="fa fa-times" style="color: red;"></i>Bet Consultancy</h6>

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