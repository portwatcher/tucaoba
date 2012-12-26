{include file="header.tpl"}

<div class="span6 offset3" id="step1">
	<div class="progress progress-info">
		<div class="bar" style="width: 33%;"></div>
	</div>
	<div class="span7 offset1" id="1stform">
		<form class="form-horizontal">
		<fieldset>
			<legend>第一步：填写您的账号密码</legend>
			<div class="control-group">
				<label class="control-label" for="username">账号：</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="name" />
					<p class="help-block">字母，数字皆可，不能包含<a href="#" class="btn btn-danger btn-mini" rel="popover" id="illegal" >特殊字符</a></p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="username">密码：</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="pass" />
					<p class="help-block">请妥善保管好您的密码</p>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<a class="btn btn-large btn-primary" id="next1" autofocus="true">OK，下一步</a>
				</div>
			</div>
		</fieldset>
		</form>
	</div>
</div>

<div class="span6 offset3" id="step2">
	<div class="progress progress-info">
		<div class="bar" style="width: 66%;"></div>
	</div>
	<div class="span7 offset1" id="2ndform">
	<form class="form-horizontal">
	<fieldset>
		<legend>第二步：完善资料</legend>
		<div class="control-group">
			<label class="control-label" for="nickname">您的吐槽用名：</label>
			<div class="controls">
				<input type="text" class="input-large" id="nick" />
				<p class="help-block">请不要包含<a class="btn btn-danger btn-mini dropdown-toggle" id="illegal" rel="popover" data-content=" ^ & 、单双引号等">特殊字符</a>，尽管我们知道您很有个性</p>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<a class="btn btn-large btn-primary" id="next2" autofocus="true">OK，下一步</a>
			</div>
		</div>
	</fieldset>	
	</form>
		
	</div>
</div>

<div class="span6 offset3" id="step3">
	<div class="progress progress-info">
		<div class="bar" style="width: 100%;"></div>
	</div>
	<div class="span7 offset2">
	<fieldset>	
		<h1><span><img src="images/ok.jpg" /></span><span>恭喜您注册成功啦！</span></h1>
		<h4>即将返回<a href="index.php">首页</a></h4>
		<span><img src="images/loading.gif"></span>
	</fieldset>
	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/reg.js"></script>
{include file="footer.tpl"}