<template>
  <el-container class="home-container">
    <el-header>
      <div>
        <img src="../assets/logo.jpg" alt="管理后台" width="100%" />
        <span>后台系统</span>
      </div>
      <el-button type="info" @click="loginOut">退出</el-button>
    </el-header>
    <el-container>
      <el-aside :width="isCollapse ? '64px' : '200px'">
        <div class="toggle-button" @click="toggle">|||</div>
        <el-menu
          :default-active="activityPath"
          class="el-menu-vertical-demo"
          background-color="#333744"
          text-color="#fff"
          active-text-color="#409eff"
          :unique-opened="true"
          :collapse="isCollapse"
          :collapse-transition="false"
          :router="true"
        >
          <div v-for="(item,i) in menuList" :key="i">
                  <el-submenu :index="item.id + ''" v-if="item.children.length != 0" :key="item.id">
                    <template slot="title">
                      <i :class="item.icon"></i>
                      <span class="tohide">{{item.name}}</span>
                    </template>
                    <el-menu-item :index="val.path + ''" v-for="val in item.children" @click="saveNavStatus(val.path)" :key="val.id">
                         <i :class="val.icon"></i>
                        <span>{{val.name}}</span>
                    </el-menu-item>
                  </el-submenu>
                  <el-menu-item :index="item.id + ''" @click="saveNavStatus(item.path)" v-else :key="item.id"> 
                      <i :class="item.icon"></i>
                      <span slot="title">{{item.name}}</span>
                  </el-menu-item>
                </div>
        </el-menu>
      </el-aside>
    </el-container>
  </el-container>
</template>

<script>
export default {
  data() {
    return {
      menuList: [],
      activityPath: "",
      isCollapse: false,
    };
  },
  created() {
    this.getMenuList();
    this.activityPath = window.sessionStorage.getItem("activityPath");
  },
  methods: {
    async getMenuList() {
      const result = await this.$http.get("/admin/permission/list");
      if (result.status !== 200) {
        return this.$message.error("获取菜单数据失败");
      }
      this.menuList = result.data.tree;
    },
    loginOut() {},
    toggle() {
      this.isCollapse = !this.isCollapse;
    },
    saveNavStatus(activityPath) {
      window.sessionStorage.setItem("activityPath", activityPath);
      this.activityPath = activityPath;
    },
  },
};
</script>

<style lang="less" scoped>
.home-container {
  height: 100%;
}
.el-header {
  background-color: #373d41;
  display: flex;
  justify-content: space-between;
  padding-left: 0;
  align-items: center;
  color: #fff;
  font-size: 20px;
  > div {
    display: flex;
    align-items: center;
    img {
      max-height: 50px;
      max-width: 50px;
      border-radius: 50%;
      opacity: 0.2;
    }
    span {
      margin-left: 10px;
    }
  }
}
.el-aside {
  background-color: #333744;
  .el-menu {
    border-right: none;
   
  }
}
.el-main {
  background-color: #eaedf1;
}
.iconfont {
  margin-right: 10px;
}
.toggle-button {
  background-color: #4a5064;
  font-size: 10px;
  line-height: 24px;
  text-align: center;
  color: #fff;
  letter-spacing: 0.2em;
  cursor: pointer;
}
</style>