<?php
if(isset($_POST["post-mr"])){

    require "../core/init.php";

    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_FILES["img"];
    $author = $_POST["author"];

    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];

    $imgExt = explode('.', $imageName);
    $imgActualExt = strtolower(end($imgExt));

    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if(empty($title)  || empty($content) || empty($image) ) {
        header("Location: ../dashboard.php?error=emptyfields#matchreview");
        exit();  
    }
    elseif(!in_array($imgActualExt, $allowed)){
        header("Location: ../dashboard.php?error=invalidImg#matchreview");
        exit();
    }
    elseif($imageError !== 0){
        header("Location: ../dashboard.php?error=uploadError#matchreview");
        exit();
    }
    elseif ($imageSize > 500000) {
        header("Location: ../dashboard.php?error=imgTooBig#matchreview");
        exit();
    }
    else{
        $imgNameNew = "CC-".uniqid('',true).".".$imgActualExt;
        $imgDestination = "../img/matchReview/".$imgNameNew;
        $imgRealLocation = "./img/matchReview/".$imgNameNew;
        move_uploaded_file($imageTmpName, $imgDestination);
        $sql = "INSERT INTO matchreview (title, image_dir, content, author) VALUES (?, ?, ?, ?);";
        $query = $db->query($sql);
       
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../dashboard.php?error=sqlerror#matchreview");
            exit();  
        }
        else{
            mysqli_stmt_bind_param($stmt, "ssss", $title, $imgRealLocation, $content, $author);
            mysqli_stmt_execute($stmt);
            header("Location: ../dashboard.php?post=success#matchreview");
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

