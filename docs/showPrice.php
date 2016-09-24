<!doctype html>
<html lang="en">
<head>
    <style>
        *{
            margin:0;padding:0;
        }
        body{
            background: url("images/bg.jpg") repeat;
            text-align: center;
        }
        h1{
            color:#ffff9d;
            font-size: 60px;
            text-align: center;
            margin-top: 50px;
        }
        form{
            margin-top: 80px;
            text-align: center;
        }
        form span{
            display: inline-block;
            width:100px;
            font-size: 18px;
            color:#ffff9d;
        }
        form label{
            font-size: 12px;
            color:white;
        }
        form input#serchinfo{
            margin-top: 10px;
            width:400px;  height:70px;
            border: 1px solid white;
            background: transparent;
            border-radius: 5px;
            color:white;  font-size: 24px;  text-align: center;
        }
        ::-webkit-input-placeholder{
            color:#dddddd;
            opacity: 0.7;
        }
        :-ms-input-placeholder{
            color:#dddddd;
            opacity: 0.7;
        }
        input#submit{
            cursor: pointer;
            font-size: 36px;
            color:#00ada7;
            width:320px;height:80px;
            border: 1px solid white;
            margin-top: 80px;
            border-radius: 5px;
            background: url("images/checkBtn.png") center center;
        }
        table{

            margin:40px auto;
            text-align: center;
            vertical-align: middle;
            color:white;
        }
        table tbody td{
            font-size: 14px;
            width:100px;
            height:20px;
            line-height: 20px;
        }
        td:hover{
            background: brown;
        }
        td a{
            font-size: 12px;
        }
        td input{
            width:100px;
            border:none;
            text-align: center;
        }
        a{
            color:white;
            text-decoration: none;
            font-size: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <title>商品信息查询</title>
    <script>
        window.onload = function () {
            var editTd = document.getElementsByTagName('tbody')[0];
            var otr = editTd.getElementsByTagName('td');
            //alert(otr.length);
            for(var i=0;i<otr.length;i++){
                otr[i].onclick = function (e) {
//                alert(this.innerHTML);
                    var innerCont = this.innerHTML;
                    this.innerHTML = '<input type="text" value='+innerCont+'>';

                    this.firstChild.focus();

                    this.firstChild.onclick = function (ev) {
                        ev = ev||window.ev;
                        if(ev.stopPropagation){
                            ev.stopPropagation();
                        }else{
                            ev.cancelBubble = true;
                        }
                    };

                    this.firstChild.onblur = function () {
                        //文档的还原,这个地方的this指的是input元素了
                        var columvalue = this.value;
                        //alert(this.parentNode);
                        //确定要修改的数据的行
                        var uniqueID = this.parentNode.parentNode.childNodes[1].innerHTML;//js的毛病就是节点不是很准确
                        //alert(this.parentNode.className);
                        //这个是要修改的数据的列
                        var columname = this.parentNode.className;

                        //alert(uniqueID);


                        var urldata = 'id='+uniqueID+'&whichcolum='+columname+'&whatdata='+columvalue;
                        //alert(urldata);

                        var xht;
                        if (window.XMLHttpRequest)
                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                            xht=new XMLHttpRequest();
                        }
                        else
                        {// code for IE6, IE5
                            xht=new ActiveXObject("Microsoft.XMLHTTP");
                        }

                        xht.open('POST','update.php',true);
                        xht.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

                        xht.onreadystatechange = function () {
                            if(xht.readyState ==4 && xht.status == 200){
                                //alert('yes');
                                //把数据库传回来的数据在ul里面表示出来
                                //xhr.responseText;
                            }
                        };
                        xht.send(urldata);

                        this.parentNode.innerHTML = columvalue;
                    };
                    //e.stopPropagation();
                };
            }
        };
    </script>
</head>
<body>
<h1>商品信息查询</h1>
<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/7/6
 * Time: 下午6:11
 */
require 'connDB.php';
$choose = $_POST['choose'];
$productinfo = $_POST['productinfo'];

$query = "SELECT * FROM productinfo WHERE name LIKE '%$productinfo%' OR type LIKE '%$productinfo%' OR isbn LIKE '%$productinfo%'";
$result = mysqli_query($db,$query) or die("传输数据失败");

if($choose == 'justPrice'){
    //默认仅显示批发价和零售价
    echo    "<table>
                <thead>
                <tr>
                    <td style='display: none'>商品序号</td>
                    <td>商品名称</td>
                    <td>商品型号</td>
                    <td>商品批发价/元</td>
                    <td>商品零售价/元</td>
                </tr>
                </thead>
                <tbody>";
    while($row = mysqli_fetch_array($result)){
        //var_dump($row[highprice].'yuan');
        echo "  <tr>
                    <td style='display: none'>$row[id]</td>
                    <td class='name' id='editable'>$row[name]</td>
                    <td class='type'>$row[type]</td>
                    <td class='midprice'>$row[midprice]</td>
                    <td class='highprice'>$row[highprice]</td>
                </tr>";
    }
}else{
    //勾选全部的时候会显示所有信息
    echo    "<table>
                <thead>
                <tr>
                    <td style='display: none'>商品序号</td>
                    <td>商品名称</td>
                    <td>商品型号</td>
                    <td>商品条形码</td>
                    <td>商品进价</td>
                    <td>商品批发价</td>
                    <td>商品零售价</td>
                    <td>件/个</td>
                    <td>中包/个</td>
                    <td>进货厂家</td>
                    <td>进货日期</td>
                </tr>
                </thead>
                <tbody>";
    while($row = mysqli_fetch_array($result)){
        //var_dump($row[highprice].'yuan');
        echo "  <tr>
                    <td style='display: none'>$row[id]</td>
                    <td class='name'>$row[name]</td>
                    <td class='type'>$row[type]</td>
                    <td class='isbn'>$row[isbn]</td>
                    <td class='lowprice'>$row[lowprice]</td>
                    <td class='midprice'>$row[midprice]</td>
                    <td class='highprice'>$row[highprice]</td>
                    <td class='largebag'>$row[largebag]</td>
                    <td class='midbag'>$row[midbag]</td>
                    <td class='fromwhere'>$row[fromwhere]</td>
                    <td class='date'>$row[date]</td>
                </tr>";
    }
}
        echo " </tbody>
                    </table>";
?>
<a href="checkPrice.php">返回继续查询</a>
</body>
</html>


