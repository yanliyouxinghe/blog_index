<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>产品详情页</title>
	 <link rel="icon" href="assets//static/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-zoom.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/widget-cartPanelView.css" />
</head>

<body>
	<!-- 头部栏位 -->
	<!--页面顶部-->
<div id="nav-bottom">
	<!--顶部-->
	<div class="nav-top">
		<!-- 头部 -->
	@include('layout.top')

		<!--头部-->
		<div class="header">
			<div class="py-container">
				<div class="yui3-g Logo">
					<div class="yui3-u Left logoArea">
						<a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
					</div>
					<div class="yui3-u Center searchArea">
						<div class="search">
							<form action="" class="sui-form form-inline">
								<!--searchAutoComplete-->
								<div class="input-append">
									<input type="text" id="autocomplete" type="text" class="input-error input-xxlarge" />
									<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
								</div>
							</form>
						</div>
						<div class="hotwords">
							<ul>
								<li class="f-item">品优购首发</li>
								<li class="f-item">亿元优惠</li>
								<li class="f-item">9.9元团购</li>
								<li class="f-item">每满99减30</li>
								<li class="f-item">亿元优惠</li>
								<li class="f-item">9.9元团购</li>
								<li class="f-item">办公用品</li>

							</ul>
						</div>
					</div>
					<div class="yui3-u Right shopArea">
						<div class="fr shopcar">
							<div class="show-shopcar" id="shopcar">
								<span class="car"></span>
								<a class="sui-btn btn-default btn-xlarge" href="cart.html" target="_blank">
									<span>我的购物车</span>
									<i class="shopnum">0</i>
								</a>
								<div class="clearfix shopcarlist" id="shopcarlist" style="display:none">
									<p>"啊哦，你的购物车还没有商品哦！"</p>
									<p>"啊哦，你的购物车还没有商品哦！"</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="yui3-g NavList">
					<div class="yui3-u Left all-sort">
						<h4>全部商品分类</h4>
					</div>
					<div class="yui3-u Center navArea">
						<ul class="nav">
							<li class="f-item">服装城</li>
							<li class="f-item">美妆馆</li>
							<li class="f-item">品优超市</li>
							<li class="f-item">全球购</li>
							<li class="f-item">闪购</li>
							<li class="f-item">团购</li>
							<li class="f-item">有趣</li>
							<li class="f-item"><a href="seckill-index.html" target="_blank">秒杀</a></li>
						</ul>
					</div>
					<div class="yui3-u Right"></div>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="py-container">
		<div id="item">
			<div class="crumb-wrap">
				<ul class="sui-breadcrumb">
					<li>
						<a href="#">手机、数码、通讯</a>
					</li>
					<li>
						<a href="#">手机</a>
					</li>
					<li>
						<a href="#">Apple苹果</a>
					</li>
					<li class="active">iphone 6S系类</li>
				</ul>
			</div>
			<!--product-info-->
			<div class="product-info">
				<div class="fl preview-wrap">
					<!--放大镜效果-->
					<div class="zoom">
						<!--默认第一个预览-->
						<div id="preview" class="spec-preview">
                            @foreach($goods as $k=>$v)
                            <span class="jqzoom"><img jqimg="{{env('APP_URL').$v->goods_img}}" src="{{env('APP_URL').$v->goods_img}}" width="405px" /></span>
                            @endforeach
						</div>
						<!--下方的缩略图-->
						<div class="spec-scroll">
							<a class="prev">&lt;</a>
							<!--左右按钮-->
							<div class="items">
								<ul>
                                @foreach($gallery as $k=>$v)
                                    <li><img src="{{env('APP_URL').$v->img_url}}" bimg="{{env('APP_URL').$v->img_url}}" onmousemove="preview(this)" /></li>
                                @endforeach 
								</ul>
							</div>
							<a class="next">&gt;</a>
						</div>
					</div>
                </div>
                @foreach($goods as $k=>$v)
				<div class="fr itemInfo-wrap">
					<div class="sku-name">
						<h4>{{$v->goods_name}}</h4>
						<input type="hidden" class="goods_id" value="{{$v->goods_id}}">
					</div>
					<div class="news"><span>{{$v->goods_brief}}</span></div>
					<div class="summary">
						<div class="summary-wrap">
							<div class="fl title">
								<i>价　　格</i>
							</div>
							<div class="fl price">
								<i>¥</i>
								<em id="price">{{$v->shop_price}}</em>
								<span>降价通知</span>
							</div>
							<div class="fr remark">
								<i>累计评价</i><em>612188</em>
							</div>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<i>促　　销</i>
							</div>
							<div class="fl fix-width">
								<i class="red-bg">加价购</i>
								<em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换
购热销商品</em>
							</div>
						</div>
					</div>
					<div class="support">
						<div class="summary-wrap">
							<div class="fl title">
								<i>支　　持</i>
							</div>
							<div class="fl fix-width">
								<em class="t-gray">以旧换新，闲置手机回收  4G套餐超值抢  礼品购</em>
							</div>
						</div>
						<div class="summary-wrap">
							<div class="fl title">
								<i>配 送 至</i>
							</div>
							<div class="fl fix-width">
								<em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换购热销商品</em>
							</div>
						</div>
					</div>
					<div class="clearfix choose">
						<div id="specification" class="summary-wrap clearfix">
                        @if($guige)
                        @foreach($guige as $v)
                        <dl>
								<dt>
									<div class="fl title">
                                    <i>{{$v['attr_name']}}</i>
								</div>
                                </dt>
								@php $i=0; @endphp
                                @foreach($v['attr_value'] as $k=>$v)
								<dd><a href="javascript:;" @if($i==0) class="selected" @endif goods_attr_id="{{$k}}">{{$v}}<span title="点击取消选择">&nbsp;</span></a></dd>
								@php $i++; @endphp
                                @endforeach
                            </dl>
                        @endforeach
                        @endif
						</div>
		
						<div class="summary-wrap">
							<div class="fl title">
								<div class="control-group">
									<div class="controls">
										<input autocomplete="off" type="text" value="1" minnum="1" class="itxt" />
										<!-- <input type="hidden" name="num" value=""> -->
										<input type="hidden" name="goods_number" value="" class="goods_number">
										<a href="javascript:void(0)" class="increment plus">+</a>
										<a href="javascript:void(0)" class="increment mins">-</a>
									</div>
								</div>
							</div>
							<div class="fl">
								<ul class="btn-choose unstyled">
									<li>
										<a href="javascript:void(0)" target="_blank"  class="sui-btn cat btn-danger addshopcar">加入购物车</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
                </div>
                @endforeach
			</div>
			<!--product-detail-->
			<div class="clearfix product-detail">
				<div class="fl aside">
					<ul class="sui-nav nav-tabs tab-wraped">
						<li class="active">
							<a href="#index" data-toggle="tab">
								<span>相关分类</span>
							</a>
						</li>
						<li>
							<a href="#profile" data-toggle="tab">
								<span>推荐品牌</span>
							</a>
						</li>
					</ul>
					<div class="tab-content tab-wraped">
						<div id="index" class="tab-pane active">
							<ul class="part-list unstyled">
								<li>手机</li>
								<li>手机壳</li>
								<li>内存卡</li>
								<li>Iphone配件</li>
								<li>贴膜</li>
								<li>手机耳机</li>
								<li>移动电源</li>
								<li>平板电脑</li>
							</ul>
							<ul class="goods-list unstyled">
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/static/img/_/part01.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/static/img/_/part02.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/static/img/_/part03.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/static/img/_/part02.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
									<div class="list-wrap">
										<div class="p-img">
											<img src="/static/img/_/part03.png" />
										</div>
										<div class="attr">
											<em>Apple苹果iPhone 6s (A1699)</em>
										</div>
										<div class="price">
											<strong>
											<em>¥</em>
											<i>6088.00</i>
										</strong>
										</div>
										<div class="operate">
											<a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div id="profile" class="tab-pane">
							<p>推荐品牌</p>
						</div>
					</div>
				</div>
				<div class="fr detail">
					<div class="clearfix fitting">
						<h4 class="kt">选择搭配</h4>
						<div class="good-suits">
							<div class="fl master">
								<div class="list-wrap">
									<div class="p-img">
										<img src="/static/img/_/l-m01.png" />
									</div>
									<em>￥5299</em>
									<i>+</i>
								</div>
							</div>
							<div class="fl suits">
								<ul class="suit-list">
									<li class="">
										<div id="">
											<img src="/static/img/_/dp01.png" />
										</div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>39</span>
  </label>
									</li>
									<li class="">
										<div id=""><img src="/static/img/_/dp02.png" /> </div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>50</span>
  </label>
									</li>
									<li class="">
										<div id=""><img src="/static/img/_/dp03.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>59</span>
  </label>
									</li>
									<li class="">
										<div id=""><img src="/static/img/_/dp04.png" /></div>
										<i>Feless费勒斯VR</i>
										<label data-toggle="checkbox" class="checkbox-pretty">
    <input type="checkbox"><span>99</span>
  </label>
									</li>
								</ul>
							</div>
							<div class="fr result">
								<div class="num">已选购0件商品</div>
								<div class="price-tit"><strong>套餐价</strong></div>
								<div class="price">￥5299</div>
								<button class="sui-btn  btn-danger addshopcar">加入购物车</button>
							</div>
						</div>
					</div>
					<div class="tab-main intro">
						<ul class="sui-nav nav-tabs tab-wraped">
							<li class="active">
								<a href="#one" data-toggle="tab">
									<span>商品介绍</span>
								</a>
							</li>
							<li>
								<a href="#two" data-toggle="tab">
									<span>规格与包装</span>
								</a>
							</li>
							<li>
								<a href="#three" data-toggle="tab">
									<span>售后保障</span>
								</a>
							</li>
							<li>
								<a href="#four" data-toggle="tab">
									<span>商品评价</span>
								</a>
							</li>
							<li>
								<a href="#five" data-toggle="tab">
									<span>手机社区</span>
								</a>
							</li>
						</ul>
						<div class="clearfix"></div>
						<div class="tab-content tab-wraped">
							<div id="one" class="tab-pane active">
								<ul class="goods-intro unstyled">
                                    @foreach($attr as $k=>$v)
									<li>{{$v->attr_name}}：{{$v->attr_value}}</li>
                                    @endforeach
								</ul>
								<div class="intro-detail">
									{!!$jianjie->goods_desc!!}
								</div>
							</div>
							<div id="two" class="tab-pane">
								<p>规格与包装</p>
							</div>
							<div id="three" class="tab-pane">
								<p>售后保障</p>
							</div>
							<div id="four" class="tab-pane">
								<p>商品评价</p>
							</div>
							<div id="five" class="tab-pane">
								<p>手机社区</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--like-->
			<div class="clearfix"></div>
			<div class="like">
				<h4 class="kt">猜你喜欢</h4>
				<div class="like-list">
					<ul class="yui3-g">
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/img/_/itemlike01.png" />
								</div>
								<div class="attr">
									<em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>3699.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有6人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/img/_/itemlike02.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4388.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/img/_/itemlike03.png" />
								</div>
								<div class="attr">
									<em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/img/_/itemlike04.png" />
								</div>
								<div class="attr">
									<em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/img/_/itemlike05.png" />
								</div>
								<div class="attr">
									<em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-6">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/static/img/_/itemlike06.png" />
								</div>
								<div class="attr">
									<em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4088.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
	@include('layout.footer')

<!--页面底部END-->
	
	<!--侧栏面板开始-->
<div class="J-global-toolbar">
	<div class="toolbar-wrap J-wrap">
		<div class="toolbar">
			<div class="toolbar-panels J-panel">

				<!-- 购物车 -->
				<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="" class="title"><i></i><em class="title">购物车</em></a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');" ></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div id="J-cart-tips" class="tbar-tipbox hide">
								<div class="tip-inner">
									<span class="tip-text">还没有登录，登录后商品将被保存</span>
									<a href="#none" class="tip-btn J-login">登录</a>
								</div>
							</div>
							<div id="J-cart-render">
								<!-- 列表 -->
								<div id="cart-list" class="tbar-cart-list">
								</div>
							</div>
						</div>
					</div>
					<!-- 小计 -->
					<div id="cart-footer" class="tbar-panel-footer J-panel-footer">
						<div class="tbar-checkout">
							<div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>
							<div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>
							<a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>
						</div>
					</div>
				</div>

				<!-- 我的关注 -->
				<div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div class="tbar-tipbox2">
								<div class="tip-inner"> <i class="i-loading"></i> </div>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer J-panel-footer"></div>
				</div>

				<!-- 我的足迹 -->
				<div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
					<h3 class="tbar-panel-header J-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
						<span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content J-panel-content">
							<div class="jt-history-wrap">
								<ul>
									<!--<li class="jth-item">
										<a href="#" class="img-wrap"> <img src=".portal//static/img/like_03.png" height="100" width="100" /> </a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>
									<li class="jth-item">
										<a href="#" class="img-wrap"> <img src="portal//static/img/like_02.png" height="100" width="100" /></a>
										<a class="add-cart-button" href="#" target="_blank">加入购物车</a>
										<a href="#" target="_blank" class="price">￥498.00</a>
									</li>-->
								</ul>
								<a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer J-panel-footer"></div>
				</div>

			</div>

			<div class="toolbar-header"></div>

			<!-- 侧栏按钮 -->
			<div class="toolbar-tabs J-tab">
				<div onclick="cartPanelView.tabItemClick('cart')" class="toolbar-tab tbar-tab-cart" data="购物车" tag="cart" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count " id="tab-sub-cart-count">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的关注" tag="follow" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
				<div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history" >
					<i class="tab-ico"></i>
					<em class="tab-text"></em>
					<span class="tab-sub J-count hide">0</span>
				</div>
			</div>

			<div class="toolbar-footer">
				<div class="toolbar-tab tbar-tab-top" > <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
				<div class="toolbar-tab tbar-tab-feedback" > <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
			</div>

			<div class="toolbar-mini"></div>

		</div>

		<div id="J-toolbar-load-hook"></div>

	</div>
</div>
<!--购物车单元格 模板-->
<script type="text/template" id="tbar-cart-item-template">
	<div class="tbar-cart-item" >
		<div class="jtc-item-promo">
			<em class="promo-tag promo-mz">满赠<i class="arrow"></i></em>
			<div class="promo-text">已购满600元，您可领赠品</div>
		</div>
		<div class="jtc-item-goods">
			<span class="p-img"><a href="#" target="_blank"><img src="{2}" alt="{1}" height="50" width="50" /></a></span>
			<div class="p-name">
				<a href="#">{1}</a>
			</div>
			<div class="p-price"><strong>¥{3}</strong>×{4} </div>
			<a href="#none" class="p-del J-del">删除</a>
		</div>
	</div>
</script>
<!--侧栏面板结束-->
	

<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
	$('.plus').click(function(){
	  var goods_number = $('.goods_number').val();
	  var buy_num = parseInt($('.itxt').val());
	  $('.itxt').val('');
	  if(buy_num+1 > goods_number){
	  	alert('存库不足了');
	  	$('.itxt').val(goods_number);
	  }else{
	  $('.itxt').val(buy_num+1);
	  }
	});

	$('.mins').click(function(){
	  var goods_number = $('.goods_number').val();
	  var buy_num = parseInt($('.itxt').val());
	  if(buy_num<=1){
	  	alert('不能再少了哦');
	  	$('.itxt').val('1');
	  }else{
	  	$('.itxt').val(buy_num-1);
	  }
	});

	$('.itxt').blur(function(){
	  var goods_number = $('.goods_number').val();
	  var buy_num = parseInt($('.itxt').val());
	  if(buy_num){
	  		$('.itxt').val(buy_num)
	  }else{
	  	alert('请输入具体要购买的数量');
	  	$('.itxt').val(1)
	  }
	  if(buy_num>goods_number){
	  	alert('存库不足');
		$('.itxt').val(goods_number)
	  }
	});

		$('.cat').click(function(){
			var goods_id = $('.goods_id').val();
			var goods_attr_id = new Array();
			$('.selected').each(function(i,k){
				goods_attr_id.push($(this).attr('goods_attr_id'));
			});
			var buy_num = $('.itxt').val();
			// alert(buy_num);
			$.post('/cart',{'goods_id':goods_id,'goods_attr_id':goods_attr_id,'buy_number':buy_num},function(res){
					if(res.code==1){
						alert(res.mag);
						location.href="/login?refer="+location.href;
					}else if(res.code==0){
						alert('加入购物车成功');
						location.href='/cartlist';
					}else{
						alert(res.mag);
					}

			},'json');


		});


$(function(){
	goodsnum();

	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

	$('dd a').click(function(){
		$(this).parent().siblings().find('a').removeClass('selected');
		$(this).addClass('selected');
		getEndprice();
		goodsnum();
	});

	getEndprice();
	function getEndprice(){
		var goods_attr_id = new Array();
		$('.selected').each(function(i){
			goods_attr_id.push($(this).attr('goods_attr_id'));
		});
		if(goods_attr_id.length > 0){
			var goods_id = $('.goods_id').val();
			$.get('/getattrprice',{'goods_attr_id':goods_attr_id,'goods_id':goods_id},function(res){
					$('#price').html(res.data);
			},'json');
		}else{
			return false;
		}
	}
});


	function goodsnum(){
		var goods_attr_id = new Array();
		var goods_id = $('.goods_id').val();
		$('.selected').each(function(i){
			goods_attr_id.push($(this).attr('goods_attr_id'));

		});
		if(!goods_id){
			return false;
		}
		if(goods_attr_id.length){
			$.post('/getgoodsattrnum',{'goods_attr_id':goods_attr_id},function(res){
					if(res.code=='0'){
						$('.goods_number').val('');
						$('.goods_number').val(res.data);
					}else{
						$('.goods_number').val('');
						$('.goods_number').val(res.data);
					}
		},'json');
		}else{
				$.post('/getgoodsnum',{'goods_id':goods_id},function(res){
					if(res.code=='0'){
						$('.goods_number').val('');
						$('.goods_number').val(res.data['goods_number']);
					}else{
						$('.goods_number').val('');
						$('.goods_number').val(res.data['goods_number']);
					}
		},'json');
		}
		
	}

</script>
<script type="text/javascript" src="/static/js/model/cartModel.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.jqzoom/zoom.js"></script>
<!-- <script type="text/javascript" src="index/index.js"></script> -->
</body>

</html>