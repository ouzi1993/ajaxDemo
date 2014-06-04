json用法
===============

##对象：js和json
js
  
    var object = {
        name:"nicol",
        age::29
    };

json

    {
        "name":"nicol",
        "age":29
    }

*json结尾没分号！*


##json嵌套

    {
        "name":"nicol",
        "age":29，
        "school":{
            "name":"BUPT",
            "location":"xitucheng",
        }
    }

##数组：js和json
js

    var value = [25,"hi",true];

json

    [25,"hi",true]

*json结尾还是没分号*

##json数组和对象结合

    [
        {
            "title":"javascript设计模式"，
            "authors":"Andy"
        },
        {
            "title":"http权威指南"，
            "authors":[
                "David",
                "Marjoric"
            ]
        }
    ]

##序列化对象 js->json
1.stringify()  
把一般js对象解析成json
三个参数： (obj,可选key/function,字符串缩进)

[key过滤](/stringify1.html)

    var book = {
                        title: "Professional JavaScript",
                        authors: [
                            "Nicholas C. Zakas"
                        ],
                        edition: 3,
                        year: 2011
                   };

        var jsonText = *JSON.stringify*(book, ["title", "edition"]); 
        console.log(jsonText)；
结果

    {"title":"Professional JavaScript","edition":3}

[function过滤](stringify2.html)
    
    var book = {
                    title: "Professional JavaScript",
                    authors: [
                        "Nicholas C. Zakas",
                        "David Clorley"
                    ],
                    edition: 3,
                    year: 2011
               };
//请非常注意底下的符号你错好多！

    var jsonText = JSON.stringify(book,function(key,value){
            switch(key){
                case "title":
                    return "js book";    //return 固定值
                case "authors":
                    return value.join(",");     //若是author，就返回连接的数组
                case "edition":
                    return undefined;  //underfined会被省略掉
                default:
                    return value;   //返回正常的值
            }
        });
    console.log(jsonText);

结果

    {"title":"js book","authors":"Nicholas C. Zakas,David Clorley","year":2011} 

缩进的例子不写了，请见js高级程序设计p568


2.toJSON()
[代码](/stringify3.html)

    var book = {
                "title": "Professional JavaScript",  
                "authors": [
                    "Nicholas C. Zakas",
                    "Marjor J"
                ],
                edition: 3,
                year: 2011,
                toJSON: function(){
                    return {
                        title:this.title,
                        authors:this.authors,
                        year:this.year};
                }
           };

        toJSON返回：
        {
            "title": "Professional JavaScript",  
            "authors": [
                "Nicholas C. Zakas",
                "Marjor J"
            ],
            "year": 2011
        } 在此基础上继续过滤

    var jsonText = JSON.stringify(book,function(key,value){
            switch(key){
                case "title":
                    return "js book";
                case "year":
                    return undefined;
                default: 
                    return value;
            }
        });
    console.log(jsonText);

结果
    
    {"title":"js book","authors":["Nicholas C. Zakas","Marjor J"]} 

###总结
    1.有toJSON()先调用该方法，没有就返回obj
    2.过滤器取得1的结果进行过滤    

##解析JSON.parse() json->js
[代码](/parse.html)
    没太懂具体作用，改天看
    js高程P570

