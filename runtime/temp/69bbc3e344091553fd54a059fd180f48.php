<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\Ian\wamp\www\cms\public/../application/admin\view\category\add.html";i:1556121106;s:58:"D:\Ian\wamp\www\cms\application\admin\view\public\top.html";i:1535515250;s:59:"D:\Ian\wamp\www\cms\application\admin\view\public\left.html";i:1556496660;}*/ ?>
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
    <!--uploadify styles-->

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
                        <a href="<?php echo url('Index/lst'); ?>">系统</a>
                    </li>
                    <li>
                        <a href="<?php echo url('Category/lst'); ?>">栏目管理</a>
                    </li>
                    <li class="active">添加栏目</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">

                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs  tabs-flat">
                                                <li class="active ">
                                                    <a data-toggle="tab" href="#FlatTab-1">基本信息</a>
                                                </li>
                                                <li class="">
                                                    <a data-toggle="tab" href="#FlatTab-2">SEO信息</a>
                                                </li>
                                                <li class="">
                                                    <a data-toggle="tab" href="#FlatTab-3">栏目内容</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content  tabs-flat">
                                                <div class="active tab-pane" id="FlatTab-1">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">所属模型</label>
                                                        <div class="col-sm-6">
                                                            <select name="mode_id" class="form-control">
                                                                <option value="">选择模型</option>
                                                                <?php if(is_array($model) || $model instanceof \think\Collection || $model instanceof \think\Paginator): $i = 0; $__LIST__ = $model;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $model['id']; ?>"><?php echo $model['model_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">上级栏目</label>
                                                        <div class="col-sm-6">
                                                            <select name="pid" id="" class="form-control">
                                                                <option value="0">顶级栏目</option>
                                                                <?php if(is_array($categorys) || $categorys instanceof \think\Collection || $categorys instanceof \think\Paginator): $i = 0; $__LIST__ = $categorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$categorys): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $categorys['id']; ?>" <?php if($id == $categorys['id']): ?> selected="selected" <?php endif; ?>><?php echo str_repeat('-',$categorys['level']*3);?><?php echo $categorys['cate_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">栏目名称</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="cate_name">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">隐藏栏目</label>
                                                        <div class="col-sm-6">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input class="checkbox-slider  colored-blue" name="status" type="checkbox" value="1">
                                                                    <span class="text"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">栏目图片</label>
                                                        <div class="col-sm-6">
                                                            <label for="">
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

                                                    <div class="form-group" id="cateimgdiv" style="display: none">
                                                        <label class="col-sm-2 control-label no-padding-right"></label>
                                                        <div class="col-sm-6">
                                                            <div id="cateimg"></div>
                                                            <input type="hidden" name="img" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">栏目属性</label>
                                                        <div class="col-sm-6">
                                                            <div class="radio" style="float: left">
                                                                <label><input checked="checked" name="cate_attr" type="radio" value="1">
                                                                    <span class="text">列表页栏目(可以发布文章)</span>
                                                                </label>
                                                            </div>
                                                            <div class="radio" style="float: left;padding-left: 10px">
                                                                <label><input name="cate_attr" type="radio" value="2">
                                                                    <span class="text">封面频道</span>
                                                                </label>
                                                            </div>
                                                            <div class="radio" style="float: left;padding-left: 10px">
                                                                <label><input name="cate_attr" type="radio" value="3">
                                                                    <span class="text">外链栏目</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">频道页模板</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" value="list_article.html" name="list_tmp">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">封面模板</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" value="index_article.html" name="index_tmp">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">列表页模板</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" value="article_article.html" name="article_tmp">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">外链地址</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" value="http://" name="link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="FlatTab-2">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">栏目标题</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">栏目关键词</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="keywords">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right">栏目描述</label>
                                                        <div class="col-sm-6">
                                                            <textarea name="desc" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="FlatTab-3">
                                                    <div class="widget flat radius-bordered">
                                                        <div class="widget-body">
                                                            <div class="widget-main no-padding">
                                                                <textarea id="content" name="content"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

<script src="/cms/public/static/admin/plugins/ueditor/ueditor.config.js"></script>
<script src="/cms/public/static/admin/plugins/ueditor/ueditor.all.js"></script>
<script src="/cms/public/static/admin/plugins/ueditor/lang/zh-cn/zh-cn.js" charset="gbk"></script>
<script src="/cms/public/static/admin/plugins/layer/layer.js"></script>
<script>
    $(function () {
        $("#uploadify").uploadify({
            //指定swf文件
            'swf': '/cms/public/static/admin/plugins/uploadify/uploadify.swf',
            //后台处理的页面
            'uploader': "<?php echo url('Category/upload'); ?>",
            'progressData' : 'speed',
            //按钮显示的文字
            'buttonText': '上传文件',
            'buttonClass' : 'btn btn-azure',
            'fileObjName' : 'img',
            'fileTypeDesc': 'Image Files',
            'onUploadSuccess' : function (file,data,response) {
                var cateimg = "/cms/public/uploads/admin/category/" + data;
                var cateHtml = "<img src='"+cateimg+"' height='100'>";
                $("#cateimgdiv").show();
                $("#cateimg").html(cateHtml);
               $("input[name='img']").val(data);
            }
        });
        //删除uploadify原有样式
        $("#uploadify-button").removeAttr('style');
        $("#uploadify-button").prepend("<i class='fa fa-upload'></i>");
    });
</script>
<script>
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
    $("#cancel").click(function () {
        var imgurl = $("input[name='img']").val();
        if(!imgurl) {
            layer.alert("请先上传图片",{icon:2});
            return false;
        } else {
            layer.confirm("您确定要撤销图片吗",{icon:3,title:'message'},function (index) {
                $("#cateimgdiv").hide();
                $("input[name='img']").val('');
                $.ajax({
                    type : "POST",
                    data : {imgurl : imgurl},
                    url : "<?php echo url('Category/unlinkFile'); ?>",
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

    //ajax动态修改模型
    function changetmp() {
        var pcateid = $("select[name='pid']").find("option:selected").val();

        if(pcateid != 0) {
            $.ajax({
                type : "POST",
                data : {id : pcateid},
                url : "<?php echo url('Category/ajaxCategoryInfo'); ?>",
                success : function (data) {
                    if(data.code == 200) {
                        $("input[name='list_tmp']").val(data.data.list_tmp)
                        $("input[name='index_tmp']").val(data.data.index_tmp)
                        $("input[name='article_tmp']").val(data.data.article_tmp)
                        $("select[name='mode_id']").val(data.data.mode_id)
                    } else {
                        layer.msg(data.msg,{icon:2})
                    }

                }
            })
        }
    }
    $("select[name='pid']").change(function () {
        changetmp();
    });
    changetmp();

</script>




</body></html>