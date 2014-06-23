注意点
==============
##数组格式   
php

    $message = array('id','xiamen' );
    echo json_encode($message); //转成json格式

js

    alert(JSON.parse(msg));     //解析回js格式

结果：id,xiamen;说明还是$message解析后是一个数组

##对象格式
###1
php

    $message = array('id'=>1,'city'=>'xiamen' );
    echo json_encode($message); //转成json格式

js

    alert(JSON.parse(msg));     //解析回js格式

结果：[Object,Object];说明还是$message解析后是一个对象

###2.显示对象的每个键值
php不变

    $message = array('id'=>1,'city'=>'xiamen' );
    echo json_encode($message);   
js

    var data = JSON.parse(msg);
                for(var key in data){
                    alert(data[key]);
                }
结果：  
1  
xiamen

###3.显示多层嵌套对象的每个键值
php

    $message = array(
        array('id'=>1,'city'=>'xiamen'),
        array('id' =>2 ,'city'=>'sanming' )
        );
js

    var data = JSON.parse(msg);
    for(var i in data){
        for(var j in data[i]){
            alert(data[i][j]);
        }
    }

结果：1，sanming，2，xiamen逐个蹦出来
*注意*：php中多层array结尾是，不是；     
array接着(),不是[]

###4.给多层嵌套对象的键值放入相应数组
php

    $message = array(
            array('city' => 'fuzhou','code'=> 361000,'ID'=>1 ),
            array('city' => 'xiamen','code'=> 362000,'ID'=>2 ),
            array('city' => 'zhangzhou','code'=> 363000,'ID'=>3 ),
            array('city' => 'quanzhou','code'=> 364000,'ID'=>4),
            array('city' => 'sanming','code'=> 365000,'ID'=>5 ),
        );
    echo json_encode($message);
js

    var data = JSON.parse(msg);
        var city = [];
        var code = [];
        var id = [];
        for(var i in data){
                city.push(data[i]['city']);
                code.push(data[i]['code']);
                id.push(data[i]['id']);
        }
        alert(city);
        alert(code);

*注意*：不要在第一个for后加一层遍历。即以下是错误  
因为第一次遍历是按默认的序号取得，你要遍历一次当然要for  
可第二层是按key值取得，你只要到达这层对象了(即data[i]),就可以直接依据key值取它们了

    for(var i in data){
            for(var key in data[i]){
                city.push(data[i]['city']);
                code.push(data[i]['code']);
                id.push(data[i]['id']);
            }
        }

##fragment
>不要拼成fragement；  
D，F大写！
    var fragment = document.createDocumentFragment();

##new Option
>大写O不要写成小写

    var node = new Option(obj.city[i]);

##ID
>obj的键值不要写小写的id，如
    var obj = {
        id:[]
    }
>这样用起来会变成obj.id啥啥的，系统分不清是id名还是id键值，所以都是ID；  
要是忘了的话记住吧所有写错的id都改了啊  
1.一般替换是不会把<p id = ""></p>里的id也囊括的  
2.其他参数名带有id的也不会被囊括，如var hdsiaid = "";

##innerHTML清空
>清空完是可以继续dom操作的；不是白成白痴的
    G("list").innerHTML = "";
    G("code").innerHTML = "";
    G("list").appendChild(T(parseInt(obj.ID[cg.selectedIndex])));
    G('code').appendChild(T(parseInt(obj.code[cg.selectedIndex])));

##插入数字
>比如想在<p></p>里插东西，你要建一个textNode再把message(string类型)放进去；  
但是若一不小心，message是一个number类型，就插不了会出错；  
所以为了以防万一，全部转型parseInt()

    N("p")[0].appendChild(T(message));  //错误示范
    N("p")[0].appendChild(T(parseInt(message)));    //正确