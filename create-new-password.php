<?php
$page = "signin";
define("TITLE", "Create New Password | ConvertedCode");
include "includes/header.php"
?>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        <div class="card card-3">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Create New Password</h2>

                <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
          echo "Request couldn't be validated";
        } else {
          if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>

                <form method="POST" action="includes/reset-password.inc.php">

                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Enter New Password" name="pwd">
                    </div>
                    <div class="input-group">
                        <input class="input--style-3" type="password" placeholder="Repeat New Password"
                            name="pwdRepeat">
                    </div>

                    <input class="btn btn--pill btn--green" type="submit" value="Reset Password"
                        name="reset-password-submit">
            </div>

            </form>


            <?php
          }
        }
  ?>

            <?php
  if (isset($_GET['reset'])) {
    if ($_GET['reset'] == "success") {
      echo "<div class='alert alert-success alert-dismissible fade show ' role='alert'>
                 <p> Password Reset Successful !</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
    }
  }
  ?>


        </div>

    </div>

</div>
</div>


<?php
include "includes/footer.php"
?>