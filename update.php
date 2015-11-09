<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/7/12
 * Time: 下午9:48
 */
require 'connDB.php';

$id = $_POST['id'];
$whichcolum = $_POST['whichcolum'];
$whatdata = $_POST['whatdata'];
//echo $id.$whichcolum.$whatdata;

$query = "UPDATE productinfo SET $whichcolum = '$whatdata' where id = '$id'";
//$query = "UPDATE productinfo SET name = 'zenm' where id = 6";
//echo $query;

$result = mysqli_query($db,$query) or die('数据更新失败');

mysqli_close($db);
?>
</body>
</html>
