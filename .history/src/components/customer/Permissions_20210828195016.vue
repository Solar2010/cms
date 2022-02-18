<template>
  <mavonEditor v-model="value" />
</template>

<script>
import { mavonEditor } from "mavon-editor";
export default {
  components: {
    mavonEditor,
  },
  data() {
      return {
          value: ''
      }
  },
  methods: {
      append(data) {
        const newChild = { id: id++, label: 'testtest', children: [] };
        if (!data.children) {
          this.$set(data, 'children', []);
        }
        data.children.push(newChild);
      },

      remove(node, data) {
        const parent = node.parent;
        const children = parent.data.children || parent.data;
        const index = children.findIndex(d => d.id === data.id);
        children.splice(index, 1);
      },
};
</script>
<style lang="less" scoped>
</style>