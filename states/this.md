一些注意点
===============

##onreadystatechange写法
法1

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){                    
            if(xhr.status == 200){
                if(states == "north"){
                    listNorthStates(xhr.responseXML);
                }
                if(states == "all"){
                    listAllStates(xhr.responseXML);
                }
            }
            if(xhr.status == 404 || 500){
                alert("error");
            }
        }                                           
    }
>注意 如果写if(xhr.status == 400 || 500)  在交互成功的情况下，error也会alert出来  
但是如果是else if(xhr.status == 400 || 500),成功后就不会alert('error')了
这意味着什么呢？我也还不太懂

法2 

    switch(xhr.status){
        case 200:(function(){
                    if(states == "north"){
                            listNorthStates(xhr.responseXML);
                        }
                    if(states == "all"){
                        listAllStates(xhr.responseXML);
                    }
                })();
                break;
        case 404:
        case 500:(function(){
                    alert("error");
                })();
                break;
    }

>这里，用了闭包立即执行。因为闭包立即执行后才能;才能接break;  
如果没有break的话，会和上面if一样，交互成功后还蹦error.
正因为break的原因，所以以下写法不可以。因为以下写法无法;接break会报错

    switch(xhr.status){
        case 200:function(){
                    if(states == "north"){
                            listNorthStates(xhr.responseXML);
                        }
                    if(states == "all"){
                        listAllStates(xhr.responseXML);
                    }
                });                                 //没有立即执行无法;无法break
                break;
        case 404:
        case 500:(function(){
                    alert("error");
                });
                break;
    }

或者

    switch(xhr.status){
        case 200:
                    if(states == "north"){
                            listNorthStates(xhr.responseXML);
                        }
                    if(states == "all"){
                        listAllStates(xhr.responseXML);
                    }                                    //没有;无法接break
                
                break;
        case 404:
        case 500:
                alert("error");                          //这个倒是可以
                break;
    }

##另外一些细节
###DOM
    <north>
        <state>Minnesota</state>
        <state>Iowa</state>
        <state>North Dakota</state>
    </north>

var lists = document.getElementsByTagName('north')  ->*是一个list，虽然里面只有一个element* 

var north = document.getElementsByTagName('north')[0]  ->*才是这个north节点*
    
var states = north.getElementsByTagName("state");   ->*获取state list*
var Minnesota = states[0].firstChild.nodeValue;
->states第一个节点的文本节点的值

###换行是/n啊！！不是\n