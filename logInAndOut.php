<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/8/25
 * Time: 下午5:26
 */
session_start();
$_SESSION['my_session'] = 'hello world';
echo 'the value of session is' . $_SESSION['my_session'] . '<br />';
?>
<a href="page2.php">Next page</a>