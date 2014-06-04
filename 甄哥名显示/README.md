一堆可怕的细节
=========================

>一个字都不能错！！

    function ajax(url,dataArr){
                if(window.XMLHttpRequest){
                    var xhr = new XMLHttpRequest();
                }
                else {
                    var xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }

>onreadystatechange请拼好，没有大小写  
readyState这是ajax的状态有大写请别漏  
status是http状态全小写请别写错  
case的空格，冒号，default（可选）请别写错

                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4){
                        switch(xhr.status){
                            case 200:successHandle(xhr.responseText);
                                break;  
                            case 404:
                            case 500:errorHandle();
                                break;
                        }
                    }
                }

                xhr.open("GET",url + "?" + dataArr,true);
                xhr.send(null);
            }
            
            function successHandle(msg){
                alert(msg);
            }

            function errorHandle(){
                alert("error!");
            }

>target绑定的是当下最顶端的那个dom（如button）  
currentTarget才是绑定的对象如document.body  
你居然不知道nodeName是大写的呢"INPUT"

            EventUtil.addHandler(document.body,"click",function(){
                var event = EventUtil.getEvent(event);
                var target = EventUtil.getTarget(event);
                if(target.nodeName == "INPUT"){

> 见鬼，ajax("ajax.php",value = 'hebeTien');就不行！！!快给我研究透！！！  
是不是参数里不能带有 = 啊？  
"value = 'hebeTien'"不行  
value = 'hebeTien'不行
value = hebeTien 不行(直接报错未定义hebeTien)

                    var data = {value:target.value};
                    var dataStrArr = [];
                    for (key in data) {
                        dataStrArr.push(key + '=' + data[key]);
                    }
                    var dataStr = dataStrArr.join("&");

                    ajax("ajax.php",dataStr);//见鬼，非要这样才行
               
                }
            });