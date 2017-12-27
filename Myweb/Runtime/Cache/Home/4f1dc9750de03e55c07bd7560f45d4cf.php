<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>商品页面</title> 
  <link href="/test/Public/Homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/test/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/test/Public/Homes/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link type="text/css" href="/test/Public/Homes/css/optstyle.css" rel="stylesheet" /> 
  <link type="text/css" href="/test/Public/Homes/css/style.css" rel="stylesheet" /> 
  <link href="/test/Public/Homes/css1/index_002.css" rel="stylesheet" type="text/css" />
    <link rel="Shortcut Icon" href="/test/Public/Homes/images/icon.jpg" type="image/x-icon">
  <script type="text/javascript" src="/test/Public/Homes/basic/js/jquery-1.7.min.js"></script> 
  <script type="text/javascript" src="/test/Public/Homes/basic/js/quick_links.js"></script> 
  <script type="text/javascript" src="/test/Public/Homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script> 
  <script type="text/javascript" src="/test/Public/Homes/js/jquery.imagezoom.min.js"></script> 
  <script type="text/javascript" src="/test/Public/Homes/js/jquery.flexslider.js"></script> 
  <script type="text/javascript" src="/test/Public/Homes/js/list.js"></script> 
  <!-- <script type="text/javascript" src="/test/Public/Homes/js/jquery-1.8.3.min.js"></script> -->
  <link media="all" href="/test/Public/Homes/css/index.css" type="text/css" rel="stylesheet">
 </head> 
 <body> 
  
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
			 
  <b class="line"></b> 
  <div class="listMain"> 
   <!--分类--> 
   <div class="nav-table"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <li class="index"><a href="#">省钱团购</a></li> 
      <li class="qc"><a href="#">品质优选</a></li> 
     </ul> 
    </div> 
   </div> 
   <ol class="am-breadcrumb am-breadcrumb-slash"> 
     
   </ol> 
   <script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script> 
   <div class="scoll" > 
    <section class="slider"> 
     <div class="flexslider"> 
      <ul class="slides"> 
       <li> <img src="/test/Public/Homes/images/01.jpg" title="pic" /> </li> 
       <li> <img src="/test/Public/Homes/images/02.jpg" /> </li> 
       <li> <img src="/test/Public/Homes/images/03.jpg" /> </li> 
      </ul> 
     </div> 
    </section> 
   </div> 
   <!--放大镜-->
   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><div class="item-inform" style="margin-bottom: 50px"> 
    <div class="clearfixLeft" id="clearcontent"> 
     <div class="box"> 
      <script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script> 
      <div class="tb-booth tb-pic tb-s310"> 
       <a href="/test/Public/Homes/images/01.jpg"><img src="/test<?php echo ($row['picname']); ?>" alt="细节展示放大镜特效" rel="/test<?php echo ($row['picname']); ?>" class="jqzoom" /></a> 
      </div> 
      <ul class="tb-thumb" id="thumblist" style="margin-left: 100px"> 
       <li class="tb-selected"> 
        <div class="tb-pic tb-s40"> 
         <a href="#"><img src="/test<?php echo ($row['picname']); ?>" mid="/test<?php echo ($row['picname']); ?>" big="/test<?php echo ($row['picname']); ?>" /></a> 
        </div> </li> 
       <li> 
        <div class="tb-pic tb-s40"> 
         <a href="#"><img src="/test<?php echo ($row['picname']); ?>" mid="/test<?php echo ($row['picname']); ?>" big="/test<?php echo ($row['picname']); ?>" /></a> 
        </div> </li> 
       <li> 
        <div class="tb-pic tb-s40"> 
         <a href="#"><img src="/test<?php echo ($row['picname']); ?>" mid="/test<?php echo ($row['picname']); ?>" big="/test<?php echo ($row['picname']); ?>" /></a> 
        </div> </li> 
      </ul> 
     </div> 
     <div class="clear"></div> 
    </div> 
    <div class="clearfixRight"> 
     <!--规格属性--> 
     <!--名称--> 
     <div class="tb-detail-hd"> 
      <h1 style="font-size: 28px"> <?php echo ($row['goods']); ?> </h1> 
     </div> 
     <div class="tb-detail-list">
      <!--价格-->
      <div class="tb-detail-price"> 
       <li class="price iteminfo_price" style="margin-top: 20px"> 
        <dt>
         促销价:
        </dt> 
        <dd style="position: relative;bottom:5px">
         <em>&yen;</em>
         <b class="sys_item_price"><?php echo ($row['cprice']); ?></b> 
        </dd>
        <span style="margin-left: 340px;color:#A9A9A9">评价累计:
            <span style="color:black"><?php echo ($count); ?></span>
        </span> 
        <div style="margin-left: 590px;color:#A9A9A9;position: relative;bottom: 26px;">累计销量:
          <span style="color:black"><?php echo ($row['num']); ?></span>
        </div>
         </li> 
       <li class="price iteminfo_mktprice"> 
        <dt>
         价格
        </dt> 
        <dd>
         <em>&yen;</em>
         <b class="sys_item_mktprice"><?php echo ($row['price']); ?></b>
        </dd> </li> 
       <div class="clear"></div> 
      </div> 
      <div class="clear"></div>  
      <div class="clear"></div> 
      <!--各种规格--> 
      <dl class="iteminfo_parameter sys_item_specpara" style="margin-top: 10px"> 
       <dt class="theme-login">
        <div class="cart-title">
         可选规格
         <span class="am-icon-angle-right"></span>
        </div>
       </dt> 
       <dd> 
        <!--操作页面--> 
        <div class="theme-popover-mask"></div> 
        <div class="theme-popover"> 
         <div class="theme-span"></div> 
         <div class="theme-poptit"> 
          <a href="javascript:;" title="关闭" class="close">&times;</a> 
         </div> 
         <div class="theme-popbod dform"> 
          <form class="theme-signin" name="loginform" action="" method="post"> 
           <div class="theme-signin-left"> 
            <div class="theme-options" style="margin-bottom: 10px"> 
             <div class="cart-title">
              颜色
             </div> 
             <ul> 
              <li class="sku-line color selected"><?php echo ($row['color']); ?><i></i></li> 
             </ul> 
            </div> 
            <div class="theme-options"> 
             <div class="cart-title">
              尺码
             </div> 
             <ul> 
              <li class="sku-line size selected"><?php echo ($row['size']); ?><i></i></li> 
             </ul> 
            </div> 
            <div class="theme-options"> 
             <div class="cart-title number">
              数量
             </div> 
             <dd> 
              <input id="min" class="am-btn am-btn-default" name="" type="button" value="-" /> 
              <input style="width: 50px;height: 29px;text-align: center" id="text_box" name="<?php echo ($row['id']); ?>" type="text" value="1" /> 
              <input id="add" class="am-btn am-btn-default" name="" type="button" value="+" /> 
              <span id="Stock" class="tb-hidden">库存<span class="stock"><?php echo ($row['store']); ?></span>件</span> 
             </dd> 
            </div> 
            <div class="theme-options"> 
             <div class="cart-title">
              添加收藏
             </div> 
             <ul> 
              <a href="/test/index.php/Home/Favorite/index?id=<?php echo ($row['id']); ?>&price=<?php echo ($row['cprice']); ?>&picname=<?php echo ($row['picname']); ?>&goods=<?php echo ($row['goods']); ?>"><img src="/test/Public/Homes/image/sc.png" alt=""></a> 
             </ul> 
            </div>
            <div class="clear"></div> 
            <div class="btn-op"> 
             <div class="btn am-btn am-btn-warning">
              确认
             </div> 
             <div class="btn close am-btn am-btn-warning">
              取消
             </div> 
            </div> 
           </div> 
           <div class="theme-signin-right"> 
            <div class="img-info"> 
             <!-- <img src="../images/songzi.jpg" />  -->
            </div> 
            <div class="text-info"> 
             <span class="J_Price price-now">&yen;39.00</span> 
             <span id="Stock" class="tb-hidden">库存<span class="stock">100</span>件</span> 
            </div> 
           </div> 
          </form> 
         </div> 
        </div> 
       </dd> 
      </dl> 
      <div class="clear"></div> 
      <!--活动	--> 
      <div class="shopPromotion gold"> 
       <div class="hot"> 
        <dt class="tb-metatit">
         店铺优惠:
        </dt> 
        <div class="gold-list"> 
         <p>全年狂欢场</p> 
        </div> 
       </div>
       <div>
          <dt class="tb-metatit" style="position: relative;right: 56px;bottom: 3px">
              价格:
              <dd style="position: relative;right: 23px;top:6px">
               <em>&yen;</em>
               <b class="sys_item_mktprice"><del><?php echo ($row['price']); ?></del></b>
              </dd>
          </dt> 
       </div> 
       <div class="clear"></div> 
       <!-- <div class="coupon"> 
        <dt class="tb-metatit">
         优惠券
        </dt> 
        <div class="gold-list"> 
         <ul> 
          <li>125减5</li> 
          <li>198减10</li> 
          <li>298减20</li> 
         </ul> 
        </div> 
       </div>  -->
      </div> 
     </div> 
     <div class="pay"> 
      <div class="pay-opt"> 
       <a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a> 
       <a><span class="am-icon-heart am-icon-fw">收藏</span></a> 
      </div> 
     <!--  <li> 
       <div class="clearfix tb-btn tb-btn-buy theme-login"> 
        <a id="LikBuy" style="width: 190px;height: 50px;line-height: 45px;font-size: 20px;" title="点此按钮到下一步确认购买信息" href="javascript:void(0)">立即购买</a> 
       </div> </li>  -->
      <li> 
       <div class="clearfix tb-btn tb-btn-basket theme-login"> 
        <a id="LikBasket" style="width: 190px;height: 50px;line-height: 45px;font-size: 20px;" title="加入购物车" href="javascript:void(0)"><i></i>加入购物车</a> 
       </div> </li> 
       <script type="text/javascript">
       $("#LikBasket").click(function(){
       if($(".color").hasClass('selected')&&($(".size")).hasClass('selected')){
          return true;
       }else{
        alert('请先选择商品信息');
        return false;
       }
     })
       // $("#LikBuy").click(function(){
       //    if($(".color").hasClass('selected')&&($(".size")).hasClass('selected')){
       //        return true;
       //     }else{
       //      alert('请先选择商品信息');
       //      return false;
       //     }
       // })
       // a=$("#text_box").val();
       // // if()
       $("#LikBasket").click(function(){
        var num=$("#text_box").val();
        var id=$("#text_box").attr('name');
        // alert(id);
        if(num<=0){
          alert('请输入正确的数量');
          $(this).val('1');
        }else{
            //Ajax
            s=$(this);
            $.post('/test/index.php/Home/Introduct/checknum',{num:num,id:id},function(data){
                if(data==1){
                    $("#LikBasket").attr('href',"javascript:void(0)");
                    // $("#LikBuy").attr('href',"javascript:void(0)");
                    alert("请输入正确的数量");
                    
                }else{
                  $("#LikBasket").attr('href',"/test/index.php/Home/Bycar/add?id=<?php echo ($row['id']); ?>&num="+num);
                  // $("#LikBuy").attr('href',"/test/index.php/Home/Pay/add?id=<?php echo ($row['id']); ?>&num="+num);
                }
            })
        } 
       })
       // $("#LikBuy").click(function(){
       //  var num=$("#text_box").val();
       //  var id=$("#text_box").attr('name');
       //  // alert(id);
       //  if(num<=0){
       //    alert('请输入正确的数量');
       //    $(this).val('1');
       //  }else{
       //      //Ajax
       //      $.post('/test/index.php/Home/Introduct/checknum',{num:num,id:id},function(data){
       //          if(data==1){
       //              $("#LikBasket").attr('href',"javascript:void(0)");
       //              $("#LikBuy").attr('href',"javascript:void(0)");
       //              alert("请输入正确的数量");
                    
       //          }else{
       //            $("#LikBasket").attr('href',"/test/index.php/Home/Bycar/add?id=<?php echo ($row['id']); ?>&num="+num);
       //            $("#LikBuy").attr('href',"/test/index.php/Home/Pay/add?id=<?php echo ($row['id']); ?>&num="+num);
       //          }
       //      })
       //  } 
       // })
      </script>
     </div> 
    </div> 
    <div class="clear"></div> 
   </div><?php endforeach; endif; else: echo "" ;endif; ?>
   <!-- introduce--> 
   <div class="introduce"> 
    <div class="browse"> 
     <div class="mc"> 
      <ul> 
       <div class="mt" style="height: 40px;line-height: 40px;font-size: 18px"> 
        看了又看
       </div>
       <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li class="first"> 
        <div class="p-img" style="width: 180px;height: 260px;margin:0 auto;background-color: red"> 
         <a href="/test/index.php/Home/Introduct/index?id=<?php echo ($row['id']); ?>&pid=<?php echo ($row['typeid']); ?>"> <img class="" style="width: 100%;height: 100%" src="/test<?php echo ($row['picname']); ?>" /> </a> 
        </div> 
        <div class="p-name">
         <a href="#"> <?php echo ($row['goods']); ?> </a> 
        </div> 
        <div class="p-price">
         <strong>￥<?php echo ($row['cprice']); ?></strong>
        </div> </li><?php endforeach; endif; else: echo "" ;endif; ?> 
      </ul> 
     </div> 
    </div> 
    <div class="introduceMain"> 
     <div class="am-tabs" data-am-tabs=""> 
      <ul style="width: 940px;margin-left: 10px" class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs"> 
       <li class="am-active"> <a href="#"> <span class="index-needs-dt-txt">宝贝详情</span></a> </li> 
       <li> <a href="#"> <span class="index-needs-dt-txt">全部评价</span></a> </li> 
       <li> <a href="#"> <span class="index-needs-dt-txt">猜你喜欢</span></a> </li> 
      </ul> 
      <div class="am-tabs-bd"> 
       <div class="am-tab-panel am-fade am-in am-active"> 
        <div class="J_Brand"> 
         <div class="attr-list-hd tm-clear"> 
          <h4>产品参数：</h4>
         </div> 
         <div class="clear"></div> 
         <ul id="J_AttrUL"> 
          <li title="">袖型:&nbsp;常规型</li> 
          <li title="">尺码:&nbsp;S,M,L</li> 
          <li title="">上衣厚度:&nbsp;适中</li> 
          <li title="">材质:&nbsp;棉</li> 
          <li title="">颜色:&nbsp;白色,粉色,晴空蓝</li> 
          <li title="">元素:&nbsp;拼色/撞色,罗纹,其他</li> 
          <li title="">领型:&nbsp;圆领</li> 
          <li title="">图案：&nbsp;其他</li> 
          <li title="">季节：&nbsp;夏季 </li> 
          <li title="">袖长：&nbsp;短袖</li>
         </ul> 
         <div class="clear"></div> 
        </div> 
        <div class="details"> 
         <div class="attr-list-hd after-market-hd"> 
          <h4>商品细节</h4> 
         </div> 
         <div class="twlistNews"> 
          <img src="/test/Public/Images/77101615_6f3ak83kkl00329ged9249aa93ifb_1125x285.jpg" /> 
          <img src="/test/Public/Images/83014602_65h7kalh8cbkhjh151f9706jgh17c_750x595.jpg" /> 
          <img src="/test/Public/Images/83014602_1j5f904252kaldl185a0hlck25f03_750x1165.jpg" /> 
          <img src="/test/Public/Images/83014602_0d94c39417i233a1i26gaaa5dl0c9_750x1159.jpg" /> 
         </div> 
        </div> 
        <div class="clear"></div> 
       </div> 
       <div class="am-tab-panel am-fade"> 
        <div class="clear"></div> 
        <div class="clear"></div> 
         <?php if(is_array($shopsss)): $i = 0; $__LIST__ = $shopsss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sss): $mod = ($i % 2 );++$i;?><ul class="am-comments-list am-comments-list-flip">
        
         <li class="am-comment">

          <!-- 评论容器 -->
           <!-- <?php if($sss['pic'] == null): ?><a href="#"> <img src="/test/Public/Homes/images/no-img_mid_.jpg " class="am-comment-avatar"/></a> <?php else: ?><a href="/test/index.php/Home/Personal/index"><img class="am-comment-avatar" src="/test<?php echo ($sss['pic']); ?>" /> </a><?php endif; ?> -->
           <!-- 评论者头像 -->
          <div class="am-comment-main"> 
           <!-- 评论内容容器 --> 
           <header class="am-comment-hd"> 
            <!--<h3 class="am-comment-title">评论标题</h3>--> 
            <div class="am-comment-meta"> 
             <!-- 评论元数据 --> 
             <span class="am-comment-author" name="aa">匿名评价:*******</span> 
             <!-- 评论者 --> 评论于 
             <time datetime=""><?php echo (date("Y-m-d",$sss['addtime'])); ?></time> 
            </div> 
           </header> 
           <div class="am-comment-bd"> 
            <div class="tb-rev-item " data-id="255776406962"> 
             <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
               商品评价:<?php echo ($sss['content']); ?><p>客服回复:<?php echo ($sss['reply']); ?></p>  
             </div> 
             <div class="tb-r-act-bar">
               颜色分类：<?php echo ($sss['color']); ?>&nbsp;&nbsp;尺码：<?php echo ($sss['size']); ?> 
             </div> 
            </div> 
           </div> 
           <!-- 评论内容 --> 
          </div> </li> 
       
         
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="clear"></div> 
        <!--分页 --> 
        <!-- <ul class="am-pagination am-pagination-right"> 
         <li class="am-disabled"><a href="#">&laquo;</a></li> 
         <li class="am-active"><a href="#">1</a></li> 
         <li><a href="#">2</a></li> 
         <li><a href="#">3</a></li> 
         <li><a href="#">4</a></li> 
         <li><a href="#">5</a></li> 
         <li><a href="#">&raquo;</a></li> 
        </ul> 
        <div class="clear"></div> 
        <div class="tb-reviewsft"> 
         <div class="tb-rate-alert type-attention">
          购买前请查看该商品的 
          <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。
         </div> 
        </div>  -->
       </div> 
       <div class="am-tab-panel am-fade"> 
        <div class="like"> 
         <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
         <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li style="width: 200px;height: 330px;"> 
           <div class="i-pic limit" style="width: 180px;height: 260px;"> 
            <a href="/test/index.php/Home/Introduct/index?id=<?php echo ($row['id']); ?>&pid=<?php echo ($row['typeid']); ?>"><img src="/test<?php echo ($row['picname']); ?>" /> </a>
             <p style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis"><?php echo ($row['goods']); ?></p>
            <p class="price fl"> <b>&yen;</b> <strong><?php echo ($row['cprice']); ?></strong> </p> 
           </div></li><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div> 
   </div> 
  </div> 
  
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
 </body>
</html>