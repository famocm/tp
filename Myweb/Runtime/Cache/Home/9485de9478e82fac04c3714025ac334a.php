<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
		<title>首页</title>

		<link href="/test/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/test/Public/Homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link rel="Shortcut Icon" href="/test/Public/Homes/images/icon.jpg" type="image/x-icon">
		<link href="/test/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" type="text/css"/>
		<link href="/test/Public/Homes/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/test/Public/Homes/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/test/Public/Homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/test/Public/Homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<link href="/test/Public/Homes/css1/index_002.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/test/Public/Homes/css2/index.css">
		<link rel="icon" type="text/css" href="/test/Public/Homes/images/favicon.ico">
	</head>

	<body>
		<div class="hmtop">
			
			<div id="header" class="J_sitenav site-top-nav" data-ptp="_head">
			   <div class="wrap"> 
			    <a href="/test/index.php/Home/Index/index" rel="nofollow" class="home fl">时尚街首页</a> 
			    <ul class="header-top"> 
			     <li class="s1 show-nologin"> <?php if($_SESSION['username2']== null): ?><a rel="nofollow" href="/test/index.php/Home/Register/index">注册</a><?php else: ?><a rel="nofollow" href="">欢迎<?php echo (session('username2')); ?>回来</a><?php endif; ?> 
					
			     </li> 
			     <li class="s1 show-nologin"> <?php if($_SESSION['username2']== null): ?><a rel="nofollow" href="/test/index.php/Home/Login/login">登录</a><?php else: ?><a rel="nofollow" href="/test/index.php/Home/Login/loginout">退出</a><?php endif; ?> 
					
			     </li> 
			     
			     <li class="s1 myorder has-line"> <a href="/test/index.php/Home/Personal/order"  class="text display_u" rel="nofollow">我的订单</a> </li> 
			     <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/test/index.php/Home/Bycar/index" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span><b id="carnum"><?php if($_SESSION['username2']== '' ): else: echo (session('shopnum')); endif; ?></b> </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> 
			      </li> 
			     <li class="s1 has-line has-icon custom-item"> <a rel="nofollow" href="/test/index.php/Home/Personal/index" target="_blank">个人中心</a>
			      </li>  
			    </ul>
			   </div>
			  </div> 

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logoBig">
						<li><a href="/test/index.php/Home/Index/index"><img src="/test/Public/Homes/images/fin.jpg" /></a></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<form action="/test/index.php/Home/Search/index3" method="get">
							<input id="searchInput" name="goods" type="text" value="<?php echo ($_GET['goods']); ?>" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>
				<div class="clear"></div>
			
		</div>
			<div class="banner">
                      <!--轮播 -->
					<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
						<ul class="am-slides">
							<li class="banner1"><img src="/test/Public/Uploads/<?php echo ($list4[0]['img']); ?>" /></li>
							<li class="banner2"><img src="/test/Public/Uploads/<?php echo ($list4[1]['img']); ?>" /></li>
							<li class="banner3"><img src="/test/Public/Uploads/<?php echo ($list4[2]['img']); ?>" /></li>
							<li class="banner4"><img src="/test/Public/Uploads/<?php echo ($list4[3]['img']); ?>" /></li>

						</ul>
					</div>
					<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">主题市场</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">省钱团购</a></li>
                                <li class="qc"><a href="#">品质优选</a></li>
                                <!-- <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li> -->
							</ul>
						    <!-- <div class="nav-extra">
						    	<b></b>我的福利
						    	
						    </div> -->
						</div>					
		        				
						 <!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											<?php if(is_array($list)): $i = 0; $__LIST__ = array_slice($list,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name">
													<a title="<?php echo ($row['name']); ?>" href="/test/index.php/Home/Search/index?id=<?php echo ($row['id']); ?>"><?php echo ($row['name']); ?></a>
													<?php if(is_array($row['shop'])): $i = 0; $__LIST__ = array_slice($row['shop'],0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rows): $mod = ($i % 2 );++$i;?><a href="/test/index.php/Home/Search/index?id=<?php echo ($row['id']); ?>" class="" style="margin-left:10px;font-size:10px" title="<?php echo ($rows['name']); ?>"><?php echo ($rows['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
													</h3>
													<em>&gt;</em>
												</div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
														
															<div class="menu-srot">
															<?php if(is_array($row['shop'])): $i = 0; $__LIST__ = $row['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rows): $mod = ($i % 2 );++$i;?><div class="sort-side">
																<?php if(is_array($rows['shop'])): $i = 0; $__LIST__ = $rows['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rowss): $mod = ($i % 2 );++$i;?><dl class="dl-sort">
																		<dt><span title="<?php echo ($rowss['name']); ?>"><?php echo ($rowss['name']); ?></span></dt>
																		<?php if(is_array($rowss['shop'])): $i = 0; $__LIST__ = $rowss['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rowsss): $mod = ($i % 2 );++$i;?><dd><a title="<?php echo ($rowsss['name']); ?>" href="/test/index.php/Home/Search/index?id=<?php echo ($row['id']); ?>"><span><?php echo ($rowsss['name']); ?></span></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
																	</dl><?php endforeach; endif; else: echo "" ;endif; ?>
																</div><?php endforeach; endif; else: echo "" ;endif; ?>
																
															</div>
															
														</div>
													</div>
												</div>
											<!-- <b class="arrow"></b>	 -->
											</li><?php endforeach; endif; else: echo "" ;endif; ?>
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/test/Public/Homes/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/test/Public/Homes/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href=""><img src="/test/Public/Homes/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/test/Public/Homes/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<?php if(is_array($list2)): foreach($list2 as $key=>$roww): ?><div class="demo">
							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<!-- <img src="/test/Public/Uploads/TJ2.jpg"></img> -->
									<span>[<?php echo ($roww['sponspr']); ?>]</span><?php echo ($roww['describe']); ?>								
								</a></li>						
							</ul>
                        <div class="advTip"><img src="/test/Public/Adverts/<?php echo ($roww['picname']); ?>" height="100px" /></div>
						</div><?php endforeach; endif; ?>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3">
							<img src="/test/Public/Homes/images/2016.png "></img>
							<p>今日<br>推荐</p>
						</div>
						<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$infos): $mod = ($i % 2 );++$i;?><div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info " style="width:100px;">
								<h3><?php echo ($infos['descr']); ?></h3>
							</div>
							<div class="recommendationMain one">
								<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($infos['id']); ?>&pid=<?php echo ($infos['typeid']); ?>"><img src="/test<?php echo ($infos['picname']); ?>"></img></a>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>						
						<!-- <div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain two">
								<img src="/test/Public/Homes/images/tj1.png "></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain three">
								<img src="/test/Public/Homes/images/tj2.png "></img>
							</div>
						</div>
 -->
					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>秒杀专场</h4>
							<h3>优惠享不停 </h3>
							<!-- <span class="more ">
                              <a href="# "><i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                        </span> -->
						</div>

					  <div class="am-g am-g-fixed ">
					  <?php if(is_array($action)): $i = 0; $__LIST__ = $action;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$actions): $mod = ($i % 2 );++$i;?><div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($actions['id']); ?>&pid=<?php echo ($actions['typeid']); ?>"><img src="/test<?php echo ($actions['picname']); ?>" style="width:296px;height:296px;"></img></a>
							</div>
							<div class="info ">
								<h3><?php echo ($actions['descr']); ?></h3>
							</div>														
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						<!-- <div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src="/test/Public/Homes/images/activity2.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src="/test/Public/Homes/images/activity3.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src="/test/Public/Homes/images/activity.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>													
						</div> -->
						
					  </div>
                   </div>
					<div class="clear "></div>

					<!--遍历商品栏-->
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shop): $mod = ($i % 2 );++$i;?><div id="f1">
					<!--甜点-->
					
					<div class="am-container ">
						<div class="shopTitle ">
							<h4><?php echo ($shop['name']); ?></h4>
							<!-- <h3>每一道甜品都有一个故事</h3> -->
							
							<div class="today-brands ">
								<span>热门搜索</span>
								<?php if(is_array($shop['shop'])): $i = 0; $__LIST__ = $shop['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shops): $mod = ($i % 2 );++$i; if(is_array($shops['shop'])): $i = 0; $__LIST__ = $shops['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopss): $mod = ($i % 2 );++$i;?>|<a href="/test/index.php/Home/Search/index?id=<?php echo ($shop['id']); ?>"><?php echo ($shopss['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
							</div>
							<span class="more ">
                    			<a href="/test/index.php/Home/Search/index?id=<?php echo ($shop['id']); ?>">全部商品<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        	</span>
						</div>
					</div>
					
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<?php if(is_array($shop['shop'])): $i = 0; $__LIST__ = $shop['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shops): $mod = ($i % 2 );++$i; if(is_array($shops['shop'])): $i = 0; $__LIST__ = $shops['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopss): $mod = ($i % 2 );++$i; if(is_array($shopss['shop'])): $i = 0; $__LIST__ = $shopss['shop'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopsss): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>
										<a class="outer" href="/test/index.php/Home/Search/index?id=<?php echo ($shop['id']); ?>"><span class="inner"><b class="text"><?php echo ($shopsss['name']); ?></b></span></a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
								<!-- <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> -->
								<!-- <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>	
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> -->									
							</div>
							
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['6']['descr']); ?>">
										<?php echo ($shop['goods']['6']['descr']); ?>
									</div>								
								</div>
                                  <a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][6]['id']); ?>&pid=<?php echo ($shop['goods'][6]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['6']['picname']); ?>" style="width:210px;height:210px"/></a>								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug">
								<div class="outer-con ">
									<div class="title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['0']['goods']); ?>">
										<?php echo ($shop['goods']['0']['goods']); ?>
									</div>									
									<div class="sub-title ">
										原价:<span style="font-size:12px;color:#ccc;text-decoration:line-through;">￥<?php echo ($shop['goods']['0']['price']); ?></span>
										促销价:<span style="font-size:12px;color:red;">￥<?php echo ($shop['goods']['0']['cprice']); ?></span>
									</div>
									<!-- <a href="javascript:void(0)" name="<?php echo ($shop['goods']['0']['typeid']); ?>" title="<?php echo ($shop['goods']['0']['id']); ?>" class="gwc1"><i class="am-icon-cart-plus am-icon-md  seprate"></i></a> -->
								</div>
								<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][0]['id']); ?>&pid=<?php echo ($shop['goods'][0]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['0']['picname']); ?>" style="width:160px;height:160px;"/></a>
							</div>

							<div class="am-u-sm-7 am-u-md-4 text-two">
								<div class="outer-con ">
									<div class="title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['1']['goods']); ?>">
										<?php echo ($shop['goods']['1']['goods']); ?>
									</div>
									<div class="sub-title ">
										原价:<span style="font-size:12px;color:#ccc;text-decoration:line-through;">￥<?php echo ($shop['goods']['1']['price']); ?></span>
										促销价:<span style="font-size:12px;color:red;">￥<?php echo ($shop['goods']['1']['cprice']); ?></span>
									</div>
									<!-- <a href="javascript:void(0)" name="<?php echo ($shop['goods']['1']['typeid']); ?>" title="<?php echo ($shop['goods']['1']['id']); ?>" class="gwc2"><i class="am-icon-cart-plus am-icon-md  seprate"></i></a> -->
								</div>
								<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][1]['id']); ?>&pid=<?php echo ($shop['goods'][1]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['1']['picname']); ?>" style="width:160px;height:160px;"/></a>
							</div>


						<div class="am-u-sm-3 am-u-md-2 text-three big">
							<div class="outer-con ">
								<div class="title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['2']['goods']); ?>">
									<?php echo ($shop['goods']['2']['goods']); ?>
								</div>
								<div class="sub-title ">
									原价:<span style="font-size:12px;color:#ccc;text-decoration:line-through;">￥<?php echo ($shop['goods']['2']['price']); ?></span>
									促销价:<span style="font-size:12px;color:red;">￥<?php echo ($shop['goods']['2']['cprice']); ?></span>
								</div>
								<!-- <a href="javascript:void(0)" name="<?php echo ($shop['goods']['2']['typeid']); ?>" title="<?php echo ($shop['goods']['2']['id']); ?>" class="gwc3"><i class="am-icon-cart-plus am-icon-md  seprate"></i></a> -->
							</div>
							<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][2]['id']); ?>&pid=<?php echo ($shop['goods'][2]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['2']['picname']); ?>" style="width:160px;height:160px;"/></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three sug">
							<div class="outer-con ">
								<div class="title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['3']['goods']); ?>">
									<?php echo ($shop['goods']['3']['goods']); ?>
								</div>
								<div class="sub-title ">
									原价:<span style="font-size:12px;color:#ccc;text-decoration:line-through;">￥<?php echo ($shop['goods']['3']['price']); ?></span>
									促销价:<span style="font-size:12px;color:red;">￥<?php echo ($shop['goods']['3']['cprice']); ?></span>
								</div>
								<!-- <a href="javascript:void(0)" name="<?php echo ($shop['goods']['3']['typeid']); ?>" title="<?php echo ($shop['goods']['3']['id']); ?>" class="gwc4"><i class="am-icon-cart-plus am-icon-md  seprate"></i></a> -->
							</div>
							<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][3]['id']); ?>&pid=<?php echo ($shop['goods'][3]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['3']['picname']); ?>" style="width:160px;height:160px;"/></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three ">
							<div class="outer-con ">
								<div class="title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['5']['goods']); ?>">
									<?php echo ($shop['goods']['5']['goods']); ?>
								</div>
								<div class="sub-title ">
									原价:<span style="font-size:12px;color:#ccc;text-decoration:line-through;">￥<?php echo ($shop['goods']['5']['price']); ?></span>
									促销价:<span style="font-size:12px;color:red;">￥<?php echo ($shop['goods']['5']['cprice']); ?></span>
								</div>
								<!-- <a href="javascript:void(0)" name="<?php echo ($shop['goods']['5']['typeid']); ?>" title="<?php echo ($shop['goods']['5']['id']); ?>" class="gwc5"><i class="am-icon-cart-plus am-icon-md  seprate"></i></a> -->
							</div>
							<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][5]['id']); ?>&pid=<?php echo ($shop['goods'][5]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['5']['picname']); ?>" style="width:160px;height:160px;"/></a>
						</div>

						<div class="am-u-sm-3 am-u-md-2 text-three last big ">
							<div class="outer-con ">
								<div class="title " style="width:170px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;" title="<?php echo ($shop['goods']['4']['goods']); ?>">
									<?php echo ($shop['goods']['4']['goods']); ?>
								</div>
								<div class="sub-title ">
									原价:<span style="font-size:12px;color:#ccc;text-decoration:line-through;">￥<?php echo ($shop['goods']['4']['price']); ?></span>
									促销价:<span style="font-size:12px;color:red;">￥<?php echo ($shop['goods']['4']['cprice']); ?></span>
								</div>
								<!-- <a href="javascript:void(0)" name="<?php echo ($shop['goods']['4']['typeid']); ?>" title="<?php echo ($shop['goods']['4']['id']); ?>" class="gwc6"><i class="am-icon-cart-plus am-icon-md  seprate"></i></a> -->
							</div>
							<a href="/test/index.php/Home/Introduct/index?id=<?php echo ($shop['goods'][4]['id']); ?>&pid=<?php echo ($shop['goods'][4]['typeid']); ?>"><img src="/test<?php echo ($shop['goods']['4']['picname']); ?>" style="width:160px;height:160px;"/></a>
						</div>

					</div>
                 <div class="clear "></div>  
                 </div><?php endforeach; endif; else: echo "" ;endif; ?>
  				
   				
   				
					
			<!DOCTYPE html>
<html>
  
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="Shortcut Icon" href="/test/Public/Homes/images/icon.jpg" type="image/x-icon">
    <link media="all" href="/test/Public/Homes/css/index.css" type="text/css" rel="stylesheet"></head>
  
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
                  <img class="mgj_footer_helper_quoer_code" src="/test/Public/Homes/footer/upload_07dhaga6788g05g91890jjd7a4cc3_280x280.png"></li>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">美丽说</div>
                  <img class="mgj_footer_helper_quoer_code" src="/test/Public/Homes/footer/upload_5ii9f90fdide17hj3jkj3bfd121e3_280x280.png"></li>
                <li class="mgj_footer_helper_item mgj_footer_helper_item_last">
                  <div class="color_999">uni引力</div>
                  <img class="mgj_footer_helper_quoer_code" src="/test/Public/Homes/footer/upload_892b80cj47j51h95f44cai2e0b002_280x280.png"></li>
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
                <div class="avatar_imgbox " style="margin-left:30%;"><?php if($_SESSION['pic2']== null): ?><img src="/test/Public/Homes/images/no-img_mid_.jpg " /><?php else: ?><img class="am-circle am-img-thumbnail" src="<?php echo (session('pic2')); ?>" alt="" /><?php endif; ?></div>
              </div>
              <div class="login_btnbox ">
                <a href="/test/index.php/Home/Personal/index" class="login_order" style="margin-left:30%;">个人中心</a>
              </div>
            </div>
            <?php else: ?><div class="ibar_login_box status_login ">
              <div class="avatar_box ">
                <p class="avatar_imgbox "><?php if($_SESSION['pic2']== null): ?><img src="/test/Public/Homes/images/no-img_mid_.jpg " /><?php else: ?>
                <img class="am-circle am-img-thumbnail" src="/test<?php echo (session('pic2')); ?>" alt="" /><?php endif; ?></p>
                <ul class="user_info ">
                  <li>欢迎<?php echo (session('username2')); ?>回来</li>
                </ul>
              </div>
              <div class="login_btnbox ">
                <a href="/test/index.php/Home/Personal/order" class="login_order ">我的订单</a>
                <a href="/test/index.php/Home/Personal/collection" class="login_favorite ">我的收藏</a>
              </div>
              <i class="icon_arrow_white "></i>
            </div><?php endif; ?>
          </div>
          
          <!-- <div id="shopCart " class="item ">

            <a href="#">
              <span class="message "></span>
            </a>
            <a href="/test/index.php/Home/Bycar/index">
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
            <a href="/test/index.php/Home/Personal/collection">
              <span class="wdsc "><img src="/test/Public/Homes/images/wdsc.png " /></span>
            </a>
            <div class="mp_tooltip ">
              我的收藏
              <i class="icon_arrow_right_black "></i>
            </div>
          </div>

          <!-- <div id="broadcast " class="item ">
            <a href="# ">
              <span class="chongzhi "><img src="/test/Public/Homes/images/chongzhi.png " /></span>
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
              <div class="mp_qrcode " style="display:none; "><img src="/test/Public/Homes/images/fukuan.png" /><i class="icon_arrow_white "></i></div>
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
    <script type="text/javascript " src="/test/Public/Homes/basic/js/quick_links.js "></script>
    <!-- 添加ga统计信息 --></body>

</html>
		
	</body>
	<script type="text/javascript">
		// alert($);
		// $(".gwc1").click(function(){
		// 	// alert($);
		// 	$(this).attr('name');
		// })
	</script>
</html>