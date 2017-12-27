<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Public/Homes/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<!-- head -->
		<link rel="Shortcut Icon" href="/Public/Homes/images/icon.jpg" type="image/x-icon">
		<link href="/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" type="text/css"/>
		<link href="/Public/Homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/Public/Homes/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/Public/Homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/Public/Homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<link href="/Public/Homes/css1/index_002.css" rel="stylesheet" type="text/css" />
		<!-- head -->

		<link href="/Public/Homes/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/Public/Homes/js/address.js"></script>
		<link rel="stylesheet" type="text/css" href="/Public/Homes/css2/index.css">
		<link media="all" href="/Public/Homes/css/index.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="/Public/Homes/js/jquery-1.8.3.min.js"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<!-- 导入头部 -->
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
			     <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/index.php/Home/Bycar/index" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span><b id="carnum"><?php if($_SESSION['shopnum']== '' ): ?>0<?php else: ?>(<?php echo (session('shopnum')); ?>)<?php endif; ?></b> </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> 
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
									<img src="/Public/Homes/image/2s.PNG" width="650px" height="80px">
						
					</div>
				</div>
				<div class="clear"></div>
			
			<!-- 头部 -->
			
			</div>

			<!--悬浮搜索框-->


			<div class="clear"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">添加收货地址</div>
						</div>
						<div class="clear"></div>
						<ul>

							<!-- <div class="per-border"></div> -->
							<?php if(is_array($address)): foreach($address as $key=>$addresses): ?><li class="user-addresslist" name="<?php echo ($addresses['id']); ?>" id="li">

								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   						<span class="buy-user"><?php echo ($addresses['name']); ?> </span>
										<span class="buy-phone"><?php echo ($addresses['phone']); ?></span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								  <!--  <span class="province">湖北</span>省
										<span class="city">武汉</span>市
										<span class="dist">洪山</span>区 -->
										<span><?php echo ($addresses['address']); ?></span>
										<span class="street"><?php echo ($addresses['street']); ?></span>
										</span>

										</span>
									</div>
									<!-- <ins class="deftip">默认地址</ins> -->
								</div>
								<div class="address-right">
									<a href="/Public/Homes/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="javascript:void(0)" id="del" name="<?php echo ($addresses['id']); ?>">删除</a>
								</div>

							</li><?php endforeach; endif; ?>
							<!-- <div class="per-border"></div> -->
							<!-- <li class="user-addresslist">
								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   <span class="buy-user">艾迪 </span>
										<span class="buy-phone">15871145629</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   <span class="province">湖北</span>省
										<span class="city">武汉</span>市
										<span class="dist">武昌</span>区
										<span class="street">东湖路75号众环大厦2栋9层902</span>
										</span>

										</span>
									</div>
									<ins class="deftip hidden">默认地址</ins>
								</div>
								<div class="address-right">
									<span class="am-icon-angle-right am-icon-lg"></span>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="#">设为默认</a>
									<span class="new-addr-bar">|</span>
									<a href="#">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);"  onclick="delClick(this);">删除</a>
								</div>

							</li> -->

						</ul>

						<div class="clear"></div>
					</div>
					<!--物流 -->
					<!-- <div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div> -->
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<!-- <li class="pay card"><img src="/Public/Homes/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="/Public/Homes/images/weizhifu.jpg" />微信<span></span></li> -->
							<li class="pay taobao"><img src="/Public/Homes/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<!-- <div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div> -->

								</div>
							</div>
							<div class="clear"></div>

							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										<?php if(is_array($row)): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shop): $mod = ($i % 2 );++$i;?><ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="<?php echo ($shop['picname']); ?>" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($shop['descr']); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line"><?php echo ($shop['color']); ?></span>
														<span class="sku-line">包装：裸装</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															￥<em class="J_Price price-now"><?php echo ($shop['cprice']); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<!-- <input class="min am-btn" name="" type="button" value="-" /> -->
															<!-- <input class="text_box" name="" type="text" value="3" style="width:30px;" /> -->
															<span class="text_box" name="num" style="width:30px;text-align:center;"><?php echo ($shop['num']); ?></span>
															<!-- <input class="add am-btn" name="" type="button" value="+" /> -->
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													￥<em tabindex="0" class="J_ItemSum number"><?php echo ($shop['num']*$shop['cprice']); ?></em>
												</div>
											</li>
											<!-- <li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														快递<b class="sys_item_freprice">10</b>元
													</div>
												</div>
											</li> -->

										</ul><?php endforeach; endif; else: echo "" ;endif; ?>
										<div class="clear"></div>

									</div>
							</tr>
							<div class="clear"></div>
							</div>

						
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							
							<!--优惠券 -->
							
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"><?php echo ($all); ?></em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address">
												<span class="buy-line-title">收货人:</span>
												<span class="buy-address-detail">   
                                         		<span class="buy-user" id="name"> </span>
												<!-- <span class="buy-phone" id="phone"></span> -->
												</span>
												
											</p>
											<p class="buy-footer-address">
												
												<span class="buy-address-detail">
												<span class="buy-line-title">手机号:</span>
												<span class="buy-phone" id="phone"></span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   				<!-- <span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区 -->
												<span id="address"></span>
												<span class="street" id="street"></span>
												</span>
												</span>
											</p>
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="javascript:void(0)" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<!-- <div class="footer"> -->
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
					<!-- 尾部 -->
					<!-- <div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div> -->
					<!-- <div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div> -->
				<!-- </div> -->
			</div>
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf">
					<strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
					<div class="am-form-group theme-poptit">
						<div class="am-btn am-btn-danger close" style="float:right;">&times;</div>
					</div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal" action="/index.php/Home/Pay/insert" method="post">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" name="name" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input name="phone" placeholder="手机号必填" type="text">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">地址:</label>
							<div class="am-form-content address">
								<select id="cid">
									<option value="">--请选择--</option>
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<input class="" rows="3" type="text" id="user-intro" placeholder="输入详细街道" name="street">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-code" class="am-form-label">邮编</label>
							<div class="am-form-content">
								<input name="code" placeholder="邮编" type="text">
							</div>
						</div>
						<input type="hidden" name="address" value="">
						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<input type="submit" class="am-btn am-btn-danger" value="添加" id="ss">
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
	</body>
	<script type="text/javascript">
	$.ajax({
		'url':'/index.php/Home/Pay/address',
		'type':'get',
		'data':{upid:0},
		'dataType':'json',
		success:
		function(data){
			// alert(data);
			//遍历data
			for(var i=0;i<data.length;i++){
				// alert(data[i].name);
				//把遍历出来的数据添加到下拉选项里
				var info='<option value="'+data[i].id+'">'+data[i].name+'</option>';
				// alert(info);
				//把带有数据的下拉选项添加到select元素里
				$("#cid").append(info);
			}
			
		},
		error:
		function(){
			alert('Ajax响应失败');
		}
	})

	//其他级别
	$("select").live('change',function(){
		// alert('ssss');
		//获取父级id 当做附加参数
		o=$(this);
		//清除
		o.nextAll("select").remove();
		id=o.val();
		// alert(id);
		//ajax
		$.ajax({
			'url':'/index.php/Home/Pay/address',
			'type':'get',
			'data':{upid:id},
			'dataType':'json',
			success:
			function(data){
				//创建select
				select=$("<select></select>");
				// alert(data);
				if(data.length>0){
				//遍历
					for(var i=0;i<data.length;i++){
						//把遍历出来数据添加到option
						info='<option value="'+data[i].id+'">'+data[i].name+'</option>';
						// alert(info);
						// $("#mid").append(info);
						//把当前info数据添加到创建的select
						select.append(info);
						
					}
					//把带有数据的select 追加
					o.after(select);
				
				}
			}


		})
	})

	//获取城市级联地址信息
	$("#ss").click(function(){
		arr=[];
		$("select").each(function(){
			//获取选中地址的value值
			v=$(this).find("option:selected").html();
			arr.push(v);
			// alert();
		})
		// alert(arr);
		//给隐藏域赋值
		$("input[name='address']").val(arr);

	})

	// //选中收货地址 获取选中的收货地址id 方便生成订单
	// $("").click(function(){
	// 	// alert('ss');
	// 	$(this).siblings().removeClass('active');
	// 	$(this).addClass('active');
	// 	address_id=$(this).attr("uid");
	// 	// alert(address_id);
	// })
	// 地址与提交同步
	$("#li").live('click',function(){
		// alert(length);
		id=$(this).attr('name');
		// alert(id);
		ad=$(this);
		if(id==null){
			alert("请选择地址");
			$("#J_Go").attr('href',"javascript:void(0)");
		}else{
			$("#J_Go").attr('href',"/index.php/Home/Bycar/dopayes?id="+id);
		}
		// $("#J_Go").attr('href',"/index.php/Home/Bycar/payes?id="+id);
		$.post('/index.php/Home/Pay/checkpay',{id:id},function(data){
			// ad.parents().next().next().next().next().next().find("span[name='address']").html(data['address']);
			$("#address").html(data['address']);
			$("#street").html(data['street']);
			$("#name").html(data['name']);
			$("#phone").html(data['phone']);

		},'json');
	})

	// ajax删除
	$("#del").live('click',function(){
		id=$(this).attr('name');
		// alert(id);
		dd=$(this);
		s=confirm("你确定删除吗?");
		if(s){  
		  //Ajax
		  $.post("/index.php/Home/Pay/del",{id:id},function(data){
		    if(data==1){
		      // 清除选中的html样式
		        
	            	dd.parent().parent().remove();
					// window.location.reload();//强制刷新

		        // alert(a);
		      // alert('删除成功');
		    }else{
		      alert(data);
		    }
		  });
		}
	})
	$("#J_Go").click(function(){
		if($(".user-addresslist").hasClass('defaultAddr')){
			
		}else{
			alert('请先选择地址');
		}
	})
	
</script>
</html>