<?php 
if(isset($_POST['reg-submit'])){


    require "../core/init.php";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone'];
    $pwd = $_POST['pwd'];
    $pwdRepeat= $_POST['rpwd'];

    if(empty($name) || empty($email) || empty($phonenumber) || empty($pwd) || empty($pwdRepeat)) {
        header("Location: ../register.php?error=emptyfields&name=".$name."&mail=". $email."&pn=".$phonenumber);
        exit();

    }
    
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidmail&name=".$name."&pn=".$phonenumber);
        exit();
    }
   
    elseif ($pwd !== $pwdRepeat) {
        header("Location: ../register.php?error=passwordcheck&name=".$name."&mail=". $email."&pn=".$phonenumber);
        exit();
    }
    else{
        $sql = "SELECT email FROM users WHERE email =? ";
        $stmt = mysqli_stmt_init($db);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?error=sqlerror");
            exit();  
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt); 
            if($resultCheck > 0) {
                header("Location: ../register.php?error=emailtaken&name=".$name);
                exit();    
            }
            else{
                $sql = "INSERT INTO users (username, gender, email, phone, pwd) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($db);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../register.php?error=sqlerror");
                    exit();  
                }
                else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssis",$name, $gender, $email, $phonenumber,  $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();  
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);

}
else{
    header("Location: ../register.php");
    exit();   
}