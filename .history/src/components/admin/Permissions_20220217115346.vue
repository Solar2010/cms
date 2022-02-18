<template>
  <div>
    <el-breadcrumb separator-class="el-icon-arrow-right">
      <el-breadcrumb-item :to="{ path: '/home' }">首页</el-breadcrumb-item>
      <el-breadcrumb-item>管理员管理</el-breadcrumb-item>
      <el-breadcrumb-item>权限列表</el-breadcrumb-item>
    </el-breadcrumb>
    <el-card>
      <el-collapse class="m-b-20" v-model="active_name">
        <el-collapse-item>
          <template v-for="item in power_list">
                    <el-checkbox
                      class="parent-power"
                      v-if="item.type === 1"
                      :label="item.id"
                      :key="item.id"
                      @change="isSelected(item)"
                      >{{ item.name }}
                    </el-checkbox>
        </el-collapse-item>
      </el-collapse>
    </el-card>
  </div>
</template>

<script>
let id = 1000;
export default {
  data() {
    const data = [
      {
        id: 1,
        label: "一级 1",
        children: [
          {
            id: 4,
            label: "二级 1-1",
            children: [
              {
                id: 9,
                label: "三级 1-1-1",
              },
              {
                id: 10,
                label: "三级 1-1-2",
              },
            ],
          },
        ],
      },
      {
        id: 2,
        label: "一级 2",
        children: [
          {
            id: 5,
            label: "二级 2-1",
          },
          {
            id: 6,
            label: "二级 2-2",
          },
        ],
      },
      {
        id: 3,
        label: "一级 3",
        children: [
          {
            id: 7,
            label: "二级 3-1",
          },
          {
            id: 8,
            label: "二级 3-2",
          },
        ],
      },
    ];
    return {
      data: JSON.parse(JSON.stringify(data)),
      dialogVisible: false,
      form: {
        name: "",
        path: "",
        icon: "",
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
    async addPermission(data, node) {
      const sendData = {
        id: node.data.id,
        name: this.form.name,
        path: this.form.path,
        icon: this.form.icon,
      };

      console.log(sendData);
      // result = await this.$http.post('admin/permission/add', sendData)
      // console.log(node)
    },
  },
  created() {
    this.getMenuList();
  },
};
</script>
<style lang="less" scoped>
.custom-tree-node {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 14px;
  padding-right: 8px;
}
</style>