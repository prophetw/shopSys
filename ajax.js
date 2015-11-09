/**
 * Created by apple on 15/10/7.
 */
var ajax ={
    'xht'   :  window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP"),
    'post'  :  function (url,requestJson,callback,reqDataType) {
        //alert(ajax.xht);
        var request = '';
        var response = '';
        ajax.xht.open('POST',url,true);
        if(reqDataType)ajax.xht.setRequestHeader("Content-type",reqDataType);
        for(p in requestJson){
            request += p +'='+requestJson[p]+'&';
        }
        request = request.slice(0,request.length-1);
        ajax.xht.setRequestHeader("Content-type","application/x-www-form-urlencoded"); //发送什么类型数据
        ajax.xht.send(request);
        ajax.xht.onreadystatechange = function () {
            if (ajax.xht.readyState==4 && ajax.xht.status==200)
            {
                response =  ajax.xht.responseText;
                //alert(response);
                callback(response);
            }
        }
    },
    'get'   :  function (url,requestJson,callback) {
        var request = '';
        var response = '';
        for(p in requestJson){
            request += p +'='+requestJson[p]+'&';
        }
        url += '?'+request.slice(0,request.length-1);
        //alert(url);
        ajax.xht.open('GET',url,true);
        ajax.xht.send(null);
        ajax.xht.onreadystatechange = function () {
            if (ajax.xht.readyState==4 && ajax.xht.status==200)
            {
                response =  ajax.xht.responseText;
                callback(response);
            }
        }
    }
};