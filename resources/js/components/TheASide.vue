<template>
  <el-menu :router="true" default-active="1">
    <el-menu-item :route="{path: '/search'}" index="1">
      <i class="el-icon-menu"></i>
      <span>Search form</span>
    </el-menu-item>
    <el-menu-item :route="{path: '/about'}" index="2">
      <i class="el-icon-document"></i>
      <span>About me</span>
    </el-menu-item>
  </el-menu>
</template>

<script>
  export default {
    name: 'TheASide',
  }
</script>

<style scoped>

</style>
