<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"D:\Ian\wamp\www\cms\thinkphp\tpl\dispatch_jump.tpl";i:1555848596;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>跳转提示</title>
</head>
<body>
    <div class="system-message">
        <input type="hidden" id="msg" name="msg" value="<?php echo(strip_tags($msg));?>">
        <input type="hidden" id="wait" name="wait" value="<?php echo($wait);?>">
        <input type="hidden" id="url" name="url" value="<?php echo($url);?>">
    </div>
    <script src="/cms/public/static/admin/style/jquery_002.js"></script>
    <script src="/cms/public/static/admin/plugins/layer/layer.js"></script>
    <script type="text/javascript">
        (function(){
            var msg = $("#msg").val(),
                wait = $("#wait").val(),
                url = $("#url").val();
            layer.open({
                anim : 4,
                content : msg,
                yes : function (index, layero) {
                    localtion.href = url;
                    layer.close(index);
                }
            });
            var interval = setInterval(function(){
                var time = --wait;
                if(time <= 0) {
                    location.href = url;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
