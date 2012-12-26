	{include file="header.tpl"}
	{if $is_login}
	<div class="span3 alert alert-info" id="welcomemsg">
		<h3>欢迎您来吐槽，<br><span>{$nickname|escape:'html'}</span>！<br><a href="index.php?action=logout">退出登录</a></h3>
	</div>
	{else}
	<div class="span4">	
		<form class="form-inline" id="loginform">
			<input type="text" class="input-small" id="username" placeholder="用户名">
			<input type="password" class="input-small" id="password" placeholder="密码">
			<a class="btn" id="login">登录</a><br>
			<a href="https://open.t.qq.com/cgi-bin/oauth2/authorize?client_id=7a9c18ddeacb4125b01b9137c1ed5bdc&response_type=code&redirect_uri=http://www.tucaoba.us/index.php?action=callback%26platform=t.qq.com" target="_blank"><img src="images/tqq.png" /></a>&nbsp;
			<a href="https://graph.renren.com/oauth/authorize?client_id=b5f721e601c241afb110c50bf0af69ec&redirect_uri=http://www.tucaoba.us/index.php?action=callback%26platform=renren.com&response_type=code" target="_blank"><img src="images/renren.png" /></a>&nbsp;
			<span>没有账号？现在<a href="index.php?action=register">注册</a></span>
			<div style="margin:3px;" class="hide alert alert-error" id="info">
				<span>sorry,用户或密码错误</span>
			</div>
		</form>
	</div>
	<div class="span4 alert alert-info hide" id="welcomemsg">
		<h3>欢迎您来吐槽，<span id="welcomename"></span>！<a href="index.php?action=logout">退出登录</a></h3>
	</div>
	{/if}
</div>
</div>


<div class="container">
	<div class="span2 offset5">
		<a id="more" href="#"><h1>...More...</h1></a>
	</div><br>
	<div class="hide span1 offset6" id="loading">
		<span><img src="images/loading.gif" /></span>
	</div>
	<div class="metro span12">
		<div class="metro-sections">
			<div class="span10 offset1">
				<div id="update">
				</div>
				{section name=i loop=$init_data}
				<a class="tile {if strlen($init_data[i].content)>20}wide{else}square{/if} text bg {$init_data[i].color}" data-toggle="modal" href="#{$init_data[i].tucaoid}">
					<div class="column-text">
						<div class="{if strlen($init_data[i].content)<15}text-header3{else}text4{/if}">{$init_data[i].content|escape:'html'}</div>
					</div>
					<div class="app-label">{$init_data[i].user|escape:'html'}</div>
				</a>
				
				<div class="modal hide fade" id="{$init_data[i].tucaoid}">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">&times;</a>
						<h2>{$init_data[i].user|escape:'html'}吐槽到：</h2>	
					</div>
					<div class="modal-body">
						<p>{$init_data[i].content|escape:'html'}</p>
					</div>
					<div class="modal-footer">
						<p class="small">{$init_data[i].date|escape:'html'}</p>
					</div>
				</div>
				
				{/section}
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>

{include file="footer.tpl"}