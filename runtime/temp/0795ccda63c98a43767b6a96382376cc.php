<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\Ian\wamp\www\cms\public/../application/admin\view\content\lst.html";i:1557189135;s:58:"D:\Ian\wamp\www\cms\application\admin\view\public\top.html";i:1535515250;s:59:"D:\Ian\wamp\www\cms\application\admin\view\public\left.html";i:1556496660;}*/ ?>
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
                    <li class="active">文档管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">
                <?php if($mode_id != 0): ?>
                <button type="button" tooltip="添加文档" class="btn btn-sm btn-azure btn-addon" onClick='javascript:window.location.href="<?php echo url('Content/add',array('cate_id' => $cate_id, 'mode_id' => $mode_id)); ?>"'>
                    <i class="fa fa-plus"></i> Add
                </button>
               <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center" width="6%">ID</th>
                                            <th class="text-left">文章标题</th>
                                            <th class="text-center" width="20%">文章属性</th>
                                            <th class="text-center" width="10%">所属栏目</th>
                                            <th class="text-center" width="10%">所属模型</th>
                                            <th class="text-center" width="10%">发表时间</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($lst) || $lst instanceof \think\Collection || $lst instanceof \think\Paginator): $i = 0; $__LIST__ = $lst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td align="center"><?php echo $vo['id']; ?></td>
                                            <td align="left"><?php echo $vo['title']; ?></td>
                                            <td align="center">
                                                <?php if($vo['attr']):
                                                    $arr = explode(',',$vo['attr']);
                                                                                                    foreach($arr as $item):
                                                        echo "<span class='label label-yellow' style='margin-left:10px;'>".$item."</span>";
                                                    endforeach;
                                                                                                    else:
                                                    echo "<span class='label label-orange'>暂无属性</span>";
                                                endif; ?>
                                            </td>
                                            <td align="center"><?php echo $vo['cate_name']; ?></td>
                                            <td align="center">
                                                <?php echo $vo['model_name']; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo date("Y-m-d",$vo['time']); ?>
                                            </td>
                                            <td align="center">
                                                <a href="<?php echo url('edit',array('id' => $vo['id'],'mode_id' => $vo['mode_id'])); ?>" class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', '<?php echo url('del',array('id' => $vo['id'])); ?>')" class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pages padding-top-10 text-align-right">
                                <?php echo $lst -> render();; ?>
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



</body></html>