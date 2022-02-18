<template>
  <div>
    <el-breadcrumb separator-class="el-icon-arrow-right">
      <el-breadcrumb-item :to="{ path: '/home' }">首页</el-breadcrumb-item>
      <el-breadcrumb-item>管理员管理</el-breadcrumb-item>
      <el-breadcrumb-item>权限列表</el-breadcrumb-item>
    </el-breadcrumb>
    <el-card>
      el-cl
    </el-card>
    <el-dialog
      title="添加节点"
      :visible.sync="dialogVisible"
      width="50%"
    >
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="节点名称">
          <el-input v-model="form.name"></el-input>
        </el-form-item>
        <el-form-item label="节点路径">
          <el-input v-model="form.path"></el-input>
        </el-form-item>
        <el-form-item label="icon设置">
          <el-input v-model="form.icon"></el-input>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
          <el-button @click="dialogVisible = false">取 消</el-button>
          <el-button type="primary" @click="addPermission"
            >确 定</el-button
          >
        </span>
    </el-dialog>
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
        name: '',
        path: '',
        icon: ''
      },
    };
  },
  methods: {
    append(data, node) {
      this.dialogVisible = true;
      this.addPermission(data, node)
      // const newChild = { id: id++, label: "testtest", children: [] };
      // if (!data.children) {
      //   this.$set(data, "children", []);
      // }
      // data.children.push(newChild);
    },

    remove(node, data) {
      const parent = node.parent;
      const children = parent.data.children || parent.data;
      const index = children.findIndex((d) => d.id === data.id);
      children.splice(index, 1);
    },
    renderContent(h, { node, data, store }) {
      if (data.level == 0) {
        return (
          <span style="flex: 1; display: flex; align-items: center; justify-content: space-between; font-size: 14px; padding-right: 8px;">
            <span>
              <span>{node.label}</span>
            </span>
            <span>
              <span style="font-size: 12px;margin-right: 40px;">关联设备</span>
              <span style="font-size: 12px;margin-right: 10px;">操作</span>
            </span>
          </span>
        );
      } else if (
        data.level == 4 &&
        data.qualityDeviceCode != null &&
        data.qualityDeviceCode != "" &&
        data.qualityDeviceCode != this.deviceInfo.deviceCode
      ) {
        return (
          <span style="flex: 1; display: flex; align-items: center; justify-content: space-between; font-size: 14px; padding-right: 8px;">
            <span>
              <span>{node.label}</span>
            </span>
            <span>
              <el-button style="font-size: 12px;" type="text">
                {data.qualityDeviceCode}
              </el-button>
              <el-button
                style="font-size: 12px;"
                type="text"
                on-click={() => this.relieve(node, data)}
              >
                解除绑定
              </el-button>
            </span>
          </span>
        );
      } else {
        return (
          <span style="flex: 1; display: flex; align-items: center; justify-content: space-between; font-size: 14px; padding-right: 8px;">
            <span>
              <span>{node.label}</span>
            </span>
          </span>
        );
      }
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
    async addPermission(data, node) {
        const sendData = {
          id : node.data.id,
          name: this.form.name,
          path: this.form.path,
          icon: this.form.icon
        }

        console.log(sendData)
        // result = await this.$http.post('admin/permission/add', sendData)
        // console.log(node)    
    }
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