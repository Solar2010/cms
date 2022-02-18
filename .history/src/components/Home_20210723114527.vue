<template>
    <el-container class="home-container">
        <el-header>
            <div>
                <img src="../assets/logo.jpg" alt="管理后台" width="100%">
                <span>后台系统</span>
            </div>
            <el-button type="info" @click="loginOut">退出</el-button>
        </el-header>
        <el-container>
            <el-aside>
                <div class="toggle-button" @click="toggle"> ||| </div>
                <el-menu
      default-active="2"
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b">
      <el-submenu index="1">
        <template slot="title">
          <i class="el-icon-location"></i>
          <span>导航一</span>
        </template>
        <el-menu-item-group>
          <template slot="title">分组一</template>
          <el-menu-item index="1-1">选项1</el-menu-item>
          <el-menu-item index="1-2">选项2</el-menu-item>
        </el-menu-item-group>
        <el-menu-item-group title="分组2">
          <el-menu-item index="1-3">选项3</el-menu-item>
        </el-menu-item-group>
        <el-submenu index="1-4">
          <template slot="title">选项4</template>
          <el-menu-item index="1-4-1">选项1</el-menu-item>
        </el-submenu>
      </el-submenu>
      <el-menu-item index="2">
        <i class="el-icon-menu"></i>
        <span slot="title">导航二</span>
      </el-menu-item>
      <el-menu-item index="3" disabled>
        <i class="el-icon-document"></i>
        <span slot="title">导航三</span>
      </el-menu-item>
      <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <span slot="title">导航四</span>
      </el-menu-item>
    </el-menu>
            </el-aside>
        </el-container>
    </el-container>
</template>

<script>
export default {
    
}
</script>

<style lang="less" scoped>
.home-container{
    height: 100%;
  }
  .el-header{
    background-color: #373D41;
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
          max-height: 60px;
          max-width: 60px;
          border-radius: 5px;
      }
      span {
        margin-left: 10px;
      }
    }
  }
  .el-aside{
    background-color: #333744;
    .el-menu {
      border-right: none;
    }
  }
  .el-main{
    background-color: #EAEDF1;
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