<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/test/Public/Admins/b/css/my.css" media="screen">
<link rel="Shortcut Icon" href="/test/Public/Admins/b/images/01.jpg" type="image/x-icon">

<title>
	用户添加
</title>

</head>

<body>
	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/test/Public/Admins/b/images/01.jpg" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
                
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/test/Public/Admins/b/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello,<?php echo (session('username1')); ?>管理员
                    </div>
                    <ul>
                        <li><a href="/test/index.php/Admin/Index/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<!-- <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button> -->
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-user"></i> 角色管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Role/add">角色添加</a></li>
                            <li><a href="/test/index.php/Admin/Role/index">角色列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i> 节点管理
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Node/add">节点添加</a></li>
                            <li><a href="/test/index.php/Admin/Node/index">节点列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i> 管理员管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Root/add">管理员添加</a></li>
                            <li><a href="/test/index.php/Admin/Root/index">管理员列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i> 用户管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/User/add">用户添加</a></li>
                            <li><a href="/test/index.php/Admin/User/index">用户列表</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-th-list"></i> 商品类别管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Cate/add">商品类别添加</a></li>
                            <li><a href="/test/index.php/Admin/Cate/index">商品类别列表</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-file"></i> 评论管理</a>
                        <ul class="closed">
                            <!-- <li><a href="/test/index.php/Admin/Article/add">评论添加</a></li> -->
                            <li><a href="/test/index.php/Admin/Article/index">评论列表</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-file"></i> 商品管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Good/add">商品添加</a></li>
                            <li><a href="/test/index.php/Admin/Good/index">商品列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-file"></i> 公告管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Advert/add">添加公告</a></li>
                            <li><a href="/test/index.php/Admin/Advert/index">公告列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-th-list"></i> 图片轮播管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Lunbo/add">添加图片</a></li>
                            <li><a href="/test/index.php/Admin/Lunbo/index">查看列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-file"></i> 友情链接管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Friend/add">友情链接添加</a></li>
                            <li><a href="/test/index.php/Admin/Friend/index">友情链接列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-file"></i> 订单管理</a>
                        <ul class="closed">
                            <!-- <li><a href="/test/index.php/Admin/Friend/add">订单</a></li> -->
                            <li><a href="/test/index.php/Admin/Order/index">订单列表</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="icon-file"></i> 订单详情管理</a>
                        <ul class="closed">
                            <li><a href="/test/index.php/Admin/Detail/index">订单详情列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            	<div class="container">
     
                   
                   <!-- 角色管理 -->
                   
                   
                   
                   <!-- 节点管理 -->
                   
                   
                   
                   <!-- 用户管理 -->
                   
                   
	<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>用户添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="/test/index.php/Admin/User/insert" method="post"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名:</label> 
       <div class="mws-form-item"> 
        <input class="large" type="text" name="username" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码:</label> 
       <div class="mws-form-item"> 
        <input class="large" type="text" name="password"/> 
       </div> 
      </div> 

       <div class="mws-form-row"> 
       <label class="mws-form-label">确认密码:</label> 
       <div class="mws-form-item"> 
        <input class="large" type="text" name="repassword"/> 
       </div> 
       <input type="hidden" name="status" value="1">
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱:</label> 
       <div class="mws-form-item"> 
        <input class="large" type="text" name="email"/> 
       </div> 
      </div> 
      
     <div class="mws-button-row"> 
     <center>
       <input value="添加" class="btn btn-danger" type="submit" /> 
      <input value="重置" class="btn " type="reset" />
     </center>
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>

                   
                   <!-- 后台管理员 -->
                   
                   
                   
                   <!-- 广告管理模块 -->
                   
                   
                   
                    <!-- 类别管理 -->
                   
                   
                   
                   <!-- 评论管理 -->
                   
                   <!--  -->
                   
                   <!-- 商品管理 -->
                   
                   
                   
                     <!-- 轮播 -->
                   
                   
                   
                   <!-- 友情链接 -->
                   
                   
                   
                    <!-- 订单管理 -->
                   
                   
                       <!-- 订单详情管理 -->
                   
                    <!-- Panels End -->
                </div>
                <!-- footer -->
                <div id="mws-footer">
                    Copyright Your Website 2017. All Rights Reserved.
                </div>
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/test/Public/Admins/b/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/test/Public/Admins/b/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/test/Public/Admins/b/js/libs/jquery.placeholder.min.js"></script>
    <script src="/test/Public/Admins/b/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/test/Public/Admins/b/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/test/Public/Admins/b/jui/jquery-ui.custom.min.js"></script>
    <script src="/test/Public/Admins/b/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/test/Public/Admins/b/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/test/Public/Admins/b/plugins/flot/jquery.flot.min.js"></script>
    <script src="/test/Public/Admins/b/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/test/Public/Admins/b/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/test/Public/Admins/b/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/test/Public/Admins/b/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/test/Public/Admins/b/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/test/Public/Admins/b/plugins/validate/jquery.validate-min.js"></script>
    <script src="/test/Public/Admins/b/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/test/Public/Admins/b/bootstrap/js/bootstrap.min.js"></script>
    <script src="/test/Public/Admins/b/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/test/Public/Admins/b/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/test/Public/Admins/b/js/demo/demo.dashboard.js"></script>

</body>
</html>