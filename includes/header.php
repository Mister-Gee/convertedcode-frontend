<?php
session_start();
require_once 'core/init.php'
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bet Booking Code Converter">
    <meta name="keywords" content="Bet, Tips, Odds, Convert, Converter">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo TITLE ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <link rel="icon" type="image/ico" href="img/favicon/favicon.ico">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="img/logo.png" alt="" width="30%"> <span
                    class="titletext">Converted<span>Code</span></span>

            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__btn">
            <a href="./contact.php" class="site-btn">Contact Us</a>
        </div>
        <ul class="offcanvas__widget">
            <li><i class="fa fa-envelope"></i><a href="mailto:convertedcode@gmail.com"> Convertedcode@gmail.com </a>
            </li>

        </ul>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>

        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="header__top__left">
                            <li><i class="fa fa-envelope"></i><a href="mailto:convertedcode@gmail.com">
                                    Convertedcode@gmail.com </a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="header__top__right">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""><span
                                class="titletext txt">Converted<span>Code </span></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__menu__option">
                        <nav class="header__menu">
                            <ul>
                                <li class="<?php if ($page == "index") {
                                                echo "active";
                                            } ?>"><a href="./index.php">Home</a></li>
                                <li class="<?php if ($page == "betcodes") {
                                                echo "active";
                                            } ?>"><a href="./betcodes.php">Bet Codes</a></li>
                                <li class="<?php if ($page == "matchReview") {
                                                echo "active";
                                            } ?>"><a href="./match-review.php">Match Review</a></li>
                                <li class="<?php if ($page == "about") {
                                                echo "active";
                                            } ?>"><a href="./about.php">About Us</a></li>
                                <li><?php
                                    if (isset($_SESSION['UserID'])) {
                                        $id = $_SESSION['UserID'];
                                        $name = $_SESSION['Name'];
                                        $pNum = $_SESSION['pNum'];
                                        $email =  $_SESSION['Email'];

                                        echo ' <a href="#" >User</a>
                                        <ul class="dropdown">
                                        <li><a href="dashboard.php">Dashboard</a></li>
                                        <li><a href="./includes/logout.inc.php">Logout</a></li>
                                        </ul>';
                                    } else {

                                        echo '  <a href="#" >Sign In</a>
                                        <ul class="dropdown">
                                        <li><a href="login.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                        </ul>';
                                    }

                                    ?>
                                </li>
                            </ul>
                        </nav>
                        <div class="header__btn">
                            <a href="./contact.php" class="site-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->