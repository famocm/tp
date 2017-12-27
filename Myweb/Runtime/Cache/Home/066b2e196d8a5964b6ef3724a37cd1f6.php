<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>忘记密码</title>
	<link rel="stylesheet" href="/test/Public/Homes/css2/bootstrap.min.css">
	<link rel="stylesheet" href="/test/Public/Homes/css2/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/test/Public/Homes/css2/htmleaf-demo.css">
	<script type="text/javascript" src="/test/Public/Homes/register/Home/js/jquery-1.8.3.min.js"></script>
	<style type="text/css">
		.form-bg{
		    /*background: #00b4ef;*/
		}
		.form-horizontal{
		    background: #fff;
		    padding-bottom: 40px;
		    border-radius: 15px;
		    text-align: center;
		}
		.form-horizontal .heading{
		    display: block;
		    font-size: 35px;
		    font-weight: 700;
		    padding: 35px 0;
		    border-bottom: 1px solid #f0f0f0;
		    margin-bottom: 30px;
		}
		.form-horizontal .form-group{
		    padding: 0 40px;
		    margin: 0 0 25px 0;
		    position: relative;
		}
		.form-horizontal .form-control{
		    background: #f0f0f0;
		    border: none;
		    border-radius: 20px;
		    box-shadow: none;
		    padding: 0 20px 0 45px;
		    height: 40px;
		    transition: all 0.3s ease 0s;
		}
		.form-horizontal .form-control:focus{
		    background: #e0e0e0;
		    box-shadow: none;
		    outline: 0 none;
		}
		.form-horizontal .form-group i{
		    position: absolute;
		    top: 12px;
		    left: 60px;
		    font-size: 17px;
		    color: #c8c8c8;
		    transition : all 0.5s ease 0s;
		}
		.form-horizontal .form-control:focus + i{
		    color: #00b4ef;
		}
		.form-horizontal .fa-question-circle{
		    display: inline-block;
		    position: absolute;
		    top: 12px;
		    right: 60px;
		    font-size: 20px;
		    color: #808080;
		    transition: all 0.5s ease 0s;
		}
		.form-horizontal .fa-question-circle:hover{
		    color: #000;
		}
		.form-horizontal .main-checkbox{
		    float: left;
		    width: 20px;
		    height: 20px;
		    background: #11a3fc;
		    border-radius: 50%;
		    position: relative;
		    margin: 5px 0 0 5px;
		    border: 1px solid #11a3fc;
		}
		.form-horizontal .main-checkbox label{
		    width: 20px;
		    height: 20px;
		    position: absolute;
		    top: 0;
		    left: 0;
		    cursor: pointer;
		}
		.form-horizontal .main-checkbox label:after{
		    content: "";
		    width: 10px;
		    height: 5px;
		    position: absolute;
		    top: 5px;
		    left: 4px;
		    border: 3px solid #fff;
		    border-top: none;
		    border-right: none;
		    background: transparent;
		    opacity: 0;
		    -webkit-transform: rotate(-45deg);
		    transform: rotate(-45deg);
		}
		.form-horizontal .main-checkbox input[type=checkbox]{
		    visibility: hidden;
		}
		.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
		    opacity: 1;
		}
		.form-horizontal .text{
		    float: left;
		    margin-left: 7px;
		    line-height: 20px;
		    padding-top: 5px;
		    text-transform: capitalize;
		}
		.form-horizontal .btn{
		    float: right;
		    font-size: 14px;
		    color: #fff;
		    background: #00b4ef;
		    border-radius: 30px;
		    padding: 10px 25px;
		    border: none;
		    text-transform: capitalize;
		    transition: all 0.5s ease 0s;
		}
		@media only screen and (max-width: 479px){
		    .form-horizontal .form-group{
		        padding: 0 25px;
		    }
		    .form-horizontal .form-group i{
		        left: 45px;
		    }
		    .form-horizontal .btn{
		        padding: 10px 20px;
		    }
		}
	</style>
	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
		<div class="demo form-bg" style="padding: 20px 0;">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-offset-3 col-md-6">
		                    <form action='/test/index.php/home/login/doreset' method="post" class="form-horizontal" style="height: 450px">
		                        <span class="heading">重置密码</span>
		                        <div class="form-group">
		                            <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="密码">
		                            <div style="width: 100%;height:30px;text-align: left"></div>
		                        </div>
		                        <div class="form-group help">
		                            <input type="password" name="repassword" class="form-control" id="inputPassword3" placeholder="确认密码">
		                            <div style="width: 100%;height:30px;text-align: left"></div>
		                            <a href="#" class="fa fa-question-circle"></a>
		                        </div>
		                        <input type="hidden" name="id" value="<?php echo ($id); ?>">
		                         <input type="submit" class="btn btn-success btn-lg" style="border-radius: 5px;margin-right: 240px;margin-top: 30px;cursor: pointer" value="下一步">
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>
	</div>
	
</body>
<script type="text/javascript">
	// alert($);
	// 阻止表单提交
	CPASS=false;
	CREPASS=false;
	if(CPASS&&CREPASS){
		return true;
	}else{
		return false;
	}
	//失去焦点
	//检测密码
  $("input[name='password']").blur(function(){
    //获取密码值
    var pass=$(this).val();
    //正则
    var reg=/^\w{6,20}$/;
    if(!reg.test(pass)){
      $(this).next().html("密码格式错误").css('color','red');
      CPASS=false;
    }else{
      CPASS=true;
    }
  })

  //重复输入密码
  $("input[name='repassword']").blur(function(){
  	//获取确认密码值
  	var repass=$(this).val();
  	//获取密码
    var pass=$("input[name='password']").val();
    if(repass!=pass){
        $(this).next().html('两次密码不一致').css('color','red');
        CREPASS=false;
    }else{
        CREPASS=true;
    }
  })
</script>
</html>