<template>
  <div>
    <el-breadcrumb separator-class="el-icon-arrow-right">
      <el-breadcrumb-item :to="{ path: '/home' }">首页</el-breadcrumb-item>
      <el-breadcrumb-item>管理员管理</el-breadcrumb-item>
      <el-breadcrumb-item>权限列表</el-breadcrumb-item>
    </el-breadcrumb>
    <el-card>
      <el-row :gutter="20">
        <el-col :span="4">
          <el-button type="primary" @click="openAddPermissionDialog()"
            >添加权限</el-button
          >
        </el-col>
      </el-row>
      <el-collapse class="m-t-20" v-model="active_name">
        <el-collapse-item name="1">
          <template v-for="item in data">
            <el-checkbox
              class="parent-power"
              :label="item.id"
              :key="item.id"
              @change="isSelected(item)"
              >{{ item.name }}
            </el-checkbox>
            <template v-if="item.children">
              <template v-for="items in item.children">
                <el-checkbox
                  class="last-child"
                  :label="items.id"
                  :key="items.id"
                  @change="isSelected(items, item)"
                  >{{ items.name }}</el-checkbox
                >
              </template>
            </template>
          </template>
        </el-collapse-item>
        <el-row :gutter="20" class="m-t-20">
          <el-col :span="4">
            <el-button type="danger">删除</el-button>
          </el-col>
        </el-row>
      </el-collapse>
    </el-card>
    <el-dialog
      title="添加权限"
      :visible.sync="addDialog"
      width="50%"
      :before-close="handleClose"
    >
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="上级权限">
          <el-select placeholder="请选择" style="width:100%" v-model="value" @change="onSelectChange(value)">
            <el-option
              v-for="item in options"
              :key="item.value"
              :label="item.label"
              :value="item.value"
            >
            </el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="权限名称">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="权限路径">
          <el-input v-model="form.path"></el-input>
        </el-form-item>
        <el-form-item label="权限icon">
          <el-input v-model="form.icon"></el-input>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="addDialog = false">取 消</el-button>
        <el-button type="primary" @click="addPermission()"
          >确 定</el-button
        >
      </span>
    </el-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      active_name: ["1"],
      addDialog: false,
      options: [],
      value: '',
      form: {
        name: "",
        path: "",
        icon: "",
        id: 0,
      },
    };
  },
  methods: {
    async getMenuList() {
      const result = await this.$http.get("/admin/permission/list");
      if (result.status !== 200) {
        return this.$message.error("获取菜单数据失败");
      }
      this.data = result.data.tree;
      //处理数据
      this.data.forEach((item) => {
        item.label = item.name;
        if (item.children.length !== 0) {
          item.children.forEach((i) => {
            i.label = i.name;
          });
        }
      });
    },
    openAddPermissionDialog() {
      this.addDialog = true
      //获取一级全选列表
      this.data.forEach((item) => {
          if(item.pid == 0) {
            this.options.push({value: item.id, label: item.name})
          }
      });
    },
    handleClose() {
        this.addDialog = false
    },
    //下拉框发生变化时改变form表单的ID
    onSelectChange(val) {
      console.log(val)
      this.form.id = val
    },
    addPermission() {
      console.log(this.form)
    }
  },
  created() {
    this.getMenuList();
  },
};
</script>
<style lang="less" scoped>
.parent-power {
  margin-top: 20px;
  background: rgba(232, 232, 232, 0.88);
  width: calc(100% - 40px);
  padding: 15px 20px;
}

.last-child {
  margin-left: 50px !important;
  margin-top: 20px;
}
.m-t-20 {
  margin-top: 20px;
}
</style>