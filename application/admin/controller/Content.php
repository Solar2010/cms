<?php
/**
 * Created by Ian
 * User: Ian
 * Date: 2019/4/29
 * Time: 8:07
 */

namespace app\admin\controller;


use think\Db;

class Content extends Base
{
    /**
     * 列表
     * author:Ian
     * desc:
     * @return \think\response\View
     */
    public function lst()
    {
        $mode_id = input('mode_id');
        $cate_id = input('cate_id');
        if(!$mode_id) {
            $mode_id = 0;
        }

        $lst = db('achieves')
            -> field('a.id,a.title,a.attr,a.cate_id,a.mode_id,c.cate_name,m.model_name,a.time')
            -> join('tp_model m', 'a.mode_id=m.id')
            -> alias('a')
            -> join('tp_category c', 'a.cate_id=c.id')
            -> paginate(10);
        $this -> assign([
            'lst' => $lst,
            'mode_id' => $mode_id,
            'cate_id' => $cate_id
        ]);
        return view();
    }

    /**
     * 处理附表附件上传
     * author:Ian
     * desc:
     * @param $name
     * @return string
     */
    protected function uploads($name)
    {
        $file = request() -> file($name);
        $info = $file -> move(ROOT_PATH.'public'.DS.'uploads/index/content/att');
        if($info) {
            return $info -> getSaveName();
        } else {
            return $file -> getError();exit;
        }
    }

    /**
     * 添加文章
     * author:Ian
     * desc:
     * @throws
     * @return \think\response\View|void
     */
    public function add()
    {
        $mode_id = input('mode_id');
        $cate_id = input('cate_id');
        if(request() -> isPost()) {


            $data = input('post.');
            $sql = sprintf("SHOW COLUMNS FROM `tp_achieves`");
            $columns = array();
            $_columns = Db::query($sql);
            foreach ($_columns as $item) {
                $columns[] = $item['Field'];
            }
            $achieves = array();
            $addtable = array();

            foreach ($data as $key => $value) {
                if(is_array($value)) {
                    $value = implode(',', $value);
                }
                if(in_array($key, $columns)) {
                    $achieves[$key] = $value;
                } else {
                    $addtable[$key] = $value;
                }
            }
            //主表数据添加
            $achieves['time'] = time();
            $achieves['mode_id'] = $mode_id;
            $addAchieves = db('achieves') -> insertGetId($achieves);
            $addtable['aid'] = $addAchieves;
            if($_FILES) {
                foreach ($_FILES as $key => $value) {
                    if($value['name'] != '') {
                        $addtable[$key] = $this -> uploads($key);
                    }
                }
            }
            //获取附表名称
            $addTableName = db('model') -> field('table_name') -> find($mode_id);
            $addTableName = $addTableName['table_name'];
            $addTable = db($addTableName) -> insert($addtable);
            if($addAchieves && $addTable) {
                return $this -> success('添加成功', 'lst');
            } else {
                return $this -> error('添加失败');
            }
        }

        //获取自定义字段
        $diyFields = db('model_field')
            -> where('mode_id', $mode_id)
            -> select();
        //获取编辑器字段
        $longtextFields = db('model_field')
            -> where(['mode_id' => $mode_id, 'field_type' => 9])
            -> select();
        $lst = model('category') -> catetree();
        $this -> assign([
            'lst' => $lst,
            'mode_id' => $mode_id,
            'cate_id' => $cate_id,
            'diy_fields' => $diyFields,
            'longtext_fields' => $longtextFields
        ]);
        return view();
    }

    public function edit()
    {
        $mode_id = input('mode_id');
        $id = input('id');
        $achieves = db('achieves') -> find($id);

        //附加表数据
        $modeIds = db('model') -> field('table_name') -> find($mode_id);
        $tableName = $modeIds['table_name'];
        $table_fields = db($tableName) -> where(['aid' => $id]) -> find();

        $lst = model('category') -> catetree();
        //获取自定义字段
        $diyFields = db('model_field')
            -> where('mode_id', $mode_id)
            -> select();
        //获取编辑器字段
        $longtextFields = db('model_field')
            -> where(['mode_id' => $mode_id, 'field_type' => 9])
            -> select();


        if(request() -> isPost()) {
            $data = input('post.');
            $sql = sprintf("SHOW COLUMNS FROM `tp_achieves`");
            $columns = array();
            $_columns = Db::query($sql);
            foreach ($_columns as $item) {
                $columns[] = $item['Field'];
            }
            $achieves = array();
            $addtable = array();

            foreach ($data as $key => $value) {
                if(is_array($value)) {
                    $value = implode(',', $value);
                }
                if(in_array($key, $columns)) {
                    $achieves[$key] = $value;
                } else {
                    $addtable[$key] = $value;
                }
            }
            $achieves['id'] = $data['id'];

            if($_FILES) {
                foreach ($_FILES as $key => $value) {
                    if($value['name'] != '') {
                        $addtable[$key] = $this -> uploads($key);
                    }
                }
            }
            $editAchieves = db('achieves') -> update($achieves);
            $editAddTable = db($tableName) -> where(['aid' => $data['id']]) -> update($addtable);

            if($editAchieves !== false && $editAddTable !== false) {
                return $this -> success('修改成功');
            } else {
                return $this -> error('修改失败');
            }
        }
        $this -> assign([
            'lst' => $lst,
            'mode_id' => $mode_id,
            'cate_id' => $achieves['cate_id'],
            'diy_fields' => $diyFields,
            'longtext_fields' => $longtextFields,
            'achieves' => $achieves,
            'table_fields' => $table_fields
        ]);
        return view();
    }

    /**
     * 图片上传
     * author:Ian
     * desc:
     */
    public function upload()
    {
        $file = request() -> file('img');
        $info = $file -> move(ROOT_PATH.'public'.DS.'uploads/index/content');
        if($info) {
            if($this -> config['thumb'] == '是') {
                //获取缩略图配置
                $thumb_width = isset($this -> config['thumb_width']) ? $this -> config['thumb_width'] : 800;
                $thumb_height = isset($this -> config['thumb_height']) ? $this -> config['thumb_height'] : 800;
                //缩略图裁剪方式
                switch ($this -> config['thumb_way']) {
                    case '等比例缩放':
                        $thumb_way = 1;
                        break;
                    case '缩放后填充':
                        $thumb_way = 2;
                        break;
                    case '居中裁剪':
                        $thumb_way = 3;
                        break;
                    case '左上角裁剪':
                        $thumb_way = 4;
                        break;
                    case '右下角裁剪':
                        $thumb_way = 5;
                        break;
                    case '固定尺寸缩放':
                        $thumb_way = 6;
                        break;
                    default :
                        $thumb_way = 1;
                        break;
                }
                $imgsrc = ROOT_PATH.'public'.DS.'uploads/index/content/'.$info -> getSaveName();
                $image = \think\Image::open($imgsrc);

                if($this -> config['is_water'] == '是') {
                    //获取水印配置
                    $water_alpha = isset($this -> config['water_alpha']) ? $this -> config['water_alpha'] : 50;
                    $water = ROOT_PATH.'public/default/images/fly.png';
                    $water_img = file_exists(ROOT_PATH.'public/uploads/admin/conf/'.$this -> config['water_img']) ? ROOT_PATH.'public/uploads/admin/conf/'.$this -> config['water_img'] : $water;
                    //水印位置
                    switch ($this -> config['water_pos']) {
                        case '左上角':
                            $water_pos = 1;
                            break;
                        case '上居中':
                            $water_pos = 2;
                            break;
                        case '右上角':
                            $water_pos = 3;
                            break;
                        case '左居中':
                            $water_pos = 4;
                            break;
                        case '居中':
                            $water_pos = 5;
                            break;
                        case '右居中':
                            $water_pos = 6;
                            break;
                        case '左下角':
                            $water_pos = 7;
                            break;
                        case '下居中':
                            $water_pos = 8;
                            break;
                        case '右下角':
                            $water_pos = 9;
                            break;
                        default :
                            $water_pos = 6;
                            break;
                    }
                    $image -> thumb($thumb_width, $thumb_height, $thumb_way) -> water($water_img, $water_pos, $water_alpha) -> save($imgsrc);
                } else {
                    $image -> thumb($thumb_width, $thumb_height, $thumb_way) -> save($imgsrc);
                }

            }

            echo $info -> getSaveName();
            exit;
        } else {
            echo $info -> getError();
            exit;
        }
    }

    /**
     * ajax异步删除文件
     * author:Ian
     * desc:
     * @return \think\response\Json
     */
    public function unlinkFile()
    {
        $url = input('post.imgurl');
        $res = @unlink(UPLOAD_IMG.'index/content/'.$url);
        $id = input('post.id');
        if($res) {
            if(isset($id)) {
                db('achieves')
                    -> where('id',$id)
                    -> setField('img','');
            }
            return json([
                'msg' => '文件删除成功',
                'code' => 200,
                'status' => 1
            ]);
        } else {
            return json([
                'msg' => '文件删除失败',
                'code' => 500,
                'status' =>  2
            ]);
        }
    }

}