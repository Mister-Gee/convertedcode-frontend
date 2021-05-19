<?php
if(isset($_POST["reset-password-submit"])){
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwdRepeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=newpwderror");
        exit();
    }
    elseif($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=pwdmatchfail");
        exit();
    }

    $currentDate = date("U");

    require "../core/init.php";

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
       echo "There was an error ";
       exit();
    }
    else {
       
        mysqli_stmt_bind_param($stmt, "si", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request ";
        }
        else{
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "You need to re-submit your reset request ";
                exit();
            }
            elseif($tokenCheck === true) {
                $tokenEmail = $row["pwdResetEmail"];

                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = mysqli_stmt_init($db);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                   echo "There was an error ";
                   exit();
                }
                else {
                   
                   mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                   mysqli_stmt_execute($stmt);

                   $result = mysqli_stmt_get_result($stmt);

                   if (!$row = mysqli_fetch_assoc($result)) {
                       echo "There was an error ";
                   }
                   else{
                        $sql = "UPDATE users SET pwd = ? WHERE email = ?";
                        $stmt = mysqli_stmt_init($db);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                           echo "There was an error ";
                           exit();
                        }
                        else {
                           $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                           mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                           mysqli_stmt_execute($stmt);

                           $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
                           $stmt = mysqli_stmt_init($db);
                           if (!mysqli_stmt_prepare($stmt, $sql)) {
                              echo "There was an error ";
                              exit();
                           }
                           else {
                               mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                               mysqli_stmt_execute($stmt);
                               header("Location: ../login.php?newpwd=updated");
                           }
                        }
                   }
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
else{
    header("Location: ../index.php");
    exit();
}