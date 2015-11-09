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
        form input#searchinfo{
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
        #cusinfo table{
            margin:10px auto;
        }
        input#submit{
            cursor: pointer;
            font-size: 36px;
            color:#00ada7;
            width:320px;height:80px;
            border: 1px solid white;
            margin-top: 40px;
            border-radius: 5px;
            background: url("images/checkBtn.png") center center;
        }
    </style>
    <meta charset="UTF-8">
    <title>客户商家信息</title>
    <script src="ajax.js"></script>
    <script>
        window.onload = function () {

           // ajax.get('custominfo.php',{'name':'周董'},callback);
            function callback(response){
                document.getElementById('cusinfo').style.display = 'block';
                document.getElementById('cusinfo').innerHTML = response;
            }

            var oSubmit = document.getElementById('submit');

            oSubmit.onclick = function () {
                var name = document.getElementById('searchinfo').value;
                ajax.get('custominfo.php',{'name':name},callback);
                return false;
            }
        }
    </script>
</head>
<body>
<h1>客户商家信息查询</h1>
<form action="">
    <input type="text" name="productinfo" id="searchinfo" placeholder="请输入客户或商家姓名"/>
    <br/>
    <div id="cusinfo" style="display: none;text-align: center;margin:0 auto"></div>
    <input type="submit" name="submit" id="submit" value=""/>
    <br/>
    <br/>
</form>

<div style="text-align: center">
    <a href="index.html" target="_blank" style="text-decoration: none;color:white;font-size: 20px;margin-top: 20px;">回到首页</a>
</div>


</body>
</html>