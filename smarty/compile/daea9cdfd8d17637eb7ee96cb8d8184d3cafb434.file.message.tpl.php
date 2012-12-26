<?php /* Smarty version Smarty-3.0.7, created on 2012-12-16 03:26:32
         compiled from "/home/pwh4ck/domains/tucaoba.tk/public_html/tpl/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41519974450cd3f687dc539-82428391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daea9cdfd8d17637eb7ee96cb8d8184d3cafb434' => 
    array (
      0 => '/home/pwh4ck/domains/tucaoba.tk/public_html/tpl/message.tpl',
      1 => 1355547844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41519974450cd3f687dc539-82428391',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/pwh4ck/domains/tucaoba.tk/public_html/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
          <h2><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('page_title')->value,'html');?>
</h2>
          <p><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('message')->value,'html');?>
</p>
          <?php if (isset($_smarty_tpl->getVariable('next',null,true,false)->value)){?>
          <p><span id="countdown">5</span>秒后跳转... </p>
          <a class="btn btn-primary" href="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('next')->value,'quote');?>
">立即跳转</a>
          <?php }?>
          <a class="btn btn-primary" href="?action=index">主页</a>
          <a class="btn btn-primary" href="javascript:history.back(1);">返回</a>
      </div>
<?php if (isset($_smarty_tpl->getVariable('next',null,true,false)->value)){?>
      <script type="text/javascript">
        function countdown()
        {
            var left = $('#countdown').html();
            if (left > 1)
                $('#countdown').html(left - 1);
            else
                window.location = '<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('next')->value,'quote');?>
';
        }
        setInterval("countdown()", 1000);
      </script>
<?php }?>

<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
