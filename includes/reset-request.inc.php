<?php
if (isset($_POST['reset-request-submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "https://convertedcode.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require "../core/init.php";

    $userEmail = $_POST["email"];
    if (empty($userEmail)) {
        header("Location: ../reset.php?error=emptyfields");
        exit();
    } else {
        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error ";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error ";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db);


        $to = $userEmail;

        $subject = "Password reset for ConvertedCode";

        $message = "<p>We received a reset password request. The link to reset your password is below. If you didn't make this request, you can ignore this email  </p>";

        $message .= "<p> Here is your password reset link: </br>";

        $message .= '<a href="' . $url . '">' . $url . '</a></p>';

        $header = "From: ConvertedCode <reset@convertedcode.com>\r\n";
        $header .= "Reply-To: <support@convertedcode.com>\r\n";
        $header .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $header);

        header("Location: ../reset.php?reset=success");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}