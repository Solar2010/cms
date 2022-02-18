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
  
};
</script>
<style lang="less" scoped>
</style>