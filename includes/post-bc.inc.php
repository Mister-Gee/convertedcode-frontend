<?php
if(isset($_POST["post-bc"])){

    require "../core/init.php";

    $punter = $_POST["punter"];
    $betcode = $_POST["betcode"];
    $bookie = $_POST["bookie"];
    $odds = $_POST["odds"];
 
    if(empty($punter)  || empty($betcode) || empty($bookie) || empty($odds) ) {
        header("Location: ../dashboard.php?error1=emptyfields#betcode");
        exit();  
    }
    else{
        $sql = "INSERT INTO betcodes (punter, betcode, bookie, odds) VALUES (?, ?, ?, ?);";
        $query = $db->query($sql);
       
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../dashboard.php?error1=sqlerror#betcode");
            exit();  
        }
        else{
            mysqli_stmt_bind_param($stmt, "ssss", $punter, $betcode, $bookie, $odds);
            mysqli_stmt_execute($stmt);
            header("Location: ../dashboard.php?post1=success#betcode");
            exit();
        } 
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
else{
    header("Location: ../index.php");
    exit();
}

