<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
    <style type="text/css">
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="/test/Public/Homes/register/Home/css/login.css">
    <script type="text/javascript" src="/test/Public/Homes/register/Home/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/test/Public/Homes/register/Home/js/jquery-1.8.3.min.js"></script>
    <link rel="Shortcut Icon" href="/test/Public/Homes/images/icon.jpg" type="image/x-icon">
</head>
<body class="login_bj" >
<div class="zhuce_body">
	<!-- <div class="logo"><a href="#"><img src="images/logo.png" width="114" height="54" border="0"></a></div> -->
    <a href="/test/index.php/Home/Index/index"><img src="/test/Public/Homes/images/fin.jpg" /></a>
    <div class="zhuce_kong login_kuang">
    	<div class="zc">
        	<div class="bj_bai">
            <h3 style="margin-left: 100px">登录</h3>
       	  	  <form action="/test/index.php/Home/Login/dologin" method="post">
                <input name="username" type="text" class="kuang_txt" placeholder="用户名"><span></span>
                <input name="password" type="password" class="kuang_txt" placeholder="密码"><span></span>
                <div>
               		<a href="/test/index.php/Home/Login/respass" style="margin-right: 165px;text-decoration:none">忘记密码？</a><input name="" type="checkbox" value="" checked><span>记住我</span> 
                </div><a href="/test/index.php/Home/Register/index" style="position: relative;bottom:32px;right: 70px;text-decoration:none">免费注册</a>
                <input name="登录" type="submit" class="btn_zhuce" style="font-size: 20px" value="登录">
                
                </form>
            </div>
        	<!-- <div class="bj_right">
            	<p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ注册</a>
                <a href="#" class="zhuce_wb">微博注册</a>
                <a href="#" class="zhuce_wx">微信注册</a>
                <p>已有账号？<a href="#">立即登录</a></p>
            
            </div> -->
        </div>
    </div>

</div>
    
</body>
<script type="text/javascript">
    //阻止表单提价
    CUSERNAME=false;
    CPASS=false;
    $("form").submit(function(){
        if(CUSERNAME&&CPASS){
            return true;
        }else{
            return false;
        }
    })
    // alert($);
    // 获取焦点
    $("input[name='username']").focus(function(){
        $(this).next().html('请输入用户名').css('color','#424242');
         $(this).css('border','1px solid #A9A9A9');
    })
    //失去焦点
    $("input[name='username']").blur(function(){
        //检测用户名是否存在
        var username=$(this).val();
        s=$(this);
        s.next().empty();
        // alert(username);
        $.post("/test/index.php/Home/Login/checkname",{username:username},function(data){
            // alert(data);
            if(data==1){
                s.css('border','1px solid #dddddd');
                CUSERNAME=true;
            }else{
                $(this).next().val('');
                s.css('border','1px solid #dddddd');
                 s.next().html('用户名错误').css('color','#424242');
                // alert('sss');
                CUSERNAME=false;
            }
        })
    })
    
    // 获取焦点
    $("input[name='password']").focus(function(){
        $(this).next().html('请输入密码').css('color','#424242');
         $(this).css('border','1px solid #A9A9A9');
    })

    $("input[name='password']").blur(function(){
        //检测用户名是否存在
        var password=$(this).val();
        var username=$("input[name='username']").val();
        // alert(username);
        s=$(this);
        s.next().empty();
        // alert(username);
        $.post("/test/index.php/Home/Login/checkpass",{password:password,username:username},function(data){
            // alert(data);
            if(data==1){
                s.css('border','1px solid #dddddd');
                CPASS=true;
            }else{
                s.css('border','1px solid #dddddd');
                 s.next().html('密码错误').css('color','#424242');
                // alert('sss');
                CPASS=false;
            }
        })
    })

</script>
</html>