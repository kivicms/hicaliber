<template>
  <el-table
      :data="entries"
      style="width: 100%"
      v-loading="loading"
      v-on:sort-change="onSortChange"
  >
    <el-table-column
        label="Name"
        prop="name"
        sortable="custom"
        width="180"
    />
    <el-table-column
        label="Price"
        prop="price"
        sortable="custom"
        width="180"
    />
    <el-table-column
        label="Bedrooms"
        prop="bedrooms"
        sortable="custom"
    />
    <el-table-column
        label="Bathrooms"
        prop="bathrooms"
        sortable="custom"
    />
    <el-table-column
        label="Storeys"
        prop="storeys"
        sortable="custom"
    />
    <el-table-column
        label="Garages"
        prop="garages"
        sortable="custom"
    />
  </el-table>
</template>

<script>
  export default {
    name: 'DataTable',
    props: {
      entries: {
        type: Array,
        default: null,
      },
      loading: {
        type: Boolean,
        default: false,
      },
    },
    methods: {
      onSortChange (value) {
        this.$emit('sort-change', value)
      },
    },
  }
</script>

<style scoped>

</style>
