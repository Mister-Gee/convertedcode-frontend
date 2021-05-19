<?php
$page = "signin";
define("TITLE","Login | ConvertedCode");
   include "includes/header.php"
?>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    
                    <?php
      if (isset($_GET['error'])) {
        if($_GET['error'] == "emptyfields"){
          echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> All fields are required!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
        }
        elseif($_GET['error'] == "sqlerror"){
          echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Server Error!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
        }
        elseif($_GET['error'] == "nouser"){
          echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Email does not exist!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
        }
        elseif($_GET['error'] == "wrongpassword"){
          echo "<div class='alert alert-danger alert-dismissible fade show alert-box' role='alert'>
                 <p> Wrong Password!</p>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
            </div>";
        }
      }
      elseif(isset($_GET['signup'])){
        if($_GET['signup'] == "success"){
        echo "<div class='alert alert-success alert-dismissible alert-box fade show' role='alert'>
              <p> <strong>Well Done</strong> SignUp successful</p>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
          </div>";
      }
    }
    elseif(isset($_GET['newpwd'])){
      if($_GET['newpwd'] == "updated"){
      echo "<div class='alert alert-success alert-dismissible alert-box fade show' role='alert'>
            <p> <strong>Well Done</strong> Password successfully changed</p>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button>
        </div>";
      }
    }
        ?>
                    <form method="POST" action="includes/login.inc.php">

                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="pwd">
                        </div>
                        
                        <input class="btn btn--pill btn--green" type="submit" value="Login" name="signin-submit"><br><br>
                        <p>Dont have an account yet? <a href="register.php">Register Here</a></p>
                </div>
                
                </form>
              
                  
                
            </div>
         
        </div>
       
    </div>
    </div>


    <?php
    include "includes/footer.php"
    ?>