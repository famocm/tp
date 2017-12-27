<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>付款成功页面</title> 
  <link rel="stylesheet" type="text/css" href="/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" /> 
  <link href="/Public/Homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
    <!-- head -->
    <link href="/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
    <link rel="Shortcut Icon" href="/Public/Homes/images/icon.jpg" type="image/x-icon">
    <link href="/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" type="text/css"/>
    <link href="/Public/Homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Homes/css/skin.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/Public/Homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
    <link href="/Public/Homes/css1/index_002.css" rel="stylesheet" type="text/css" />
    <!-- head -->
  <!-- 进度条2 --> 
  <!-- <link rel="stylesheet" href="/Public/Homes/css/control.css" type="text/css" />  -->
  <!-- <script type="text/javascript" src="/Public/Homes/js/jquery-1.8.2.js"></script>  -->
  <!-- <script type="text/javascript" src="/Public/Homes/js/jquery.easing.1.3.js"></script>  -->
  <!-- <script type="text/javascript" src="/Public/Homes/js/stepBar.js"></script>  -->
  <link href="/Public/Homes/css/sustyle.css" rel="stylesheet" type="text/css" /> 
  <script type="text/javascript" src="/Public/Homes/basic/js/jquery-1.7.min.js"></script> 
 </head> 
 <body> 
  <!-- 头部 --> 
  
			<div id="header" class="J_sitenav site-top-nav" data-ptp="_head">
			   <div class="wrap"> 
			    <a href="/index.php/Home/Index/index" rel="nofollow" class="home fl">时尚街首页</a> 
			    <ul class="header-top"> 
			     <li class="s1 show-nologin"> <?php if($_SESSION['username2']== null): ?><a rel="nofollow" href="/index.php/Home/Register/index">注册</a><?php else: ?><a rel="nofollow" href="">欢迎<?php echo (session('username2')); ?>回来</a><?php endif; ?> 
					
			     </li> 
			     <li class="s1 show-nologin"> <?php if($_SESSION['username2']== null): ?><a rel="nofollow" href="/index.php/Home/Login/login">登录</a><?php else: ?><a rel="nofollow" href="/index.php/Home/Login/loginout">退出</a><?php endif; ?> 
					
			     </li> 
			     
			     <li class="s1 myorder has-line"> <a href="/index.php/Home/Personal/order"  class="text display_u" rel="nofollow">我的订单</a> </li> 
			     <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/index.php/Home/Bycar/index" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span><b id="carnum"><?php if($_SESSION['username2']== '' ): else: ?>(<?php echo (session('shopnum')); ?>)<?php endif; ?></b> </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> 
			      </li> 
			      <li class="s1 has-line has-icon custom-item"> <a rel="nofollow" href="/index.php/Home/Personal/index" target="_blank">个人中心</a>
			      </li>
			      </li> 
			    </ul>
			   </div>
			  </div> 

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="/Public/Homes/images/logo.png" /></div>
					<div class="logoBig">
						<li><a href="/index.php/Home/Index/index"><img src="/Public/Homes/images/fin.jpg" /></a></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<!-- <form> -->
							<!-- <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off"> -->
							<!-- <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit"> -->
						<!-- </form> -->
						<img src="/Public/Homes/image/3s.PNG" width="650px" height="80px">
					</div>
				</div>
				<div class="clear"></div>
			 
  <!-- 头部 --> 
 
  <div class="clear"></div> 
  <!-- 进度条 --> 

  <!-- 进度条 --> 
  <div class="take-delivery"> 
   <div class="status"> 
    <h2>您已成功付款</h2> 
    <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zong): $mod = ($i % 2 );++$i;?><div class="successInfo"> 
     <ul> 
      <li>付款金额<em>&yen;<?php echo (session('total')); ?></em></li> 
      <div class="user-info"> 
       <p>收货人:<?php echo ($zong['name']); ?></p> 
       <p>联系电话:<?php echo ($zong['phone']); ?></p> 
       <p>收货地址:<?php echo ($zong['address']); ?></p> 
      </div> 请认真核对您的收货信息，如有错误请联系客服 
     </ul> 
     <!-- <div class="option"> 
      <span class="info">您可以</span> 
      <a href="/Public/Homes/person/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a> 
      <a href="/Public/Homes/person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a> 
     </div>  -->
    </div><?php endforeach; endif; else: echo "" ;endif; ?> 
   </div> 
  </div> 
  <!-- 尾部 --> 
  <!DOCTYPE html>
<html>
  
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="Shortcut Icon" href="/Public/Homes/images/icon.jpg" type="image/x-icon">
    <link media="all" href="/Public/Homes/css/index.css" type="text/css" rel="stylesheet"></head>
  
  <body class="media_screen_1200">
    <!--[if (IE 9)|(!IE)]><!-->
    <!--<![endif]-->
    <!--[if lte IE 8]>
      <script src="https://s10.mogucdn.com/__mfp/meili-lib/assets/0.0.6/es5-shim.js,mfp/meili-lib/assets/0.0.6/es5-sham.js,mfp/meili-lib/assets/0.0.6/console-polyfill.js,mfp/meili-lib/assets/0.0.6/json2.js,mfp/meili-m/assets/1.2.5/m.mgj.js,mfp/meili-lib/assets/0.0.6/require-cube.js,mfp/meili-lib/assets/0.0.6/jquery.1.7.2.js,/mfp/meili-lib/assets/0.0.6/doT.js,mfp/meili-mgj-cube-base-pc/assets/0.1.4/pc-init/index.js,mfp/meili-mgj-ie67-upgrade/assets/0.1.8/ie67upgrade.js,mfp/meili-mgj-browser-update/assets/0.0.3/index.js$13.js"></script>
    <![endif]-->
    <!--右侧导航栏-->
    <div class="mgj_rightbar J_sidebar mini" style="right: -30px;">
      <!--空的右侧边栏-->
      <div id="mgj_rightbar_top_blank" class="mgj_rightbar_960"></div>
      <!--方便定margin的空dediv-->
      <div id="mgj_rightbar_blank_div"></div>
      <!--用户头像-->
      <!--购物车-->
      <!--优惠券-->
      <div class="sidebar-item mgj-my-coupon">
        <a target="_top" rel="nofollow" href="">
          <i class="s-icon"></i>
          <div class="s-txt">优惠券</div>
          <div class="num"></div>
        </a>
      </div>
      <!--钱包-->
      <div class="sidebar-item mgj-my-wallet">
        <a target="_top" rel="nofollow" href="">
          <i class="s-icon"></i>
          <div class="s-txt">钱包</div></a>
      </div>
      <!--足迹-->
      <div class="sidebar-item mgj-my-browserlog">
        <a target="_top" rel="nofollow" href="">
          <i class="s-icon"></i>
          <div class="s-txt">足迹</div></a>
      </div>
      <div class="sideBottom">
        <!--回到顶部-->
      </div>
    </div>
    <!-- 中间区域 -->
    <div class="header_mid clearfix"></div>
    <div id="body_wrap"></div>
    <div class="foot J_siteFooter" data-ptp="_foot" style="background: rgb(245, 245, 245) none repeat scroll 0% 0%;">
      <div class="mgj_copyright">
        <div class="mgj_footer_helper">
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 新手帮助 -</h4>
              <ul>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_top" class="color_999" href="">常见问题</a></li>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_top" class="color_999" href="">自助服务</a></li>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_top" class="color_999" href="">联系客服</a></li>
                <li class="mgj_footer_helper_item">
                  <a rel="nofollow" target="_top" class="color_999" href="">意见反馈</a></li>
              </ul>
            </div>
          </div>
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 权益保障 -</h4>
              <ul>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">全国包邮</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">7天无理由退货</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">退货运费补贴</div></li>
              </ul>
            </div>
          </div>
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 支付方式 -</h4>
              <ul>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">微信支付</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">支付宝</div></li>
                <li class="mgj_footer_helper_item">
                  <div class="color_999">白付美支付</div></li>
              </ul>
            </div>
          </div>
          <div class="mgj_footer_helper_mod">
            <div class="mgj_footer_helper_mod_container">
              <h4 class="mgj_footer_helper_title color_666">- 移动客户端下载 -</h4>
              <ul>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">蘑菇街</div>
                  <img class="mgj_footer_helper_quoer_code" src="/Public/Homes/footer/upload_07dhaga6788g05g91890jjd7a4cc3_280x280.png"></li>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">美丽说</div>
                  <img class="mgj_footer_helper_quoer_code" src="/Public/Homes/footer/upload_5ii9f90fdide17hj3jkj3bfd121e3_280x280.png"></li>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">uni引力</div>
                  <img class="mgj_footer_helper_quoer_code" src="/Public/Homes/footer/upload_892b80cj47j51h95f44cai2e0b002_280x280.png"></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="mgj_footer_otherlink">
          <p class="mgj_footer_otherlink_container">
          <?php if(is_array($_SESSION['friend'])): foreach($_SESSION['friend'] as $key=>$you): ?><a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="<?php echo ($you['address']); ?>"><?php echo ($you['name']); ?></a>
            <b class="mgj_footer_b color_666">|</b><?php endforeach; endif; ?>
            <!-- <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">蘑菇街游戏</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">淘粉吧</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">穿衣搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">秋季女装新款</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">秋季连衣裙长袖</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">秋季孕妇装</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">QQ钱包</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">时尚品牌网</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">装修</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">背带裤搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">衣联网</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">播视网视频</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">慧聪网</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/dapei/1167u?acm=3.mce.1_10_19o9w.32159.0.3oWTRqfYu5xWb.m_225654">衬衫搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="">牛仔外套搭配图片</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/dapei/15jdxm?acm=3.mce.1_10_19oa2.32159.0.3oWTRqfYu5xWd.m_225657">冬装时尚搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/dapei/125s5u?acm=3.mce.1_10_19oa4.32159.0.3oWTRqfYu5xWe.m_225658">针织衫搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/dapei/11bm1q?acm=3.mce.1_10_19oa6.32159.0.3oWTRqfYu5xWf.m_225659">牛仔衣搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/dapei/12u28?acm=3.mce.1_10_19oa8.32159.0.3oWTRqfYu5xWg.m_225660">风衣搭配</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/cate/mei_0_mianmo_11y?acm=3.mce.1_10_19oac.32159.0.3oWTRqfYu5xWh.m_225662">补水面膜排行榜</a>
            <b class="mgj_footer_b color_666">|</b>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_666" href="http://ai.mogujie.com/?acm=3.mce.1_10_19kr0.32159.0.3oWTRqfYu5xWi.m_223370">爱蘑菇街</a>
            <b class="mgj_footer_b color_666">|</b> --></p>
        </div>
        <div class="mgj_footer_mgjinfo">
          <ul>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">关于我们</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">招聘信息</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">联系我们</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">商家入驻</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">商家后台</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">蘑菇商学院</a></li>
            <li class="mgj_footer_mgjinfo_item">
              <a rel="nofollow" target="_top" class="color_666" href="">商家社区</a></li>
          </ul>
          <p class="mgjhostname color_999">©2017 Mogujie.com 杭州卷瓜网络有限公司</p></div>
        <div class="mgj_footer_copyright">
          <p class="mgj_footer_copyright_container">
            <span class="mgj_footer_copyright_span color_999">营业执照注册号：</span>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_999" href="upload_ifrdimtcgeztgzdchazdambqmeyde_2480x3508.jpg">330106000129004</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999">网络文化经营许可证：</span>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_999" href="upload_59405ekk9ieijjcidl1fijcg04c69_960x1385.jpg">浙网文（2016）0349-219号</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999">增值电信业务经营许可证：</span>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_999" href="idid_ifqtmylfmvqwiy3emmzdambqgyyde_1239x1753.png">浙B2-20110349</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999"></span>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_999" href="upload_506h1d771b5k20j9148ldjj0kdaab_960x1344.jpg">安全责任书</a>
            <b class="mgj_footer_b color_999">|</b>
            <span class="mgj_footer_copyright_span color_999"></span>
            <a rel="nofollow" target="_top" class="mgj_footer_a color_999" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010602002329&amp;acm=3.mce.1_10_19kz0.32170.0.3oWTRqfYu398h.m_223514">浙公网安备 33010602002329号</a>
            <b class="mgj_footer_b color_999">|</b></p>
        </div>
      </div>
    </div>
    <div class=tip>
      <div id="sidebar">
        <div id="wrap">
          <div id="prof" class="item ">
            <a href="# ">
              <span class="setting "></span>
            </a>
            <?php if($_SESSION['username2']== null): ?><div class="ibar_login_box status_login ">
               <div class="avatar_box ">
                <div class="avatar_imgbox " style="margin-left:30%;"><?php if($_SESSION['pic2']== null): ?><img src="/Public/Homes/images/no-img_mid_.jpg " /><?php else: ?><img class="am-circle am-img-thumbnail" src="<?php echo (session('pic2')); ?>" alt="" /><?php endif; ?></div>
              </div>
              <div class="login_btnbox ">
                <a href="/index.php/Home/Personal/index" class="login_order" style="margin-left:30%;">个人中心</a>
              </div>
            </div>
            <?php else: ?><div class="ibar_login_box status_login ">
              <div class="avatar_box ">
                <p class="avatar_imgbox "><?php if($_SESSION['pic2']== null): ?><img src="/Public/Homes/images/no-img_mid_.jpg " /><?php else: ?>
                <img class="am-circle am-img-thumbnail" src="<?php echo (session('pic2')); ?>" alt="" /><?php endif; ?></p>
                <ul class="user_info ">
                  <li>欢迎<?php echo (session('username2')); ?>回来</li>
                </ul>
              </div>
              <div class="login_btnbox ">
                <a href="/index.php/Home/Personal/order" class="login_order ">我的订单</a>
                <a href="/index.php/Home/Personal/collection" class="login_favorite ">我的收藏</a>
              </div>
              <i class="icon_arrow_white "></i>
            </div><?php endif; ?>
          </div>
          
          <!-- <div id="shopCart " class="item ">

            <a href="#">
              <span class="message "></span>
            </a>
            <a href="/index.php/Home/Bycar/index">
            <p>
              购物车
            </p>
           
            <p class="cart_num "><?php if($_SESSION['count2']== null): ?>0<?php else: echo (session('count2')); endif; ?></p>
            </a>
          </div> -->
          
          <!-- <div id="asset " class="item ">
            <a href="# ">
              <span class="view "></span>
            </a>
            <div class="mp_tooltip ">
              我的资产
              <i class="icon_arrow_right_black "></i>
            </div>
          </div> -->

          <div id="foot " class="item ">
            <a href="# ">
              <span class="zuji "></span>
            </a>
            <div class="mp_tooltip ">
              我的足迹
              <i class="icon_arrow_right_black "></i>
            </div>
          </div>

          <div id="brand " class="item ">
            <a href="/index.php/Home/Personal/collection">
              <span class="wdsc "><img src="/Public/Homes/images/wdsc.png " /></span>
            </a>
            <div class="mp_tooltip ">
              我的收藏
              <i class="icon_arrow_right_black "></i>
            </div>
          </div>

          <!-- <div id="broadcast " class="item ">
            <a href="# ">
              <span class="chongzhi "><img src="/Public/Homes/images/chongzhi.png " /></span>
            </a>
            <div class="mp_tooltip ">
              我要充值
              <i class="icon_arrow_right_black "></i>
            </div>
          </div> -->

          <div class="quick_toggle ">
            <li class="qtitem ">
              <a href="# "><span class="kfzx "></span></a>
              <div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
            </li>
            <!--二维码 -->
            <li class="qtitem ">
              <a href="#none "><span class="mpbtn_qrcode "></span></a>
              <div class="mp_qrcode " style="display:none; "><img src="/Public/Homes/images/fukuan.png" /><i class="icon_arrow_white "></i></div>
            </li>
            <li class="qtitem ">
              <a href="javascript:scroll(0,0)" class="return_top "><span class="top "></span></a>
            </li>
          </div>

          <!--回到顶部 -->
          <div id="quick_links_pop " class="quick_links_pop hide "></div>

        </div>

      </div>
      <div id="prof-content " class="nav-content ">
        <div class="nav-con-close ">
          <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
          我
        </div>
      </div>
      <div id="shopCart-content " class="nav-content ">
        <div class="nav-con-close ">
          <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
          购物车
        </div>
      </div>
      <div id="asset-content " class="nav-content ">
        <div class="nav-con-close ">
          <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
          资产
        </div>

        <div class="ia-head-list ">
          <a href="# " target="_blank " class="pl ">
            <div class="num ">0</div>
            <div class="text ">优惠券</div>
          </a>
          <a href="# " target="_blank " class="pl ">
            <div class="num ">0</div>
            <div class="text ">红包</div>
          </a>
          <a href="# " target="_blank " class="pl money ">
            <div class="num ">￥0</div>
            <div class="text ">余额</div>
          </a>
        </div>

      </div>
      <div id="foot-content " class="nav-content ">
        <div class="nav-con-close ">
          <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
          足迹
        </div>
      </div>
      <div id="brand-content " class="nav-content ">
        <div class="nav-con-close ">
          <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
          收藏
        </div>
      </div>
      <div id="broadcast-content " class="nav-content ">
        <div class="nav-con-close ">
          <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
          充值
        </div>
      </div>
    </div>
    <script>
      window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
    </script>
    <script type="text/javascript " src="/Public/Homes/basic/js/quick_links.js "></script>
    <!-- 添加ga统计信息 --></body>

</html> 
  <!-- 尾部 -->  
  <script type="text/javascript">
  $(function(){
    stepBar.init("stepBar",{
      step : 4,
      // change : true,
      animation : true
    });
  });
  </script>  
 </body>
</html>