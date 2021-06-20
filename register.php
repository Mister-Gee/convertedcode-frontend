<?php
$page = "signin";
define("TITLE", "Register | ConvertedCode");
include "includes/header.php"
?>


<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Register</h2>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> All fields are required!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    } elseif ($_GET['error'] == "invalidmail") {
                        echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Invalid Email!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    } elseif ($_GET['error'] == "passwordcheck") {
                        echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Your Password do not match!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    } elseif ($_GET['error'] == "emailtaken") {
                        echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> You are a registered user already, Login to continue !</p>
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
                    } elseif ($_GET['error'] == "newpwderror") {
                        echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                <p> New password fields can't be empty <br> Pls restart the process !</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    } elseif ($_GET['error'] == "pwdmatchfail") {
                        echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                <p> New password do not match <br> Pls restart the process !</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    }
                }


                ?>
                <form method="POST" action="includes/signup.inc.php">
                    <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Name" name="name">
                    </div>

                    <div class="input-group gender">
                        <select name="gender">
                            <option disabled="disabled" selected="selected">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="email" placeholder="Email" name="email">
                    </div>
                    <!-- <div class="input-group">
                        <input class="input--style-3" type="tel" placeholder="Phone" name="phone">
                    </div> -->
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Password" name="pwd">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Repeat Password" name="rpwd">
                    </div>
                    <div class="p-t-10">
                        <input class="btn btn--pill btn--green" type="submit" value="Register" name="reg-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include "includes/footer.php"
?>