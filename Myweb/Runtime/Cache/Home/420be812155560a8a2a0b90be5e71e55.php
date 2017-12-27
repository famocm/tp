<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" /> 
  <title>地址管理</title> 
  <link href="/Public/Homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/Public/Homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/Public/Homes/css/personal.css" rel="stylesheet" type="text/css" /> 
  <link href="/Public/Homes/css/addstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/Public/Homes/js/jquery-1.8.3.min.js"></script> 
  <link rel="Shortcut Icon" href="/Public/Homes/images/icon.jpg" type="image/x-icon" /> 
  <link href="/Public/Homes/css1/index_002.css" rel="stylesheet" type="text/css" /> 
  <link media="all" href="/Public/Homes/css/index.css" type="text/css" rel="stylesheet" /> 
 </head> 
 <body> 
  <!--头 --> 
  		<header>
			<article>
				<div class="mt-logo">	
			<div id="header" class="J_sitenav site-top-nav" data-ptp="_head">
			   <div class="wrap"> 
			    <a href="/index.php/Home/Index/index" rel="nofollow" class="home fl">时尚街首页</a> 
			    <ul class="header-top"> 
			     <li class="s1 show-nologin"> <?php if($_SESSION['username2']== null): ?><a rel="nofollow" href="/index.php/Home/Register/index">注册</a><?php else: ?><a rel="nofollow" href="">欢迎<?php echo (session('username2')); ?>回来</a><?php endif; ?> 
					
			     </li> 
			     <li class="s1 show-nologin"> <?php if($_SESSION['username2']== null): ?><a rel="nofollow" href="/index.php/Home/Login/login">登录</a><?php else: ?><a rel="nofollow" href="/index.php/Home/Login/loginout">退出</a><?php endif; ?> 
					
			     </li> 
			     
			     <li class="s1 myorder has-line"> <a href="/index.php/home/Personal/order"  class="text display_u" rel="nofollow">我的订单</a> </li> 
			     <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/index.php/home/Bycar/index" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span><b id="carnum"><?php if($_SESSION['username2']== '' ): else: echo (session('shopnum')); endif; ?></b> </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> 
			      </li> 
			     <li class="s1 has-line has-icon custom-item"> <a rel="nofollow" href="/index.php/home/Personal/index" target="_blank">个人中心</a>
			      </li>  
			    </ul>
			   </div>
			  </div> 

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logoBig">
						<li><a href="/index.php/Home/Index/index"><img src="/Public/Homes/images/fin.jpg" /></a></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<form action="/index.php/home/Search/index3" method="get">
							<input id="searchInput" name="goods" type="text" value="<?php echo ($_GET['goods']); ?>" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>
					<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
		<div class="nav-table">
					   <div class="long-title"><span><a href="/index.php/home/Index/index" class="all-goods">首页</a></span></div>
					   <div class="nav-cont">
							<ul>
                                <li class="qc"><a>省钱团购</a></li>
                                <li class="qc"><a>品质优选</a></li>
							</ul>
						    
						</div>
			</div>
			<b class="line"></b> 
  <div class="center"> 
   <div class="col-main"> 
    <div class="main-wrap"> 
     <div class="user-address"> 
      <!--标题 --> 
      <div class="am-cf am-padding"> 
       <div class="am-fl am-cf">
        <strong class="am-text-danger am-text-lg">地址管理</strong>
       </div> 
      </div> 
      <div ></div>
      <hr /> 
      <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
              <?php if(is_array($address)): foreach($address as $key=>$row): ?><li class="user-addresslist defaultAddr" id='did' uid="<?php echo ($row['id']); ?>">
                <p class="new-tit new-p-re">
                  <span class="new-txt"><?php echo ($row['name']); ?></span>
                  <span class="new-txt-rd2"><?php echo ($row['phone']); ?></span>
                </p>
                <div class="new-mu_l2a new-p-re">
                  <p class="new-mu_l2cw">
                    <span class="title">地址：<?php echo ($row['address']); ?></span>
                    <span class="province"><?php echo ($row['street']); ?></span>
                  </p>
                </div>
                <div class="new-addr-btn">
                  <a href="/index.php/home/Personal/edit?id=<?php echo ($row['id']); ?>"><i class="am-icon-edit"></i>编辑</a>
                  <span class="new-addr-bar">|</span>
                  <a href="/index.php/home/Personal/delete?id=<?php echo ($row['id']); ?>"><i class="am-icon-trash"></i>删除</a>
                </div>
              </li><?php endforeach; endif; ?>
            </ul>
      <button style="width: 120px;height: 35px;margin-left: 20px">+添加新地址</button> 
      <!--例子--> 
      <div class="am-modal am-modal-no-btn" style="background-color: red"  id="doc-modal-1"> 
       <div class="add-dress"> 
        <hr /> 
        <div class="am-u-md-12 am-u-lg-8"  style="margin-top: 20px;display: none"> 
         <form action="/index.php/home/Personal/insert" method="post" class="am-form am-form-horizontal"> 
          <div class="am-form-group"> 
           <label for="user-name" class="am-form-label">收货人</label> 
           <div class="am-form-content"> 
            <input type="text" name="name"  placeholder="收货人" /><span></span>
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-phone"  class="am-form-label">手机号码</label> 
           <div class="am-form-content"> 
            <input name="phone"  placeholder="手机号必填" type="text" /><span></span> 
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-phone"  class="am-form-label">邮编</label> 
           <div class="am-form-content"> 
            <input id="user-phone" name="code"  type="text" /> <span></span>
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-address"  class="am-form-label">所在地</label> 
           <div class="am-form-content address"> 
            <select  id="cid" style="width: 100px">
               <option  value="">--请选择--</option> 
            </select> 
            
           </div> 
          </div> 
          <div class="am-form-group"> 
           <label for="user-intro" class="am-form-label">详细地址</label> 
           <div class="am-form-content"> 
            <textarea class="" name="street" rows="3" id="user-intro" placeholder="输入详细地址"></textarea> 
            <small>100字以内写出你的详细地址...</small> 
           </div> 
          </div> 
          <input type="hidden" name="address" value="">
          <div class="am-form-group"> 
           <div class="am-u-sm-9 am-u-sm-push-3" > 
            <input type="submit" id="ss" value="添加" style="width: 100px;height: 35px"> 
           </div> 
          </div> 
         </form> 
        </div> 
       </div> 
      </div> 
     </div> 
     <script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})

						$("button").click(function(){
							// alert('ss');
							$(".am-u-md-12").css("display",'block');
						})
          
          $.ajax({
              'url':'/index.php/home/Personal/addresss',
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
                'url':'/index.php/home/Personal/addresss',
                'type':'get',
                'data':{upid:id},
                'dataType':'json',
                success:
                function(data){
                  //创建select
                  select=$("<select style='width:100px'></select>");
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

            //阻止表单提交
            CNAME=false;
            CPHONE=false;
            CCODE=false;
            $("form").submit(function(){
              if(CNAME&&CPHONE&&CCODE){
                return true;
              }else{
                return false;
              }
            })
            //判断用户名
            $("input[name='name']").blur(function(){
              var name=$(this).val();
              if(name==''){
                $(this).next().html('请填写收货人').css('color','#FA97BE');
                CNAME=false;
              }else{
                $(this).next().empty();
                CNAME=true;
              }
            })
            //判断手机号码
            $("input[name='phone']").blur(function(){
              // alert('ss');
              var phone=$(this).val();
              if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))){
                $(this).next().html('请输入正确的手机号码').css('color','#FA97BE');
                CPHONE=false;
              }else{
                $(this).next().empty();
                CPHONE=true;
              }
            })
            
            //判断邮编
            $("input[name='code']").blur(function(){
              var code=$(this).val();
              if(!(/^[1-9][0-9]{5}$/.test(code))){
                $(this).next().html('请输入正确的邮编').css('color','#FA97BE');
                CCODE=false;
              }else{
                $(this).next().empty();
                CCODE=true;
              }
            })

            //获取城市级联地址信息
            $("#ss").click(function(){
              // alert('ss');
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
            
            var tel=$(".new-txt-rd2").html();
            var mtel = tel.substr(0, 3) + '****' + tel.substr(7);
            $(".new-txt-rd2").html(mtel);
            // alert(tel);
					</script> 
     <div class="clear"></div> 
    </div> 
    <!--底部--> 
    
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
   </div> 
   <aside class="menu"> 
    				<ul>
					<li class="person active">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a>个人资料</a>
						<ul>
							<li> <a href="/index.php/home/Personal/information">个人信息</a></li>
							<li> <a href="/index.php/home/Personal/safety">安全设置</a></li>
							<li> <a href="/index.php/home/Personal/address">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="/index.php/home/Personal/order">订单管理</a></li>
							<!-- <li> <a href="change.html">退款售后</a></li> -->
						</ul>
					</li>
					<!-- <li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li> -->

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="/index.php/home/Personal/comment">评价</a></li>
							<!-- <li> <a href="news.html">消息</a></li> -->
						</ul>
					</li>

				</ul> 
   </aside> 
  </div>  
 </body>
</html>