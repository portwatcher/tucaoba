<?php /* Smarty version Smarty-3.0.7, created on 2012-12-16 07:33:09
         compiled from "/home/pwh4ck/domains/tucaoba.tk/public_html/tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112019689550cd7935999152-99096195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01e9f6cc628901cfa0ff88b6b4681b75a761d885' => 
    array (
      0 => '/home/pwh4ck/domains/tucaoba.tk/public_html/tpl/index.tpl',
      1 => 1355643187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112019689550cd7935999152-99096195',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/pwh4ck/domains/tucaoba.tk/public_html/smarty/plugins/modifier.escape.php';
?>	<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<?php if ($_smarty_tpl->getVariable('is_login')->value){?>
	<div class="span3 alert alert-info" id="welcomemsg">
		<h3>欢迎您来吐槽，<br><span><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('nickname')->value,'html');?>
</span>！<br><a href="index.php?action=logout">退出登录</a></h3>
	</div>
	<?php }else{ ?>
	<div class="span4">	
		<form class="form-inline" id="loginform">
			<input type="text" class="input-small" id="username" placeholder="用户名">
			<input type="password" class="input-small" id="password" placeholder="密码">
			<a class="btn" id="login">登录</a><br>
			<a href="https://open.t.qq.com/cgi-bin/oauth2/authorize?client_id=7a9c18ddeacb4125b01b9137c1ed5bdc&response_type=code&redirect_uri=http://www.tucaoba.tk/index.php?action=callback%26platform=t.qq.com" target="_blank"><img src="images/tqq.png" /></a>&nbsp;
			<a href="https://graph.renren.com/oauth/authorize?client_id=b5f721e601c241afb110c50bf0af69ec&redirect_uri=http://www.tucaoba.tk/index.php?action=callback%26platform=renren.com&response_type=code" target="_blank"><img src="images/renren.png" /></a>&nbsp;
			<span>没有账号？现在<a href="index.php?action=register">注册</a></span>
			<div style="margin:3px;" class="hide alert alert-error" id="info">
				<span>sorry,用户或密码错误</span>
			</div>
		</form>
	</div>
	<div class="span4 alert alert-info hide" id="welcomemsg">
		<h3>欢迎您来吐槽，<span id="welcomename"></span>！<a href="index.php?action=logout">退出登录</a></h3>
	</div>
	<?php }?>
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
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('init_data')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
				<a class="tile <?php if (strlen($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'])>20){?>wide<?php }else{ ?>square<?php }?> text bg <?php echo $_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['color'];?>
" data-toggle="modal" href="#<?php echo $_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tucaoid'];?>
">
					<div class="column-text">
						<div class="<?php if (strlen($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'])<15){?>text-header3<?php }else{ ?>text4<?php }?>"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'],'html');?>
</div>
					</div>
					<div class="app-label"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user'],'html');?>
</div>
				</a>
				
				<div class="modal hide fade" id="<?php echo $_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tucaoid'];?>
">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">&times;</a>
						<h2><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user'],'html');?>
吐槽到：</h2>	
					</div>
					<div class="modal-body">
						<p><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['content'],'html');?>
</p>
					</div>
					<div class="modal-footer">
						<p class="small"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('init_data')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['date'],'html');?>
</p>
					</div>
				</div>
				
				<?php endfor; endif; ?>
			</div>
		</div>
	</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>