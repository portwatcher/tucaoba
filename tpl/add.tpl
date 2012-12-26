{include file="header.tpl"}
{include file="sidebar.tpl"}

        <style type="text/css">
            .keyname {
                margin-top: 10px;
            }
        </style>
        <div class="span9">
            <form class="navbar-form pull-left span9" enctype="multipart/form-data"
                action="index.php?action=do_add" method="post" onsubmit="return onSubmitCheck();">
              <fieldset>
                <legend>添加关键词</legend>

                <label class="keyname">关键词</label>
                <input type="text" name="word" id="word" onblur="check_word_exist();">
                <span class="help-inline" id="warn_word"></span>

                <label class="keyname">标题</label>
                <input type="text" name="title">
                <span class="help-inline" id="warn_title"></span>

                <label class="keyname">图片</label>
{if $is_ie eq 1}
                <input id="lefile" class="span5" name="pic" type="file">
                <script type="text/javascript">
                    $('input[id=lefile]').change(function() {
                        $('#warn_pic').html(check_pic_ext() ? '' : no_img_err_msg);
                    });
                </script>
{else}
                <input id="lefile" name="pic" type="file" style="display:none">
                <span class="input-append">
                   <input id="photoCover" class="input-large" type="text" disabled />
                   <a class="btn" onclick="$('input[id=lefile]').click();">浏览...</a>
                </span>
                <script type="text/javascript">
                    $('input[id=lefile]').change(function() {
                        $('#photoCover').val($(this).val().replace(/^.*(\\|\/)/g, ''));
                        $('#warn_pic').html(check_pic_ext() ? '' : no_img_err_msg);
                    });
                </script>
{/if}
                <span class="help-inline" id="warn_pic"></span>
                 
                <script type="text/javascript">
                var no_img_err_msg = "<i class=\"icon-remove\"></i>您选择的文件不是JPG图片，请重新选择。";
                function check_pic_ext() {
                    var ext = $('#lefile').val().replace(/^.*\./, '').toLowerCase();
                    return $.inArray(ext, ['jpg', 'jpeg']) >= 0;
                }
                var word_exist = true;
                function check_word_exist()
                {
                    if ($('#word').val() == '') {
                        $('#warn_word').html('<i class="icon-remove"></i>请输入关键词');
                        return;
                    }
                    var url = '?action=word_exist&word=' + encodeURIComponent($('#word').val());
                    //alert(url);
                    //*
                    $.ajax({
                        'url': url + '&rnd=' + Math.random(),
                        'success': function(ret) {
                            if (ret.errno == 0) {
                                if (ret.exist == 1) {
                                    word_exist = true;
                                    $('#warn_word').html('<i class="icon-remove"></i>该关键词已存在');
                                }
                                else {
                                    word_exist = false;
                                    $('#warn_word').html('<i class="icon-ok"></i>该关键词可添加');
                                }
                            }
                            else {
                                word_exist = false;
                                $('#warn_word').html('<i class="icon-remove"></i>查询出错');
                            }
                        }
                    });
                    //*/
                }
                function onSubmitCheck()
                {
                    if ($('#word').val() == '')
                    {
                        $('#warn_word').html('<i class="icon-remove"></i>关键字不能为空');
                        $('#word').focus();
                        return false;
                    }
                    if ($('#lefile').val() == '')
                        return true; //no picture ok
                    if (!check_pic_ext())
                    {
                        alert(no_img_err_msg);
                        return false;
                    }
                    return true;
                }
                </script>

                <label class="keyname">链接</label>
                <input type="text" name="url" class="span8" placeholder="http://">
                <span class="help-inline" id="warn_url"></span>

                <label class="keyname">介绍</label>
                <textarea class="span8" rows="12" name="info"></textarea>

                <p style="margin-top:20px;">
                    <button type="submit" class="btn">提交</button> 
                </p>
              </fieldset>
            </form>
        </div>

{include file="footer.tpl"}
