注意点
==============
>1.这里的phone是一个文本框节点。必须绑定在节点上，而不是phone.value上  
2.keypress是小写噢，事件都是小写噢！  
3.不可用keydown或keypress(都是按下任意键是触发)，如配对“hello”，若是keydown，在你压下o，但是value还没变成“hello”的瞬间，它就验证了。你得再“hello”后继续按一个键，才能把“hello”给验证了

    var phone = document.getElementById('phone');
            EventUtil.addHandler(phone,"keydown",function(){
                ajax(phone.value);
            })；


            var xhr;
            function createXHR(){
                if(window.XMLHttpRequest){
                    xhr = new XMLHttpRequest();
                }
                else{
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            }

>事实证明xhr.open("GET","valiadate.php?value="+value);这种写法ok

            function ajax(value){
                createXHR();
                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4){
                        if(xhr.status == 200){
                            successhandle(xhr.responseText);
                        }
                        else if(xhr.status == 404 || 500){
                            alert("error");
                        }
                    }
                }
                xhr.open("GET","valiadate.php?value="+value);
                xhr.send(null);
            }

>1.text.hasChildNodes()  //true/false  验证一下有没子节点才可以继续移除的步骤啊
2.记住改style是在element节点上改，而不是文本节点上改；就像下面是text.style.color = "red";而非message.style.color = "red";

            function successhandle(msg){
                var message,color;
                var text = document.getElementById('text');
                if(msg == "error"){
                    if(text.hasChildNodes()){
                        text.removeChild(text.firstChild);
                    }
                    message = "You have entered an ivalid date";
                    text.style.color = "red";
                    text.appendChild(document.createTextNode(message));
                }
                else if(msg == "success"){
                    if(text.hasChildNodes()){
                        text.removeChild(text.firstChild);
                    }
                    message = "You have entered an valid date";
                    text.style.color = "black";
                    text.appendChild(document.createTextNode(message));
                }
            }