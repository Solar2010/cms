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
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="operate(this.operate)">确 定</el-button>
      </span>
    </el-dialog>
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
      form: {},
      title: "message",
      operate: "add",
    };
  },
  methods: {
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
      this.operate = 'add'
    },
    handleClose() {
      this.dialogVisible = false;
      this.form = {};
    },
    async operate() {
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
      this.operate = 'edit';
      console.log(role);
      this.form.id = role.id;
      this.form.name = role.name;
      this.form.mark = role.mark;
    },
  },
  created() {
    this.getRoleList();
  },
};
</script>

<style lang="less" scoped>
</style>