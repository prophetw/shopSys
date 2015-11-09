<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/8/25
 * Time: 下午5:40
 */
require_once('connDB.php');
$name = $_GET['name'];

$query = "SELECT * FROM custominfo WHERE name LIKE '%$name%' OR aera LIKE '%$name%'";
$result = mysqli_query($db,$query) or die("传输数据失败". mysqli_error_list($db) . mysqli_error($db). mysqli_errno($db));
echo    "<table>
                <thead>
                <tr>
                    <td>客户名称</td>
                    <td>客户电话</td>
                    <td>客户所在区</td>
                    <td>客户地址</td>
                </tr>
                </thead>
                <tbody>";
while($row = mysqli_fetch_array($result)){
    //var_dump($row[highprice].'yuan');
    echo "  <tr>
                    <td class='name' id='editable'>$row[name]</td>
                    <td class='type'>$row[phone]</td>
                    <td class='midprice'>$row[aera]</td>
                    <td class='highprice'>$row[address]</td>
                </tr>";
}
?>