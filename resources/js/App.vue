<template>
  <el-container>
    <el-header>
      <the-header/>
    </el-header>
    <el-container>
      <el-aside width="200px">
        <the-a-side/>
      </el-aside>
      <el-container>
        <el-main>
          <router-view/>
        </el-main>
      </el-container>
    </el-container>
  </el-container>
</template>

<script>
  import TheHeader from './components/TheHeader'
  import TheFooter from './components/TheFooter'
  import TheASide from './components/TheASide'

  export default {
    name: 'App',
    components: { TheASide, TheFooter, TheHeader },
  }
</script>

<style scoped>

  .el-main {
    background-color: #FFFFFF;
    color: #333;
  }

  body > .el-container {
    margin-bottom: 40px;
  }
</style>
