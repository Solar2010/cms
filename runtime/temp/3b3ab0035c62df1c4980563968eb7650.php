<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\Ian\wamp\www\cms\public/../application/admin\view\content\edit.html";i:1557274814;s:58:"D:\Ian\wamp\www\cms\application\admin\view\public\top.html";i:1535515250;s:59:"D:\Ian\wamp\www\cms\application\admin\view\public\left.html";i:1556496660;}*/ ?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>童老师ThinkPHP交流群：484519446</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/cms/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="/cms/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/cms/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/cms/public/static/admin/style/animate.css" rel="stylesheet">
    <script src="/cms/public/static/admin/plugins/ueditor/ueditor.config.js"></script>
    <script src="/cms/public/static/admin/plugins/ueditor/ueditor.all.js"></script>
    <script src="/cms/public/static/admin/plugins/ueditor/lang/zh-cn/zh-cn.js" charset="gbk"></script>

</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/cms/public/static/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/cms/public/static/admin/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>admin</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/logout.html">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/changePwd.html">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->

        <li <?php if($controller == 'Conf'): ?> class="open" <?php endif; ?>>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-cog"></i>
                <span class="menu-text">系统设置</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Conf/conflist'); ?>">
                        <span class="menu-text">配置列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Conf/lst'); ?>">
                        <span class="menu-text">配置管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li <?php if($controller == 'Category'): ?> class="open" <?php endif; ?>>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-folder"></i>

                <span class="menu-text">栏目管理</span>

                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Category/lst'); ?>">
                                    <span class="menu-text">栏目列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Category/add'); ?>">
                        <span class="menu-text">添加栏目</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://chuanke.baidu.com/s2260700.html" target="_blank">
                <i class="menu-icon fa fa-film"></i>

                <span class="menu-text">ThinkPHP5视频教程</span>

                <i class="menu-expand"></i>
            </a>
        </li>
        <li>
            <a href="/admin/main/index.html">
                <i class="menu-icon fa fa-gear"></i>

                <span class="menu-text">控制面板</span>

                <i class="menu-expand"></i>
            </a>
        </li>
        <li  <?php if($controller == 'Content'): ?> class="open" <?php endif; ?>>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-floppy-o"></i>

                <span class="menu-text">文档管理</span>

                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Content/lst'); ?>">
                        <span class="menu-text">文章列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>
        <li  <?php if($controller == 'Model'): ?> class="open" <?php endif; ?>>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-maxcdn"></i>

                <span class="menu-text">模型管理</span>

                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Model/lst'); ?>">
                        <span class="menu-text">模型列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Model/add'); ?>">
                        <span class="menu-text">添加模型</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li  <?php if($controller == 'ModelField'): ?> class="open" <?php endif; ?>>
        <a href="#" class="menu-dropdown">
            <i class="menu-icon fa fa-list-ul"></i>

            <span class="menu-text">字段管理</span>

            <i class="menu-expand"></i>
        </a>
        <ul class="submenu">
            <li>
                <a href="<?php echo url('ModelField/lst'); ?>">
                    <span class="menu-text">字段列表</span>
                    <i class="menu-expand"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo url('ModelField/add'); ?>">
                    <span class="menu-text">添加字段</span>
                    <i class="menu-expand"></i>
                </a>
            </li>
        </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-gear"></i>

                <span class="menu-text">系统</span>

                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/admin/user/index.html">
                        <span class="menu-text">用户管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="/admin/auth_group/index.html">
                        <span class="menu-text">角色管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="/admin/auth_rule/index.html">
                        <span class="menu-text">权限列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

    </ul>
    <!-- /Sidebar Menu -->
</div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo url('Index/index'); ?>">系统</a>
                    </li>
                    <li>
                        <a href="<?php echo url('lst'); ?>">文档管理</a>
                    </li>
                    <li class="active">修改文档</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">修改文档</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">标题</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="" name="title" required="" type="text" value="<?php echo $achieves['title']; ?>">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                            <div class="col-sm-6">
                                                <?php if(is_array($lst) || $lst instanceof \think\Collection || $lst instanceof \think\Paginator): $i = 0; $__LIST__ = $lst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$categorys): $mod = ($i % 2 );++$i;if($cate_id == $categorys['id']): ?>
                                                <input type="hidden" name="cate_id" value="<?php echo $categorys['id']; ?>">
                                                <span class="form-control"><?php echo $categorys['cate_name']; ?></span>
                                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">关键词</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="" name="keywords" required="" type="text" value="<?php echo $achieves['keywords']; ?>">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">描述</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="description"><?php echo $achieves['description']; ?></textarea>
                                            </div>
                                        </div>

                                        <!--<div class="form-group">-->
                                            <!--<label class="col-sm-2 control-label no-padding-right">缩略图</label>-->
                                            <!--<div class="col-sm-6">-->
                                                <!--<input type="file" class="form-control" name="litpic">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">缩略图</label>
                                            <div class="col-sm-6">
                                                <label>
                                                    <span id="uploadify"></span>
                                                </label>
                                                <label>
                                                    <div class="uploadify-button btn btn-azure" id="cancel">
                                                        <i class="fa fa-rotate-left"></i>
                                                        <span class="uploadify-button-text">撤销上传</span>
                                                    </div>
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group" id="contentimgdiv" <?php if($achieves['litpic'] == ''): ?>style="display: none"<?php endif; ?>>
                                            <label class="col-sm-2 control-label no-padding-right"></label>
                                            <div class="col-sm-6">
                                                <div id="contentimg">
                                                    <?php if($achieves['litpic'] != ''): ?>
                                                    <img src="/cms/public/uploads/index/content/<?php echo $achieves['litpic']; ?>" alt="" height="100">
                                                    <?php endif; ?>
                                                </div>
                                                <input type="hidden" name="litpic" value="<?php echo $achieves['litpic']; ?>">
                                            </div>
                                        </div>
                                        <!--自定义字段开始-->
                                        <?php foreach($diy_fields as $key => $value):?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"><?php echo $value['field_cname']?></label>

                                            <div class="col-sm-6">
                                                <?php switch ($value['field_type']) {
                                                        case 1:
                                                        case 7:
                                                        case 8:
                                                            echo "<input type='text' value='".$table_fields[$value['field_ename']]."' class='form-control' name='".$value['field_ename']."'>";
                                                            break;
                                                        case 5:
                                                            echo "<textarea class='form-control' name='".$value['field_ename']."'>".$table_fields[$value['field_ename']]."</textarea>";
                                                            break;
                                                        case 2:
                                                            $arr = explode(',', $value['field_values']);
                                                            foreach ($arr as $k => $v) {
                                                                if($table_fields[$value['field_ename']] == $v){
                                                                    $checked = 'checked="checked"';
                                                                } else {
                                                                    $checked ="";
                                                                }
                                                                echo "<div class='radio' style='float: left;padding-left: 10px;'>";
                                                                echo "<label>";
                                                                echo "<input type='radio' value='$v' $checked class='colored-blue' name='".$value['field_ename']."'>";
                                                                echo "<span class='text'>$v</span>";
                                                                echo "</label> ";
                                                                echo "</div>";
                                                            }
                                                            break;
                                                        case 3:
                                                                $arr = explode(',', $value['field_values']);
                                                                foreach ($arr as $k => $v) {
                                                                    echo "<div class='checkbox' style='float: left;padding-left: 10px;'>";
                                                                    echo "<label style='margin-right: 10px;'>";
                                                                    echo "<input type='checkbox' value='$v' class='colored-blue' name='".$value['field_ename']."[]'>";
                                                                    echo "<span class='text'>$v</span>";
                                                                    echo "</label> ";
                                                                    echo "</div>";
                                                                }
                                                            break;
                                                        case 4:
                                                            $arr = explode(',', $value['field_values']);
                                                            echo "<select class='form-control' name='".$value['field_ename']."'>";
                                                            foreach ($arr as $k => $v) {
                                                                echo "<option value='".$v."'>$v</option>";
                                                                }
                                                            echo "</select>";
                                                            break;
                                                        case 6:
                                                            echo "<input type='file' class='form-control' name='".$value['field_ename']."'>";
                                                            break;
                                                        case 9:
                                                            echo get_ueditor($value['field_ename'],$table_fields[$value['field_ename']]);
                                                            break;
                                                        default:
                                                            echo "<input type='text' class='form-control' name='".$value['field_ename']."'>";
                                                            break;
                                                }?>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                        <!--自定义字段结束-->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">内容</label>
                                            <div class="col-sm-6">
                                                <textarea id="content" name="content"><?php echo $achieves['content']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">作者</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="writer" value="<?php echo $achieves['writer']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">来源</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="source" value="<?php echo $achieves['source']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">属性</label>
                                            <?php
                                                $attr = $achieves['attr'];
                                                $attr = explode(',', $attr);

                                            ?>
                                            <div class="checkbox" style="float: left;padding-left: 10px;">
                                                <label>
                                                    <input class="colored-blue" <?php if(in_array('头条', $attr)) { echo 'checked="checked"';}?> type="checkbox" value="头条" name="attr[]">
                                                    <span class="text">头条</span>
                                                </label>
                                            </div>
                                            <div class="checkbox" style="float: left;padding-left: 10px;">
                                                <label>
                                                    <input class="colored-blue" <?php if(in_array('推荐', $attr)) { echo 'checked="checked"';}?> type="checkbox" value="推荐" name="attr[]">
                                                    <span class="text">推荐</span>
                                                </label>
                                            </div>
                                            <div class="checkbox" style="float: left;padding-left: 10px;">
                                                <label>
                                                    <input class="colored-blue" <?php if(in_array('幻灯片', $attr)) { echo 'checked="checked"';}?> type="checkbox" value="幻灯片" name="attr[]">
                                                    <span class="text">幻灯片</span>
                                                </label>
                                            </div>
                                            <div class="checkbox" style="float: left;padding-left: 10px;">
                                                <label>
                                                    <input class="colored-blue" <?php if(in_array('加粗', $attr)) { echo 'checked="checked"';}?> type="checkbox" value="加粗" name="attr[]">
                                                    <span class="text">加粗</span>
                                                </label>
                                            </div>
                                            <div class="checkbox" style="float: left;padding-left: 10px;">
                                                <label>
                                                    <input class="colored-blue" <?php if(in_array('图片', $attr)) { echo 'checked="checked"';}?>  type="checkbox" value="图片" name="attr[]">
                                                    <span class="text">图片</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right">点击量</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="click" value="<?php echo $achieves['click']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">保存信息</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="/cms/public/static/admin/style/jquery_002.js"></script>
<script src="/cms/public/static/admin/style/bootstrap.js"></script>
<script src="/cms/public/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="/cms/public/static/admin/style/beyond.js"></script>
<script src="/cms/public/static/admin/plugins/uploadify/jquery.uploadify.min.js"></script>
<script src="/cms/public/static/admin/plugins/layer/layer.js"></script>

<script type="text/javascript">
    //uploadify上传
    $(function () {
        $("#uploadify").uploadify({
            //指定swf文件
            'swf': '/cms/public/static/admin/plugins/uploadify/uploadify.swf',
            //后台处理的页面
            'uploader': "<?php echo url('Content/upload'); ?>",
            'progressData' : 'speed',
            //按钮显示的文字
            'buttonText': '上传文件',
            'buttonClass' : 'btn btn-azure',
            'fileObjName' : 'img',
            'fileTypeDesc': 'Image Files',
            'onUploadSuccess' : function (file,data,response) {
                var contentimg = "/cms/public/uploads/index/content/" + data;
                var contentHtml = "<img src='"+contentimg+"' height='100'>";
                $("#contentimgdiv").show();
                $("#contentimg").html(contentHtml);
                $("input[name='litpic']").val(data);
            }
        });
        //删除uploadify原有样式
        $("#uploadify-button").removeAttr('style');
        $("#uploadify-button").prepend("<i class='fa fa-upload'></i>");
    });
    $("#cancel").click(function () {
        var imgurl = $("input[name='litpic']").val();
        if(!imgurl) {
            layer.alert("请先上传图片",{icon:2});
            return false;
        } else {
            layer.confirm("您确定要撤销图片吗",{icon:3,title:'message'},function (index) {
                $("#contentimgdiv").hide();
                $("input[name='litpic']").val('');
                $.ajax({
                    type : "POST",
                    data : {imgurl : imgurl},
                    url : "<?php echo url('Content/unlinkFile'); ?>",
                    success : function (data) {
                        if(data.status == 1) {
                            layer.msg(data.msg,{icon:1})
                        } else {
                            layer.msg(data.msg,{icon:2})
                        }

                    }
                });
                layer.close(index)
            });
        }
    });
    //百度编辑器
    var options = {
        toolbars : [
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                'inserttable'],
        ],
        initialFrameWidth :'100%',
        initialFrameHeight : 400
    }

    UE.getEditor('content',options)

    //获取多个百度编辑器
    // <?php foreach($longtext_fields as $key => $value): ?>
    // UE.getEditor('<?php echo $value['field_ename']; ?>',options);
    // <?php endforeach; ?>
</script>

</body></html>