<?php
if (isset($_POST['signin-submit'])) {


    require "../core/init.php";

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    if (empty($email) || empty($pwd)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($pwd, $row['pwd']);
                if ($passwordCheck == false) {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                } elseif ($passwordCheck == true) {
                    session_start();
                    $_SESSION['UserID'] = $row['id'];
                    $_SESSION['Name'] = $row['username'];
                    $_SESSION['Email'] = $row['email'];
                    $_SESSION['pNum'] = $row['phone'];
                    $_SESSION['Gender'] = $row['gender'];

                    header("Location: ../dashboard.php?login=success");
                    exit();
                } else {
                    header("Location: ../login.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}