<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/static/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="{{url('/login')}}" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal" action="{{url('/regdo')}}" method="post">
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的用户名" name="user_name" class="input-xfat input-xlarge">
						</div><span id="span_name"></span>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" placeholder="设置登录密码" name="user_pwd" class="input-xfat input-xlarge">
						</div><span id="span_pwd"></span>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" placeholder="再次确认密码" name="user_pwdtow" class="input-xfat input-xlarge">
						</div><span id="span_pwdtow"></span>
					</div>
					
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的手机号" name="user_plone" class="input-xfat input-xlarge"> 
							<!-- <a href="javascript:void(0)" >获取短信验证码</a> -->
							<input type="button"  class="putcod sui-btn btn-bordered" value="获取短信验证码"  />
						</div><span id="span_plone"></span>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls">
							<input type="text" placeholder="短信验证码" name="user_code" class="input-xfat input-xlarge">  
						</div><span id="span_code"></span>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" class="m1" type="checkbox" value="2" checked><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<button type="button" class="sui-btn btn-block btn-xlarge btn-danger" id="reg" target="_blank">完成注册</button>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


<script type="text/javascript" src="/static/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<!-- <script type="text/javascript" src="/static/js/pages/register.js"></script> -->
</body>

</html>
<script src="/static/jquery.min.js"></script>
<script>
	//判断用户是否同意
		$(document).on('click','.m1',function(){
			if($(this).prop('checked') == false){
				$("#reg").attr('disabled',true);
				$("#reg").attr('href','#');
			}else{
				$("#reg").removeAttr('disabled');
			}
		});
	 //点击确定验证
		var flag1 = false;
		$('input[name="user_name"]').blur(function(){
			var user_name = $(this).val();
			if(user_name==""){
				$("#span_name").css('color','red').html('请填写用户名');
				flag1 = false;
			}else{
				$("#span_name").css('color','green').html('*');
				flag1 = true;
			}
		});

		var flag2 = false;
		$('input[name="user_pwd"]').blur(function(){
			var user_pwd = $(this).val();
			if(user_pwd==""){
				$("#span_pwd").css('color','red').html('请填写登录密码');
				flag2 = false;
			}else if(user_pwd.length < 6){
				$("#span_pwd").css('color','red').html('密码不能小于6位');
				flag2 = false;
			}else{
				$("#span_pwd").css('color','green').html('*');
				flag2 = true;
			}
		});


		var flag3 = false;
		$('input[name="user_pwdtow"]').blur(function(){
			var user_pwd = $('input[name="user_pwd"]').val();
			var user_pwdtow = $(this).val();
			if(user_pwdtow==""){
				$("#span_pwdtow").css('color','red').html('请再次输入密码');
				flag3 = false;
			}else if(user_pwdtow != user_pwd){
				$("#span_pwdtow").css('color','red').html('确认密码与密码不一致');
				flag3 = false;
			}else{
				$("#span_pwdtow").css('color','green').html('*');
				flag3 = true;
			}
		});

		var flag4 = false;
		$('input[name="user_plone"]').blur(function(){
			var user_plone = $(this).val();
			if(user_plone==""){
				$("#span_plone").css('color','red').html('请输入手机号');
				flag4 = false;
			}else if(!(/^1(3|5|6|7|8|9)\d{9}$/.test(user_plone))){
				$("#span_plone").css('color','red').html('手机号码有误');
				flag4 = false;
			}else{
				$("#span_plone").css('color','green').html('*');
				flag4 = true;
			}
		});

	
		var countdown=60;//60s倒计时
        function settime() {
			//alert(123);
            if (countdown == 0) {
                $(".putcod").attr("disabled",false);
                $(".putcod").val("获取短信验证码");
                countdown = 60;
                return;
            } else {
                $(".putcod").attr("disabled", true);
                $(".putcod").val("重新发送(" + countdown + ")");
                countdown--;
            }

            //1s执行一次
            setTimeout(function(){settime()},1000);
        }

		$('.putcod').click(function(){
			
			var user_plone = $('input[name="user_plone"]').val();
			if(!(/^1(3|5|6|7|8|9)\d{9}$/.test(user_plone))){
				alert('请填写正确的手机号');return;
			}
			
			$.ajax({
				url : '/putcode',
				type: 'post',
				dataType : 'json',
				data : {'user_plone':user_plone},
				success:function(res){
					if(res.code=='0'){
						alert('发送成功');
						settime() ;
					}else{
						alert(res.msg);
					}
				}
			});
			return false;
		});

		$(document).on('click','.btn-danger',function(){
			var flag=true;
			if(flag1 === false ){
				$("#span_name").css('color','red').html('请填写用户名');
				//return false;
				flag=false;
			}
			if(flag2 === false ){
				$("#span_pwd").css('color','red').html('请填写登录密码');
				//return false;
				flag=false;
			}
			if(flag3 === false ){
				$("#span_pwdtow").css('color','red').html('请再次输入密码');
				//return false;
				flag=false;
			}
			if(flag4 === false ){
				$("#span_plone").css('color','red').html('请输入手机号');
				//return false;
				flag=false;
			}
			// var code = $('input[name="code"]').val();
			// if(code == ""){
			// 	alert('请填写验证码');return false;
			// }
			if(flag){
				$('form').submit();
			}
				return false;
		});

</script>