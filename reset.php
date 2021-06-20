<?php
$page = "reset";
define("TITLE", "Reset Password | ConvertedCode");
include "includes/header.php"
?>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Reset Password</h2>

                <?php
                if (isset($_GET['reset'])) {
                    if ($_GET['reset'] == "success") {
                        echo "<div class='alert alert-success alert-dismissible fade show ' role='alert'>
                 <p style='color: black;'> Password Reset Link sent, kindly check your Email !</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    } elseif ($_GET['reset'] == "emptyfields") {
                        echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'>
                 <p style='color: black;'> Email is Required! </p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
                    }
                }
                ?>
                <form method="POST" action="includes/reset-request.inc.php">

                    <div class="input-group">
                        <input class="input--style-3" type="email" placeholder="Enter Email" name="email">
                    </div>

                    <input class="btn btn--pill btn--green" type="submit" value="Reset Password"
                        name="reset-request-submit">
            </div>

            </form>



        </div>

    </div>

</div>
</div>


<?php
include "includes/footer.php"
?>