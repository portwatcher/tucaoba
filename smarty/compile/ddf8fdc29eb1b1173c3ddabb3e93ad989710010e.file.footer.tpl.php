<?php /* Smarty version Smarty-3.0.7, created on 2012-12-17 08:23:08
         compiled from "/home/pwh4ck/domains/tucaoba.us/public_html/tpl/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19664864250ced66ca01d29-46723955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddf8fdc29eb1b1173c3ddabb3e93ad989710010e' => 
    array (
      0 => '/home/pwh4ck/domains/tucaoba.us/public_html/tpl/footer.tpl',
      1 => 1355632766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19664864250ced66ca01d29-46723955',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="span5 offset4 well" id="footer">
		<span>
			&copy;2012&nbsp;Hackathon[at]
			<a href="http://segmentfault.com" target="_blank">segmentfault.com</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="http://www.pwhack.me" target="_blank">PortWatcher</a>
			&nbsp;&nbsp;
			<a href="http://felix021.com" target="_blank">Felix021</a>
		</span>
	</div>
</div>

<div id="create" class="modal hide fade">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3>吐槽中...</h3>
	</div>
	<div class="modal-body">
		<center>
		<textarea autofocus="true" required="true" rows=6 id="content"></textarea>
		</center>
		<span>选择您吐槽方块的颜色，不选则为随机颜色：</span>
		<div class="btn-group" data-toggle="buttons-radio">
			<button class="btn" value="bg-color-blue">蓝</button>
			<button class="btn" value="bg-color-blueDark">深蓝</button>
			<button class="btn" value="bg-color-green">绿</button>
			<button class="btn" value="bg-color-greenDark">深绿</button>
			<button class="btn" value="bg-color-red">红</button>
			<button class="btn" value="bg-color-yellow">黄</button>
			<button class="btn" value="bg-color-orange">橙</button>
			<button class="btn" value="bg-color-pink">粉</button>
			<button class="btn" value="bg-color-purple">紫</button>
			<button class="btn" value="bg-color-darken">暗</button>
		</div>
	</div>
	<div class="modal-footer">
		<div class="hide alert alert-success" id="tucaosuccess">
			<span></span>
		</div>
		<div class="hide alert alert-error"id="tucaofail">
			<span>吐槽失败 TvT</span>
		</div>
		<button data-loading-text="Loading..." href="#" class="btn" id="go">吐槽一下！</button>
	</div>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.md5.js"></script>
</body>
</html>