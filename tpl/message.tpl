{include file="header.tpl"}

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
          <h2>{$page_title|escape:'html'}</h2>
          <p>{$message|escape:'html'}</p>
          {if isset($next)}
          <p><span id="countdown">5</span>秒后跳转... </p>
          <a class="btn btn-primary" href="{$next|escape:'quote'}">立即跳转</a>
          {/if}
          <a class="btn btn-primary" href="?action=index">主页</a>
          <a class="btn btn-primary" href="javascript:history.back(1);">返回</a>
      </div>
{if isset($next)}
      <script type="text/javascript">
        function countdown()
        {
            var left = $('#countdown').html();
            if (left > 1)
                $('#countdown').html(left - 1);
            else
                window.location = '{$next|escape:'quote'}';
        }
        setInterval("countdown()", 1000);
      </script>
{/if}

{include file="footer.tpl"}
