<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
		<title>购物车页面</title>
		<link href="/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Public/Homes/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/Public/Homes/css/optstyle.css" rel="stylesheet" type="text/css" />
		<link rel="Shortcut Icon" href="/Public/Homes/images/icon.jpg" type="image/x-icon">
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
		<link rel="stylesheet" type="text/css" href="/Public/Homes/css2/index.css">
		<link media="all" href="/Public/Homes/css/index.css" type="text/css" rel="stylesheet">
		<!-- head -->

		

		<script type="text/javascript" src="/Public/Homes/js/stepBar.js"></script>
		<script type="text/javascript" src="/Public/Homes/js/jquery.js"></script>
 		<script type="text/javascript" src="/Public/Homes/js/jquery-1.8.3.min.js"></script>

	</head>
	<body>
		<!-- head1 -->
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
			     <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/index.php/Home/Bycar/index" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span><b id="carnum"><?php if($_SESSION['shopnum']== '' ): ?>0<?php else: ?>(<?php echo (session('shopnum')); ?>)<?php endif; ?></b>  </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> 
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
						<!-- <form>
							<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form> -->
									<img src="/Public/Homes/image/1s.PNG" width="650px" height="70px">
						
					</div>
				</div>
				<div class="clear"></div>
			
			<!-- 头部 -->
					<br>
				<div class="clear"></div>
				<div class="concent">
					<!-- head22 -->
					<div class="clear"></div>
					
					<div class="clear"></div>
					<!-- shop1 -->
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk"><div id="J_SelectAll1" class="select-all J_SelectAll"></div></div>
							<div class="th th-item"><div class="td-inner">商品信息</div></div>
							<div class="th th-price"><div class="td-inner">单价</div></div>
							<div class="th th-amount"><div class="td-inner">数量</div></div>
							<div class="th th-sum"><div class="td-inner">总价</div></div>
							<div class="th th-op"><div class="td-inner">操作</div></div>
						</div>
					</div>
					<!-- shop2 -->
					<div class="clear"></div>

					<!-- c -->
					<?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr class="item-list" name="tr">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
									<!-- <div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div> -->
									<div class="act-promo">
										
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
						</div>
						<!-- ww -->
						
						<div class="bundle-main">
							<ul class="item-content clearfix">
								<li class="td td-chk">
									<div class="cart-checkbox ">
										<input class="check" id="J_CheckBox_170037950254" name="items[]" value="<?php echo ($row['id']); ?>" type="checkbox">
										<label for="J_CheckBox_170037950254"></label>
									</div>
								</li>
								<li class="td td-item">
									<div class="item-pic">
										<a href="#" target="_blank" data-title="$row['descr']" class="J_MakePoint" data-point="tbcart.8.12">
										<img src="<?php echo ($row['picname']); ?>" class="itempic J_ItemImg"></a>
									</div>
									<div class="item-info">
										<div class="item-basic-info">
											<a href="#" target="_blank" title="$row['descr']" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($row['descr']); ?></a>
										</div>
									</div>
									
								</li>
								<li class="td td-info">
									<div class="item-props item-props-can">
										<span class="sku-line"><?php echo ($row['color']); ?></span><br>
										<span class="sku-line"><?php echo ($row['size']); ?></span><br>
										<i class="theme-login am-icon-sort-desc"></i>
									</div>
								</li>
								<li class="td td-price">
									<div class="item-price price-promo-promo">
										<div class="price-content">
											<div class="price-line">
												<em class="price-original"><?php echo ($row['price']); ?></em>
											</div>
											<div class="price-line">
												<em class="J_Price price-now" tabindex="0" id="cprice"><?php echo ($row['cprice']); ?></em>
											</div>
										</div>
									</div>
								</li>
								<li class="td td-amount">
									<div class="amount-wrapper ">
										<div class="item-amount ">
											<div class="sl">
												<!-- <input style="width:25px;height:25px;" name="del" type="button" value="-" /> -->
												<!-- <input style="width:25px;height:25px;" name="id" type="hidden" value="<?php echo ($row['id']); ?>" /> -->
												<!-- <a href="/index.php/Home/Bycar/updatee/id/<?php echo ($row['id']); ?>" class="jian"></a> -->
												<button style="width:25px;height:25px;" name="<?php echo ($row['id']); ?>" class="jian"> - </button>
												<span class="text_box" name="num" style="width:30px;text-align:center;"><?php echo ($row['num']); ?></span>
												<!-- <input style="width:25px;height:25px;" name="add" type="button" value="+" /> -->
												<!-- <a href="/index.php/Home/Bycar/update/id/<?php echo ($row['id']); ?>" ></a> -->
												<button style="width:25px;height:25px;" class="jia" name="<?php echo ($row['id']); ?>"> + </button>
											</div>
										</div>
									</div>
								</li>
								<li class="td td-sum">
									<div class="td-inner" id="total">
										<em tabindex="0" class="J_ItemSum number" id="tot"><?php echo ($row['num']*$row['cprice']); ?></em>
									</div>
								</li>
								<li class="td td-op">
									<div class="td-inner">
										<a href="/index.php/Home/Bycar/delete/id/<?php echo ($row['id']); ?>" data-point-url="#" class="delete">删除</a>
									</div>
								</li>
							</ul>
						</div>
												<!-- ww -->
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					<!-- c -->
					<div class="clear"></div>
				<?php if($_SESSION['s']== null): ?><div style="height:300px;font-size:20px;text-align:center;line-height:300px;">购物车还没有商品请先去购物<a href="/index.php/Home/Index/index" style="color:red;font-size:12px;">首页</a></div><?php else: ?>
				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<!-- <input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox"> -->
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span><a href="javascript:void(0)" class="alldel">全选</a></span>
					</div>
					<div class="operations">
						<a href="javascript:void(0)" hidefocus="true" class="deleteAll">删除</a>
					</div>
					<div class="float-bar-right">

						<div class="amount-sum">
							<a href="/index.php/Home/Index/index" id="J_Go" class="submit-btn submit-btn-disabled">
								<span>继续购物</span></a>
						</div> 
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total"><?php echo ($all); ?></em></strong>
						</div>
						<div class="btn-area">
						<!-- <a href="/index.php/Home/Index/index" id="J_Go" class="submit-btn submit-btn-disabled">
								<span>继续购物</span></a> -->
							<a href="/index.php/Home/Pay/index" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>去&nbsp;支&nbsp;付</span></a>
						</div>
						
					</div>
				</div><?php endif; ?>	
					
					<!-- c -->

				</div>
				<br>
				<div class="clear"></div>
		<!-- 尾部 -->
		
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
	</body>
	<script type="text/javascript">
	//全选
	$(".alldel").click(function(){
	// alert('sss');
	//设置为选中
	
	$(":checkbox").attr("checked",true);

})

	//删除
	$(".deleteAll").click(function(){
	a=[];//存储选中数据的id
	//遍历所有的复选框
	$(":checkbox").each(function(){
	//判断
	if($(this).attr("checked")){
	  //获取被选中的复选框的id
	  id=$(this).val();
	  // alert(id);
	  //把所有选中的id  存储在数组a
	  a.push(id);
	}

	// alert(a);
	})
	s=confirm("你确定删除吗?");
	if(s){  
	  //Ajax
	  $.get("/index.php/Home/Bycar/del",{id:a},function(data){
	    if(data==1){
	      // 清除选中的html样式
	        for(var i=0;i<a.length;i++){
            	$(".text_box").parent().parent().parent().remove();
				window.location.reload();//强制刷新
          	}
	        // alert(a);
	      // alert('删除成功');
	    }else{
	      alert(data);
	    }
	  });
	}
 })
	//减
	$(".jian").click(function(){
		// alert('sss');
		//获取id
		var id=$(this).attr('name');
		// alert(id);
		b=$(this);
		//Ajax
		$.get("/index.php/Home/Bycar/updatee",{id:id},function(data){
			// alert(data);
			// alert(ob.next("input").val());
			//把响应数据赋值给input value值
			b.next().html(data['num']);
			//把响应数据赋值
			b.parents().parents().next().find('em').html(data['tot']);
			$('#J_Total').html(data['all']);
		},'json');
	})

	//加
	$(".jia").click(function(){
		//获取id
		var id=$(this).attr("name");
		// alert(id);
		b=$(this);
		//Ajax
		$.get("/index.php/Home/Bycar/update",{id:id},function(data){
			// alert(data);
			//把响应数据赋值给input value值
			b.prev().html(data['num']);
			//把响应数据赋值
			b.parents().parents().next().find('em').html(data['tot']);
			$('#J_Total').html(data['all']);
		},'json')
	})

	</script>
</html>