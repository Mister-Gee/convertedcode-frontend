<?php
require_once '../core/init.php';

$id = $_POST['id'];
$oldConversionUnit = $_POST['conversionUnit'];

$newConversionUnit = $oldConversionUnit - 1;

$sql = "UPDATE users SET conversionUnit = $newConversionUnit WHERE id = $id";

if (!mysqli_query($db, $sql)) {
    die('Error: ' . mysqli_error($db));
}

mysqli_close($db);