<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\Ian\wamp\www\cms\public/../application/admin\view\conf\conflist.html";i:1555124768;s:58:"D:\Ian\wamp\www\cms\application\admin\view\public\top.html";i:1535515250;s:59:"D:\Ian\wamp\www\cms\application\admin\view\public\left.html";i:1556496660;}*/ ?>
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
                        <a href="#">配置列表</a>
                    </li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="tabbable">
                                <ul class="nav nav-tabs ">
                                    <li class="tab-danger active">
                                        <a data-toggle="tab" href="#SimpleTab-1" aria-expanded="true">基本信息设置</a>
                                    </li>
                                    <li class="tab-success">
                                        <a data-toggle="tab" href="#SimpleTab-2" aria-expanded="false">联系方式</a>
                                    </li>
                                    <li class="tab-info">
                                        <a data-toggle="tab" href="#SimpleTab-3" aria-expanded="false">SEO设置</a>
                                    </li>
                                </ul>
                                <div class="tab-content ">
                                    <div class="tab-pane active" id="SimpleTab-1">
                                        <?php foreach($confs as $key => $value):if($value['cf_type'] == 1):?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"><?php echo $value['cname']; ?></label>
                                            <div class="col-sm-6">
                                                <!--单行文本-->
                                                <?php if($value['dt_type'] == 1):?>
                                                <input class="form-control" name="<?php echo $value['ename']?>" type="text" value="<?php echo $value['value']?>">
                                                <?php endif;?>
                                                <!--单选按钮-->
                                                <?php if($value['dt_type'] == 2):
                                                    $valuesArr = explode(',',$value['values']);
                                                    foreach($valuesArr as $k => $v):
                                                 ?>
                                                <div class="radio" style="float: left;padding-right: 10px;">
                                                    <label>
                                                        <input name="<?php echo $value['ename']?>" value="<?php echo $v?>" type="radio" <?php if($v == $value['value']): ?> checked="checked" <?php endif; ?>>
                                                        <span class="text"><?php echo $v;?></span>
                                                    </label>
                                                </div>
                                                <?php endforeach;endif;?>
                                                <!--复选框-->
                                                <?php if($value['dt_type'] == 3):
                                                    $valuesArr = explode(',',$value['values']);
                                                    $valueArr = explode(',',$value['value']);
                                                    foreach($valuesArr as $k => $v):
                                                ?>
                                                <div class="checkbox" style="float: left;padding-left: 10px;">
                                                    <label>
                                                        <input <?php if(in_array($v,$valueArr)):?>checked="checked"<?php endif;?> class="colored-blue" value="<?php echo $v?>" name="<?php echo $value['ename']?>[]" type="checkbox" value="<?php echo $v?>">
                                                        <span class="text"><?php echo $v?></span>
                                                    </label>
                                                </div>
                                                <?php endforeach;endif;?>
                                                <!--下拉菜单-->
                                                <?php if($value['dt_type'] == 4):?>
                                                <select name="<?php echo $value['ename']?>" class="form-control">
                                                    <option value="">请选择</option>
                                                    <?php $valuesArr = explode(',',$value['values']);

                                                        foreach($valuesArr as $k => $v):
                                                    ?>
                                                    <option value="<?php echo $v;?>" <?php if($value['value'] == $v):?> selected="selected" <?php endif;?>><?php echo $v;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <?php endif;?>
                                                <!--文本域-->
                                                <?php if($value['dt_type'] == 5):?>
                                                <textarea class="form-control" name="<?php echo $value['ename']?>"><?php echo $value['value'];?></textarea>
                                                <?php endif;?>
                                                <!--附件-->
                                                <?php if($value['dt_type'] == 6):?>
                                                <input class="form-control" name="<?php echo $value['ename']?>" type="file" value="<?php echo $value['value']?>">
                                                <?php if($value['value'] != ''): ?>
                                                <img src="/cms/public/uploads/admin/conf/<?php echo $value['value']; ?>" height="30">
                                                <?php else: ?>
                                                暂未上传图片
                                                <?php endif; endif;?>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <?php endif;endforeach;?>
                                    </div>
                                    <div class="tab-pane" id="SimpleTab-2">
                                        <?php foreach($confs as $key => $value):if($value['cf_type'] == 2):?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"><?php echo $value['cname']; ?></label>
                                            <div class="col-sm-6">
                                                <!--单行文本-->
                                                <?php if($value['dt_type'] == 1):?>
                                                <input class="form-control" name="<?php echo $value['ename']?>" type="text" value="<?php echo $value['value']?>">
                                                <?php endif;?>
                                                <!--单选按钮-->
                                                <?php if($value['dt_type'] == 2):
                                                    $valuesArr = explode(',',$value['values']);
                                                    foreach($valuesArr as $k => $v):
                                                ?>
                                                <div class="radio" style="float: left;padding-right: 10px;">
                                                    <label>
                                                        <input name="<?php echo $value['ename']?>" value="<?php echo $v?>" type="radio" <?php if($v == $value['value']): ?> checked="checked" <?php endif; ?>>
                                                        <span class="text"><?php echo $v;?></span>
                                                    </label>
                                                </div>
                                                <?php endforeach;endif;?>
                                                <!--复选框-->
                                                <?php if($value['dt_type'] == 3):
                                                    $valuesArr = explode(',',$value['values']);
                                                    $valueArr = explode(',',$value['value']);
                                                    foreach($valuesArr as $k => $v):
                                                ?>
                                                <div class="checkbox" style="float: left;padding-left: 10px;">
                                                    <label>
                                                        <input <?php if(in_array($v,$valueArr)):?>checked="checked"<?php endif;?> class="colored-blue" value="<?php echo $v?>" name="<?php echo $value['ename']?>[]" type="checkbox" value="<?php echo $v?>">
                                                        <span class="text"><?php echo $v?></span>
                                                    </label>
                                                </div>
                                                <?php endforeach;endif;?>
                                                <!--下拉菜单-->
                                                <?php if($value['dt_type'] == 4):?>
                                                <select name="<?php echo $value['ename']?>" class="form-control">
                                                    <option value="">请选择</option>
                                                    <?php $valuesArr = explode(',',$value['values']);

                                                        foreach($valuesArr as $k => $v):
                                                    ?>
                                                    <option value="<?php echo $v;?>" <?php if($value['value'] == $v):?> selected="selected" <?php endif;?>><?php echo $v;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <?php endif;?>
                                                <!--文本域-->
                                                <?php if($value['dt_type'] == 5):?>
                                                <textarea class="form-control" name="<?php echo $value['ename']?>"><?php echo $value['value'];?></textarea>
                                                <?php endif;?>
                                                <!--附件-->
                                                <?php if($value['dt_type'] == 6):?>
                                                <input class="form-control" name="<?php echo $value['ename']?>" type="file" value="<?php echo $value['value']?>">
                                                <?php if($value['value'] != ''): ?>
                                                <img src="/cms/public/uploads/admin/conf/<?php echo $value['value']; ?>" height="30">
                                                <?php else: ?>
                                                暂未上传图片
                                                <?php endif; endif;?>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <?php endif;endforeach;?>
                                    </div>
                                    <div class="tab-pane" id="SimpleTab-3">
                                        <?php foreach($confs as $key => $value):if($value['cf_type'] == 3):?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label no-padding-right"><?php echo $value['cname']; ?></label>
                                            <div class="col-sm-6">
                                                <!--单行文本-->
                                                <?php if($value['dt_type'] == 1):?>
                                                <input class="form-control" name="<?php echo $value['ename']?>" type="text" value="<?php echo $value['value']?>">
                                                <?php endif;?>
                                                <!--单选按钮-->
                                                <?php if($value['dt_type'] == 2):
                                                    $valuesArr = explode(',',$value['values']);
                                                    foreach($valuesArr as $k => $v):
                                                ?>
                                                <div class="radio" style="float: left;padding-right: 10px;">
                                                    <label>
                                                        <input name="<?php echo $value['ename']?>" value="<?php echo $v?>" type="radio" <?php if($v == $value['value']): ?> checked="checked" <?php endif; ?>>
                                                        <span class="text"><?php echo $v;?></span>
                                                    </label>
                                                </div>
                                                <?php endforeach;endif;?>
                                                <!--复选框-->
                                                <?php if($value['dt_type'] == 3):
                                                    $valuesArr = explode(',',$value['values']);
                                                    $valueArr = explode(',',$value['value']);
                                                    foreach($valuesArr as $k => $v):
                                                ?>
                                                <div class="checkbox" style="float: left;padding-left: 10px;">
                                                    <label>
                                                        <input <?php if(in_array($v,$valueArr)):?>checked="checked"<?php endif;?> class="colored-blue" value="<?php echo $v?>" name="<?php echo $value['ename']?>[]" type="checkbox" value="<?php echo $v?>">
                                                        <span class="text"><?php echo $v?></span>
                                                    </label>
                                                </div>
                                                <?php endforeach;endif;?>
                                                <!--下拉菜单-->
                                                <?php if($value['dt_type'] == 4):?>
                                                <select name="<?php echo $value['ename']?>" class="form-control">
                                                    <option value="">请选择</option>
                                                    <?php $valuesArr = explode(',',$value['values']);

                                                        foreach($valuesArr as $k => $v):
                                                    ?>
                                                    <option value="<?php echo $v;?>" <?php if($value['value'] == $v):?> selected="selected" <?php endif;?>><?php echo $v;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <?php endif;?>
                                                <!--文本域-->
                                                <?php if($value['dt_type'] == 5):?>
                                                <textarea class="form-control" name="<?php echo $value['ename']?>"><?php echo $value['value'];?></textarea>
                                                <?php endif;?>
                                                <!--附件-->
                                                <?php if($value['dt_type'] == 6):?>
                                                <input class="form-control" name="<?php echo $value['ename']?>" type="file" value="<?php echo $value['value']?>">
                                                <?php if($value['value'] != ''): ?>
                                                <img src="/cms/public/uploads/admin/conf/<?php echo $value['value']; ?>" height="30">
                                                <?php else: ?>
                                                暂未上传图片
                                                <?php endif; endif;?>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <?php endif;endforeach;?>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">保存信息</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
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



</body></html>