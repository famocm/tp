<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
    <style type="text/css">
    /*.cur{
        border:1px solid red;
    }*/
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link rel="Shortcut Icon" href="/Public/Homes/images/icon.jpg" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="/Public/Homes/register/Home/css/login.css">
    <script type="text/javascript" src="/Public/Homes/register/Home/js/jquery.min.js"></script>
     <script type="text/javascript" src="/Public/Homes/register/Home/js/jquery-1.8.3.min.js"></script>
</head>
<body class="login_bj" >

<div class="zhuce_body " >
	<!-- <div class="logo"><a href="#"><img src="images/logo.png" width="114" height="54" border="0"></a></div> -->
    <a href="/index.php/Home/Index/index"><img src="/Public/Homes/images/fin.jpg" /></a>
    <div class="zhuce_kong">
    	<div class="zc">
        	<div class="bj_bai" style="height: 550px">
            <h3>欢迎注册</h3>
       	  	  <form action="/index.php/home/register/doregister" method="post" >
                <input name="username" type="text" class="kuang_txt phone" remind="" placeholder="请输入用户名"><span id="ss"></span>
                <input name="email" type="text" class="kuang_txt email" placeholder="请输入邮箱"><span></span>
                <input name="password" type="password" class="kuang_txt possword" placeholder="请输入密码"><span></span>
                <input name="repassword" type="password" class="kuang_txt possword" placeholder="确认密码"><span></span>
                <input name="phone" type="text" class="kuang_txt phone" placeholder="请输入手机号"><span></span>
                <input name="pcode" type="text" class="kuang_txt yanzm" placeholder="请输入手机验证码" style="width:115px;"><input type="button" style="height:32px;" id="btn" value="免费获取验证码"><br>
                <input name="code" type="text" style="width: 115px;margin-top:15px;" class="kuang_txt yanzm" placeholder="验证码">
                <div class="code" style="width: 110px;height: 33px;border:1px solid #dddddd;float: right;margin-right: 145px;border-radius: 2px;margin-top:15px;">
                	<img id="yy" style="width: 100%;height: 100%;cursor: pointer;" src="/index.php/home/register/verify" onclick='this.src="/index.php/home/register/verify?rand="+Math.random()'>
                </div><span id='mm' style="position: relative;"></span>
                <!-- <div>
                	<div class="hui_kuang"><img src="images/zc_22.jpg" width="92" height="31"></div>
                	<div class="shuaxin"><a href="#"><img src="images/zc_25.jpg" width="13" height="14"></a></div>
                </div> -->
                <div>
               		<input name="agree" type="checkbox" checked="checked" value="1"><span>已阅读并同意<a href="#" target="_blank" style="text-decoration: none"><span class="lan">《时尚商城购物协议》</span></a></span><span id="cc"></span>
                </div>
                <!-- <a href="/index.php/home/Login/login" style="position: relative;bottom:50px;left: 250px;text-decoration:none">已有账号登录</a> -->
                <input name="注册" type="submit" class="btn_zhuce" style="font-size: 20px;" value="注册">
                <a href="/index.php/home/Login/login" style="text-decoration: none;">已有账号登录</a>
                </form>
            </div>
        	<!-- <div class="bj_right">
            	<p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ注册</a>
                <a href="#" class="zhuce_wb">微博注册</a>
                <a href="#" class="zhuce_wx">微信注册</a>
                <p>已有账号？<a href="login.html">立即登录</a></p>
            
            </div> -->
        </div>
    </div>

</div>
</body>
<script type="text/javascript">
    // 阻止表单提交
    CUSERNAME=false;
    CEMAIL=false;
    CPASS=false;
    CREPASS=false;
    CAGREE=false;
    CODE=false;
    PCODE=false;
    // 给form表单绑定提交时间
    $("form").submit(function(){
        if(CUSERNAME&&CEMAIL&&CPASS&&CREPASS&&CAGREE&&CODE&&PCODE){
            return true;
        }else{
            return false;
        }
    })
    // alert($);
    //给input绑定获取焦点事件
    $("input[name='username']").focus(function(){
        //获取属性值
        // var attr=$(this).attr("remind");
        // alert(attr);
        $("#ss").html("请输入用户名").css('color','red');
        //添加类的样式
        $(this).css('border','1px solid #A9A9A9');
    })
    //检测用户名
    $("input[name='username']").blur(function(){
        //获取用户名
        var username=$(this).val();
       if(username==''){
        // alert('ssss');
        $("#ss").empty();
        $(this).css('border','1px solid #dddddd');
       }else{
            // alert(username);
        //正则
        var reg=/^\w{6,18}$/;
        if(!reg.test(username)){
            $(this).next().html('用户名格式错误');
            CUSERNAME=false;
        }else{
            //Ajax
            s=$(this);
            $.get('/index.php/home/register/checkname',{username:username},function(data){
                if(data==1){
                    s.next().html('用户名已存在').css('color','red');
                    // alert(data);
                    CUSERNAME=false;
                }else{
                    s.css('border','1px solid #dddddd');
                    s.next().html("√").css('color','green');
                    CUSERNAME=true;
                }
            })
        } 
       }
          
    })

    //给input绑定获取焦点事件
    $("input[name='email']").focus(function(){
        //获取属性值
        // var attr=$(this).attr("remind");
        // alert(attr);
        $(this).next().html("请输入邮箱").css('color','red');
        //添加类的样式
        $(this).css('border','1px solid #A9A9A9');
    })
    //检测邮箱
    $("input[name='email']").blur(function(){
        //获取邮箱值
        var email=$(this).val();
        if(email==''){
            // alert('sss');
            $(this).next().empty();
            $(this).css('border','1px solid #dddddd');
        }else{
           //正则
            var reg=/^\w+@\w+\.(com|cn|com\.cn|net)$/;
            if(!reg.test(email)){
                $(this).next().html('邮箱格式错误');
                CEMAIL=false;
            }else{
                //Ajax
                s=$(this);
                $.get('/index.php/home/register/checkemail',{email:email},function(data){
                    if(data==1){
                        s.next().html('邮箱已存在').css('color','red');
                        CEMAIL=false;
                    }else{
                        s.css('border','1px solid #dddddd');
                        s.next().html("√").css('color','green');
                        CEMAIL=true;
                    }
                })
            }  
        }
          
    })

    //给input绑定获取焦点事件
    $("input[name='password']").focus(function(){
        //获取属性值
        $(this).next().html("请输入密码").css('color','red');
        //添加类的样式
        $(this).css('border','1px solid #A9A9A9');
    })
    //检测密码
    $("input[name='password']").blur(function(){
        var pass=$(this).val();
        if(pass==''){
            $(this).next().empty();
            $(this).css('border','1px solid #dddddd');
        }else{
            //正则判断
            var reg=/^\w{6,20}$/;
            if(!reg.test(pass)){
                $(this).next().html('密码格式错误').css('color','red');
                CPASS=false;
            }else{
                s.css('border','1px solid #dddddd');
                $(this).next().html("√").css('color','green');
                CPASS=true;
            }
        }

    })

    //给input绑定获取焦点事件
    $("input[name='repassword']").focus(function(){
        //获取属性值
        $(this).next().html("请再次输入密码").css('color','red');
        //添加类的样式
        $(this).css('border','1px solid #A9A9A9');
    })
    //重复输入密码
    $("input[name='repassword']").blur(function(){
        //获取确认密码值
        var repass=$(this).val();
        if(repass==''){
            $(this).next().empty();
            $(this).css('border','1px solid #dddddd');
        }else{
            //获取密码
            var pass=$("input[name='password']").val();
            if(repass!=pass){
                $(this).next().html('两次密码不一致').css('color','red');
                CREPASS=false;
            }else{
                s.css('border','1px solid #dddddd');
                $(this).next().html("√").css('color','green');
                CREPASS=true;
            }
        }
        
    })

    //获取焦点
    $("input[name='code']").focus(function(){
        $("#mm").html("请输入验证码,不区分大小写").css({'color':'#A9A9A9','font-size':'12px'});
        $(this).css('border','1px solid #A9A9A9');

    })
    //检测验证码
    $("input[name='code']").blur(function(){
        var code=$(this).val();
        $.get('/index.php/home/register/checkcode',{code:code},function(data){
            // alert(data);
            if(data==0){
                $("#mm").html('输入的验证码有误').css('color','red');
                // alert(data);
                CODE=false;
            }else{
                CODE=true;
            }
        })
    })

    $("input[type='submit']").click(function(){
        if($("input[name='agree']").attr('checked')){
        // alert('mmm');
        CAGREE=true;
        }else{
            // alert('sss');
            $("#cc").html("接受服务条款才能注册").css('color','red');
            CAGREE=false;
        }
    })
    
    // 获取验证码按钮
    var wait=180;
    function time(o) {
        if (wait == 0) {
            o.removeAttribute("disabled");           
            o.value="免费获取验证码";
            wait = 180;
        } else {
            o.setAttribute("disabled", true);
            o.value="重新发送(" + wait + ")";
            wait--;
            setTimeout(function() {
                time(o)
            },
            1000)
        }
    }
    document.getElementById("btn").onclick=function(){
        time(this);
        phone=$("input[name='phone']").val();
        $.post("/index.php/home/register/checkphone",{phone:phone},function(data){
            alert(data);
        })
    }
       

    $("input[name='phone']").focus(function(){
        //获取属性值
        $(this).next().html("请输入手机号").css('color','red');
        //添加类的样式
        $(this).css('border','1px solid #A9A9A9');
    })

    //检测手机号
    $("input[name='phone']").blur(function(){
        //获取手机号
        var phone1=$(this).val();
        if(phone1==''){
            // alert('sss');
            $(this).next().empty();
            $(this).css('border','1px solid #dddddd');
        }else{
           //正则
            var reg=/^1[34578]\d{9}$/;
            if(!reg.test(phone1)){
                $(this).next().html('手机号格式错误');
                CEMAIL=false;
            }else{
               //Ajax
                s=$(this);
                $.get('/index.php/home/register/checkdophone',{phone1:phone1},function(data){
                    if(data==1){
                        s.next().html('手机号已存在').css('color','red');
                        CEMAIL=false;
                    }else{
                        s.css('border','1px solid #dddddd');
                        s.next().html("√").css('color','green');
                        CEMAIL=true;
                    }
                })
            }  
        }
          
    })

    //检测手机验证码
     //获取焦点
    $("input[name='pcode']").focus(function(){
        $("#mm").html("请输入手机验证码").css({'color':'#A9A9A9','font-size':'12px'});
        $(this).css('border','1px solid #A9A9A9');

    })

    //检测验证码
    $("input[name='pcode']").blur(function(){
        var pcode=$(this).val();
        $.post('/index.php/home/register/checkpcode',{pcode:pcode},function(data){
            if(data==1){
                PCODE=true;
            }else{
                $("#mm").html('输入的手机验证码有误').css('color','red');
                PCODE=false;
            }
        })
    })
</script>
</html>