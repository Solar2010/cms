<template>
  <div>
    <el-breadcrumb separator-class="el-icon-arrow-right">
      <el-breadcrumb-item :to="{ path: '/home' }">首页</el-breadcrumb-item>
      <el-breadcrumb-item>管理员管理</el-breadcrumb-item>
      <el-breadcrumb-item>角色列表</el-breadcrumb-item>
    </el-breadcrumb>
    <el-card>
      <el-row :gutter="20">
        <el-col :span="7">
          <el-input>
            <el-button slot="append" icon="el-icon-search"></el-button>
          </el-input>
        </el-col>
        <el-col :span="4">
          <el-button type="primary" @click="addRoleDialog()"
            >添加角色</el-button
          >
        </el-col>
      </el-row>
      <el-table
        :data="roleList"
        border
        stripe
        :header-cell-style="{ 'text-align': 'center' }"
        :cell-style="{ 'text-align': 'center' }"
      >
        <el-table-column type="index" label="序号" width="50"></el-table-column>
        <el-table-column prop="name" label="角色名称"></el-table-column>
        <el-table-column prop="admin_info" label="创建者">
          <template slot-scope="scope">
            {{ scope.row.admin_info.username }}
          </template>
        </el-table-column>
        <el-table-column prop="created_at" label="创建时间">
          <template slot-scope="scope">
            {{ scope.row.created_at | dateFormat }}
          </template>
        </el-table-column>
        <el-table-column label="操作">
          <template slot-scope="scope">
            <el-tooltip
              effect="dark"
              content="编辑角色"
              placement="top"
              v-if="scope.row.id !== 1"
            >
              <el-button
                type="primary"
                icon="el-icon-edit"
                circle
                size="mini"
                @click="editRoleDialog(scope.row)"
              ></el-button>
            </el-tooltip>
            <el-tooltip
              effect="dark"
              content="删除角色"
              placement="top"
              v-if="scope.row.id !== 1"
            >
              <el-button
                type="danger"
                icon="el-icon-delete"
                circle
                size="mini"
                @click="delRole(scope.row)"
              ></el-button>
            </el-tooltip>
            <el-tooltip
              effect="dark"
              content="分配权限"
              placement="top"
              v-if="scope.row.id !== 1"
            >
              <el-button
                type="primary"
                icon="el-icon-setting"
                circle
                size="mini"
                @click="allocDialog(scope.row)"
              ></el-button>
            </el-tooltip>
          </template>
        </el-table-column>
      </el-table>
      <el-pagination
        :current-page="queryInfo.page"
        :page-sizes="[10, 20, 30, 40]"
        :page-size="queryInfo.limit"
        layout="total, sizes, prev, pager, next, jumper"
        :total="total"
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
      />
    </el-card>
    <el-dialog
      :title="title"
      :visible.sync="dialogVisible"
      width="50%"
      :before-close="handleClose"
    >
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="角色名称">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="角色描述">
          <el-input type="textarea" v-model="form.mark"></el-input>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="handleClose()">取 消</el-button>
        <el-button type="primary" @click="operated()">确 定</el-button>
      </span>
    </el-dialog>
    <!-- 分配权限 -->
    <el-dialog
      title="权限分配"
      :visible.sync="allocDialogVisible"
      width="50%"
      :before-close="closeAlloc"
    >
      <el-collapse class="m-t-20" v-model="active_name">
        <el-collapse-item name="1">
          <template slot="title">
            <el-checkbox
              class="m-l-20 m-r-20"
              v-model="check_alls"
              @change="ChangeAlls"
              >全部选择</el-checkbox
            >
          </template>
          <el-checkbox-group v-model="checked_permissions">
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
                    >{{ items.name }}
                  </el-checkbox>
                </template>
              </template>
            </template>
          </el-checkbox-group>
        </el-collapse-item>
      </el-collapse>
      <span slot="footer" class="dialog-footer">
        <el-button @click="closeAlloc()">取 消</el-button>
        <el-button type="primary" @click="save()">确 定</el-button>
      </span>
    </el-dialog>
    <!-- 分配权限 -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      roleList: [],
      queryInfo: {
        page: 1,
        limit: 10,
        name: "",
      },
      total: 0,
      dialogVisible: false,
      form: {
        name: "",
        mark: "",
      },
      title: "message",
      operate: "",
      allocDialogVisible: false,
      allocForm: {},
      active_name: ["1"],
      checked_permissions: [],
      data: [],
      check_alls: false,
      selected_role: 0,
    };
  },
  methods: {
    // change(e) {
    //   this.$forceUpdate()
    // },
    async getRoleList() {
      const result = await this.$http.get("/admin/role/list", {
        params: this.queryInfo,
      });
      if (result.status !== 200) {
        this.$message.error("获取角色列表失败");
      }
      this.roleList = result.data.data;
      this.total = result.data.total;
    },
    handleSizeChange() {},
    handleCurrentChange() {},
    addRoleDialog() {
      this.dialogVisible = true;
      this.title = "添加角色";
      this.operate = "add";
    },
    handleClose() {
      this.dialogVisible = false;
      this.form = {};
      this.operate = "";
    },
    async operated() {
      if (this.operate == "add") {
        const result = await this.$http.post("/admin/role/add", this.form);
        if (result.status !== 200) {
          return this.$message.error("添加角色失败");
        }
        this.dialogVisible = false;
        this.form = {};
        this.$message.success("添加角色成功");
      } else {
        const result = await this.$http.post("/admin/role/edit", this.form);
        if (result.status !== 200) {
          return this.$message.error("编辑角色失败");
        }
        this.dialogVisible = false;
        this.form = {};
        this.$message.success("编辑角色成功");
      }

      this.getRoleList();
    },
    editRoleDialog(role) {
      this.dialogVisible = true;
      this.title = "编辑角色";
      this.operate = "edit";
      console.log(role);
      this.form.id = role.id;
      this.form.name = role.name;
      this.form.mark = role.mark;
    },
    async delRole(role) {
      const result = await this.$http.post("/admin/role/del", { id: role.id });

      if (result.status != 200) {
        return this.$message.error("删除角色失败");
      }
      this.$message.success("删除角色成功");
      this.getRoleList();
    },
    allocDialog(role) {
      this.allocDialogVisible = true;
      this.getMenuList();
      this.selected_role = role.id;
      //展示已有权限
      const permissions = await this.$http.post('/admin/role/role-permission')
      console.log(permissions)
      
    },
    closeAlloc() {
      this.allocDialogVisible = false;
      this.checked_permissions = [];
      this.selected_role = 0;
    },
    async save() {
      console.log(this.checked_permissions);
      console.log(this.selected_role);
      const result = await this.$http.post("/admin/role/alloc", {
        role_id: this.selected_role,
        permissions: this.checked_permissions,
      });
      this.closeAlloc()
      if (result.status != 200) {
        return this.$message.error("分配权限失败");
      }
      this.$message.success("分配权限成功");
    },
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
    addRemoveChild(arr, data, type) {
      if (data.constructor === Array) {
        for (let i = data.length; i--; ) {
          if (type === 1) arr.indexOf(data[i].id) > -1 || arr.push(data[i].id);
          if (type === 2)
            arr.indexOf(data[i].id) == -1 ||
              arr.splice(arr.indexOf(data[i].id), 1);
          if (data[i].children) {
            this.addRemoveChild(arr, data[i].children, type);
          }
        }
      } else if (data.children) {
        for (let i = data.children.length; i--; ) {
          if (type === 1)
            arr.indexOf(data.children[i].id) > -1 ||
              arr.push(data.children[i].id);
          if (type === 2)
            arr.indexOf(data.children[i].id) == -1 ||
              arr.splice(arr.indexOf(data.children[i].id), 1);
          if (data.children[i].children) {
            this.addRemoveChild(arr, data.children[i].children, type);
          }
        }
      }
    },
    isSelected(dataChilds, dataChild, data) {
      if (this.checked_permissions.includes(dataChilds.id)) {
        this.addRemoveChild(this.checked_permissions, dataChilds, 1);
      } else {
        this.addRemoveChild(this.checked_permissions, dataChilds, 2);
      }
      if (dataChild) this.isAllSelect(this.checked_permissions, dataChild);
      if (data) this.isAllSelect(this.checked_permissions, data);
    },
    //全部选中按钮勾选
    ChangeAlls(val) {
      if (val) {
        this.addRemoveChild(this.checked_permissions, this.data, 1);
        this.crs_check_all = true;
        this.shop_check_all = true;
      } else {
        this.addRemoveChild(this.checked_permissions, this.data, 2);
        this.crs_check_all = false;
        this.shop_check_all = false;
      }
    },
    //顶部全部选中,crs,商城选择框 判断他们对应的子节点是否选中,如果选中就选中父级
    isAllCheck(data, arr) {
      const indexArr = [];
      let state = false;
      for (let i = data.length; i--; ) {
        const index = arr.includes(data[i].id);
        indexArr.push(index);
      }
      state = indexArr.includes(false) ? false : true;
      return state;
    },
    //子级全部选中将父级的key加入数组,反之去掉父级的key
    isAllSelect(arr, data) {
      const indexArr = [];
      for (let i = data.children.length; i--; ) {
        const index = arr.includes(data.children[i].id);
        indexArr.push(index);
      }
      if (indexArr.includes(true)) {
        arr.indexOf(data.id) > -1 || arr.push(data.id);
      } else {
        arr.indexOf(data.id) == -1 || arr.splice(arr.indexOf(data.id), 1);
      }
    },
  },
  created() {
    this.getRoleList();
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
</style>