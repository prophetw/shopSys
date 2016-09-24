<!doctype html>
<html lang="en">
<head>
    <style>
        *{
            margin:0;padding:0;
        }
        body{
            background: url("images/bg.jpg") repeat;
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
    </style>
    <meta charset="UTF-8">
    <title>未付款查询</title>
    <script>
        window.onload = function () {
//            var addColum = document.getElementById("addAcolum");
//            var originalHtml = document.getElementById("original");
//            var oform = document.forms[0];
//
//            addColum.onclick = function () {
//                var copyhtml = originalHtml.innerHTML;
//                //console.log(copyhtml);
//                var newNode = document.createElement("div");
//                newNode.className = "data";
//                newNode.innerHTML = copyhtml;
//                //console.log(newNode);
//                oform.insertBefore(newNode,addColum);
//            }
        }
    </script>
</head>
<body>
<h1>未付款查询</h1>
<form action="">
    <input type="text" name="productinfo" id="serchinfo" placeholder="请输入客户姓名"/>
    <br/>
    <input type="submit" name="submit" id="submit" value=""/>
    <br/> <br/>
    <a href="index.html" target="_blank" style="text-decoration: none;color:white;font-size: 20px;margin-top: 20px;">回到首页</a>
</form>

</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 15/7/6
 * Time: 下午6:11
 */
require 'connDB.php';
?>