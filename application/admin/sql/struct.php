<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/5/21
 * Time: 7:58
 */
return "
DROP TABLE IF EXISTS `tp_achieves_copy1`;
CREATE TABLE `tp_achieves_copy1`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '关键词',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '描述',
  `writer` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '作者',
  `source` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '来源',
  `litpic` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '缩略图',
  `attr` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '属性',
  `click` mediumint(8) UNSIGNED NOT NULL DEFAULT 0 COMMENT '点击量',
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容',
  `cate_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属分类',
  `mode_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '所属模型',
  `time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '发布时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE `tp_category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cate_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '栏目名称',
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '栏目标题',
  `keywords` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关键词',
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '描述',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '内容',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态 1：显示 0：隐藏',
  `img` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '栏目图片',
  `cate_attr` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '栏目属性 1：列表页栏目 2：封面栏目 3:外链栏目',
  `list_tmp` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '列表页模板',
  `index_tmp` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面模板',
  `article_tmp` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '内容页模板',
  `mode_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 1 COMMENT '模型ID',
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '外链',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 50 COMMENT '排序',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '上级ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

DROP TABLE IF EXISTS `tp_conf`;
CREATE TABLE `tp_conf`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '中文名称',
  `ename` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '英文名称',
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '默认值',
  `values` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '可选值',
  `dt_type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '值类型1:文本输入框 2：单选 3：复选 4：下拉菜单 5：文本域 6：附件',
  `cf_type` tinyint(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '配置类型 1:基本信息 2：联系方式 3：SEO设置',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

DROP TABLE IF EXISTS `tp_model`;
CREATE TABLE `tp_model`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `model_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模型名称',
  `table_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '模型对应表名',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1：开启 0：禁用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

DROP TABLE IF EXISTS `tp_model_field`;
CREATE TABLE `tp_model_field`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `field_cname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '中文名称',
  `field_ename` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '英文名称',
  `field_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1：单行文本2：单选按钮3：复选框4：下拉菜单5：文本域6：附件7：浮点8：整型9：长文本',
  `field_values` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '字段可选值',
  `mode_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '关联模型ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

DROP TABLE IF EXISTS `tp_node`;
CREATE TABLE `tp_node`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `node_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '节点名称',
  `mode_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '模型ID',
  `output_encoding` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '输出编码',
  `input_encoding` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '输入编码',
  `addtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '节点添加时间',
  `lasttime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后采集时间',
  `list_rules` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '列表采集规则',
  `content_rules` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '内容采集规则',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

";