<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/8/25
 * Time: 下午5:40
 */
session_start();
echo $_SESSION['my_session'];
//session_unset();
//unset($_SESSION['my_session']);
?>
<a href="custominfo.php">Next Page</a>