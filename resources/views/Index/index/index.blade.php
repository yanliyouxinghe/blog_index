<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>品优购，优质！优质！</title>
	 <link rel="icon" href="assets//static/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/widget-jquery.autocomplete.css" />
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


	<!--列表-->
	<div class="sort">
		<div class="py-container">
			<div class="yui3-g SortList ">
				<div class="yui3-u Left all-sort-list">
					<div class="all-sort-list2">
						@foreach($tree as $k=>$v)
						<div class="item">
							<h3><a href="{{url('/list/'.$v->cat_id)}}">{{$v->cat_name}}</a></h3>
							<div class="item-list clearfix">
								<div class="subitem">
									@foreach($v['son'] as $vv)
									<dl class="fore1">
										<dt><a href="{{url('/list/'.$vv->cat_id)}}">{{$vv->cat_name}}</a></dt>
										<dd>
											@foreach($vv['son'] as $vvv)
											<em><a href="{{url('/list/'.$vvv->cat_id)}}">{{$vvv->cat_name}}</a></em>
											@endforeach
										</dd>
									</dl>
									@endforeach
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="yui3-u Center banerArea">
					<!--banner轮播-->
					<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
					  @foreach($goods as $k=>$v)
					    <div @if($k==0) class="active item" @else class="item" @endif>
					    <a href="/particulars/{{$v->goods_id}}">
					    	<img src="{{env('APP_URL').$v->goods_img}}"  width="600px" />
					      </a>
					    </div>
						@endforeach
					  </div><a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a><a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
					</div>
				</div>
				<div class="yui3-u Right">
					<div class="news">
						<h4><em class="fl">品优购快报</em><span class="fr tip">更多 ></span></h4>
						<div class="clearix"></div>
						<ul class="news-list unstyled">
							<li>
								<span class="bold">[特惠]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[公告]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[特惠]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[公告]</span>备战开学季 全民半价购数码
							</li>
							<li>
								<span class="bold">[特惠]</span>备战开学季 全民半价购数码
							</li>
						</ul>
					</div>
					<ul class="yui3-g Lifeservice">
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-1"></i>
							<span class="service-intro">话费</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-2"></i>
							<span class="service-intro">机票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-3"></i>
							<span class="service-intro">电影票</span>
						</li>
						<li class="yui3-u-1-4 life-item tab-item">
							<i class="list-item list-item-4"></i>
							<span class="service-intro">游戏</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-5"></i>
							<span class="service-intro">彩票</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-6"></i>
							<span class="service-intro">加油站</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-7"></i>
							<span class="service-intro">酒店</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-8"></i>
							<span class="service-intro">火车票</span>
						</li>
						<li class="yui3-u-1-4 life-item  notab-item">
							<i class="list-item list-item-9"></i>
							<span class="service-intro">众筹</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-10"></i>
							<span class="service-intro">理财</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-11"></i>
							<span class="service-intro">礼品卡</span>
						</li>
						<li class="yui3-u-1-4 life-item notab-item">
							<i class="list-item list-item-12"></i>
							<span class="service-intro">白条</span>
						</li>
					</ul>
					<div class="life-item-content">
						<div class="life-detail">
							<i class="close">关闭</i>
							<p>话费充值</p>
							<form action="" class="sui-form form-horizontal">
								号码：<input type="text" id="inputphoneNumber" placeholder="输入你的号码" />
							</form>
							<button class="sui-btn btn-danger">快速充值</button>
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 机票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 电影票
						</div>
						<div class="life-detail">
							<i class="close">关闭</i> 游戏
						</div>
					</div>
					<div class="ads">
						<img src="/static/img/ad1.png" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--推荐-->
	<div class="show">
		<div class="py-container">
			<ul class="yui3-g Recommend">
				<li class="yui3-u-1-6  clock">
					<div class="time">
						<img src="/static/img/clock.png" />
						<h3>今日推荐</h3>
					</div>
				</li>
				@foreach($is_new as $v)
				<li class="yui3-u-5-24">
					<a href="/particulars/{{$v->goods_id}}" target="_blank">
						<img src="{{env('APP_URL').$v->goods_img}}" width="220px"/>
					</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!--喜欢-->
	<div class="like">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">猜你喜欢</h3>
				<b class="border"></b>
				<a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
			</div>
			<div class="bd">
				<ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
					@foreach($islove as $k=>$v)
					<li class="yui3-u-1-6">
						<dl class="picDl huozhe">
							<dd>
								<a href="/particulars/{{$v->goods_id}}" class="pic"><img src="{{env('APP_URL').$v->goods_img}}" alt="" /></a>
								<div class="like-text">
									<p>{{$v->goods_name}}</p>
									<h3>¥{{$v->shop_price}}</h3>
								</div>
							</dd>
						</dl>
					</li>
					@endforeach
			
				</ul>
			</div>
		</div>
	</div>
	<!--有趣-->
	<div class="fun">
		<div class="py-container">
			<div class="title">
				<h3 class="fl">传智播客.有趣区</h3>
			</div>
			<div class="clearfix yui3-g Interest">
				<span class="x-line"></span>
				<div class="yui3-u row-405 Interest-conver">
					@include('Index.index.ads.1');
				</div>
				<div class="yui3-u row-225 Interest-conver-split">
					<h5>好东西</h5>
					<img src="/static/img/interest02.png" />
					<img src="/static/img/interest03.png" />
				</div>
				<div class="yui3-u row-405 Interest-conver-split blockgary">
					<h5>品牌街</h5>
					<div class="split-bt">
						<img src="/static/img/interest04.png" />
					</div>
					<div class="x-img fl">
						<img src="/static/img/interest05.png" />
					</div>
					<div class="x-img fr">
						<img src="/static/img/interest06.png" />
					</div>
				</div>
				<div class="yui3-u row-165 brandArea">
					<span class="brand-yline"></span>
					<ul class="yui3-g brand-list">
						@include('Index.index.ads.7');
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--楼层-->
	<div id="floor-1" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">家用电器</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						<li class="active">
							<a href="#tab1" data-toggle="tab">热门</a>
						</li>
						<li>
							<a href="#tab2" data-toggle="tab">大家电</a>
						</li>
						<li>
							<a href="#tab3" data-toggle="tab">生活电器</a>
						</li>
						<li>
							<a href="#tab4" data-toggle="tab">厨房电器</a>
						</li>
						<li>
							<a href="#tab5" data-toggle="tab">应季电器</a>
						</li>
						<li>
							<a href="#tab6" data-toggle="tab">空气/净水</a>
						</li>
						<li>
							<a href="#tab7" data-toggle="tab">高端电器</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab1" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
								<li>节能补贴</li>
								<li>4K电视</li>
								<li>空气净化器</li>
								<li>IH电饭煲</li>
								<li>滚筒洗衣机</li>
								<li>电热水器</li>
							</ul>
							<img src="/static/img/floor-1-1.png" />
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousel" data-slide-to="1"></li>
									<li data-target="#floorCarousel" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/static/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/static/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/static/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousel" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousel" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-2.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-3.png" />
							</div>
						</div>
						<div class="yui3-u row-218 split">
							<img src="/static/img/floor-1-4.png" />
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-6.png" />
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab3" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab4" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab5" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab6" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab7" class="tab-pane">
					<p>第7个</p>
				</div>
			</div>
		</div>
	</div>
	<div id="floor-2" class="floor">
		<div class="py-container">
			<div class="title floors">
				<h3 class="fl">手机通讯</h3>
				<div class="fr">
					<ul class="sui-nav nav-tabs">
						<li class="active">
							<a href="#tab8" data-toggle="tab">热门</a>
						</li>
						<li>
							<a href="#tab9" data-toggle="tab">品质优选</a>
						</li>
						<li>
							<a href="#tab10" data-toggle="tab">新机尝鲜</a>
						</li>
						<li>
							<a href="#tab11" data-toggle="tab">高性价比</a>
						</li>
						<li>
							<a href="#tab12" data-toggle="tab">合约机</a>
						</li>
						<li>
							<a href="#tab13" data-toggle="tab">手机卡</a>
						</li>
						<li>
							<a href="#tab14" data-toggle="tab">手机配件</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="clearfix  tab-content floor-content">
				<div id="tab8" class="tab-pane active">
					<div class="yui3-g Floor-1">
						<div class="yui3-u Left blockgary">
							<ul class="jd-list">
								<li>节能补贴</li>
								<li>4K电视</li>
								<li>空气净化器</li>
								<li>IH电饭煲</li>
								<li>滚筒洗衣机</li>
								<li>电热水器</li>
							</ul>
							<img src="/static/img/floor-1-1.png" />
						</div>
						<div class="yui3-u row-330 floorBanner">
							<div id="floorCarousell" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#floorCarousell" data-slide-to="0" class="active"></li>
									<li data-target="#floorCarousell" data-slide-to="1"></li>
									<li data-target="#floorCarousell" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="active item">
										<img src="/static/img/floor-1-b01.png">
									</div>
									<div class="item">
										<img src="/static/img/floor-1-b02.png">
									</div>
									<div class="item">
										<img src="/static/img/floor-1-b03.png">
									</div>
								</div>
								<a href="#floorCarousell" data-slide="prev" class="carousel-control left">‹</a>
								<a href="#floorCarousell" data-slide="next" class="carousel-control right">›</a>
							</div>
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-2.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-3.png" />
							</div>
						</div>
						<div class="yui3-u row-218 split">
							<img src="/static/img/floor-1-4.png" />
						</div>
						<div class="yui3-u row-220 split">
							<span class="floor-x-line"></span>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-5.png" />
							</div>
							<div class="floor-conver-pit">
								<img src="/static/img/floor-1-6.png" />
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<p>第二个</p>
				</div>
				<div id="tab9" class="tab-pane">
					<p>第三个</p>
				</div>
				<div id="tab10" class="tab-pane">
					<p>第4个</p>
				</div>
				<div id="tab11" class="tab-pane">
					<p>第5个</p>
				</div>
				<div id="tab12" class="tab-pane">
					<p>第6个</p>
				</div>
				<div id="tab13" class="tab-pane">
					<p>第7个</p>
				</div>
				<div id="tab14" class="tab-pane">
					<p>第8个</p>
				</div>
			</div>
		</div>
	</div>
	<!--商标-->
	<div class="brand">
		<div class="py-container">
			<ul class="Brand-list blockgary">
				<li class="Brand-item">
					<img src="/static/img/brand_21.png" />
				</li>
				<li class="Brand-item"><img src="/static/img/brand_03.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_05.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_07.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_09.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_11.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_13.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_15.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_17.png" /></li>
				<li class="Brand-item"><img src="/static/img/brand_19.png" /></li>
			</ul>
		</div>
	</div>
	<!-- 底部栏位 -->
	<!--页面底部-->
	@include('layout.footer')

	<!--页面底部END-->
	<!-- 楼层位置 -->
	<div id="floor-index" class="floor-index">
		<ul>
			<li>
				<a class="num" href="javascript:;" style="display: none;">1F</a>
				<a class="word" href="javascript;;" style="display: block;">家用电器</a>
			</li>
			<li>
				<a class="num" href="javascript:;" style="display: none;">2F</a>
				<a class="word" href="javascript;;" style="display: block;">手机通讯</a>
			</li>
			<li>
				<a class="num" href="javascript:;" style="display: none;">3F</a>
				<a class="word" href="javascript;;" style="display: block;">电脑办公</a>
			</li>
			<li>
				<a class="num" href="javascript:;" style="display: none;">4F</a>
				<a class="word" href="javascript;;" style="display: block;">家居家具</a>
			</li>
			<li>
				<a class="num" href="javascript:;" style="display: none;">5F</a>
				<a class="word" href="javascript;;" style="display: block;">运动户外</a>
			</li>
		</ul>
	</div>
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
$(function(){
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

})
</script>
<script type="text/javascript" src="/static/js/model/cartModel.js"></script>
<script type="text/javascript" src="/static/js/czFunction.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/pages/index.js"></script>
<script type="text/javascript" src="/static/js/widget/cartPanelView.js"></script>
<script type="text/javascript" src="/static/js/widget/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/static/js/widget/nav.js"></script>
</body>


</html>