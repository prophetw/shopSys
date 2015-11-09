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
            margin-top: 30px;
            text-align: center;
        }
        form span{
            display: inline-block;
            width:100px;
            font-size: 18px;
            color:#ffff9d;
        }
        form div.data{
            margin-top: 10px;
        }
        form div.data input{
            color:white;
            text-align: center;
            border:1px solid white;
            border-radius: 5px;
            width:95px;
            height:20px;
            background-color: transparent;
            outline: none;
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
            margin-top: 10px;
            border-radius: 5px;
            background: url("images/submit.png") center center;
        }
        div#addAcolum{
            /*position: absolute;*/
            /*left:1000px;*/
            /*top:400px;*/
            display: inline-block;
            margin-top: 40px;

        }
        div#addAcolum img{
            width: 120px;
            height: 34px;
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
    <title>客户欠款信息录入</title>
    <script>
        window.onload = function () {
            var addColum = document.getElementById("addAcolum");
            var originalHtml = document.getElementById("original");
            var oform = document.forms[0];

            addColum.onclick = function () {
                var copyhtml = originalHtml.innerHTML;
                //console.log(copyhtml);
                var newNode = document.createElement("div");
                newNode.className = "data";
                newNode.innerHTML = copyhtml;
                //console.log(newNode);
                oform.insertBefore(newNode,addColum);
            }
        }
    </script>
</head>
<body>
<h1>客户欠款信息录入</h1>
<form action="writenopay.php" method="post">
    <span>客户姓名</span><span>电话</span><span>地区</span><span>欠款额度</span><span>欠款日期</span>
    <div class="data" id="original">
        <input type="text" name="name[]"/>
        <input type="text" name="phone[]"/>
        <input type="text" name="area[]" placeholder="如:晓天、三沟"/>
        <input type="text" name="money[]" placeholder="欠多少钱"/>
        <input type="text" name="date[]" placeholder="如:20150101"/>
    </div>
    <div id="addAcolum"><img src="images/addacolum.png" alt="提交按钮"/></div>
    <br/>
    <input type="submit" name="submit" id="submit" value=""/>
    <br/> <br/>
    <a href="index.html" style="text-decoration: none;color:white;font-size: 20px;margin-top: 20px;">回到首页</a>
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
$name=$_POST['name'];
$phone=$_POST['phone'];
$area=$_POST['area'];
$money=$_POST['money'];
$date=$_POST['date'];

require 'connDB.php';  //链接数据库的文件

//var_dump($name);

for($count=0;$count<count($name);$count++){

    $query = "INSERT INTO customnopay (name,phone,aera,howmuch,date) VALUES  ('$name[$count]','$phone[$count]','$area[$count]','$money[$count]','$date[$count]')";
    //echo $query;
    echo "<br />";

    $result = mysqli_query($db,$query) or die("导入数据库失败".mysqli_errno($db)." ".mysqli_error_list($db).'  '.mysqli_error($db));
}
mysqli_close($db);
?>