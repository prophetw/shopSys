<?php
//session_start();
//$_SESSION['favcolor'] = 'green';
//$_SESSION['animal']   = 'cat';
//$_SESSION['time']     = time();
header("Access-Control-Allow-Origin: *");    //允许跨域
header("Content-Type: application/json; charset=UTF-8");//数据格式为json 编码为utf－8
//果然上面的饿header就是这只服务器端的header的参数  json格式  允许任何人访问
$str = '{
    "records":[
    {"Name":"Alfreds 种植","City":"Berlin","Country":"Germany"},
    {"Name":"Ana Trujillo Emparedados y helados","City":"México D.F.","Country":"Mexico"},
    {"Name":"Antonio Moreno Taquería","City":"México D.F.","Country":"Mexico"},
    {"Name":"Around the Horn","City":"London","Country":"UK"},
    {"Name":"B\'s Beverages","City":"London","Country":"UK"},
    {"Name":"Berglunds snabbköp","City":"Luleå","Country":"Sweden"},
    {"Name":"Blauer See Delikatessen","City":"Mannheim","Country":"Germany"},
    {"Name":"Blondel père et fils","City":"Strasbourg","Country":"France"},
    {"Name":"Bólido Comidas preparadas","City":"Madrid","Country":"Spain"},
    {"Name":"Bon app","City":"Marseille","Country":"France"},
    {"Name":"Bottom-Dollar Marketse","City":"Tsawassen","Country":"Canada"},
    {"Name":"Cactus Comidas para llevar","City":"Buenos Aires","Country":"Argentina"},
    {"Name":"Centro comercial Moctezuma","City":"México D.F.","Country":"Mexico"}, {"Name":"Chop-suey Chinese","City":"Bern","Country":"Switzerland"}, {"Name":"Comércio Mineiro","City":"São Paulo","Country":"Brazil"} ] }';
echo $str;
//setcookie('');
//session_unset();
//session_destroy()
?>