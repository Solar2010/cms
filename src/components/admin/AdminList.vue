<template>
  <div>
    <el-breadcrumb separator-class="el-icon-arrow-right">
      <el-breadcrumb-item :to="{ path: '/home' }">首页</el-breadcrumb-item>
      <el-breadcrumb-item>管理员管理</el-breadcrumb-item>
      <el-breadcrumb-item>管理员列表</el-breadcrumb-item>
    </el-breadcrumb>
    <el-card>
      <el-row :gutter="20">
        <el-col :span="7">
          <el-input>
            <el-button slot="append" icon="el-icon-search"></el-button>
          </el-input>
        </el-col>
        <el-col :span="4">
          <el-button type="primary" @click="addAdmin()">添加管理员</el-button>
        </el-col>
      </el-row>
      <el-table
        :data="adminList"
        border
        stripe
        :header-cell-style="{ 'text-align': 'center' }"
        :cell-style="{ 'text-align': 'center' }"
      >
        <el-table-column type="index" label="序号" width="50"></el-table-column>
        <el-table-column
          prop="username"
          label="姓名"
          width="100"
        ></el-table-column>
        <el-table-column
          prop="account"
          label="账户"
          width="180"
        ></el-table-column>
        <el-table-column
          prop="email"
          label="邮箱"
          width="180"
        ></el-table-column>
        <el-table-column
          prop="last_login_time"
          label="上次登录时间"
          width="180"
        >
          <template slot-scope="scope">
            {{ scope.row.last_login_time | dateFormat }}
          </template>
        </el-table-column>
        <el-table-column prop="is_super" label="是否是超级管理员" width="180">
          <template slot-scope="scope">
            <el-tag type="success" v-if="scope.row.is_super === 1"
              >超级管理员</el-tag
            >
            <el-tag type="info" v-else>普通管理员</el-tag>
          </template>
        </el-table-column>
        <el-table-column prop="updated_at" label="创建时间" width="100">
          <template slot-scope="scope">
            {{ scope.row.updated_at | dateFormat }}
          </template>
        </el-table-column>
        <el-table-column prop="status" label="状态" width="100">
          <template slot-scope="scope">
            <el-tag
              type="success"
              v-if="scope.row.status === 1"
              @click="changeUser(scope.row)"
              >启用</el-tag
            >
            <el-tag type="danger" v-else @click="changeUser(scope.row)"
              >禁用</el-tag
            >
          </template>
        </el-table-column>
        <el-table-column label="操作">
          <template slot-scope="scope">
            <el-tooltip
              effect="dark"
              content="编辑管理员"
              placement="top"
              v-if="scope.row.is_super !== 1"
            >
              <el-button
                type="primary"
                icon="el-icon-edit"
                circle
                size="mini"
              ></el-button>
            </el-tooltip>
            <el-tooltip
              effect="dark"
              content="删除管理员"
              placement="top"
              v-if="scope.row.is_super !== 1"
            >
              <el-button
                type="danger"
                icon="el-icon-delete"
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
      <el-form
        ref="Form"
        label-width="0"
        :model="form"
        :rules="formRules"
      >
        <el-form-item prop="account">
          <el-input
            v-model="form.account"
            prefix-icon="el-icon-s-custom"
            auto-complete="off"
          />
        </el-form-item>
        <el-form-item prop="password">
          <el-input
            v-model="form.password"
            prefix-icon="el-icon-lock"
            type="password"
            auto-complete="new-password"
          />
        </el-form-item>
        <el-form-item class="btns">
          <el-button type="primary" @click="login">登录</el-button>
          <el-button type="info" @click="resetLoginForm">重置</el-button>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="dialogVisible = false">取 消</el-button>
        <el-button type="primary" @click="dialogVisible = false"
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
      queryInfo: {
        page: 1,
        limit: 10,
        username: "",
      },
      adminList: [],
      total: 0,
      dialogVisible: false,
      title: "",
      form: {},
      formRules: []
    };
  },
  methods: {
    async getAdminList() {
      const result = await this.$http.get("/admin/list", {
        params: this.queryInfo,
      });
      if (result.status !== 200) {
        return this.$message.error("获取管理员列表失败");
      }
      this.adminList = result.data.data;
      this.total = result.data.total;
    },
    handleSizeChange(newSize) {
      this.queryInfo.limit = newSize;
      this.getAdminList();
    },
    handleCurrentChange(newPage) {
      this.queryInfo.page = newPage;
      this.getAdminList();
    },
    async changeUser(row) {
      const result = await this.$http.get("/admin/change-status", {
        params: { id: row.id },
      });
      if (result.status !== 200) {
        return this.$message.error("管理员操作失败");
      }
      row.status = row.status === 1 ? 2 : 1;
      this.$message.success("管理员操作成功");
    },
    addAdmin() {
      this.dialogVisible = true;
      this.title = "添加管理员";
    },
  },
  created() {
    this.getAdminList();
  },
};
</script>
<style lang="less" scoped>
</style>